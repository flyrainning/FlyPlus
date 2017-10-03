<?php
return array(
	array(
		'name'=>'main',
		'add'=>array(
      'basic',
      'admin',
			'public'
    ),
	),
	array(
		'name'=>'basic',
    'autoload'=>true,
		'add'=>array(
      'jquery',
      'bootstrap',
    ),
	),
	array(
		'name'=>'admin',
		'js'=>array(
      'lib/admin/metisMenu/dist/metisMenu.min.js',
      'lib/admin/js/sb-admin-2.js',
    ),
		'css'=>array(
			'lib/admin/metisMenu/dist/metisMenu.min.css',
			'lib/admin/css/sb-admin-2.css',
			'lib/admin/font-awesome/css/font-awesome.min.css',
		),
	),
	array(
		'name'=>'public',
		'js'=>array(
			'lib/public/ext.bootstrap.js',
			'lib/public/app.js',
		),
    'css'=>array(
			'lib/public/ext.bootstrap.css',
			'lib/public/app.css',
		),
	),
  array(
    'name'=>'jquery',
    'js'=>array(
		//	'lib/jquery/jquery-3.1.1.min.js',
			'lib/jquery/jquery-1.11.3.min.js',
		),
    'css'=>'',

  ),

  array(
    'name'=>'bootstrap',
    'js'=>array(
			'lib/bootstrap/js/bootstrap.min.js',
		),
    'css'=>array(
			'lib/bootstrap/css/bootstrap.min.css',
		),

  ),
	array(
		'name'=>'bootstrap-datetimepicker',
		'js'=>array(
			'lib/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js',
		),
		'css'=>array(
			'lib/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css',
		),

	),
	array(
    'name'=>'bootstrap-switch',
    'js'=>array(
			'lib/bootstrap-switch/bootstrap-switch.min.js',
		),
    'css'=>array(
			'lib/bootstrap-switch/bootstrap-switch.min.css',
		),

  ),
	array(
    'name'=>'bootstrap-select',
    'js'=>array(
			'lib/bootstrap-select/bootstrap-select.min.js',
			'lib/bootstrap-select/i18n/defaults-zh_CN.min.js',
		),
    'css'=>array(
			'lib/bootstrap-select/bootstrap-select.min.css',
		),

  ),
	array(
    'name'=>'icheck',
    'js'=>array(
			'lib/icheck/icheck.min.js',
		),
    'css'=>array(
			'lib/icheck/skins/flat/blue.css',
		),

  ),
	array(
		'name'=>'ztree',
		'js'=>array(
      'lib/ztree/js/jquery.ztree.all.min.js',
    ),
		'css'=>array(
      'lib/ztree/css/metroStyle/metroStyle.css',
    ),
		'add'=>array(
			'jquery'
		),
	),



);
?>
