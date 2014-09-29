<?php
/**
 * Network Requests Handler
 *
 * @package Genesis
 * @subpackage Network
 */

namespace Genesis\Network;

use \Genesis\Exceptions as Exceptions;
use \Genesis\Configuration as Configuration;

class Request
{
    /**
     * Store instance of the API Request
     *
     * @var \Genesis\API\Request
     */
    private $apiContext;

    /**
     * Instance of the selected network wrapper
     * @var object
     */
    private $context;

    public function __construct($apiContext)
    {
        $this->apiContext = $apiContext;

        $interface = Configuration::getInterfaceConfiguration('network');

        switch ($interface) {
            default:
            case 'curl':
                $this->context = new Wrapper\cURL();
                break;
            case 'stream';
                $this->context = new Wrapper\StreamContext();
                break;
        }
    }

    /**
     * Get Genesis Response to a previously sent request
     *
     * @return mixed
     */
    public function getGenesisResponse()
    {
        return $this->context->getResponse();
    }

    /**
     * Get the Body of the response
     *
     * @return mixed
     */
    public function getResponseBody()
    {
        return $this->context->getResponseBody();
    }

    /**
     * Get the Headers of the response
     *
     * @return mixed
     */
    public function getResponseHeaders()
    {
        return $this->context->getResponseHeaders();
    }

    /**
     * Set Header/Body of the HTTP request
     */
    public function setRequestData()
    {
        $requestData = array(
            'body'          => $this->apiContext->getDocument(),
            'url'           => $this->apiContext->getApiConfig('url'),
            'type'          => $this->apiContext->getApiConfig('type'),
            'port'          => $this->apiContext->getApiConfig('port'),
            'protocol'      => $this->apiContext->getApiConfig('protocol'),
            'timeout'       => 60,
            'debug'         => Configuration::getDebug(),
            'cert_ca'       => Configuration::getCertificateAuthority(),
            'user_agent'    => sprintf('Genesis PHP Client v%s', Configuration::getVersion()),
            'user_login'    => sprintf('%s:%s', Configuration::getUsername(), Configuration::getPassword()),
        );

        $this->context->prepareRequestBody($requestData);
    }

    /**
     * Submit the prepared request to Genesis
     */
    public function sendRequest()
    {
        $this->context->execute();
    }
}