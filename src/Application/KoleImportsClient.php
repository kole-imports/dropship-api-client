<?php
namespace Application;

use Application\KoleImportsFactory;
use Application\Serializer;

class KoleImportsClient
{

    protected $client;

     //Construct Client
    public function __construct()
    {
        $this->client = KoleImportsFactory::clientConfig();
    }

    //Get list of products
    public function getProducts()
    {
        return $this->client->GetProducts();
    }

    //Get product by sku
    public function getProduct($sku = 'null')
    {
        //return $this->client->GetProduct(array('sku' => $sku));
    }

     //Post order to website
    public function postOrder($serializedOrder = null)
    {

        $request = $this->client->post(
            'https://api.koleimports.com/orders', array(
            'Accept'            => 'application/vnd.koleimports.ds.order+xml',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+xml'
        ), $serializedOrder);

        $response = $request->send();

        return $response;

    }

    //Get list of Orders
    public function getOrders()
    {
        return $this->client->GetOrders();
    }

    //Get order by order_id
    public function getOrder($order_id = null)
    {
        return $this->client->GetOrder(array('order_id' => $order_id));
    }

    //Get list of accounts
    public function getAccounts()
    {
        return $this->client->GetAccounts();
    }

}