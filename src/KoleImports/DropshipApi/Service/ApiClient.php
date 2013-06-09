<?php

namespace KoleImports\DropshipApi\Service;

use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use KoleImports\DropshipApi\Model\Request\Config;

/**
 * @author Bill Hance <bill.hance@gmail.com>
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class ApiClient extends Client
{
    /**
     * @param Config $config Config Object
     */
    public function __construct(Config $config)
    {
        $baseUrl = $config->getApiEndpoint();

        $options = array(CURLOPT_HTTPAUTH => 'CURLAUTH_BASIC',
            CURLOPT_USERPWD => $config->getAuthToken(),
            CURLOPT_RETURNTRANSFER  => 'true',
            );

        $client = new Client($baseUrl, array('curl.options' => $options));

        $client->setDescription(ServiceDescription::factory(__DIR__ . '/services.json'));

        return $client;
    }
}
