<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Group
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Group extends AbstractAPI
{
  /**
   * Returns information about the requested group.
   *
   * @param   mixed $id (Required) | The group identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Group/' . $id), $this->_apiKey
    );
  }
}
