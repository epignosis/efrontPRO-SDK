<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;


class CourseList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Courses'), $this->_apiKey
    );
  }
}
