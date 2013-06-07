<?php

namespace KoleImports\DropshipApi\Model\Request;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 */
class ItemCollection 
{
    /**
     * Items
     * @var array<Item>
     */
    private $items = array();

    public function getItems()
    {
        return $this->items;
    }

    public function setItems(array $items)
    {
        foreach($items as $item) {
            $this->addItem($item);
        }

        return $this;
    }

    public function addItem(Item $item)
    {
        $this->$items[] = $item;
    }
}