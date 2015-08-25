<?php

class Download_Library {

  /*
  * Download File
  */
  function download_file( $uploadDir = '', $filename = '' ) {
    
    if( !preg_match('/^[a-z0-9\_\-][a-z0-9\_\-\. ]*$/i', $filename)
          || !is_file($uploadDir.$filename) || !is_readable($uploadDir.$filename) ) {
      echo "Error: File path is not match or file not found!";
      exit(-1);
    }
    
    // read file (binary)
    $fp = fopen($uploadDir.$filename, 'rb');
    
    // send header to browser (content type binary)
    header('Content-type: application/octet-stream');
    header('Content-disposition: attachment; filename="'.$filename.'"');
    header('Content-length: ' . filesize($uploadDir.$filename));
    
    // read file and send to browser
    fpassthru($fp);
    fclose($fp);
  }
}
