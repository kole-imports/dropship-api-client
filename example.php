<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\Configuration\Config;
use Application\KoleImportsFactory;
use Application\KoleImportsClient;
use Application\Orders\Order;
use Application\Products\Product;
use Application\Services\Serializer;


//Setup Client Configuration
$config = new Config;
$config->setAccountId('X16310');
$config->setApiKey('a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');
$factory = new KoleImportsFactory($config);
$koleImportsClient = new KoleImportsClient($factory);
$product = new Product;
try {

/**
* Product Commands
*/
	//Get list of products
	//$products = $koleImportsClient->getProducts();
	//print_r($products);

	/**Get single product by sku
	$product->setSku('AA124');
	$sku = $product->getSku();
	$singleProduct = $koleImportsClient->getProduct($sku);
	print_r($singleProduct);**/

/**
* Account Commands
*/

	//Get list of accounts
	//$accountList = $koleImportsClient->getAccounts();
	//print_r($accountList);

/**
* Order Commands
*/
	//Create Order object
	$order = new Order;

	/**Get list of orders
	$orderList = $koleImportsClient->getOrders();
	print_r($orderList);**/

	/**Get single  order by order id
	$order->setOrderId('12345');
	$orderId = $order->getOrderId();
	$response = $koleImportsClient->getOrder($orderId);
	print_r($response);**/

	//Order data
	$order->setPoNumber('12345');
	$order->setNotes('These are Notes');
	$order->setCarrier('FEDEX');
	$order->setService('GROUND');
	$order->setSignature('0');
	$order->setInstructions('These are instructions');
	$order->setFirstName('Jesse');
	$order->setLastName('Reese');
	$order->setCompany('JesseTestCompany');
	$order->setAddressOne('24600 Main St.');
	$order->setAddressTwo('');
	$order->setCity('Carson');
	$order->setState('CA');
	$order->setZipcode('90745');
	$order->setExtZipcode('');
	$order->setCountry('USA');
	$order->setPhone('');
	$order->setSku('AA124');
	$order->setQuantity('24');

	/**Format order data into array then pass array to serializer
	$orderData = $order->formatOrder();
	$orderSerialized = $order->serializeOrder($orderData);

	//Send POST data to  postOrder method
	$postOrder = $koleImportsClient->postOrder($orderSerialized);

	//Print POST response
	print($postOrder);**/

	//Create JMS Serializer
	$serializer = JMS\Serializer\SerializerBuilder::create()->build();
	$xml = $serializer->serialize($order, 'xml');

	//Send POST data to  postOrder method
	$postOrder = $koleImportsClient->postOrder($xml);

	//Print POST response
	print($postOrder);

/**
* Shipment Commands
*/



/**
* Transaction Commands
*/

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
