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

	curl -s "http://getcomposer.org/installer" | php

####3. Install your dependencies

	php composer.phar install

####4. Require Composer's autoloader

Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process.

	require __DIR__ . '/vendor/autoload.php';


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

```

####Create Orders [POST]

```php
//Create Service Builder
$orderService = $serviceBuilder->getOrderService();

//Create Order Builder
$orderBuilder = $orderService->getOrderBuilder();

//Build Order
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

//Order Object $data
$data = $orderBuilder->getOrder();

//Create JMS Serializer
$serializer = JMS\Serializer\SerializerBuilder::create()->build();
$xml = $serializer->serialize($data, 'xml');

//Remove CDTA tags from XML
function strip_cdata($string)
{
    preg_match_all('/<!\[cdata\[(.*?)\]\]>/is', $string, $matches);
    return str_replace($matches[0], $matches[1], $string);
}

//Clean XML
$cleanXML = strip_cdata($xml);

//Send POST data to  postOrder method
$response = $orderService->post($cleanXML);

//Response
print_r($response);

```

###Transactions

###Shipments



