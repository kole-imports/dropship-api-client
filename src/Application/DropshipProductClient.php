<?php
namespace Application;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Http\Message\Response;

class DropshipProductClient extends Client
{
	public static function factory($config = array())
	{
		$default = array(
		'base_url' => 'https://api.koleimports.com/'
	);

	$required = array('base_url',
		array('curl.options' 					=> array(
		CURLOPT_HTTPAUTH   				=> 'CURLAUTH_BASIC',
		CURLOPT_USERPWD    				=> 'X01003:ae25bfd04c13438a17914ce258ff1b1c25ee9e12',
		CURLOPT_RETURNTRANSFER   		=> 'true'
		)
	));

	$config = Collection::fromConfig($config, $default, $required);
	$client = new self($config->get('base_url'), $config);

	// Attach a service description to the client
	$client->setDescription(ServiceDescription::factory(dirname(dirname(__FILE__)).'/Services/dropship_products.json'));
	return $client;
	}

	public function getProductList()
	{
		/**Create GetProducts command
		$command = $client->getCommand('GetProducts');
		//Execute the command to retrieve the product model object
		$result = $command->execute();
		return $result;**/
		echo 'Time to pack it in!';
	}
}

