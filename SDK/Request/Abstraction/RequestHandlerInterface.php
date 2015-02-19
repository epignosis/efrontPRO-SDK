<?php

namespace Request\Abstraction;

/**
 * Interface RequestHandlerInterface
 *
 * @package   Request\Abstraction
 * @author    EPIGNOSIS
 *
 */
interface RequestHandlerInterface
{
  /**
   * Closes the request handler.
   *
   * @return   $this
   *
   */
  public function Close();

  /**
   * Executes an HTTP/GET request and returns its response.
   *
   * @param    string $url    (Required) | The HTTP/GET URL.
   * @param    string $apiKey (Required) | The API key.
   *
   * @return   string
   *
   */
  public function Get($url, $apiKey);

  /**
   * Initializes the request handler.
   *
   * @param   string $sdkVersion (Required) | The SDK version to be
   *                                          used.
   *
   * @return  $this
   *
   */
  public function Init($sdkVersion);

  /**
   * Executes an HTTP/POST request and returns its response.
   *
   * @param    string $url               (Required)     | The
   *                                                      HTTP/POST
   *                                                      URL.
   * @param    string $apiKey            (Required)     | The API key.
   * @param    array  $postParameterList (Optional, []) | The POST
   *                                                      parameter
   *                                                      list.
   *
   * @return   string
   *
   */
  public function Post($url, $apiKey, array $postParameterList = []);

  /**
   * Executes an HTTP/POST request and returns its response.
   *
   * @param    string $url              (Required)     | The HTTP/PUT
   *                                                     URL.
   * @param    string $apiKey           (Required)     | The API key.
   * @param    array  $putParameterList (Optional, []) | The PUT
   *                                                     parameter
   *                                                     list.
   *
   * @return   string
   *
   */
  public function Put($url, $apiKey, array $putParameterList = []);

  /**
   * Resets the request handler.
   *
   * @return   $this
   *
   */
  public function Reset();

  /**
   * Set the options for the referenced request handler.
   *
   * @param   array $optionList (Required) | The option list.
   *
   * @return  $this
   *
   */
  public function SetOptionList(array $optionList);
}
