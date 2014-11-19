<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;


class Category extends AbstractAPI
{
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Category/' . $id), $this->_apiKey
    );
  }
}
