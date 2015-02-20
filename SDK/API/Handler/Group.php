<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class Group
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Group extends AbstractAPI
{
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Group/' . $id), $this->_apiKey
    );
  }
}
