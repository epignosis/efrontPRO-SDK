<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class BranchList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class BranchList extends AbstractAPI
{
  /**
   * Returns the complete list of branches.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Branches'), $this->_apiKey
    );
  }
}
