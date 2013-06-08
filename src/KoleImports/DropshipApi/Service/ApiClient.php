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
     * @todo Clean up construction of API client
     */
    public function __construct(Config $config)
    {
        $options = array(CURLOPT_HTTPAUTH => 'CURLAUTH_BASIC',
            CURLOPT_USERPWD => $config->getAuthToken(),
            CURLOPT_RETURNTRANSFER  => 'true',
        );

        parent::construct($config->getApiEndpoint(), array('curl.options' => $options));

        $this->setDescription(ServiceDescription::factory(__DIR__ . '/Config/services.json'));
    }
}
