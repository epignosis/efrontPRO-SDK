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
  public function Activate($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id . '/Activate'),
      $this->_apiKey
    );
  }

  public function AutoLogin($loginName)
  {
    $loginName = urlencode($loginName);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Autologin/' . $loginName),
      $this->_apiKey
    );
  }

  public function Create(array $userInfo)
  {
    return $this->_requestHandler->Post (
      $this->_GetAPICallURL('/User'), $this->_apiKey, $userInfo
    );
  }

  public function Deactivate($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id . '/Deactivate'),
      $this->_apiKey
    );
  }

  public function Edit($id, array $userInfo)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Put (
      $this->_GetAPICallURL('/User/' . $id), $this->_apiKey, $userInfo
    );
  }

  public function GetInfo($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/User/' . $id), $this->_apiKey
    );
  }

  public function Logout($loginName)
  {
    $loginName = urlencode($loginName);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/Logout/' . $loginName), $this->_apiKey
    );
  }
}
