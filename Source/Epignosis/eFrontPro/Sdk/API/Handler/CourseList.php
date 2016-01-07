<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class CourseList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class CourseList extends AbstractAPI
{
  /**
   * Returns the complete list of courses.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Courses'), $this->_apiKey
    );
  }
}
