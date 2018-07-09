<?php

namespace Epignosis\eFrontPro\Sdk\API\Abstraction;

use Epignosis\eFrontPro\Sdk\Request\Abstraction\RequestHandlerInterface;

/**
 * Class AbstractAPI
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 */
abstract class AbstractAPI
{
  /**
   * The API location.
   *
   * @since 1.0.0
   *
   * @var string
   *
   */
  private $_apiLocation = null;

  /**
   * The API version.
   *
   * @since 1.0.0
   *
   * @var string
   *
   */
  private $_apiVersion = null;

  /**
   * The API key.
   *
   * @since 1.0.0
   *
   * @var string
   */
  protected $_apiKey = null;

  /**
   * The request handler.
   *
   * @since 1.0.0
   *
   * @var RequestHandlerInterface
   */
  protected $_requestHandler = null;


  /**
   * Validates the requested Id.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The Id to be validated.
   *
   * @throws \Exception
   *
   * @return $this
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
   * @since 1.0.0
   *
   * @param string $suffix (Optional, null)
   *
   * @return string
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
   * @since 1.0.0
   *
   * @param RequestHandlerInterface $requestHandler
   */
  public function __construct(RequestHandlerInterface $requestHandler)
  {
    $this->_requestHandler = $requestHandler;
  }

  /**
   * Configure the API factory.
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
    $this->_apiKey      = $apiKey;
    $this->_apiLocation = $apiLocation;
    $this->_apiVersion  = $apiVersion;

    return $this;
  }
}
