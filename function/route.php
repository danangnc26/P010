<?php
session_start();
ob_start();
error_reporting(E_ALL ^ E_DEPRECATED);
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'bootstrap.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'lib.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'../config/Config.php';

function route($page)
{
	$sample = new SampleClass();
	switch ($page) {
		case 'foo':
			foreach ($sample->t() as $value) {
				echo "id = ".$value['id'].'<br>';
				echo "nama = ".$value['nama'];
			}
			break;
		
		case 'main' :
				default : 
				// header("location:index.php");
			break;
	}
}

define("index", "index.php");
define("base_url", server_name()."/".Config::getConfig('rootdir'));
define("app_base", index."?page=");

function server_name()
{
	  $serverport = (isset($_SERVER['SERVER_PORT'])) ? ':'.$_SERVER['SERVER_PORT'] : '';
	  return sprintf(
	    "%s://%s".$serverport,
	    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	    $_SERVER['SERVER_NAME'],
	    $_SERVER['REQUEST_URI']
	  );
}