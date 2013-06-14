<?php
//Autoload
$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');

//PHP Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;

//Configure the Service Builder with Credentials
$serviceBuilder = new ServiceBuilder('X16310', 'a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');

//Pass the Service Builder to the Product Service
$productService = $serviceBuilder->getProductService();

$response = $productService->getProducts();

//Output Products to Array
print_r($response);
