<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Content
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 */
class Content extends AbstractAPI
{
    /**
     * Returns information about the requested content.
     *
     * @since 3.2.0
     *
     * @param mixed $id (Required) | The content identifier.
     *
     * @throws \Exception
     *
     * @return array (Associative)
     */
    public function GetInfo($id) {
        $this->_CheckId($id);

        return $this->_requestHandler->Get(
            $this->_GetAPICallURL(sprintf('/Content/%s', $id)),
            $this->_apiKey
        );
    }

}
