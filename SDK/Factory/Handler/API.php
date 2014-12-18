<?php

namespace Factory\Handler;

use Factory\Exception\API as FactoryAPIException;
use Request\Abstraction\RequestHandlerInterface;


class API
{
  private $_apiList = null;
  private $_requestHandler = null;


  private function _Register($instance)
  {
    $api = 'API\Handler\\'. $instance;
      
    try {
      $this->_apiList[$instance] = new $api($this->_requestHandler);
    }
    catch (\Exception $e) {
      throw new FactoryAPIException (
        $instance . ' API, couldn\'t be registered.'
      );
    }
  }

  public function __construct(RequestHandlerInterface $requestHandler)
  {
    $this->_requestHandler = $requestHandler;
  }

  public function __destruct()
  {
    $this->_requestHandler->Close();
  }

  public function Init($sdkVersion)
  {
    $this->_requestHandler->Init($sdkVersion);

    return $this;
  }

  public function Get($instance)
  {
    if (!isset($this->_apiList[$instance])) {
      $this->_Register($instance);
    }

    return $this->_apiList[$instance];
  }
}
