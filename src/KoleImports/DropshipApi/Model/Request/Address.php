<?php

namespace KoleImports\DropshipApi\Model\Request;

use Doctrine\Common\Annotations;
use JMS\Serializer\Annotation\SerializedName;

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
     * @SerializedName("address_1")
     */
    private $address1;

    /**
     * Address 2
     * @var string
     * @SerializedName("address_2")
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

    public function getaddress1()
    {
        return $this->address_1;
    }

    public function setaddress1($address1)
    {
        $this->address1 = (string) $address1;

        return $this;
    }

    public function getaddress2()
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
        return $this->zipcode;
    }

    public function setZipCode($zipcode)
    {
        $this->zipcode = (string) $zipcode;

        return $this;
    }

    public function getExtZipCode()
    {
        return $this->extZipCode;
    }

    public function setExtZipCode($extZipcode)
    {
        $this->extZipcode = (string) $extZipcode;

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
