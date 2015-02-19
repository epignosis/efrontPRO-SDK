<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

class UserGroup extends AbstractAPI
{
  public function AddRelation($userId, $groupId)
  {
    $this->_CheckId($userId)->_CheckId($groupId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Group/' . $groupId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }

  public function RemoveRelation($userId, $groupId)
  {
    $this->_CheckId($userId)->_CheckId($groupId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Group/' . $groupId . '/RemoveUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }
}
