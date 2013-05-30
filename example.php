<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\KoleImportsClient;
use Application\Serializer;

//Create client object
$koleImportsClient = new KoleImportsClient();
$serializer = new Serializer();

try {

/**
* Product Commands
*/
	//Get list of products
	$products = $koleImportsClient->getProducts();
	//print_r($products);

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

	//example order
	$order = array(
			'po_number' 		=> '123456',
			'notes'				=> 'This is a test',
			'ship_options' 		=> array(
			'carrier'				=> 'FEDEX',
			'service'			=> 'GROUND',
			'signature'			=> '0',
			'instructions'		=> 'ship that ish',
			),
			'ship_to_address ' 	=> array(
			'first_name'			=> 'Jesse',
			'last_name'			=> 'Reese',
			'company'			=> 'JesseTestCompany',
			'address_1'			=> '24600 Main St',
			'address_2'			=> '',
			'city'				=> 'Carson',
			'state'				=> 'CA',
			'zipcode'			=> '90745',
			'ext_zipcode'		=> '',
			'country'			=> 'USA',
			'phone'				=> ''
			),
			'items' 				=> array(
			'item' 				=> array(
			'sku'				=>	'AA124',
			'quantity'			=> '24'
			)
		)
	);


	$serializedOrder = $serializer->createXML($order);
	$postOrder = $koleImportsClient->postOrder($serializedOrder);
	print($postOrder);

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