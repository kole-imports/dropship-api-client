<?php
/*
Kole Imports Dropship API Client
Copyright (C) <2013>  <Jesse Reese>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

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
