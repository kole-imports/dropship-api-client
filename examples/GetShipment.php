<?php

$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');

//Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;
use KoleImports\DropshipApi\Model\Request\Order;

$serviceBuilder = new ServiceBuilder('X16310', 'a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');

$orderService = $serviceBuilder->getShipmentService();

//getShipment(' Order ID ')
$response = $orderService->getShipment('12345');

//List Of Orders
var_dump($reponse);
