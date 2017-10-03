<?php
return array(
  array(
		'name'=>'admin.main',
		'title'=>'仪表盘',
		'type'=>'menu',
		'iconcss'=>'fa fa-dashboard fa-fw',
		'visit_label'=>'sidermenu',
		'permission'=>'0',
		'href'=>'??',
		'target'=>'',
		'api'=>'main.get',


	),
  array(
		'id'=>'admin.user',
		'pid'=>'',
		'order'=>'0',
		'name'=>'用户管理',
		'remark'=>'用户管理',
		'default'=>false,
		'item'=>array(
			array(
				'id'=>'add',
				'name'=>'添加编辑用户',
				'remark'=>'添加编辑用户',
				'default'=>false,
			),
		)

	),
);
?>
