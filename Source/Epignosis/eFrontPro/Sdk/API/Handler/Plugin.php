<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Plugin
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class Plugin extends AbstractAPI
{
  /**
   * Validates the plugin name.
   *
   * @since 1.0.0
   *
   * @param string $pluginName (Required) | The plugin name to be checked.
   *
   * @throws \Exception
   *
   * @return $this
   */
  private function _CheckPluginName($pluginName)
  {
    if (empty($pluginName)) {
      throw new \Exception('Plugin.InvalidName');
    }

    return $this;
  }

  /**
   * Returns a list of the available plugins and their information.
   *
   * @since 1.0.0
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Plugins'), $this->_apiKey
    );
  }

  /**
   * Returns information about the requested plugin.
   *
   * @since 1.0.0
   *
   * @param string $pluginName (Required) | The plugin name to retrieve its info.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo($pluginName)
  {
    $this->_CheckPluginName($pluginName);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Plugin/' . $pluginName), $this->_apiKey
    );
  }

  /**
   * Posts the requested data to be used by the requested plugin.
   *
   * @since 1.0.0
   *
   * @param string $pluginName (Required) | The plugin name to retrieve its info.
   * @param array  $data       (Required) | The data to be send to the requested plugin.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function Notify($pluginName, array $data)
  {
    $this->_CheckPluginName($pluginName);

    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/Plugin/' . $pluginName),
      $this->_apiKey,
      $data
    );
  }
}
