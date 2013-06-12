=============================
Dropship API Client - README
=============================

This client will help customers get off the ground faster with a PHP client solution for the Kole Imports Dropship API

###Complete Kole Imports Dropship API Documentation:

[Dropship API DOCS] (http://support.koleimports.com/kb/api-documentation)

API Requirements -
-------------------------------------------------------------

###Create Account:

[Kole Imports Dropship] (https://dropship.koleimports.com/)

* Account ID: ex. X12345
* API KEY: ex. a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd
* Shipping Method: FedEx or USPS
* Payment Method: Credit Card / Terms


Initial Setup -
------------------------

###Install Composer

####Download and install Composer

```teminal
curl -s "http://getcomposer.org/installer" | php
```

###Guzzle / JMS Serializer Setup

####Create your composer.json file

```json
{
    "require": {
        "guzzle/guzzle": "3.0.*",
        "jms/serializer": "0.*"
    },
    "autoload": {
        "psr-0": {
            "KoleImports\\DropshipApi": "src/",
            "KoleImports\\DropshipApi\\Tests": "tests/",
            "Commands": "examples/"
        }
    }
}
```
####Install dependencies

Navigate in your terminal to the directory where you cloned this repository.

```terminal
php composer.phar install
```

Getting Started -
------------------------

###Configuration


```php
use KoleImports\DropshipApi\Service\ServiceBuilder;

//Configure the Service Builder with Credentials
$serviceBuilder = new ServiceBuilder('YOUR ACCOUNT ID', 'YOUR API KEY');
```

Commands -
------------------------

###Products

####List Products [GET]

```php
//Pass the Service Builder to the Product Service
$productService = $serviceBuilder->getProductService();

//Get list of projects
$response = $productService->getProducts();

$serializerService = $serviceBuilder->getSerializerService();
$serializerService->setData($response);

//Single Order as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

####List Single Product by SKU [GET]

```php
use KoleImports\DropshipApi\Model\Request\Item;

//Pass the Service Builder to the Product Service
$productService = $serviceBuilder->getProductService();

//Create Item object and set the SKU
$item = new Item;
$item->setSku('AA124');

//GetProduct Request to API
$response = $productService->getProduct($item->getSku());

$serializerService = $serviceBuilder->getSerializerService();
$serializerService->setData($response);

//Single Order as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

###Orders

####List Orders

```php
$orderService = $serviceBuilder->getOrderService();

$response = $orderService->getBatch($limit, $offset);

$serializerService = $serviceBuilder->getSerializerService();
$response = $serializerService->setData($response);

//Single Order as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

####List Single Order by Order Id

```php
use KoleImports\DropshipApi\Model\Request\Order;

$orderService = $serviceBuilder->getOrderService();

$order = new Order;
$order->setOrderId('12345');

$response = $orderService->getOrder($order->getOrderId());

$serializerService = $serviceBuilder->getSerializerService();
$response = $serializerService->setData($response);

//Single Order as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

####Create Order(s) [POST]

```php
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
```

###Transactions

####List Transactions

```php
$transactionService = $serviceBuilder->getTransactionService();

$response = $transactionService->getTransactions();

//List of Transactions as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

####List Single Transaction by Order Id

```php
use KoleImports\DropshipApi\Model\Request\Order;

$transactionService = $serviceBuilder->getTransactionService();

$order = new Order;
$order->setOrderId('12345');

$response = $transactionService->getTransaction($order->getOrderId());

//Single Transaction by Order Id as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

###Shipments

####List Shipments

```php
$orderService = $serviceBuilder->getShipmentService();

$response = $orderService->getShipments();

//List of Shipments as XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```

####List Single Shipment by Order Id

```php
use KoleImports\DropshipApi\Model\Request\Order;

$orderService = $serviceBuilder->getShipmentService();

$order = new Order;
$order->setOrderId('12345');

$response = $orderService->getShipment($order->getOrderId());

//Single Shipment by Order Idas XML, JSON, or Object
$xml = $serializerService->getXml();
$json = $serializerService->getJson();

//Object
var_dump($response)
```



