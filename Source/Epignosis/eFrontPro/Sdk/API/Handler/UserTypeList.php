<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class UserTypeList
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   3.2.0
 */
class UserTypeList extends AbstractAPI
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
        return $this->_requestHandler->Get($this->_GetAPICallURL('/user-types'), $this->_apiKey);
    }
}
