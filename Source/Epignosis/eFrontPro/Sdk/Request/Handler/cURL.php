<?php

namespace Epignosis\eFrontPro\Sdk\Request\Handler;

use Epignosis\eFrontPro\Sdk\Request\Abstraction\RequestHandlerInterface;
use Epignosis\eFrontPro\Sdk\Request\Exception\cURL as cURLException;

/**
 * Class cURL
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class cURL implements RequestHandlerInterface
{
  /**
   * The cURL handler.
   *
   * @since 1.0.0
   *
   * @var Resource
   */
  private $_curl = null;

  /**
   * The list of options.
   *
   * @since 1.0.0
   *
   * @var array (Associative)
   */
  private $_optionList = [];


  /**
   * Executes the given cURL session.
   *
   * @since 1.0.0
   *
   * @throws cURLException
   *
   * @return mixed
   */
  private function _Exec()
  {
    $response = curl_exec($this->_curl);

    if($response === false) {
      throw new cURLException(curl_error($this->_curl), curl_errno($this->_curl));
    }

    return $response;
  }

  /**
   * Returns the initial option list.
   *
   * @since 1.0.0
   *
   * @param string $sdkVersion (Required) | The SDK version.
   *
   * @return array
   */
  private function _GetInitialOptionList($sdkVersion)
  {
    return [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CONNECTTIMEOUT => 30,
      CURLOPT_TIMEOUT        => 60,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
      CURLOPT_HTTPHEADER     => ['eFrontPro-SDK-Version' => $sdkVersion]
    ];
  }

  /**
   * Set the options to the current cURL session.
   *
   * @since 1.0.0
   *
   * @throws cURLException
   *
   * @return $this
   */
  private function _SetOptionList()
  {
    if (!curl_setopt_array($this->_curl, $this->_optionList)) {
      throw new cURLException('Request.cURL.SetOptionsFailure');
    }

    return $this;
  }

  /**
   * Constructs the cURL request handler.
   *
   * @throws cURLException
   *
   * @since 1.0.0
   */
  public function __construct()
  {
    if (!extension_loaded('curl')) {
      throw new cURLException('Request.cURL.ExtensionNotLoaded');
    }
  }

  /**
   * Closes the request handler.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @return $this
   */
  public function Close()
  {
    if ($this->_curl !== null) {
      curl_close($this->_curl);

      $this->_curl = null;
    }

    return $this;
  }

  /**
   * Executes an HTTP/GET request and returns its response.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @param string $url    (Required) | The HTTP/GET URL.
   * @param string $apiKey (Required) | The API key.
   *
   * @return mixed
   */
  public function Get($url, $apiKey)
  {
    $this->_optionList[CURLOPT_URL]           = $url;
    $this->_optionList[CURLOPT_CUSTOMREQUEST] = 'GET';
    $this->_optionList[CURLOPT_USERPWD]       = $apiKey . ':';

    return $this->_SetOptionList()->_Exec();
  }

  /**
   * Initializes the request handler.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @param string $sdkVersion (Required) | The SDK version to be used.
   *
   * @throws cURLException
   *
   * @return mixed
   */
  public function Init($sdkVersion)
  {
    if ($this->_curl === null) {
      $this->_curl = curl_init();

      if ($this->_curl === false) {
        throw new cURLException('Request.cURL.InitializationFailure');
      }
    }

    $this->Reset()->SetOptionList($this->_GetInitialOptionList($sdkVersion));

    return $this;
  }

  /**
   * Executes an HTTP/POST request and returns its response.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @param string $url               (Required)     | The HTTP/POST URL.
   * @param string $apiKey            (Required)     | The API key.
   * @param array  $postParameterList (Optional, []) | The POST parameter list.
   *
   * @return mixed
   */
  public function Post($url, $apiKey, array $postParameterList = [])
  {
    $this->_optionList[CURLOPT_URL]           = $url;
    $this->_optionList[CURLOPT_USERPWD]       = $apiKey . ':';
    $this->_optionList[CURLOPT_CUSTOMREQUEST] = 'POST';
    $this->_optionList[CURLOPT_POSTFIELDS]    = http_build_query($postParameterList, '', '&');

    return $this->_SetOptionList()->_Exec();
  }

  /**
   * Executes an HTTP/PUT request and returns its response.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @param string $url              (Required)     | The HTTP/PUT URL.
   * @param string $apiKey           (Required)     | The API key.
   * @param array  $putParameterList (Optional, []) | The PUT parameter list.
   *
   * @return mixed
   */
  public function Put($url, $apiKey, array $putParameterList = [])
  {
    $this->_optionList[CURLOPT_URL]           = $url;
    $this->_optionList[CURLOPT_USERPWD]       = $apiKey . ':';
    $this->_optionList[CURLOPT_CUSTOMREQUEST] = 'PUT';
    $this->_optionList[CURLOPT_POSTFIELDS]    = http_build_query($putParameterList, '', '&');

    return $this->_SetOptionList()->_Exec();
  }

  /**
   * Resets the request handler.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @return $this
   */
  public function Reset()
  {
    if ($this->_curl !== null) {
      curl_reset($this->_curl);
    }

    return $this;
  }

  /**
   * Set the options for the referenced request handler.
   *
   * @since 1.0.0
   *
   * @implements RequestHandlerInterface
   *
   * @param array $optionList (Required) | The option list.
   *
   * @return $this
   */
  public function SetOptionList(array $optionList = [])
  {
    $this->_optionList = $optionList;

    return $this;
  }
}
