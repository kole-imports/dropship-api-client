<?php
namespace Application;

use Application\Config;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class KoleImportsClient extends Client
{
    /**
    * @var $_client Guzzle\Service\Client
    */
    protected $_client;

    //Construct Client
    public function __construct()
    {
        //Create client object
        $this->_client = new Client('https://api.koleimports.com', array(
            'curl.options'  => array(
            CURLOPT_HTTPAUTH => 'CURLAUTH_BASIC',
            CURLOPT_USERPWD =>  Config::USERPWD,
            CURLOPT_RETURNTRANSFER => 'true'
            )
        ));

        //Add service description to _client object
        $this->_client->setDescription(ServiceDescription::factory(__DIR__ .'/Services/services.json'));
    }

    //Get list of products
    public function getProducts()
    {
        return $this->_client->GetProducts();
    }

    //Get product by sku
    public function getProduct($sku = 'null')
    {
        return $this->_client->GetProduct(array('sku' => $sku));
    }

     //Post order to website
    public function postOrder(array $order)
    {

        $this->_client->setDefaultHeaders(array(
            'Accept'            => 'application/vnd.koleimports.ds.order+json',
            'Content-Type'  => 'application/vnd.koleimports.ds.order+json'
        ));

     return $this->_client->PostOrder($order);

    }

    //Get list of Orders
    public function getOrders()
    {
        return $this->_client->GetOrders();
    }

    //Get order by order_id
    public function getOrder($order_id = null)
    {
        return $this->_client->GetOrder(array('order_id' => $order_id));
    }

    //Get list of accounts
    public function getAccounts()
    {
        return $this->_client->GetAccounts();
    }

}