<?php

namespace KoleImports\DropshipApi\Model\Request;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 */
class Address 
{
    /**
     * First Name
     * @var string
     */
    private $firstName;

    /**
     * Last Name
     * @var string
     */
    private $lastName;

    /**
     * Company
     * @var company
     */
    private $company;

    /**
     * Address 1
     * @var string
     */
    private $address1;

    /**
     * Address 2
     * @var string
     */
    private $address2;

    /**
     * City
     * @var string
     */
    private $city;

    /**
     * State
     * @var string
     */
    private $state;

    /**
     * Zipcode
     * @var string
     */
    private $zipcode;

    /**
     * Extended Zipcode
     * @var string
     */
    private $extZipcode;

    /**
     * Country
     * @var string
     */
    private $country = 'US';

    /**
     * Phone Number (digits only)
     * @var string
     */
    private $phone;

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = (string) $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = (string) $lastName;

        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = (string) $company;

        return $this;
    }

    public function getAddress1()
    {
        return $this->address1;
    }

    public function setAddress1($address1)
    {
        $this->address1 = (string) $address1;

        return $this;
    }

    public function getAddress2()
    {
        return $this->address2;
    }

    public function setAddress2($address2)
    {
        $this->address2 = (string) $address2;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = (string) $city;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = (string) $state;

        return $this;
    }

    public function getZipcode()
    {
        return $this->zipCode;
    }

    public function setZipcode($zipCode)
    {
        $this->zipCode = (string) $zipCode;

        return $this;
    }

    public function getExtZipcode()
    {
        return $this->extZipCode;
    }

    public function setExtZipcode($extZipCode)
    {
        $this->extZipCode = (string) $extZipCode;

        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country)
    {
        $this->country = (string) $country;

        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = (string) $phone;

        return $this;
    }
}