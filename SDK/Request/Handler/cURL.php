<?php

namespace Request\Handler;

use Request\Abstraction\RequestHandlerInterface;
use Request\Exception\cURL as cURLException;


class cURL implements RequestHandlerInterface
{
  private $_curl = null;
  private $_optionList = [];


  private function _Exec()
  {
    $response = curl_exec($this->_curl);

		if($response === false)
    {
      throw new cURLException (
        curl_error($this->_curl), curl_errno($this->_curl)
      );
		}

    return $response;
  }

  private function _SetOptionList()
  {
    if (!curl_setopt_array($this->_curl, $this->_optionList))
    {
      throw new cURLException (
        'cURL was failed to set the appropriate options.'
      );
    }

    return $this;
  }

  public function __construct()
  {
    // Needs an improvement (cURL version).

    if (!extension_loaded('curl'))
    {
      throw new cURLException (
        'cURL extension is not loaded. You can enable this ' .
        'extension through the php.ini file'
      );
    }
  }

  public function Close()
  {
    if ($this->_curl != null)
    {
      curl_close($this->_curl);

      $this->_curl = null;
    }

    return $this;
  }

  public function Get($url, $apiKey)
  {
    $this->_optionList[CURLOPT_URL]           = $url;
    $this->_optionList[CURLOPT_CUSTOMREQUEST] = 'GET';
    $this->_optionList[CURLOPT_USERPWD]       = $apiKey . ':';

    return $this->_SetOptionList()->_Exec();
  }

  public function Init($sdkVersion)
  {
    if ($this->_curl == null)
    {
      $this->_curl = curl_init();

      if ($this->_curl === false)
      {
        throw new cURLException (
          'cURL initialization was failed.'
        );
      }
    }

    $this->Reset()->SetOptionList (
      [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 30,
        CURLOPT_TIMEOUT        => 60,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPAUTH       => CURLAUTH_BASIC,
        CURLOPT_HTTPHEADER     => [
          'eFrontPro-SDK-Version' => $sdkVersion
        ]
      ]
    );

    return $this;
  }

  public function Post($url, $apiKey, array $postParameterList = [])
  {
    $this->_optionList[CURLOPT_URL]           = $url;
    $this->_optionList[CURLOPT_USERPWD]       = $apiKey . ':';
    $this->_optionList[CURLOPT_CUSTOMREQUEST] = 'POST';
    $this->_optionList[CURLOPT_POSTFIELDS]    = http_build_query (
      $postParameterList, '', '&'
    );

    return $this->_SetOptionList()->_Exec();
  }

  public function Put($url, $apiKey, array $putParameterList = [])
  {
    $this->_optionList[CURLOPT_URL]           = $url;
    $this->_optionList[CURLOPT_USERPWD]       = $apiKey . ':';
    $this->_optionList[CURLOPT_CUSTOMREQUEST] = 'PUT';
    $this->_optionList[CURLOPT_POSTFIELDS]    = http_build_query (
      $putParameterList, '', '&'
    );

    return $this->_SetOptionList()->_Exec();
  }

  public function Reset()
  {
    if ($this->_curl != null)
    {
      curl_reset($this->_curl);
    }

    return $this;
  }

  public function SetOptionList(array $optionList = [])
  {
    // Needs an improvement (Validate Option List).
    $this->_optionList = $optionList;

    return $this;
  }
}
