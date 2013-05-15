<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\KoleImportsClient;
use Guzzle\Service\Builder\ServiceBuilder;

//Create client object
$KoleImportsClient = new KoleImportsClient();
$client = $KoleImportsClient->KoleImportsService();

try {

	/**
	* Product Commands
	*/
	//Get list of products
	$productList = $client->GetProducts();
	print_r($productList);

	//Get single product by sku
	$product = $client->GetProduct(array('sku' => 'AA124'));
	//print_r($product);

	/**
	* Account Commands
	*/

	//Get list of accounts
	$accountList = $client->GetAccounts();
	//print_r($accountList);

	/**
	* Orders Commands
	*/

	//Get list of orders
	$orderList = $client->GetOrders();
	//print_r($orderList);

	//Get single  order by order id
	$order = $client->GetOrder(array('order_id' => ''));
	//print_r($order);

	//Create an order
	$createOrder = $client->CreateOrder();
}
//Guzzle Error Handling
catch (Guzzle\Http\Exception\BadResponseException $e)
{
    echo '<p> Uh oh! ' . $e->getMessage() . '</p>';
    echo '<p>HTTP request URL: ' . $e->getRequest()->getUrl() . '</p>';
    echo '<p>HTTP request: ' . $e->getRequest() . "\n";
    echo '<p>HTTP response status: ' . $e->getResponse()->getStatusCode() . '</p>';
    echo '<p>HTTP response: ' . $e->getResponse() . '</p>';
}

