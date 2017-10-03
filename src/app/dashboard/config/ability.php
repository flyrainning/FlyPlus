<?php
return array(
	array(
		'id'=>'dashboard',
		'pid'=>'',
		'order'=>'0',
		'name'=>'仪表盘',
		'remark'=>'仪表盘',
		'default'=>true,

	),
	array(
		'id'=>'show',
		'pid'=>'dashboard',
		'order'=>'0',
		'name'=>'显示仪表盘',
		'remark'=>'仪表盘',
		'default'=>true,
		'item'=>array(
			array(
				'id'=>'yw',
				'name'=>'显示业务图表',
				'remark'=>'显示业务图表',
				'default'=>true,
			),

		),
	),

);
?>
