<?php
require __DIR__ . '/vendor/autoload.php';

//Error Handling
ini_set('display_errors', 'On');

use Application\DropshipProductClient;

$DropshipProductClient = new DropshipProductClient();

$productList = $DropshipProductClient->connectAPI();
//Get Request
$request = $productList->get('products');

//Error Handling
try {
	$command = $productList->getCommand('GetProducts');
	$result = $command->execute();
	print_r($result);
} catch (Guzzle\Http\Exception\BadResponseException $e) {
    echo 'Uh oh! ' . $e->getMessage();
    echo 'HTTP request URL: ' . $e->getRequest()->getUrl() . "\n";
    echo 'HTTP request: ' . $e->getRequest() . "\n";
    echo 'HTTP response status: ' . $e->getResponse()->getStatusCode() . "\n";
    echo 'HTTP response: ' . $e->getResponse() . "\n";
}

