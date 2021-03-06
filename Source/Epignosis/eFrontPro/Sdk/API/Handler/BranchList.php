<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class BranchList
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 */
class BranchList extends AbstractAPI
{
  /**
   * Returns the complete list of branches.
   *
   * @since 1.0.0
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Branches'), $this->_apiKey
    );
  }
}
