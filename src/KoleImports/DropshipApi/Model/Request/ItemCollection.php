<?php

namespace KoleImports\DropshipApi\Model\Request;

use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlMap;
use JMS\Serializer\Annotation\XmlList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 * @author Bill Hance <bill.hance@gmail.com>
 */
class ItemCollection
{
    /**
     * Items
     * @var array<Items>
     * @Type("array<string>")
     */
    private $items = array();

    /**
     * Item
     * @var array<Item>
     * @Type("array<string>")
     * @XmlList(inline = true, entry = "item")
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
    /**
    * @var item Item Object
    */
    public function addItem(Item $item)
    {
        $this->item[] = $item;
    }
}
