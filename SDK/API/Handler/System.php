<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;


class System extends AbstractAPI
{
  public function GetInfo()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/System/Info'), $this->_apiKey
    );
  }
}
