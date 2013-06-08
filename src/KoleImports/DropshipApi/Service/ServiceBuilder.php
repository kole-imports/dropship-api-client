<?php

namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Exception\NotImplementedException;
use KoleImports\DropshipApi\Model\Request\Config;
use KoleImports\DropshipApi\Service\ApiClient;
use KoleImports\DropshipApi\Service\OrderService;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class ServiceBuilder
{
    private $config;

    private $client;

    /**
     * @link http://support.koleimports.com/kb/api-documentation/api-overview
     * @param string $accountId Account ID
     * @param string $apiKey    API Key
     */
    public function __construct($accountId, $apiKey)
    {
        $this->config = new Config($accountId, $apiKey);
    }

    /**
     * Client Service
     * Provides an interface to the guzzle client
     */
    public function getApiClient()
    {
        return isset($this->client) ? $this->client : new ApiClient($this->config);
    }

    /**
     * Order Service
     * Provides a simple interface to retrieve and create new orders.
     * @return OrderService Order Service
     */
    public function getOrderService()
    {
        return new OrderService($this->getApiClient());
    }

    /**
     * @throws NotImplementedException
     */
    public function getAccountService()
    {
        throw new NotImplementedException('Account Service has not been implemented.');
    }

    /**
     * @throws NotImplementedException
     */
    public function getLinkService()
    {
        throw new NotImplementedException('Link Service has not been implemented.');
    }

    /**
     * @throws NotImplementedException
     */
    public function getProductService()
    {
        throw new NotImplementedException('Product Service has not been implemented.');
    }

    /**
     * @throws NotImplementedException
     */
    public function getTransactionService()
    {
        throw new NotImplementedException('Transaction Service has not been implemented.');
    }

    /**
     * @throws NotImplementedException
     */
    public function getShipmentService()
    {
        throw new NotImplementedException('Shipment Service has not been implemented.');
    }
}
