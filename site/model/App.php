<?php

class App extends Sys_Model {
  private $app_id       = '';
  private $cat_id       = '';
  private $user_id      = '';
  private $app_name     = '';
  private $link         = '';
  private $description  = '';
  private $price        = '';
  private $watch        = '';
  private $active       = '';
  private $download     = '';

  public function __construct() {
    $this->_table_name = 'apps';
    $this->_key = 'app_id';
     
    parent::__construct();
  }

  public function getAppList() {
    $apps = $this->select_all('*');
    for($i = 0; $i < sizeof($apps); $i++) { 
      $appId = $apps[$i]['app_id'];
      $main_image = $apps[$i]['main_image'];
      
      $sql = "select media_name, type from media where app_id={$appId} and position={$main_image}";
      $media = $this->get_row($sql);
      
      $apps[$i]['main_image'] = $media['media_name'];
    }
    return $apps;
  }
  
  public function getAppById($id) {
    $app = $this->select_by_id('*', $id);

    $sql = "select media_name, type from media where app_id={$id}";
    $medias = $this->get_list($sql);

    $app['images'] = $medias;
    $app['main_image'] = $medias[$app['main_image']];

    return $app;
  }
    
  public function getAppByCatId($catId) {
    $sql = "select * from apps where cat_id={$catId}";
    $apps = $this->get_list($sql);

    for($i = 0; $i < sizeof($apps); $i++) { 
      $appId = $apps[$i]['app_id'];
      $main_image = $apps[$i]['main_image'];
      
      $sql = "select media_name, type from media where app_id={$appId} and position={$main_image}";
      $media = $this->get_row($sql);
      
      $apps[$i]['main_image'] = $media['media_name'];
    }
    return $apps;
  }

}