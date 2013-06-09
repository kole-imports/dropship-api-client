<?php

namespace KoleImports\DropshipApi\Service;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class OrderService
{
    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function get($id)
    {
        return $this->client->GetOrder(array('order_id' => $id));
    }

    public function getBatch($offset, $limit)
    {

    }

    public function post(Order $order)
    {

    }

    public function getOrderBuilder()
    {

    }
}
