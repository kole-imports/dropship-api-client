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

###Guzzle Client Framework Setup:

[Guzzlephp] (http://guzzlephp.org/getting-started/installation.html)

####1. Add "guzzle/guzzle" as a dependency in your project's composer.json file

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

These are the core requirements for the the client:

	```php
	//Autoload Dependencies
	require __DIR__ . '/vendor/autoload.php';

	use KoleImports\DropshipApi\Service\ServiceBuilder;

	//Configure the Service Builder with Credentials
	$serviceBuilder = new ServiceBuilder('YOUR ACCOUNT ID', 'YOUR API KEY');
	```

###Products

####List Products

```php
//Pass the Service Builder to the Product Service
$productService = $serviceBuilder->getProductService();

//Get list of projects
$products = $productService->getProducts();

var_dump($products);
```

####List Single Product by SKU

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

###Transactions

###Shipments



