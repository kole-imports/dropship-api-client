<?php

namespace KoleImports\DropshipApi\Config;

/**
 * @author Jesse Reese <jesse.c.reese@gmail.com>
 */
class Config
{
    /**
     * Account ID
     * @var string
     */
    protected $accountId;
    
    /**
     * API Key
     * @var string
     */
    protected $apiKey;

    /**
     * @param string $accountId Account ID
     * @param string $apiKey    API Key
     */
    public function __construct($accountId = null, $apiKey = null)
    {
        if (isset($accountId)) {
            $this->setAccountId($accountId);
        }

        if (isset($apiKey)) {
            $this->setApiKey($apiKey);
        }
    }

    /**
     * Set Account ID
     * 
     * @param string $accountId Account ID
     * @return Config
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;

        return $this;
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
     * Set API Key
     * 
     * @param string $apiKey API Key
     * @return Config
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Get API Key
     * @return string API Key
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }
}
