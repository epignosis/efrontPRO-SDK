<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class UserList
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
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
