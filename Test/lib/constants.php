<?php
$directory = basename(dirname(dirname(__FILE__)));
$url = explode('Portfolio',$_SERVER['REQUEST_URI']);
if(count($url) == 1){
    define('WEBROOT', '/');
}
else {

    define('WEBROOT', $url[0] . 'Portfolio/');
}