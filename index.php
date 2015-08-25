<?php

  // define system path
  define('PATH_SYSTEM', __DIR__ .'/system');
  define('PATH_APPLICATION', __DIR__ . '/site');

  // get system's config
  require (PATH_SYSTEM . '/config/config.php');

  // get file common to loader
  include_once PATH_SYSTEM . '/core/Sys_Common.php';

  // Loading system
  Sys_Load();