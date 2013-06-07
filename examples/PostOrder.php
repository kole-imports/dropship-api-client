<?php

require __DIR__ . '/vendor/autoload.php';

use KoleImports\DropshipApi\Config\Config;
use KoleImports\DropshipApi\KoleImportsFactory;
use KoleImports\DropshipApi\KoleImportsClient;
use KoleImports\DropshipApi\Model\Request\Address;
use KoleImports\DropshipApi\Model\Request\Item;
use KoleImports\DropshipApi\Model\Request\ItemCollection;
use KoleImports\DropshipApi\Model\Request\Order;
use KoleImports\DropshipApi\Model\Request\ShipOptions;

//Setup Client Configuration
$config = new Config;

$config->setAccountId('X16310');
$config->setApiKey('a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd');

$factory = new KoleImportsFactory($config);
$client = new KoleImportsClient($factory);

try {

    $address = new Address();

    $address->setFirstName('Jesse')
        ->setLastName('Reese')
        ->setCompany('JesseTestCompany')
        ->setAddress1('24600 Main St.')
        ->setAddress2('Suite 3')
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

    $items->addItem($firstItem)
        ->addItem($secondItem);

    $order = new Order;

    $order->setPoNumber('12345')
        ->setNotes('These are sample notes')
        ->setShipOptions($shipOptions)
        ->setShipToAddress($address)
        ->setItems($items);

    //Create JMS Serializer
    $serializer = JMS\Serializer\SerializerBuilder::create()->build();
    $xml = $serializer->serialize($order, 'xml');

    //Send POST data to  postOrder method
    $postOrder = $koleImportsClient->postOrder($xml);

    //Print POST response
    print($postOrder);

} catch (Guzzle\Http\Exception\BadResponseException $e) {
    echo '<p> Uh oh! ' . $e->getMessage() . '</p>';
    echo '<p>HTTP request URL: ' . $e->getRequest()->getUrl() . '</p>';
    echo '<p>HTTP request: ' . $e->getRequest() . "\n";
    echo '<p>HTTP response status: ' . $e->getResponse()->getStatusCode() . '</p>';
    echo '<p>HTTP response: ' . $e->getResponse() . '</p>';
}