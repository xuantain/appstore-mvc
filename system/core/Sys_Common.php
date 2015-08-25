<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

function Sys_Load() {
  
  // get app's config (return a arrray)
  $config = include_once PATH_APPLICATION . '/config/init.php';

  // get controller
  $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];

  // get action
  $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];

  // create file's name controller will be get {Name}_Controller
  $controller = ucfirst(strtolower($controller)) . '_Controller';

  // create action's name (function's name) inside $controller {name}Action
  $action = strtolower($action) . 'Action';
  
  // check file controller is exist
  if (!file_exists(PATH_APPLICATION . '/controller/' . $controller . '.php')) {
    die ('Not found controller');
  }
  
  // include system database driver
  include_once PATH_SYSTEM . '/core/Sys_Database_Driver.php';
  
  // include system model
  include_once PATH_SYSTEM . '/core/Sys_Model.php';
  
  // include system controller (because every Controller have to extends Sys_Controller)
  include_once PATH_SYSTEM . '/core/Sys_Controller.php';
  
  // Load Base_Controller
  if(file_exists(PATH_APPLICATION . '/core/Base_Controller.php')) {
    include_once PATH_APPLICATION . '/core/Base_Controller.php';
  }
  
  // get controller
  require_once PATH_APPLICATION . '/controller/' . $controller . '.php';

  // check Class controller is exist
  if (!class_exists($controller)) {
    die ('Not found controller');
  }

  // create controller object
  $controllerObject = new $controller();

  // check action is defined inside $controller
  if ( !method_exists($controllerObject, $action)) {
    die ('Not found action');
  }
  
  // run action
  $controllerObject->{$action}();
}