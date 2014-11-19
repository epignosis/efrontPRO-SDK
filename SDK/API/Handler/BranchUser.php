<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;


class BranchUser extends AbstractAPI
{
  public function AddRelation($userId, $branchId)
  {
    $this->_CheckId($userId)->_CheckId($branchId);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/Branch/' . $branchId . '/AddUser'),
      $this->_apiKey,
      ['UserId' => $userId]
    );
  }
}
