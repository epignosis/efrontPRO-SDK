<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Account
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class Account extends AbstractAPI
{
  /**
   * Returns whether a user exists or not by providing the login name and the password.
   *
   * @since 1.0.0
   *
   * @param string $loginName (Required) | The login name of the user.
   * @param string $password (Required) | The password of the user.
   *
   * @throws \Exception
   *
   * @return array (Associative)
   */
  public function Exists($loginName, $password)
  {
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/Account/Status'),
      $this->_apiKey,
      ['login' => $loginName, 'password' => $password]
    );
  }
}
