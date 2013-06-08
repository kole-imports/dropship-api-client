<?php

namespace KoleImports\DropshipApi\Factory;

use KoleImports\DropshipApi\Model\Request\Item;
use KoleImports\DropshipApi\Model\Request\ItemCollection;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class ItemFactory
{
    public function getItem()
    {
        return new Item();
    }

    public function getItemCollection()
    {
        return new ItemCollection();
    }

    public function createItem($sku, $quantity)
    {
        $item = $this->getItem();

        return $item->setSku($sku)->setQuantity($quantity);
    }
}
