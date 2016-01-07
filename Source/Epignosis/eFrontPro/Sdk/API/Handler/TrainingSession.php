<?php

namespace Epignosis\eFrontPro\Sdk\API\Handler;

use Epignosis\eFrontPro\Sdk\API\Abstraction\AbstractAPI;

/**
 * Class TrainingSession
 *
 * @package   API\Handler
 * @author    EPIGNOSIS
 *
 */
class TrainingSession extends AbstractAPI
{

  /**
   * Returns any available training session.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetAll()
  {
    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/training-sessions'), $this->_apiKey
    );
  }

  /**
   * Returns information about the requested training session.
   *
   * @param   mixed $id (Required) | The training session identifier.
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
      $this->_GetAPICallURL('/training-session/' . $id), $this->_apiKey
    );
  }

  /**
   * Returns a list of the users that belongs to the requested training session.
   *
   * @param   mixed $id (Required) | The training session identifier.
   *
   * @throws  \Exception
   *
   * @return  array (Associative)
   *
   */
  public function GetUsers($id)
  {
    $this->_CheckId($id);

    return $this->_requestHandler->Get (
      $this->_GetAPICallURL('/training-session/' . $id . '/users'), $this->_apiKey
    );
  }
}
