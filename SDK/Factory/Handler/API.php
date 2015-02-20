<?php

namespace Factory\Handler;

use API\Abstraction\AbstractAPI;
use Factory\Exception\API as FactoryAPIException;
use Request\Abstraction\RequestHandlerInterface;

/**
 * Class API
 *
 * @package   Factory\Handler
 * @author    EPIGNOSIS
 *
 */
class API
{
  /**
   * The API list which contains the registered entities.
   *
   * @var   array (Associative)
   *
   */
  private $_apiList = [];

  /**
   * The request handler.
   *
   * @var   RequestHandlerInterface
   *
   */
  private $_requestHandler = null;


  /**
   * @param $instance
   *
   * @throws FactoryAPIException
   */
  private function _Register($instance)
  {
    $api = 'API\Handler\\'. $instance;
      
    try {
      $this->_apiList[$instance] = new $api($this->_requestHandler);
    }
    catch (\Exception $e) {
      throw new FactoryAPIException (
        'Not possible to register ' . $instance . ' API'
      );
    }
  }

  /**
   * Constructs the API factory.
   *
   * @param   RequestHandlerInterface $requestHandler
   *
   */
  public function __construct(RequestHandlerInterface $requestHandler)
  {
    $this->_requestHandler = $requestHandler;
  }

  /**
   * Destructs the factory with safety.
   *
   */
  public function __destruct()
  {
    $this->_requestHandler->Close();
  }

  /**
   * Initializes the API factory.
   *
   * @param   string $sdkVersion (Required) | The SDK version to be
   *                                          used.
   *
   * @return  $this
   *
   */
  public function Init($sdkVersion)
  {
    $this->_requestHandler->Init($sdkVersion);

    return $this;
  }

  /**
   * Returns the requested instance.
   *
   * @param   string $instance (Required) | The instance to be
   *                                        fetched.
   *
   * @throws  FactoryAPIException
   *
   * @return  AbstractAPI
   *
   */
  public function Get($instance)
  {
    if (!isset($this->_apiList[$instance])) {
      $this->_Register($instance);
    }

    return $this->_apiList[$instance];
  }
}
