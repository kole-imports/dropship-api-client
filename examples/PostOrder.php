<?php

$vendorDir = dirname(dirname(__FILE__));
require($vendorDir . '/vendor/autoload.php');


//Error Handling
ini_set('display_errors', 'On');

use KoleImports\DropshipApi\Model\Request\Config;
use KoleImports\DropshipApi\KoleImportsFactory;
use KoleImports\DropshipApi\KoleImportsClient;
use KoleImports\DropshipApi\Model\Request\Address;
use KoleImports\DropshipApi\Model\Request\Item;
use KoleImports\DropshipApi\Model\Request\ItemCollection;
use KoleImports\DropshipApi\Model\Request\Order;
use KoleImports\DropshipApi\Model\Request\ShipOptions;
use KoleImports\DropshipApi\Model\Request\OrderCollection;

use KoleImports\DropshipApi\Service\ServiceBuilder;

$serviceBuilder = new ServiceBuilder('X16310', 'a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');

$orderService = $serviceBuilder->getOrderService();

try {

    $address = new Address();

    $address->setFirstName('Jesse')
        ->setLastName('Reese')
        ->setCompany('JesseTestCompany')
        ->setAddress_1('24600 Main St.')
        ->setAddress_2('Suite 3')
        ->setCity('Carson')
        ->setState('CA')
        ->setZipcode('90745')
        ->setExtZipcode('5555')
        ->setPhone('5555555555');

    $shipOptions = new ShipOptions();

    $shipOptions->setCarrier(ShipOptions::CARRIER_UPS)
        ->setService(ShipOptions::SERVICE_GROUND)
        ->setSignature(false)
        ->setInstructions('These are shipping instructions');

    $firstItem = new Item();

    $firstItem->setSku('AA124')
        ->setQuantity('24');

    $secondItem = new Item();

    $secondItem->setSku('AA125')
        ->setQuantity('24');

    $items = new ItemCollection();

    $items->addItem($firstItem);
    $items->addItem($secondItem);

    $order = new Order;

    $order->setPoNumber('12345')
        ->setNotes('These are sample notes')
        ->setShipOptions($shipOptions)
        ->setShipToAddress($address)
        ->setItems($items);

    //$orders = new OrderCollection;
    //$orders->addOrder($order);

    //Create JMS Serializer
    $serializer = JMS\Serializer\SerializerBuilder::create()->build();
    $xml = $serializer->serialize($order, 'xml');

    //Send POST data to  postOrder method
    $postOrder = $client->postOrder($xml);

    //Print POST response
    print($postOrder);

} catch (Guzzle\Http\Exception\BadResponseException $e) {
    echo '<p> Uh oh! ' . $e->getMessage() . '</p>';
    echo '<p>HTTP request URL: ' . $e->getRequest()->getUrl() . '</p>';
    echo '<p>HTTP request: ' . $e->getRequest() . "\n";
    echo '<p>HTTP response status: ' . $e->getResponse()->getStatusCode() . '</p>';
    echo '<p>HTTP response: ' . $e->getResponse() . '</p>';
}
