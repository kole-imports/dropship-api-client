<?php

namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Service\OrderBuilder;
use KoleImports\DropshipApi\Model\Request\Order;
use KoleImports\DropshipApi\Model\Request\Address;
use KoleImports\DropshipApi\Model\Request\ShipOptions;
use KoleImports\DropshipApi\Model\Request\Item;
use KoleImports\DropshipApi\Factory\ItemFactory;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class OrderService
{
    private $client;

    private $order;

    public function __construct($client)
    {
        $this->client = $client;
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
        return $this->client->GetOrder(array('order_id' => $id));
    }

    public function getBatch($offset, $limit)
    {

    }

    public function post($xml)
    {
        $request = $this->client->post(
            '/orders', array(
            'Accept'            => 'application/vnd.koleimports.ds.order+xml',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+xml'
        ), $xml);

        $response = $request->send();

        return $response;
    }
}
