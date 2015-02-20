<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class Plugin
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Plugin extends AbstractAPI
{
  /**
   * Returns a list of the available plugins and their information.
   *
   * @throws  \Exception (On network failure)
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Plugins'), $this->_apiKey
    );
  }
}
