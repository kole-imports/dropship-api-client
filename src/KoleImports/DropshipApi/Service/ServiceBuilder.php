<?php

namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Exception\NotImplementedException;
use KoleImports\DropshipApi\Model\Request\Config;
use KoleImports\DropshipApi\Service\ApiClient;
use KoleImports\DropshipApi\Service\OrderService;
use KoleImports\DropshipApi\Service\ProductService;
use KoleImports\DropshipApi\Service\Serializer;

class ServiceBuilder
{
    private $config;

    private $client;

    /**
    * @var serializer Object
    */
    private $serializer;

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
        $client = new ApiClient;
        return $client->connectApi($this->config);
    }

    /**
     * Serializer Service
     * Provides an interface for the serializer
     */
    public function getSerializer()
    {
        $serializer = new Serializer;
        return $serializer->getSerializer();
    }

    /**
     * Order Service
     * Provides a simple interface to retrieve and create new orders.
     * @return OrderService Order Service
     */
    public function getOrderService()
    {
        return new OrderService($this->getApiClient(), $this->getSerializerService());
    }

    /**
     * Order Service
     * Provides a simple interface to retrieve and create new orders.
     * @return OrderService Order Service
     */
    public function getSerializerService()
    {
        return new SerializerService($this->getSerializer());
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
        return new ProductService($this->getApiClient());
    }

    /**
     * @throws NotImplementedException
     */
    public function getTransactionService()
    {
        return new TransactionService($this->getApiClient());
    }

    /**
     * @throws NotImplementedException
     */
    public function getShipmentService()
    {
        return new ShipmentService($this->getApiClient());
    }
}
