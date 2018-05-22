<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Job
 *
 * @author  EPIGNOSIS
 * @package Epignosis\eFrontPro\Sdk
 * @since   1.0.0
 * @version 2.1.0
 */
class Job extends AbstractAPI
{
    /**
     * Creates a job.
     *
     * @param   array $jobInfo (Required) | The account information.
     *
     * @throws  \Exception
     *
     * @return  array (Associative)
     *
     */
    public function Create(array $jobInfo) {
        return $this->_requestHandler->Post(
            $this->_GetAPICallURL('/Job'),
            $this->_apiKey,
            $jobInfo
        );
    }

    /**
     * @param array $jobInfo
     * @param       $id
     *
     * @return mixed
     */
    public function Update($id, array $jobInfo) {
        return $this->_requestHandler->Post(
            $this->_GetAPICallURL('/Job/'.$id),
            $this->_apiKey,
            $jobInfo);
    }

    /**
     * Returns information about the requested job.
     *
     * @since 1.0.0
     *
     * @param mixed $id (Required) | The job identifier.
     *
     * @throws \Exception
     *
     * @return array (Associative)
     */
    public function GetInfo($id) {
        $this->_CheckId($id);

        return $this->_requestHandler->Get(
            $this->_GetAPICallURL('/Job/'.$id),
            $this->_apiKey
        );
    }
}
