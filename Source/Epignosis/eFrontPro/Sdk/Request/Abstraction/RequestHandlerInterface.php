<?php

namespace Epignosis\eFrontPro\Sdk\Request\Abstraction;

/**
 * Interface RequestHandlerInterface
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 */
interface RequestHandlerInterface
{
  /**
   * Closes the request handler.
   *
   * @since 1.0.0
   *
   * @return $this
   */
  public function Close();

  /**
   * Executes an HTTP/GET request and returns its response.
   *
   * @since 1.0.0
   *
   * @param string $url    (Required) | The HTTP/GET URL.
   * @param string $apiKey (Required) | The API key.
   *
   * @return mixed
   */
  public function Get($url, $apiKey);

  /**
   * Initializes the request handler.
   *
   * @since 1.0.0
   *
   * @param string $sdkVersion (Required) | The SDK version to be used.
   *
   * @return $this
   */
  public function Init($sdkVersion);

  /**
   * Executes an HTTP/POST request and returns its response.
   *
   * @since 1.0.0
   *
   * @param string $url               (Required)     | The HTTP/POST URL.
   * @param string $apiKey            (Required)     | The API key.
   * @param array  $postParameterList (Optional, []) | The POST parameter list.
   *
   * @return mixed
   */
  public function Post($url, $apiKey, array $postParameterList = []);

  /**
   * Executes an HTTP/PUT request and returns its response.
   *
   * @since 1.0.0
   *
   * @param string $url              (Required)     | The HTTP/PUT URL.
   * @param string $apiKey           (Required)     | The API key.
   * @param array  $putParameterList (Optional, []) | The PUT parameter list.
   *
   * @return mixed
   */
  public function Put($url, $apiKey, array $putParameterList = []);

  /**
   * Resets the request handler.
   *
   * @since 1.0.0
   *
   * @return $this
   */
  public function Reset();

  /**
   * Set the options for the referenced request handler.
   *
   * @since 1.0.0
   *
   * @param array $optionList (Required) | The option list.
   *
   * @return $this
   */
  public function SetOptionList(array $optionList);
}
