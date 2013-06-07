<?php

namespace KoleImports\DropshipApi;

class KoleImportsClient
{
    /**
    * @var object
    */
    protected $client;

     //Construct Client
    public function __construct(KoleImportsFactory $factory)
    {
        $this->config = $factory;
        $this->client = $this->config->clientConfig();
    }

    //Get list of products
    public function getProducts()
    {
        return $this->client->GetProducts();
    }

    //Get product by sku
    public function getProduct($sku = 'null')
    {
        return $this->client->GetProduct(array('sku' => $sku));
    }

    //Post order to website
    public function postOrder($serializedData = null)
    {
        $request = $this->client->post(
            '/orders', array(
            'Accept'            => 'application/vnd.koleimports.ds.order+xml',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+xml'
        ), $serializedData);

        $response = $request->send();

        return $response;

    }

    //Get list of Orders
    public function getOrders()
    {
        return $this->client->GetOrders();
    }

    //Get order by orderId
    public function getOrder($orderId = null)
    {
        return $this->client->GetOrder(array('order_id' => $orderId));
    }

    //Get list of Shipments
    public function getShipments()
    {
        return $this->client->GetShipments();
    }

    //Get Shipment by orderId
    public function getShipment($orderId = null)
    {
        return $this->client->GetShipment(array('order_id' => $orderId));
    }

    //Get list of accounts
    public function getAccounts()
    {
        return $this->client->GetAccounts();
    }

}
