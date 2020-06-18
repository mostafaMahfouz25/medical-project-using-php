<?php 

define("DS",DIRECTORY_SEPARATOR);
// root path 
define("ROOT_PATH",__DIR__.DS);
// site path 
define("URL","http://medical.local/");
define("AURL","http://medical.local/admin/");
// site title 
define("SITE_TITLE","Medical Project");


define("ADMIN",ROOT_PATH.'admin'.DS);
define("CORE",ROOT_PATH.'core'.DS);

function redirect($url=URL)
{
    header("location:".$url);
}