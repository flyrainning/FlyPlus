<?php
return array(
	array(
		'id'=>'system.menu',
		'pid'=>'system',
		'order'=>'0',
		'name'=>'菜单管理',
		'remark'=>'菜单管理',
		'default'=>false,
		'item'=>array(
			array(
				'id'=>'add',
				'name'=>'添加编辑菜单',
				'remark'=>'添加编辑菜单',
				'default'=>false,
				'allow'=>array(
					'page'=>array(
						'add',
					),
					'api'=>array(
						'add',
					),
				),
			),
		),


	),



);
?>
