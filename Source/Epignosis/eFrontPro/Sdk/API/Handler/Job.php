<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class Job
 *
 * @author    Harry Batsis <xarhsdev@efrontlearning.com>
 * @package   Epignosis\eFrontPro\Sdk\API\Handler
 * @since     1.0.0
 */
class Job extends AbstractAPI
{
  /**
   * Creates a job.
   *
   * @param   array $info
   *            - The job information to be used. (Required)
   * @return  array (Associative)
   * @since   1.0.0
   * @throws  \Exception
   *            - In case that is not possible to create the job.
   */
  public function Create(array $info) {
    return $this->_requestHandler->Post($this->_GetAPICallURL('/Job'), $this->_apiKey, $info);
  }

  /**
   * Updates the requested job.
   *
   * @param   mixed $id
   *            - The job identifier to be used. (Required)
   * @param   array $info
   *            - The job information to be used. (Required)
   * @return  array (Associative)
   * @since   3.1.0
   * @throws  \Exception
   *            - In case that is not possible to update the requested job.
   */
  public function Update($id, array $info) {
    return $this->_requestHandler->Put($this->_GetAPICallURL('/Job/' . $id), $this->_apiKey, $info);
  }

  /**
   * Returns information about the requested job.
   *
   * @param   mixed $id
   *            - The job identifier to be used. (Required)
   * @return  array (Associative)
   * @since   1.0.0
   * @throws  \Exception
   *            - In case that is not possible to return information about the requested job.
   */
  public function GetInfo($id) {
    $this->_CheckId($id);

    return $this->_requestHandler->Get($this->_GetAPICallURL('/Job/' . $id), $this->_apiKey);
  }
}
