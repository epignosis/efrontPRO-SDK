<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;


class CourseUser extends AbstractAPI
{
  public function AddRelation($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

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

  public function RemoveRelation($userId, $courseId)
  {
    $this->_CheckId($userId)->_CheckId($courseId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Course/' . $courseId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

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
