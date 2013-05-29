<?php
namespace Application;

use Application\KoleImportsFactory;

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
    public function postOrder(array $order)
    {

        $this->client->setDefaultHeaders(array(
            'Accept'            => 'application/vnd.koleimports.ds.order+json',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+json'
        ));

     return $this->client->PostOrder($order);

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