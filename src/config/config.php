<?php

$systeminfo=array(
	'name' => 'FlyPlus',
	'title' =>'FlyPlus',//
	'subtitle'=>'FlyPlus',



	'copyright'=>'Copyright [c] 2016 FlyPlus.pub Allrights Reserved.',



);


$settings=array(
  'charset'=>'utf-8',
  'themes'=>'fpadmin',
  'ob_enable'=>'true',
  'default_timezone'=>'PRC',
  'debug'=>true,
	'config_cache_enable'=>false,

	'modules'=>array(
		'plugins'=>WWWROOT.'/plugins',
		'themes'=>WWWROOT.'/themes',
		'app'=>WWWROOT.'/app',
	),
	'interface'=>array(
		'page'=>WWWROOT.'/index.php',
		'api'=>WWWROOT.'/api.php',
	),

);

return array(
	"systeminfo"=>$systeminfo,
	"settings"=>$settings,
	"db"=>require(CONFIG.'/db.php'),
);
?>
