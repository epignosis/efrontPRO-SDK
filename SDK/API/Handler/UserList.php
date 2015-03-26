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
  /**
   * Returns the complete user list.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Users'), $this->_apiKey
    );
  }

  /**
   * Returns any user with the requested email as email.
   *
   * @param   string $mail (Required) | The email identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAllByMail($mail)
  {
    $mail = urlencode($mail);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Users/' . $mail), $this->_apiKey
    );
  }
}
