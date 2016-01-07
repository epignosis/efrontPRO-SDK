<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class CategoryList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class CategoryList extends AbstractAPI
{
  /**
   * Returns the complete list of categories.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Categories'), $this->_apiKey
    );
  }
}
