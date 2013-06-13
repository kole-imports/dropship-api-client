<?php

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
        if(!isset($id))
        {
            echo 'Please set an Order Id';
        }else
        {
            return $this->client->GetOrder(array('order_id' => $id));
        }
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
