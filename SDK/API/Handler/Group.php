<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

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
