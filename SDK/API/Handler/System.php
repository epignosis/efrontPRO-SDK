<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class System
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class System extends AbstractAPI
{
  /**
   * Returns the system information.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetInfo()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/System/Info'), $this->_apiKey
    );
  }
}
