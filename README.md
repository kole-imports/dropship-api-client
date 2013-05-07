=============================
Dropship API Client - README
=============================

This client will help customers get off the ground faster with a PHP client solution for the Kole Imports Dropship API

###Complete Kole Imports Dropship API Documentation:

	[http://support.koleimports.com/kb/api-documentation]

==============================
API Requirements
==============================

###Create Account:

	[https://dropship.koleimports.com/]

*Account ID: ex. X12345
*API KEY: ex. a0f0e69913896e20bdb07a9c31d9d7f1d31e3acd
*Shipping Method: FedEx or USPS
*Payment Method: Credit Card

###Guzzle Client Framework Setup:

	[http://guzzlephp.org/getting-started/installation.html]

####1. Add "guzzle/guzzle" as a dependency in your project's composer.json file

	{
		"require": {
			"guzzle/guzzle": "3.3.*"
		}
	}

####2. Download and install Composer

	curl -s "http://getcomposer.org/installer" | php

####3. Install your dependencies

	php composer.phar install

####4. Require Composer's autoloader

Composer also prepares an autoload file that's capable of autoloading all of the classes in any of the libraries that it downloads. To use it, just add the following line to your code's bootstrap process.

	require __DIR__ . '/vendor/autoload.php';

=========================
GET Requests
=========================

###Links: listLinks

	Header	- application/vnd.koleimports.ds.link+xml
	URL		- api.koleimports.com

###Accounts: listAccounts

	Header	- application/vnd.koleimports.ds.account+xml
	URL		- https://api.koleimports.com/accounts/1

###Orders: getOrder, listOrders, listPreviousOrders, listNextOrders


	Header	- application/vnd.koleimports.ds.order+xml
	URL		- https://api.koleimports.com/orders/

###Products: getProduct, listProducts, listPreviousProducts, listNextProducts


	Header	- application/vnd.koleimports.ds.product+xml
	URL		- https://api.koleimports.com/products/

###Shipments: getShipment, listShipments, listPreviousShipments, listNextShipments

	Header	- application/vnd.koleimports.ds.shipment+xml
	URL		- https://api.koleimports.com/shipments/

###Transactions: listTransactions

	Header	- application/vnd.koleimports.ds.transaction+xml
	URL		- https://api.koleimports.com/transactions/

=========================
POST Requests
=========================

###Orders: createOrder

	*Method: [POST]
	*Parameters: [None]
	*Request Headers: [Accept, Authorization, Content-Type, Host]
	*Response Headers: [Content-Length, Content-Type, Location]
	*Response Message Body: [Links to access the newly created resource]
	*Response Status: [201, 400, 401, 403, 500]

###Media Types:


	*[application/vnd.koleimports.ds.order+xml]
	*[application/vnd.koleimports.ds.order+json]

###Sample Body:

	<order>
		<po_number></po_number>
		<notes></notes>
		<ship_options>
			<carrier></carrier>
			<service></service>
			<signature></signature>
			<instructions></instructions>
		</ship_options>
		<ship_to_address>
			<first_name></first_name>
			<last_name></last_name>
			<company></company>
			<address_1></address_1>
			<address_2></address_2>
			<city></city>
			<state></state>
			<zipcode></zipcode>
			<ext_zipcode></ext_zipcode>
			<country></country>
			<phone></phone>
		</ship_to_address>
		<items>
			<item>
				<sku></sku>
				<quantity></quantity>
			</item>
		</items>
	</order>


