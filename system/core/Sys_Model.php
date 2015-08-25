<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Sys_Model extends Sys_Database_Driver {
  
  protected $_table_name = '';
  protected $_key = '';
  
  function __construct() {
    parent::connect();
  }
  
  function __destruct() {
    parent::dis_connect();
  }
  
  function add_new($data) {
    return parent::insert($this->_table_name, $data);
  }
  
  function delete_by_id($id) {
    return $this->remove($this->_table_name, $this->_key .'='. (int)$id);
  }
  
  function update_by_id($data, $id) {
    return $this->update($this->_table_name, $data, $this->_key ."=". (int)$id);
  }
  
  function select_by_id($select, $id) {
    $sql = "select $select from ". $this->_table_name ." where ". $this->_key ." = ". (int)$id;
    return $this->get_row($sql);
  }
  
  function select_all($select) {
    $sql = "select $select from ". $this->_table_name;
    return $this->get_list($sql);
  }

  function query($select, $from, $where) {
    $this->connect();
    
    $sql = "";

    $result = mysqli_query($this->_conn, $sql);
    
    if (!$result) {
      die ('SQL is error');
    }
    
    $return = array();
    
    // put results to array
    while ($row = mysqli_fetch_assoc($result)) {
      $return[] = $row;
    }
    
    // free memory
    mysqli_free_result($result);
  
    return $return;
  }
}