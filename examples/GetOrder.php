<?php

$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');

//Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;

$serviceBuilder = new ServiceBuilder('ACCOUNT ID', 'API KEY');

$orderService = $serviceBuilder->getOrderService();

//getOrder(' Order ID ')
$response = $orderService->getOrder('12345');

//List Of Orders
var_dump($reponse);
