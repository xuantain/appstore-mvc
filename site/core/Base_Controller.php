<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Base_Controller extends Sys_Controller {

  public function __construct() {
    parent::__construct();
  }
  
  /**
  * load view
  */
  public function loadView($view, $data = array()) {
    $this->view->load('header', $data);
    $this->view->load('sidebar', $data);
    $this->view->load($view, $data);
    $this->view->load('footer', $data);
  }

  public function loadViewRightSidebar($view, $data = array()) {
    $this->view->load('header', $data);
    $this->view->load('sidebar', $data);
    $this->view->load($view, $data);
    $this->view->load('sidebar-b', $data);
    $this->view->load('footer', $data);
  }
  
  public function __destruct() {
    $this->view->show();
  }
}