<?php

namespace KoleImports\DropshipApi\Model\Request;

class Item
{
    /**
     * SKU (2 uppercase letters followed by 3 digits)
     * @var string
     */
    private $sku;

    /**
     * Quantity
     * @var integer
     */
    private $quantity;

    public function getSku()
    {
        return $this->sku;
    }

    public function setSku($sku)
    {
        $this->sku = strtoupper((string) $sku);

        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = (int) $quantity;

        return $this;
    }
}
