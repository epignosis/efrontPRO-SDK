<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class UserJob
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class UserJob extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and job.
   *
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $jobId (Required) | The job identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AddRelation($userId, $jobId)
  {
    $this->_CheckId($userId)->_CheckId($jobId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Job/' . $jobId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

  /**
   * Removes the relation between the requested user and job.
   *
   * @param   mixed $userId  (Required) | The user identifier.
   * @param   mixed $jobId (Required) | The job identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function RemoveRelation($userId, $jobId)
  {
    $this->_CheckId($userId)->_CheckId($jobId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Job/' . $jobId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }
}
