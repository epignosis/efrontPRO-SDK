<?php

define('DOCUMENT_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

spl_autoload_register (function ($class) {
  $file = str_replace (
    '\\', DIRECTORY_SEPARATOR, DOCUMENT_ROOT . $class . '.php'
  );

  if (file_exists($file)) {
    include $file;
  }
});
