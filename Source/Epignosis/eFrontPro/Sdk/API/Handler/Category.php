<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Category
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Category extends AbstractAPI
{
  /**
   * Returns information about the requested category.
   *
   * @param   mixed $id (Required) | The category identifier.
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
      $this->_GetAPICallURL('/Category/' . $id), $this->_apiKey
    );
  }
}
