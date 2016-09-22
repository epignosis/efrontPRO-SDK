<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class CourseUser
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class CourseUser extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param bool  $force    (Required) | Whether to force the operation if the course belongs to a curriculum, or not.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function AddRelation($userId, $courseId, $force = false)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId, 'Force' => (string) $force]
    );
  }

  /**
   * Returns the status of the requested user into the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function CheckStatus($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/CourseUserStatus/' . $courseId . ',' . $userId),
      $this->_apiKey
    );
  }

  /**
   * Removes the relation between the requested user and the course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function RemoveRelation($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

  /**
   * Updates the status of the requested user in the requested course.
   *
   * @since 1.0.0
   *
   * @param mixed $userId   (Required) | The user identifier.
   * @param mixed $courseId (Required) | The course identifier.
   * @param array $info     (Optional) | The information to update.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function UpdateStatus($userId, $courseId, array $info = [])
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/CourseUserStatus/' . $courseId . ',' . $userId),
      $this->_apiKey,
      $info
    );
  }
}
