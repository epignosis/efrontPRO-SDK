<?php

define('DOCUMENT_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

spl_autoload_register (function ($class) {
  //I will only try to load my classes
  if ( strpos($class, "Epignosis\\eFrontPro\\Sdk\\")!==0 ) {
    return;
  }

  $file = str_replace (
    '\\', DIRECTORY_SEPARATOR, DOCUMENT_ROOT . $class . '.php'
  );

  if (!file_exists($file)) {
    throw new \RuntimeException($file);
  }

  include $file;
});
