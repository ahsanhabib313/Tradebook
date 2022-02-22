<?php

use App\Core\Application;
use App\Models\Admin;
use App\Models\User;

function getBaseUrl() 
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

    // return: http://localhost/myproject/
    $url = $protocol.'://'.$hostName.$pathInfo['dirname'];

    return str_replace("\\", "", $url);
}

function asset($file){
	return getBaseUrl()."/".$file;
}

function auth($type){
    $uid = Application::$app->session->get($type);
    if ($uid) {
        return ($type == 'admin') ? Admin::find($uid) : User::find($uid);
    }

    return false;
}

function publicUrl($file) 
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

    // return: http://localhost/myproject/
    $url = $protocol.'://'.$hostName.'/public'.'/'.$file;

    return str_replace("\\", "", $url);
}