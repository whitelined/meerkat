<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
set_time_limit(600);

spl_autoload_register(function($class){
	$in=mb_strtolower(str_replace('\\','/',$class));
	require_once(\Meerkat\Config\local_root.$in.'.php');
});

require_once('config/config.php');
$app=new \Meerkat\Core\WebApp();
$app->Run();
?>
