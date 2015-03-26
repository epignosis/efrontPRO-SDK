<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class Course
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Course extends AbstractAPI
{
  /**
   * Returns information about the requested course.
   *
   * @param   mixed $id (Required) | The course identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Course/' . $id), $this->_apiKey
    );
  }
}
