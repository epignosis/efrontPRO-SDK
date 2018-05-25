<?php

namespace Epignosis\eFrontPro\Sdk;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;
use Epignosis\eFrontPro\Sdk\Factory\Handler\API as APIHandlerFactory;

/**
 * Class eFrontProSDK
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class eFrontProSDK
{
  /**
   * The API factory.
   *
   * @since 1.0.0
   *
   * @var APIHandlerFactory
   */
  private $_apiFactory = null;

  /**
   * The API key.
   *
   * @since 1.0.0
   *
   * @var string
   */
  private $_apiKey = null;

  /**
   * The API location.
   *
   * @since 1.0.0
   *
   * @var string
   */
  private $_apiLocation = null;

  /**
   * The API version.
   *
   * @since 1.0.0
   *
   * @var string
   */
  private $_apiVersion = '1.0';

  /**
   * The SDK version.
   *
   * @since 1.0.0
   *
   * @var string
   */
  private static $_sdkVersion = '3.1.0';


  /**
   * Constructs the SDK.
   *
   * @since 1.0.0
   *
   * @param APIHandlerFactory $apiFactory
   */
  public function __construct(APIHandlerFactory $apiFactory)
  {
    $this->_apiFactory = $apiFactory;

    $this->_apiFactory->Init(self::$_sdkVersion);
  }

  /**
   * Configure the API.
   *
   * @since 1.0.0
   *
   * @param string $apiVersion  (Required) | The API version to be used.
   * @param string $apiLocation (Required) | The API location.
   * @param string $apiKey      (Required) | The API key to be used.
   *
   * @return $this
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
   * @since 1.0.0
   *
   * @param string $apiType (Required) | The entity type of the API.
   *
   * @return AbstractAPI
   */
  public function GetAPI($apiType)
  {
    return $this->_apiFactory->Get($apiType)->Config (
      $this->_apiVersion, $this->_apiLocation, $this->_apiKey
    );
  }

  /**
   * Returns the API key.
   *
   * @since 1.0.0
   *
   * @return string
   */
  public function GetAPIKey()
  {
    return $this->_apiKey;
  }

  /**
   * Returns the API location, for example "my-domain.com/API".
   *
   * @since 1.0.0
   *
   * @return  string
   */
  public function GetAPILocation()
  {
    return $this->_apiLocation;
  }

  /**
   * Returns the API version.
   *
   * @since 1.0.0
   *
   * @return  string
   */
  public function GetAPIVersion()
  {
    return $this->_apiVersion;
  }

  /**
   * Returns the current SDK version.
   *
   * @since 1.0.0
   *
   * @return  string
   */
  public function GetSDKVersion()
  {
    return self::$_sdkVersion;
  }
}
