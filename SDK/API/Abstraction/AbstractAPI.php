<?php

namespace API\Abstraction;

use Request\Abstraction\RequestHandlerInterface;

/**
 * Class AbstractAPI
 *
 * @package   API\Abstraction
 * @author    EPIGNOSIS
 *
 */
abstract class AbstractAPI
{
  /**
   * The API location.
   *
   * @var       string
   * @default   null
   *
   */
  private $_apiLocation = null;

  /**
   * The API version.
   *
   * @var       string
   * @default   null
   *
   */
  private $_apiVersion = null;

  /**
   * The API key.
   *
   * @var       string
   * @default   null
   *
   */
  protected $_apiKey = null;

  /**
   * The request handler.
   *
   * @var       RequestHandlerInterface
   * @default   null
   *
   */
  protected $_requestHandler = null;


  /**
   * Validates the requested Id.
   *
   * @param   mixed $id (Required) | The Id to be validated.
   *
   * @throws  \Exception
   *
   * @return  $this
   *
   */
  protected function _CheckId($id)
  {
    if (!filter_var($id, FILTER_VALIDATE_INT)) {
      throw new \Exception('InvalidId');
    }

    return $this;
  }

  /**
   * Returns the full API call location.
   *
   * @param   string $suffix (Optional, null)
   *
   * @return  string
   *
   */
  protected function _GetAPICallURL($suffix = null)
  {
    return
        $this->_apiLocation . '/v' .
        (string) $this->_apiVersion . $suffix;
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
   * Configure the API factory.
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
    $this->_apiKey      = $apiKey;
    $this->_apiLocation = $apiLocation;
    $this->_apiVersion  = $apiVersion;

    return $this;
  }
}
