<?php

namespace KoleImports\DropshipApi\Model\Request;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 */
class ItemCollection
{
    /**
     * Items
     * @var array<Items>
     */
    private $items = array();

    /**
     * Item
     * @var array<Item>
     */
    private $item = array();

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(array $items)
    {
        foreach($items as $item)
        {
            $this->addItem($item);
        }

        return $this;
    }

    public function addItem(Item $item)
    {
        $this->item[] = $item;
    }
}
