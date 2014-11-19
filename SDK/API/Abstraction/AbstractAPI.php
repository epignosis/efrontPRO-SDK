<?php

namespace API\Abstraction;

use Request\Abstraction\RequestHandlerInterface;


abstract class AbstractAPI
{
  private $_apiLocation = null;
  private $_apiVersion = null;

  protected $_apiKey = null;
  protected $_requestHandler = null;


  protected function _CheckId($id)
  {
    if (!filter_var($id, FILTER_VALIDATE_INT))
    {
      throw new \Exception (
        'Invalid Id. Id MUST be a positive integer.'
      );
    }

    return $this;
  }

  protected function _GetAPICallURL($suffix)
  {
    return $this->_apiLocation . '/v' . $this->_apiVersion . $suffix;
  }

  public function __construct(RequestHandlerInterface $requestHandler)
  {
    $this->_requestHandler = $requestHandler;
  }

  public function Config (
    $apiVersion = null, $apiLocation = null, $apiKey = null
  )
  {
    $this->_apiKey = $apiKey;
    $this->_apiLocation = $apiLocation;
    $this->_apiVersion = $apiVersion;

    return $this;
  }
}
