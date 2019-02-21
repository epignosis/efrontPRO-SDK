<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Content
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   3.3.0
 */
class Catalog extends AbstractAPI
{
    /**
     * Returns the course catalog for a given user.
     *
     * @since 3.3.0
     *
     * @param mixed $userId (Required) | The user identifier.
     *
     * @throws \Exception
     *
     * @return array (Associative)
     */
    public function GetInfo($userId) {
        $this->_CheckId($userId);

        return $this->_requestHandler->Get (
            $this->_GetAPICallURL(sprintf('/User/%s/Catalog', $userId)),
            $this->_apiKey
        );
    }

}
