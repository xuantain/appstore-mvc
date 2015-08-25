<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
// convert string to number
function string_to_int($str) {
    return sprintf("%u", crc32($str));
}