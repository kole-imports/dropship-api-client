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

###Guzzle Client Framework Setup:

[Guzzlephp] (http://guzzlephp.org/getting-started/installation.html)

####1. Add "guzzle/guzzle" as a dependency in your project's composer.json file

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

####2. Download and install Composer

```teminal
curl -s "http://getcomposer.org/installer" | php
```

####3. Install your dependencies

```terminal
php composer.phar install
```
####4. Require Composer's autoloader

Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process.

```php
require __DIR__ . '/vendor/autoload.php';
```

Getting Started -
------------------------

###Configuration


```php
//Autoload Dependencies
require __DIR__ . '/vendor/autoload.php';

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
$products = $productService->getProducts();

var_dump($products);
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
$product = $productService->getProduct($item->getSku());
```

###Orders

####List Orders

```php
$orderService = $serviceBuilder->getOrderService();

$response = $orderService->getBatch($limit, $offset);

//List Of Orders
var_dump($reponse);
```

####List Single Order by Order Id

```php

```

####Create Orders [POST]

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
$postOrder = $orderService->post($cleanXml);

print_r($postOrder);
```

###Transactions

####List Transactions

```php

```

####List Single Transaction by Order Id

```php

```

###Shipments

####List Shipments

```php
$orderService = $serviceBuilder->getShipmentService();

$response = $orderService->getShipments();

//List Of Orders
var_dump($reponse);
```

####List Single Shipment by Order Id

```php
use KoleImports\DropshipApi\Model\Request\Order;

$orderService = $serviceBuilder->getShipmentService();

$order = new Order;
$order->setOrderId('12345');

$response = $orderService->getShipment($order->getOrderId());

//List Of Orders
var_dump($reponse);
```



