<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class GroupList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class GroupList extends AbstractAPI
{
  /**
   * Returns the complete list of groups.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Groups'), $this->_apiKey
    );
  }
}
