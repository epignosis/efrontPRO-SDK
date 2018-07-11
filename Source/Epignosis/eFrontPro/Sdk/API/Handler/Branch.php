<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Branch
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 */
class Branch extends AbstractAPI
{
  /**
   * Creates a branch.
   *
   * @since 1.0.0
   *
   * @param array $branchInfo (Required) | The branch information.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   *
   */
  public function Create($branchInfo)
  {
    return $this->_requestHandler->Post (
        $this->_GetAPICallURL('/Branch'), $this->_apiKey, $branchInfo
    );
  }

  /**
   * Returns information about the requested branch.
   *
   * @since 1.0.0
   *
   * @param mixed $id (Required) | The branch identifier.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Branch/' . $id), $this->_apiKey
    );
  }
}
