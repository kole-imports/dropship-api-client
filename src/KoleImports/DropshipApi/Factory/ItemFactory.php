<?php

namespace KoleImports\DropshipApi\Factory;

use KoleImports\DropshipApi\Model\Request\Item;
use KoleImports\DropshipApi\Model\Request\ItemCollection;

class ItemFactory
{
    private $item;

    private $items;

    public function getItem()
    {
        return new Item;
    }

    public function getItemCollection()
    {
        return new ItemCollection;
    }

    public function createItem($sku, $quantity)
    {
        $item = $this->getItem();

        return $item->setSku($sku)
                          ->setQuantity($quantity);
    }
}
