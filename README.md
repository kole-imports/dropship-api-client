=============================
Dropship API Client - README (Beta)
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


Setup -
------------------------

###Install Composer

####Download and install Composer

```teminal
curl -s "http://getcomposer.org/installer" | php
```

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
            "KoleImports\\DropshipApi\\Tests": "tests/"
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

Set your Account Id and API Key for client configuration.

If you don't have an API key please login to your account and create one.

```php
use KoleImports\DropshipApi\Service\ServiceBuilder;

//Configure the Service Builder with Credentials
$serviceBuilder = new ServiceBuilder('YOUR ACCOUNT ID', 'YOUR API KEY');
```

Commands -
------------------------

###Products

####List Products:

```php
$productService = $serviceBuilder->getProductService();

$response = $productService->getProducts();
```

####List Single Product by SKU:

```php
$productService = $serviceBuilder->getProductService();

$response = $productService->getProduct('Product SKU');
```

###Orders

####List Orders:

```php
$orderService = $serviceBuilder->getOrderService();

$response = $orderService->getOrders('Order ID');
```

####List Single Order by Order Id:

```php
$orderService = $serviceBuilder->getOrderService();

$response = $orderService->getOrder('Order ID');
```

####Create Order(s):

```php
$orderService = $serviceBuilder->getOrderService();

$orderBuilder = $orderService->getOrderBuilder();

//Example Order
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

$response = $orderService->post($order);
```

###Transactions

####List Transactions:

```php
$transactionService = $serviceBuilder->getTransactionService();

$response = $transactionService->getTransactions();
```

####List Single Transaction by Order Id:

```php
$transactionService = $serviceBuilder->getTransactionService();

$response = $transactionService->getTransaction('Order ID');
```

###Shipments

####List Shipments:

```php
$orderService = $serviceBuilder->getShipmentService();

$response = $orderService->getShipments();
```

####List Single Shipment by Order Id:

```php
$orderService = $serviceBuilder->getShipmentService();

$response = $orderService->getShipment('Order ID');
```



