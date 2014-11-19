<?php

use Factory\Handler\API as APIHandlerFactory;


class eFrontProSDK
{
  private static $_sdkVersion = '0.9-dev';

  private $_apiFactory = null;
  private $_apiKey = null;
  private $_apiLocation = null;
  private $_apiVersion = null;


  public function __construct(APIHandlerFactory $apiFactory)
  {
    $this->_apiFactory = $apiFactory;

    $this->_apiFactory->Init(self::$_sdkVersion);
  }

  public function Config (
    $apiVersion = null, $apiLocation = null, $apiKey = null
  )
  {
    $this->_apiKey = trim($apiKey);
    $this->_apiLocation = rtrim(trim($apiLocation), '/');
    $this->_apiVersion = rtrim(trim($apiVersion), '/');

    return $this;
  }

  public function GetAPI($apiType = null)
  {
    return
      $this->_apiFactory->Get($apiType)->Config (
        $this->_apiVersion, $this->_apiLocation, $this->_apiKey
      );
  }

  public function GetAPIKey()
  {
    return $this->_apiKey;
  }

  public function GetAPILocation()
  {
    return $this->_apiLocation;
  }

  public function GetAPIVersion()
  {
    return $this->_apiVersion;
  }

  public function GetSDKVersion()
  {
    return self::$_sdkVersion;
  }
}
