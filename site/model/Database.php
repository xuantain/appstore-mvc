<?php

Class Database {
    
  $db;

  public function __construct()
  {
    $this->$db = mysqli_connect("localhost", "root", "", "appstore");

    if(!$db) {
      trigger_error("Could not connect to DB: " . mysqli_connect_error());
    } else {
      // set charset to UTF-8
      mysqli_set_charset($db, "UTF-8");
    }
  }


}