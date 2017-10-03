<?php
return array(
	'mysql'=>array(
		'1'=>array(
  		'label'=>'main',
  		'type'=>'master',
  		'desc'=>'主数据库',
      'server' => '172.0.0.221',
      'user' => 'fpapi',
      'passwd' => '2a39rwygn6',
      'db' => 'FPAPI_b2test',
      'charset' => 'utf8',
      'options' => array()

    ),
	),
	'sqlite'=>array(
		'1'=>array(
  		'label'=>'main',
  		'type'=>'master',
  		'desc'=>'主数据库',
      'dbfile' => STORAGE.'/db.db',
      'charset' => 'utf8',
      'options' => array()

    ),
	),
);

 ?>
