<?php

namespace Request\Abstraction;


interface RequestHandlerInterface
{
  public function Close();
  public function Get($url, $apiKey);
  public function Init($sdkVersion);
  public function Post($url, $apiKey, array $postParameterList = []);
  public function Put($url, $apiKey, array $putParameterList = []);
  public function Reset();
  public function SetOptionList(array $optionList = []);
}
