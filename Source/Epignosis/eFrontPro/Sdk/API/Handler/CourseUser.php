<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class CourseUser
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class CourseUser extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and course.
   *
   * @param   mixed $userId   (Required) | The user identifier.
   * @param   mixed $courseId (Required) | The course identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AddRelation($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

  /**
   * Returns the status of the requested user into the requested
   * course.
   *
   * @param   mixed $userId   (Required) | The user identifier.
   * @param   mixed $courseId (Required) | The course identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function CheckStatus($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL (
        '/CourseUserStatus/' . $courseId . ',' . $userId
      ),
      $this->_apiKey
    );
  }

  /**
   * Removes the relation between the requested user and the course.
   *
   * @param   mixed $userId   (Required) | The user identifier.
   * @param   mixed $courseId (Required) | The course identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
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
   * @param   mixed $userId   (Required) | The user identifier.
   * @param   mixed $courseId (Required) | The course identifier.
   * @param   array $info     (Optional) | The information to update.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function UpdateStatus($userId, $courseId, array $info = [])
  {
      $this->_CheckId($userId)->_CheckId($courseId);

      return $this->_requestHandler->Post (
          $this->_GetAPICallURL (
              '/CourseUserStatus/' . $courseId . ',' . $userId
          ),
          $this->_apiKey,
          $info
      );
  }
}
