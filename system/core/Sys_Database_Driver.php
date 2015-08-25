<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Sys_Database_Driver {
  
  private $_conn;
  
  function connect() {
    if (!$this->_conn) {
      $this->_conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      if(!$this->_conn) {
        trigger_error("Could not connect to DB: " . mysqli_connect_error());
      } else {
        // set charset to UTF-8
        mysqli_set_charset($this->_conn, "UTF-8");
      }
    }
  }

  function dis_connect() {
    if ($this->_conn) {
      mysqli_close($this->_conn);
    }
  }

  // insert
  function insert($table, $data) {
    $this->connect();

    $field_list = '';
    $value_list = '';

    foreach ($data as $key => $value) {
      $field_list .= ",$key";
      $value_list .= ",'" . mysql_escape_string($value) . "'";
    }

    $sql = 'INSERT INTO '. $table .'('. trim($field_list, ',') .') VALUES ('. trim($value_list, ',') .')';
  
    return mysqli_query($this->_conn, $sql);
  }
  
  // update
  function update($table, $data, $where) {
    $this->connect();
    $sql = '';

    foreach ($data as $key => $value) {
      $sql .= "$key = '". mysql_escape_string($value) ."',";
    }
  
    $sql = 'UPDATE '. $table .' SET '. trim($sql, ',') .' WHERE '. $where;
  
    return mysqli_query($this->_conn, $sql);
  }
  
  // delete
  function remove($table, $where) {
    $this->connect();
      
    $sql = "DELETE FROM $table WHERE $where";
    return mysqli_query($this->_conn, $sql);
  }
  
  // get list
  function get_list($sql) {
    $this->connect();
      
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
  
  // get 1 row 
  function get_row($sql) {
    $this->connect();
      
    $result = mysqli_query($this->_conn, $sql);
  
    if (!$result) {
      die ('SQL is error');
    }
  
    // put results to array
    $row = mysqli_fetch_assoc($result);
  
    // free memory
    mysqli_free_result($result);
  
    if ($row) {
      return $row;
    }
  
    return false;
  }
}