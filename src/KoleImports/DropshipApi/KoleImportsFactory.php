<?php

namespace KoleImports\DropshipApi;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use KoleImports\DropshipApi\Config\Config;

class KoleImportsFactory extends Client
{
	public function __construct(Config $config)
	{
		$this->config = $config;
	}

	public function clientConfig()
	{
		$accountId = $this->config->getAccountId();
		$apiKey = $this->config->getApiKey();

		$options = array(CURLOPT_HTTPAUTH => 'CURLAUTH_BASIC',
			CURLOPT_USERPWD => $accountId . ':' . $apiKey,
			CURLOPT_RETURNTRANSFER	=> 'true',
		);

		$client = new Client('https://api.koleimports.com',array('curl.options' => $options));

		$client->setDescription(ServiceDescription::factory(__DIR__ .'/Service/services.json'));

		return $client;
	}
}

