<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Course
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class Course extends AbstractAPI
{
  /**
   * Returns information about the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Course/' . $id), $this->_apiKey
    );
  }

  /**
   * Returns a list of the training sessions that belongs to the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetTrainingSessions($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/course/' . $id . '/training-sessions'), $this->_apiKey
    );
  }
}
