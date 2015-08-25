<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Sys_Model_Loader {

  public function load($class, $param = NULL) {
    static $_classes = array();
    
    // Does the class exist? If so, we're done...
    if (isset($_classes[$class])) {
      return $_classes[$class];
    }

    $name = FALSE;
    
    if (file_exists(PATH_APPLICATION . '/model/' . $class . '.php')) {
      $name = $class;
      if (class_exists($class, FALSE) === FALSE) {
        require_once(PATH_APPLICATION . '/model/' . $class . '.php');
      }
    }
    // Did we find the class?
    if ($name === FALSE) {
      set_status_header(503);
      echo 'Unable to locate the specified class: ' . $class . '.php';
      exit(5); // EXIT_UNK_CLASS
    }
    // Keep track of what we just loaded
    $this->is_loaded($class);
    $_classes[$class] = isset($param) ? new $name($param) : new $name();
    return $_classes[$class];
  }

  function is_loaded($class = '') {
    static $_is_loaded = array();
    if ($class !== '') {
      $_is_loaded[strtolower($class)] = $class;
    }
    return $_is_loaded;
  }
  
}