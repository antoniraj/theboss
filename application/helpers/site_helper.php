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