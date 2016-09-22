<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class System
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class System extends AbstractAPI
{
  /**
   * Returns the system information.
   *
   * @since 1.0.0
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/System/Info'), $this->_apiKey
    );
  }
}
