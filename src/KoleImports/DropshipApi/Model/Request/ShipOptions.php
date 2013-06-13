<?php

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
