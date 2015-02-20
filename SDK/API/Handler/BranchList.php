<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class BranchList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class BranchList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Branches'), $this->_apiKey
    );
  }
}
