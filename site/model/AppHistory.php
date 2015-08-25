<?php

class AppHistory extends Sys_Model {
  private $app_history_id = '';
  private $app_id         = '';
  private $version        = '';
  private $size           = '';
  private $new_features   = '';
  private $compatible     = '';
  private $update_date    = '';

  public function __construct() {
    $this->_table_name = 'app_histories';
    $this->_key = 'app_history_id';
     
    parent::__construct();
  }

  public function getHistory($appId) {
    $sql = '';

    $results = $this->get_list($sql);
    return $results;
  }
}