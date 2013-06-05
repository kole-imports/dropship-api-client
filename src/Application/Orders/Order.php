<?php

namespace Application\Orders;

class Order
{
	protected $orderId;
	protected $poNumber;
	protected $notes;
	protected $carrier;
	protected $service;
	protected $signature;
	protected $instructions;
	protected $firstName;
	protected $lastName;
	protected $company;
	protected $addressOne;
	protected $addressTwo;
	protected $city;
	protected $state;
	protected $zipcode;
	protected $extZipcode;
	protected $country;
	protected $phone;
	protected $sku;
	protected $quantity;

	public function setOrderId($orderId)
	{
		$this->orderId = $orderId;
	}

	public function getOrderId()
	{
		return $this->orderId;
	}

	public function setPoNumber($poNumber)
	{
		$this->poNumber = $poNumber;
	}

	public function getPoNumber()
	{
		return $this->poNumber;
	}

	public function setNotes($notes)
	{
		$this->notes = $notes;
	}

	public function getNotes()
	{
		return $this->notes;
	}

	public function setCarrier($carrier)
	{
		$this->carrier = $carrier;
	}

	public function getCarrier()
	{
		return $this->carrier;
	}

	public function setService($service)
	{
		$this->service = $service;
	}

	public function getService()
	{
		return $this->service;
	}

	public function setSignature($signature)
	{
		$this->signature = $signature;
	}

	public function getSignature()
	{
		return $this->signature;
	}

	public function setInstructions($instructions)
	{
		$this->instructions = $instructions;
	}

	public function getInstructions()
	{
		return $this->instructions;
	}

	public function setFirstName($firstName)
	{
		$this->firstName = $firstName;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function setLastName($lastName)
	{
		$this->lastName = $lastName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setCompany($company)
	{
		$this->company = $company;
	}

	public function getCompany()
	{
		return $this->company;
	}

	public function setAddressOne($addressOne)
	{
		$this->addressOne = $addressOne;
	}

	public function getAddressOne()
	{
		return $this->addressOne;
	}

	public function setAddressTwo($addressTwo)
	{
		$this->addressTwo = $addressTwo;
	}

	public function getAddressTwo()
	{
		return $this->addressTwo;
	}

	public function setCity($city)
	{
		$this->city = $city;
	}

	public function getCity()
	{
		return $this->city;
	}

	public function setState($state)
	{
		$this->state = $state;
	}

	public function getState()
	{
		return $this->state;
	}

	public function setZipcode($zipcode)
	{
		$this->zipcode = $zipcode;
	}

	public function getZipcode()
	{
		return $this->zipcode;
	}

	public function setExtZipcode($extZipcode)
	{
		$this->extZipcode = $extZipcode;
	}

	public function getExtZipcode()
	{
		return $this->extZipcode;
	}

	public function setCountry($country)
	{
		$this->country = $country;
	}

	public function getCountry()
	{
		return $this->country;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setSku($sku)
	{
		$this->sku = $sku;
	}

	public function getSku()
	{
		return $this->sku;
	}

	public function setQuantity($quantity)
	{
		$this->quantity = $quantity;
	}

	public function getQuantity()
	{
		return $this->quantity;
	}
}
