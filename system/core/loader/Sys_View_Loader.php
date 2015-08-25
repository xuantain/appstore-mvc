<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Sys_View_Loader {

  private $_content = array();

  public function load($view, $data = array()) {
    
    // extract array to variables
    extract($data);
    
    // convert view's content (HTML) to variable, use ob_start()
    ob_start();
    require_once PATH_APPLICATION . '/view/' . $view . '.php';
    $content = ob_get_contents();
    ob_end_clean();
    
    // add content to array
    $this->_content[] = $content;
  }

  /**
  * Show view
  */
  public function show() {
    foreach ($this->_content as $html){
      echo $html;
    }
  }
}