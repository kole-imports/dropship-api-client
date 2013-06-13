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

class ShipOptions
{
    const CARRIER_FEDEX = 'FEDEX';
    const CARRIER_UPS = 'UPS';

    const SERVICE_GROUND = 'GROUND';
    const SERVICE_PRIORITY = 'PRIORITY';
    const SERVICE_OVERNIGHT = 'OVERNIGHT';

    /**
     * Carrier
     * @var string
     */
    private $carrier;

    /**
     * Service
     * @var string
     */
    private $service;

    /**
     * Signature
     * @var boolean
     */
    private $signature = false;

    /**
     * Instructions
     * @var string
     */
    private $instructions;

    public function getCarrier()
    {
        return $this->carrier;
    }

    public function setCarrier($carrier)
    {
        $this->carrier = (string) $carrier;

        return $this;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService($service)
    {
        $this->service = (string) $service;

        return $this;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function setSignature($signature)
    {
        $this->signature = (bool) $signature;

        return $this;
    }

    public function getInstructions()
    {
        return $this->instructions;
    }

    public function setInstructions($instructions)
    {
        $this->instructions = (string) $instructions;

        return $this;
    }
}
