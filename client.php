<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\KoleImportsClient;

//Create client object
$KoleImportsClient = new KoleImportsClient();
$client = $KoleImportsClient->KoleImportsService();

try {
	/**
	* Product Commands
	*/
	//Get list of products
	$productList = $client->GetProducts();
	//print_r($productList);

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
    echo 'Uh oh! ' . $e->getMessage();
    echo 'HTTP request URL: ' . $e->getRequest()->getUrl() . "\n";
    echo 'HTTP request: ' . $e->getRequest() . "\n";
    echo 'HTTP response status: ' . $e->getResponse()->getStatusCode() . "\n";
    echo 'HTTP response: ' . $e->getResponse() . "\n";
}

