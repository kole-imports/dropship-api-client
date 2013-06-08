<?php

namespace KoleImports\DropshipApi\Service;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class OrderService
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($id)
    {

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
