<?php

use API\Abstraction\AbstractAPI;
use Factory\Handler\API as APIHandlerFactory;

/**
 * Class eFrontProSDK
 *
 * @package     SDK
 * @author      EPIGNOSIS
 * @version     1.2.0
 * @release     2015-02-20
 *
 */
class eFrontProSDK
{
  /**
   * The API factory.
   *
   * @var   APIHandlerFactory
   *
   */
  private $_apiFactory = null;

  /**
   * The API key.
   *
   * @var   string
   *
   */
  private $_apiKey = null;

  /**
   * The API location.
   *
   * @var   string
   *
   */
  private $_apiLocation = null;

  /**
   * The API version.
   *
   * @var   string
   *
   */
  private $_apiVersion = null;

  /**
   * The SDK version.
   *
   * @var   string
   *
   */
  private static $_sdkVersion = '1.2.0';


  /**
   * Constructs the SDK.
   *
   * @param   APIHandlerFactory $apiFactory
   *
   */
  public function __construct(APIHandlerFactory $apiFactory)
  {
    $this->_apiFactory = $apiFactory;

    $this->_apiFactory->Init(self::$_sdkVersion);
  }

  /**
   * Configure the API.
   *
   * @param   string $apiVersion  (Required) | The API version to be
   *                                           used.
   * @param   string $apiLocation (Required) | The API location.
   * @param   string $apiKey      (Required) | The API key to be used.
   *
   * @return  $this
   *
   */
  public function Config($apiVersion, $apiLocation, $apiKey)
  {
    $this->_apiKey      = trim($apiKey);
    $this->_apiLocation = rtrim(trim($apiLocation), '/');
    $this->_apiVersion  = rtrim(trim($apiVersion), '/');

    return $this;
  }

  /**
   * Returns the requested entity of the API.
   *
   * @param   string $apiType (Required) | The entity type of the API.
   *
   * @return  AbstractAPI
   *
   */
  public function GetAPI($apiType)
  {
    return
      $this->_apiFactory->Get($apiType)->Config (
        $this->_apiVersion, $this->_apiLocation, $this->_apiKey
      );
  }

  /**
   * Returns the API key.
   *
   * @return  string
   *
   */
  public function GetAPIKey()
  {
    return $this->_apiKey;
  }

  /**
   * Returns the API location, for example "my-domain.com/API".
   *
   * @return  string
   *
   */
  public function GetAPILocation()
  {
    return $this->_apiLocation;
  }

  /**
   * Returns the API version.
   *
   * @return  string
   *
   */
  public function GetAPIVersion()
  {
    return $this->_apiVersion;
  }

  /**
   * Returns the current SDK version.
   *
   * @return  string
   *
   */
  public function GetSDKVersion()
  {
    return self::$_sdkVersion;
  }
}
