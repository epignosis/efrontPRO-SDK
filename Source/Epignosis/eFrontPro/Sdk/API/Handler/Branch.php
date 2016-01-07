<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Branch
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Branch extends AbstractAPI
{
  /**
   * Returns information about the requested branch.
   *
   * @param   mixed $id (Required) | The branch identifier.
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
      $this->_GetAPICallURL('/Branch/' . $id), $this->_apiKey
    );
  }
}
