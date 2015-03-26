<?php

namespace API\Handler;

use API\Abstraction\AbstractAPI;

/**
 * Class User
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class User extends AbstractAPI
{
  /**
   * Activates the requested user.
   *
   * @param   mixed $id (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Activate($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id . '/Activate'),
      $this->_apiKey
    );
  }

  /**
   * Auto-login the requested user.
   *
   * @param   string $loginName (Required) | The user's login name.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function AutoLogin($loginName)
  {
    $loginName = urlencode($loginName);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Autologin/' . $loginName),
      $this->_apiKey
    );
  }

  /**
   * Creates a user.
   *
   * @param   array $userInfo (Required) | The account information.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Create(array $userInfo)
  {
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/User'), $this->_apiKey, $userInfo
    );
  }

  /**
   * Deactivates the requested user.
   *
   * @param   mixed $id (Required) | The user identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Deactivate($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id . '/Deactivate'),
      $this->_apiKey
    );
  }

  /**
   * Edits the requested user.
   *
   * @param   mixed $id       (Required) | The user identifier.
   * @param   array $userInfo (Required) | The information to edit.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Edit($id, array $userInfo)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id), $this->_apiKey, $userInfo
    );
  }

  /**
   * Returns information about the requested user.
   *
   * @param   mixed $id (Required) | The user identifier.
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
      $this->_GetAPICallURL('/User/' . $id), $this->_apiKey
    );
  }

  /**
   * Log-out the requested user.
   *
   * @param   string $loginName (Required) | The user's login name.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function Logout($loginName)
  {
    $loginName = urlencode($loginName);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Logout/' . $loginName), $this->_apiKey
    );
  }
}
