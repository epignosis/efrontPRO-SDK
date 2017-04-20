<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class ExtendedProfile
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   2.2.0
 * @version 2.2.0
 */
class ExtendedProfile extends AbstractAPI
{
  /**
   * Returns information about the extended profile fields for users.
   *
   * @return  array (Associative)
   *
   * @throws  \Exception
   */
  public function ForUsers()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/extended-profile/users'), $this->_apiKey
    );
  }
}
