<?php
$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');
//Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;

$serviceBuilder = new ServiceBuilder('X16310', 'a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');

$productService = $serviceBuilder->getProductService();

$products = $productService->getProducts();

print_r($products);
