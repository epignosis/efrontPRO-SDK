<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Group
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.0.0
 */
class Group extends AbstractAPI
{
  /**
   * Returns information about the requested group.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The group identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Group/' . $id), $this->_apiKey
    );
  }
}
