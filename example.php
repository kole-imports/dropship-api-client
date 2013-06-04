<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\Configuration\Config;
use Application\KoleImportsFactory;
use Application\KoleImportsClient;
use Application\Orders\Order;


//Setup Client Configuration
$config = new Config;
$config->setAccountId('X16310');
$config->setApiKey('a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');
$factory = new KoleImportsFactory($config);
$koleImportsClient = new KoleImportsClient($factory);

try {

/**
* Product Commands
*/
	//Get list of products
	//$products = $koleImportsClient->getProducts();
	//print_r($products);

	//Get single product by sku
	//$sku = 'AA124';
	//$product = $koleImportsClient->getProduct($sku);
	//print_r($product);

/**
* Account Commands
*/

	//Get list of accounts
	//$accountList = $koleImportsClient->getAccounts();
	//print_r($accountList);

/**
* Order Commands
*/

	//Get list of orders
	//$orderList = $koleImportsClient->getOrders();
	//print_r($orderList);

	//Get single  order by order id
	//$order_id = '123456';
	//$getOrder = $koleImportsClient->getOrder($order_id);
	//print_r($getOrder);

	//Create Order object
	$order = new Order;

	//Order data
	$order->setPoNumber('12345');
	$order->setNotes('These are Notes');
	$order->setCarrier('FEDEX');
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

	//Get Order data and insert into array
	$data = $order;
	$dataArray = array(
		'order' => array(
			'po_number' 		=> $data->getPoNumber(),
			'notes' 			=> $data->getNotes(),
			'ship_options' => array(
				'carrier' 	=> $data->getCarrier(),
				'service' 	=> $data->getService(),
				'signature'	=> $data->getSignature(),
				'instructions' 	=> $data->getInstructions()
				),
			'ship_to_address' 	=> array(
				'first_name' 	=> $data->getFirstName(),
				'last_name'	=> $data->getLastName(),
				'company' 	=> $data->getCompany(),
				'address_1' 	=> $data->getAddressOne(),
				'address_2' 	=> $data->getAddressTwo(),
				'city' 		=> $data->getCity(),
				'state' 		=> $data->getState(),
				'zipcode' 	=> $data->getZipcode(),
				'ext_zipcode' 	=> $data->getExtZipcode(),
				'country' 	=> $data->getCountry(),
				'phone' 	=> $data->getPhone(),
			),
			'items' => array(
				'item' => array(
				'sku' 		=> $data->getSku(),
				'quantity' 	=> $data->getQuantity()
				)
			)
		)
	);

	//Create JMS Serializer
	$serializer = JMS\Serializer\SerializerBuilder::create()->build();
	$json = $serializer->serialize($dataArray, 'json');

	//Send POST data to  postOrder method
	$postOrder = $koleImportsClient->postOrder($json);

	//Print POST response
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
