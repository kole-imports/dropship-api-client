=============================
Dropship API Client - README
=============================

This client will help customers get off the ground faster with a PHP client solution for the Kole Imports Dropship API

###Complete Kole Imports Dropship API Documentation:

[Dropship API DOCS] (http://support.koleimports.com/kb/api-documentation)

API Requirements -
-------------------------------------------------------------

###Create Account:

[Kole Imports Dropship] (https://dropship.koleimports.com/)

* Account ID: ex. X12345
* API KEY: ex. a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd
* Shipping Method: FedEx or USPS
* Payment Method: Credit Card

###Guzzle Client Framework Setup:

[Guzzlephp] (http://guzzlephp.org/getting-started/installation.html)

####1. Add "guzzle/guzzle" as a dependency in your project's composer.json file

	{
	    "require": {
	        "guzzle/guzzle": "3.0.*"
	    },
	    "autoload": {
			"psr-0": {
			"Application": "src/",
			"tests":"src/tests"
			}
		}
	}

####2. Download and install Composer

	curl -s "http://getcomposer.org/installer" | php

####3. Install your dependencies

	php composer.phar install

####4. Require Composer's autoloader

Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process.

	require __DIR__ . '/vendor/autoload.php';


Commands -
------------------------

###[ GET ]

####Links:

	//Get Commands

###[POST]

	//Post Commands


