<?php

define('WEBROOT',dirname(__FILE__)); 

define('ROOT',dirname(WEBROOT)); 

define('DS','/');

define('CORE',ROOT.DS.'core'); 

define('BASE_URL',"http://prefon-crm.dev-lineup7.fr");

define('serveur_url',"http://prefon-crm.dev-lineup7.fr");

//ini_set("display_errors",0);error_reporting(0);

ini_set('session.gc_maxlifetime', 3600); 
ini_set('session.gc_divisor', '100');
ini_set('session.gc_probability', '100');


if(!isset($_SESSION)){
    session_start();
}


require CORE.DS.'includes.php';
new Dispatcher();


?>