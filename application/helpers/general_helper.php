<?php

if (! defined('BASEPATH')) exit('No direct script access allowed');

  if(! function_exists('backButtonHandle')) {

      function backButtonHandle(){
          $CI =& get_instance();
          $CI->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
          $CI->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
          $CI->output->set_header('Pragma: no-cache');
          $CI->output->set_header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
      }

  }

 ?>
