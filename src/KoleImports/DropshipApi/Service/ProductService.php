<?php
namespace KoleImports\DropshipApi\Service;

use KoleImports\DropshipApi\Model\Request\Item;

class ProductService
{
    /**
    *@var client Object
    */
    private $client;


    public function __construct($client)
    {
        $this->client = $client;
    }

    public function getProduct($sku)
    {
        $item = new Item;
        $item->setSku($sku);

        return $this->client->GetProduct(array('sku' => $item->getSku()));
    }

    public function getProducts()
    {
        $response = $this->client->GetProducts();

        return $response;
    }
}
