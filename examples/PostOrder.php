<?php

$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');

//Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Service\ServiceBuilder;

$serviceBuilder = new ServiceBuilder('X16310', 'a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');

$orderService = $serviceBuilder->getOrderService();

$orderBuilder = $orderService->getOrderBuilder();

$orderBuilder->setPoNumber('12345')
    ->setNotes('These are sample notes')
    ->setCarrier('FEDEX')
    ->setService("GROUND")
    ->setSignature(true)
    ->setInstructions('These are shipping instructions')
    ->setFirstName('Jesse')
    ->setLastName('Reese')
    ->setCompany('JesseTestCompany')
    ->setAddress1('24600 Main St.')
    ->setAddress2('Suite 3')
    ->setCity('Carson')
    ->setState('CA')
    ->setZipcode('90745')
    ->setExtZipcode('5555')
    ->setPhone('5555555555')
    ->addItem('AA124','24')
    ->addItem('AA125','48');

$order = $orderBuilder->getOrder();

//Serialize Order
$serializerService = $serviceBuilder->getSerializerService();
$serializerService->setData($order);
$xml = $serializerService->getXml();

//Remove CDATA from raw XML
$cleanXml = $orderService->cleanXml($xml);

//Send POST data to  postOrder method
$response = $orderService->post($cleanXml);

//Guzzle Response Object
var_dump($response);
