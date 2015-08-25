<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Sys_Controller {

  // view object
  protected $view    = NULL;
   
  // model object
  protected $model   = NULL;
   
  // library object
  protected $library = NULL;
   
  // helper object
  protected $helper  = NULL;
   
  // config object
  protected $config  = NULL;
   
  /**
   * @desc load config - library - helper - view - model
   */
  public function __construct($is_controller = true) {

    // loader config
    require_once PATH_SYSTEM . '/core/loader/Sys_Config_Loader.php';
    $this->config = new Sys_Config_Loader();
    $this->config->load('config');

    // loader library
    require_once PATH_SYSTEM . '/core/loader/Sys_Library_Loader.php';
    $this->library = new Sys_Library_Loader();

    // loader helper
    require_once PATH_SYSTEM . '/core/loader/Sys_Helper_Loader.php';
    $this->helper = new Sys_Helper_Loader();

    // loader view
    require_once PATH_SYSTEM . '/core/loader/Sys_View_Loader.php';
    $this->view = new Sys_View_Loader();

    // loader model
    require_once PATH_SYSTEM . '/core/loader/Sys_Model_Loader.php';
    $this->model = new Sys_Model_Loader();
  }

}