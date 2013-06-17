<?php
//Autoloader
$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');

//PHP Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;

//Configure the Service Builder with Credentials
$serviceBuilder = new ServiceBuilder('ACCOUNT ID', 'API KEY');

//Pass the Service Builder to the Product Service
$productService = $serviceBuilder->getProductService();

//GetProduct Request to API
$response = $productService->getProduct('AA124');

var_dump($response);
