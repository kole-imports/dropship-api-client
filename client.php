<?php
require_once 'vendor/autoload.php';

use Application\DropshipProductClient;

$dropshipClient = new DropshipProductClient();
//Get all products
$productList = $dropshipClient->getProductList();
