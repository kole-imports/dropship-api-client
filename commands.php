<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\KoleImportsClient;

//Create client object
$koleImportsClient = new KoleImportsClient();

try {

/**
* Product Commands
*/
	//Get list of products
	$products = $koleImportsClient->getProducts();
	print_r($products);

	//Get single product by sku
	$sku = 'AA124';
	$product = $koleImportsClient->getProduct($sku);
	//print_r($product);

/**
* Account Commands
*/

	//Get list of accounts
	$accountList = $koleImportsClient->getAccounts();
	//print_r($accountList);

/**
* Order Commands
*/

	//Get list of orders
	$orderList = $koleImportsClient->getOrders();
	//print_r($orderList);

	//Get single  order by order id
	$order_id = '123456';
	$getOrder = $koleImportsClient->getOrder($order_id);
	//print_r($getOrder);

	$postOrder = $koleImportsClient->postOrder($order);
	//print_r($postOrder->getResponse());
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