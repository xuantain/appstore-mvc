<?php

class Category extends Sys_Model {
  private $cat_id    = '';
  private $user_id   = '';
  private $cat_name  = '';
  private $position  = '';

  public function __construct() {
    $this->_table_name = 'categories';
    $this->_key = 'cat_id';
     
    parent::__construct();
  }

  public function getCatList() {
    $results = $this->select_all('*');
    return $results;
  }
  
  public function getCatById($id) {
    $results = $this->select_by_id('*', $id);
    return $results;
  }
}