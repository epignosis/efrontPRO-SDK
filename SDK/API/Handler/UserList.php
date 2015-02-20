<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class UserList
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class UserList extends AbstractAPI
{
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Users'), $this->_apiKey
    );
  }

  public function GetAllByMail($mail)
  {
    $mail = urlencode($mail);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Users/' . $mail), $this->_apiKey
    );
  }
}
