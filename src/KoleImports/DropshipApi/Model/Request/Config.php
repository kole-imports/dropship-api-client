<?php

namespace KoleImports\DropshipApi\Model\Request;

class Config
{
    const API_ENDPOINT = 'https://api.koleimports.com';

    /**
     * Account ID
     * @var string
     */
    private $accountId;

    /**
     * API Key
     * @var string
     */
    private $apiKey;

    /**
     * @param string $accountId Account ID
     * @param string $apiKey    API Key
     */
    public function __construct($accountId = null, $apiKey = null)
    {
        $this->accountId = (string) $accountId;
        $this->apiKey = (string) $apiKey;
    }

    /**
     * Get API Endpoint URL
     *
     * @return string The URL for the API Endpoint
     */
    public function getApiEndpoint()
    {
        return self::API_ENDPOINT;
    }

    /**
     * Get Account ID
     *
     * @return string Account ID
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Get API Key
     *
     * @return string API Key
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * Helper to return credentials for Basic Auth
     *
     * @return string Auth Credentials
     */
    public function getAuthToken()
    {
        return $this->accountId . ':' . $this->apiKey;
    }
}
