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

    // get medias
    $medias = $this->getAppMedias($id);

    $app['images'] = $medias;
    $app['main_image'] = $medias[intval($app['main_image'])]['media_name'];

    // get author
    $sql = "select user_name from users where user_id={$app['user_id']}";
    $user = $this->get_row($sql);

    $app['author'] = $user['user_name'];

    // get lasted history
    $sql = "select version, size, new_features, compatible, update_date ";
    $sql .= "from app_histories where app_id={$app['app_id']} order by update_date desc";

    $app['history'] = $this->get_row($sql);;

    return $app;
  }
  
  public function getNewestVersion($id) {
    // get version
    $sql = "select version from app_histories where app_id={$id} order by update_date desc";
    $version = $this->get_row($sql);

    return $version['version'];
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

  public function getAppsDownloadest() {

    // get app list
    $sql = "select * from apps order by download desc";
    $apps = $this->get_list($sql);

    for($i = 0; $i < sizeof($apps); $i++) { 
      $appId = $apps[$i]['app_id'];
   
      // get medias
      $medias = $this->getAppMedias($appId);

      $apps[$i]['images'] = $medias;
      $apps[$i]['main_image'] = $medias[intval($apps[$i]['main_image'])]['media_name'];

      // get author
      $sql = "select user_name from users where user_id={$apps[$i]['user_id']}";
      $user = $this->get_row($sql);

      $apps[$i]['author'] = $user['user_name'];
    }

    return $apps;
  }

  public function getAppMedias($id) {

    // get medias
    $sql = "select media_name, type from media where app_id={$id}";
    $medias = $this->get_list($sql);

    return $medias;
  }

  public function insert($data) {

    return $this->add_new($data);
  }
  
}