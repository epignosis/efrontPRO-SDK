<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class GroupList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class GroupList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Groups'), $this->_apiKey
    );
  }
}
