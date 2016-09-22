<?php

namespace Epignosis\eFrontPro\Sdk\Factory\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;
use Epignosis\eFrontPro\Sdk\Factory\Exception\API as FactoryAPIException;
use Epignosis\eFrontPro\Sdk\Request\Abstraction\RequestHandlerInterface;

/**
 * Class API
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class API
{
  /**
   * The API list which contains the registered entities.
   *
   * @since 1.0.0
   *
   * @var array (Associative)
   */
  private $_apiList = [];

  /**
   * The request handler.
   *
   * @since 1.0.0
   *
   * @var RequestHandlerInterface
   */
  private $_requestHandler = null;


  /**
   * Registers the callable.
   *
   * @since 1.0.0
   *
   * @param $instance
   *
   * @throws FactoryAPIException
   */
  private function _Register($instance)
  {
    $api = 'Epignosis\eFrontPro\Sdk\API\Handler\\'. $instance;
      
    try {
      $this->_apiList[$instance] = new $api($this->_requestHandler);
    } catch (\Exception $e) {
      throw new FactoryAPIException('Not possible to register ' . $instance . ' API');
    }
  }

  /**
   * Constructs the API factory.
   *
   * @since 1.0.0
   *
   * @param RequestHandlerInterface $requestHandler
   */
  public function __construct(RequestHandlerInterface $requestHandler)
  {
    $this->_requestHandler = $requestHandler;
  }

  /**
   * Destructs the factory with safety.
   *
   * @since 1.0.0
   */
  public function __destruct()
  {
    $this->_requestHandler->Close();
  }

  /**
   * Initializes the API factory.
   *
   * @since 1.0.0
   *
   * @param string $sdkVersion (Required) | The SDK version to be used.
   *
   * @return $this
   */
  public function Init($sdkVersion)
  {
    $this->_requestHandler->Init($sdkVersion);

    return $this;
  }

  /**
   * Returns the requested instance.
   *
   * @since 1.0.0
   *
   * @param string $instance (Required) | The instance to be fetched.
   *
   * @throws FactoryAPIException
   *
   * @return AbstractAPI
   */
  public function Get($instance)
  {
    if (!isset($this->_apiList[$instance])) {
      $this->_Register($instance);
    }

    return $this->_apiList[$instance];
  }
}
