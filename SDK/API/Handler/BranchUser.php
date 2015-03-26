<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class BranchUser
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class BranchUser extends AbstractAPI
{
  /**
   * Creates a relation between the requested user and branch.
   *
   * @param   mixed $userId   (Required) | The user identifier.
   * @param   mixed $branchId (Required) | The branch identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
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
