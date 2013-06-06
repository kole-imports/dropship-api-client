<?php
namespace Application;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Application\Configuration\Config;

class KoleImportsFactory extends Client
{
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	public function clientConfig()
	{
		//API Auth
		$username = $this->config->getAccountId();
		$password = $this->config->getApiKey();

		//Create Client Object
		$koleImports 	= new Client('https://api.koleimports.com', array(
				'curl.options'			=> array(
				CURLOPT_HTTPAUTH 		=> 'CURLAUTH_BASIC',
			        	CURLOPT_USERPWD		=> $username.':'.$password,
			        	CURLOPT_RETURNTRANSFER	=> 'true'
			)
		));

	//Add service description to client object
	$koleImports->setDescription(ServiceDescription::factory(__DIR__ .'/Services/services.json'));

	return $koleImports;
	}
}

