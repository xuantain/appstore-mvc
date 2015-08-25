<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends Sys_Controller {

  public function __construct() {
    parent::__construct();
  }
  
  public function load_header() {
    // Load footer's content
  }
  
  public function load_footer() {
    // Load header's content
  }
  
  public function __destruct() {
    $this->view->show();
  }
}