<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Adds css file to web page */
if ( ! function_exists('add_css_file') ) {
    function add_css_file($file = '') {
        if(empty($file)):
            return;
        endif;
        if(is_array($file)):
            if(count($file) <= 0):
                return;
            endif;
            foreach($file as $item):
                echo '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/'.$item.'.css"/>';
            endforeach;
        else:
            echo '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/'.$file.'.css"/>';
        endif;
    }
}

/* Adds js file to web page */
if ( ! function_exists('add_js_file') ) {
    function add_js_file($file = '') {
        if(empty($file)):
            return;
        endif;
        if(is_array($file)):
            if(count($file) <= 0):
                return;
            endif;
            foreach($file as $item):
                echo '<script type="text/javascript" src="'.base_url().'assets/'.$item.'.js"></script>';
            endforeach;
        else:
            echo '<script type="text/javascript" src="'.base_url().'assets/'.$file.'.js"></script>';
        endif;
    }
}

/* Shows error messages */
if ( ! function_exists('show_error_message') ) {
    function show_error_message($messageId=null,$message=null) {
        $msg = '';
       switch($messageId) {
            case 1: $msg = '<div class="alert alert-block alert-success fade in"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$message.'</div>';
                    break;
            case 2: $msg = '<div class="alert alert-block alert-danger fade in"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$message. '</div>';
                    break;
            case 3: $msg = '<div class="alert alert-block alert-warning fade in"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$message.'</div>';
                    break;
            default: $msg = '<div class="alert alert-block alert-info fade in"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>'.$message.'</div>';
                    break;
        }
        return $msg;
    }
	
}

/* Genrate Password */
if ( ! function_exists('genPassword') ) {
    function genPassword() {
        $length   = 8;
        $chars    = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789~!@#$%*_-";
        $password = substr( str_shuffle( $chars ), 0, $length );
        $CI =& get_instance();
        $CI->load->library('commonlibrary'); // loading commonlibrary library
        if($CI->commonlibrary->isValidPassword($password))
        {
            $encryptedPassword = encryptData($password);
            return $encryptedPassword;
        }
        return genPassword();
    }
}

/* Function to encrypt the data */
if ( ! function_exists('encryptData') ) {
    function encryptData($str = '') {
        if(empty($str)) {
            return null;
        } else {
            $CI =& get_instance();
            $CI->load->library('encrypt'); // loading encrypt library 
            $encrypted = $CI->encrypt->encode($str);
            $encrypted_data = base64_encode($encrypted);
            return $encrypted_data;
        }
    }
}
    
/* Function to decrypt the data */
if ( ! function_exists('decryptData') ) {
    function decryptData($str = '') {
        if(empty($str)) {
            return null;
        } else {
            $CI =& get_instance();
            $CI->load->library('encrypt'); // loading encrypt library 
            $decrypted = base64_decode($str);
            $decrypted_data = $CI->encrypt->decode($decrypted);
            return $decrypted_data;
        }
    }
}

/* Returns different base urls */
if ( ! function_exists('get_base_url') ) {
    function get_base_url($usermode = '') {
       $url = '';
        switch($usermode) {
            case 1: $url = base_url().'superadmin/';break;
            case 2: $url = base_url().'corporate/';break;
            case 3: $url = base_url().'enduser/';break;
        }
        return $url;
    }
}

function uploadImgFile($temName=false,$filePath=false,$fileName=false)
{
    if ( ! is_dir($filePath)) {
        mkdir($filePath);
    }
   return move_uploaded_file($temName,$filePath."/".$fileName);
}

function change_filename($name)
{
    $temp = explode(".",$name);
    return $newfilename = round(microtime(true)) . '.' . end($temp);
}

function sluggify($url)
{
    # Prep string with some basic normalization
    $url = strtolower($url);
    $url = strip_tags($url);
    $url = stripslashes($url);
    $url = html_entity_decode($url);

    # Remove quotes (can't, etc.)
    $url = str_replace('\'', '', $url);

    # Replace non-alpha numeric with hyphens
    $match = '/[^a-z0-9]+/';
    $replace = '-';
    $url = preg_replace($match, $replace, $url);

    $url = trim($url, '-');

    return $url;
}


/**
 * Copy a file, or recursively copy a folder and its contents
 * @author      Aidan Lister <aidan@php.net>
 * @version     1.0.1
 * @link        http://aidanlister.com/2004/04/recursively-copying-directories-in-php/
 * @param       string   $source    Source path
 * @param       string   $dest      Destination path
 * @param       int      $permissions New folder creation permissions
 * @return      bool     Returns true on success, false on failure
 */
function xcopy($source, $dest, $permissions = 0777)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry", $permissions);
    }

    // Clean up
    $dir->close();
}

function rrmdir($dir) { 
   if (is_dir($dir)) { 
     $objects = scandir($dir); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (is_dir($dir."/".$object))
           rrmdir($dir."/".$object);
         else
           unlink($dir."/".$object); 
       } 
     }
     rmdir($dir); 
   } 
 }
function url_title($str, $separator = 'dash', $lowercase = FALSE)
 {
  if ($separator == 'dash')
  {
   $search  = '_';
   $replace = '-';
  }
  else
  {
   $search  = '-';
   $replace = '_';
  }

  $trans = array(
      '&\#\d+?;'    => '',
      '&\S+?;'    => '',
      '\s+'     => $replace,
      '[^a-z0-9\-\._]'  => '',
      $replace.'+'   => $replace,
      $replace.'$'   => $replace,
      '^'.$replace   => $replace,
      '\.+$'     => ''
       );

  $str = strip_tags($str);

  foreach ($trans as $key => $val)
  {
   $str = preg_replace("#".$key."#i", $val, $str);
  }

  if ($lowercase === TRUE)
  {
   $str = ucfirst(strtolower($str));
  }

  return trim(stripslashes($str));
 }

 function gen_file_url($urls,$id)
 {
    $ex = explode('/',$urls);

    $count = count($ex);
    $redir_url = '';
    foreach ($ex as $key => $value) {
        $redir_url .= '<a href="'.base_url().'Departmentfiles/viewfiles/'.encryptData($value).'/'.$id.'">'.ucfirst($value).'</a>';
        if($key <($count-1))
        {
            $redir_url .= '  &nbsp;> &nbsp;';
        }
    }

    return $redir_url;
 }
