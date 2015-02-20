<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class Branch
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Branch extends AbstractAPI
{
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Branch/' . $id), $this->_apiKey
    );
  }
}
