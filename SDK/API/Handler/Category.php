<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class Category
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class Category extends AbstractAPI
{
  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Category/' . $id), $this->_apiKey
    );
  }
}
