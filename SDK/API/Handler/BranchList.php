<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

class BranchList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Branches'), $this->_apiKey
    );
  }
}
