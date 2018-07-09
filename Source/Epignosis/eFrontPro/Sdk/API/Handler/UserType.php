<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class UserType
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 */
class UserType extends AbstractAPI
{
    /**
     * Returns information about the requested user type.
     *
     * @param   mixed $id (Required) | The user type identifier.
     *
     * @throws  \Exception
     *
     * @return  array (Associative)
     *
     */
    public function GetInfo($id)
    {
        $this->_CheckId($id);

        return $this->_requestHandler->Get($this->_GetAPICallURL('/user-type/' . $id), $this->_apiKey);
    }
}
