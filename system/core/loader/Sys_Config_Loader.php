<?php

class Sys_Config_Loader {

  // config list
  protected $_config = array();

  // load config list
  function load($config) {
    if (file_exists(PATH_APPLICATION . '/config/' . $config . '.php')) {
      $config = include_once PATH_APPLICATION . '/config/' . $config . '.php';
      if (!empty($config)) {
        foreach ($config as $key => $item) {
          $this->_config[$key] = $item;
        }
      }
      return true;
    }
    return false;
  }

  // get config
  public function item($key, $default_val = '') {
    return isset($this->_config[$key]) ? $this->_config[$key] : $default_val;
  }

  // set config
  public function set_item($key, $val) {
    $this->_config[$key] = $val;
  }
}