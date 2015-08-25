<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Sys_Library_Loader {
  
  public function load($library, $agrs = array()) {
    // check library is loaded
    if(empty($this->{$library})) {
      $class = ucfirst($library) . '_Library';
      require_once(PATH_SYSTEM . '/library/' . $class . '.php');
      $this->{$library} = new $class($agrs);
    }
  }
  
}