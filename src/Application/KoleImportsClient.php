<?php
namespace Application;

use Application\KoleImportsFactory;
use Application\Services\Serializer;

class KoleImportsClient
{

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
        //return $this->client->GetProduct(array('sku' => $sku));
    }

    //Post order to website
    public function postOrder($json = null)
    {

        $request = $this->client->post(
            '/orders', array(
            'Accept'            => 'application/vnd.koleimports.ds.order+json',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+json'
        ), $json);

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
