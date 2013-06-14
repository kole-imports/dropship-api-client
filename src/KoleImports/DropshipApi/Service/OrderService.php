<?php
/*
Kole Imports Dropship API Client
Copyright (C) <2013>  <Jesse Reese>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Service\OrderBuilder;
use KoleImports\DropshipApi\Model\Request\Order;
use KoleImports\DropshipApi\Model\Request\Address;
use KoleImports\DropshipApi\Model\Request\ShipOptions;
use KoleImports\DropshipApi\Model\Request\Item;
use KoleImports\DropshipApi\Factory\ItemFactory;
use KoleImports\DropshipApi\Model\Response\Parser;

class OrderService
{
    /**
    *@var client Object
    */
    private $client;

    /**
    *@var order Object
    */
    private $order;


    public function __construct($client, $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function getOrderBuilder()
    {
        $order = new Order;
        $address = new Address;
        $shipOptions = new ShipOptions;
        $itemFactory = new ItemFactory;

        return new OrderBuilder($order, $address, $shipOptions, $itemFactory);
    }

    public function getOrder($id)
    {
            $order = new Order;
            $order->setOrderId($id);

            return $this->client->GetOrder(array('order_id' => $order->getOrderId()));
    }

    public function getOrders()
    {
        return $this->client->GetOrders();
    }

    public function post($data)
    {
        //Serialize Order Data
        $this->serializer->setData($data);
        $xml = $this->serializer->getXML();

        //Strip CDATA from XML
        preg_match_all('/<!\[cdata\[(.*?)\]\]>/is', $xml, $matches);
        $cleanXml = str_replace($matches[0], $matches[1], $xml);

        //Set Request (uri , headers, body)
        $request = $this->client->post(
            '/orders', array(
            'Accept'        => 'application/vnd.koleimports.ds.order+xml',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+xml'
        ), $cleanXml);

        //Post Order
        $response = $request->send();

        $xmlResponse = $response->xml();

        $parser = new Parser;

        return $parser->toArray($xmlResponse);

    }
}
