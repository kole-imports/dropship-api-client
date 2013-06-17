<?php

$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');

//Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;
use KoleImports\DropshipApi\Model\Request\Order;

$serviceBuilder = new ServiceBuilder('ACCOUNT ID', 'API KEY');

$transactionService = $serviceBuilder->getTransactionService();

//getTransaction(' Order ID ')
$response = $transactionService->getTransaction('12345');

var_dump($response);
