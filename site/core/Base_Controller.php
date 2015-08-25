<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends Sys_Controller {

  public function __construct() {
    parent::__construct();
  }
  
  /**
  * load view
  */
  public function loadView($view, $data = array()) {
    $this->load_header($data);
    $this->load_sidebar($data);
    $this->view->load($view, $data);
    $this->load_footer($data);
  }

  public function load_header($data = array()) {
    $this->view->load('header', $data);
  }
  
  public function load_footer($data = array()) {
    $this->view->load('footer', $data);
  }
  
  public function load_sidebar($data = array()) {
    $this->view->load('sidebar', $data);
  }

  public function __destruct() {
    $this->view->show();
  }
}