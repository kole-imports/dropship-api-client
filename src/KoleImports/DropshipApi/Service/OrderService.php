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
    /**
    *@var client Object
    */
    private $client;

    /**
    *@var order Object
    */
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
        if(!isset($id))
        {
            echo 'Please set an Order Id';
        }else
        {
            return $this->client->GetOrder(array('order_id' => $id));
        }
    }

    public function getBatch($offset = null, $limit = null)
    {
        if(!isset($offset, $limit))
        {
            return $this->client->GetOrders();
        }else
        {
            return $this->client->GetOrders(array('offset' => $this->offset, 'limit' => $this->limit));
        )
    }

    public function post($xml)
    {
        $request = $this->client->post(
            '/orders', array(
            'Accept'        => 'application/vnd.koleimports.ds.order+xml',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+xml'
        ), $xml);

        $response = $request->send();

        return $response;
    }

    public function setOffset($offset)
    {
        $this->offset = (int) $offset;

        return $this;
    }

    public function setLimit($limit)
    {
        $this->limit = (int) $limit;

        return $this;
    }

    public function getOffset()
    {
        return $this->offset;
    }

    public function getLimit()
    {
        return $this->limit;
    }
}
