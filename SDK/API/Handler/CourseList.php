<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class CourseList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class CourseList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Courses'), $this->_apiKey
    );
  }
}
