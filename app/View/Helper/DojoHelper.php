<?php

class DojoHelper extends AppHelper {
  
  var $replace = array(
      'phone' => array('+', '-', '(', ')', ' ')
    );
    
  /**
   * Phone Format Utility for 10 digit US Phone numbers
   */
  function phone($data = '') {
    $data = str_replace($this->replace['phone'], '', $data);
    $data = ereg_replace("[^0-9]",'',$data);
    if(strlen($data) == 10) $data = '('. substr($data,0,3) .') '. substr($data,3,3) .'-'. substr($data,6,4);
    else $data = '('. substr($data,1,3) .') '. substr($data,4,3) .'-'. substr($data,7,4);
    return($data);
  }
  
  function filesize($bytes)   {
      $size = $bytes / 1024;
      if($size < 1024) {
          $size = number_format($size, 2);
          $size .= ' KB';
      } 
      else {
          if($size / 1024 < 1024)  {
              $size = number_format($size / 1024, 2);
              $size .= ' MB';
          } 
          else if ($size / 1024 / 1024 < 1024) {
              $size = number_format($size / 1024 / 1024, 2);
              $size .= ' GB';
          } 
      }
      return $size;
    } 
}
?>