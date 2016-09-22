<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class CurriculumList
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   2.1.0
 * @version 2.1.0
 */
class CurriculumList extends AbstractAPI
{
  /**
   * Returns the complete list of curriculums.
   *
   * @since 2.1.0
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/curriculums'), $this->_apiKey
    );
  }
}
