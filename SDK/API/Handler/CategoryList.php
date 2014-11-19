<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;


class CategoryList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Categories'), $this->_apiKey
    );
  }
}
