<?php return array (
  0 => 
  array (
    'name' => 'admin.main',
    'title' => '仪表盘',
    'type' => 'menu',
    'iconcss' => 'fa fa-dashboard fa-fw',
    'visit_label' => 'sidermenu',
    'permission' => '0',
    'href' => '??',
    'target' => '',
    'api' => 'main.get',
  ),
  1 => 
  array (
    'id' => 'admin.user',
    'pid' => '',
    'order' => '0',
    'name' => '用户管理',
    'remark' => '用户管理',
    'default' => false,
    'item' => 
    array (
      0 => 
      array (
        'id' => 'add',
        'name' => '添加编辑用户',
        'remark' => '添加编辑用户',
        'default' => false,
      ),
    ),
  ),
  2 => 
  array (
    'id' => 'dashboard',
    'pid' => '',
    'order' => '0',
    'name' => '仪表盘',
    'remark' => '仪表盘',
    'default' => true,
  ),
  3 => 
  array (
    'id' => 'show',
    'pid' => 'dashboard',
    'order' => '0',
    'name' => '显示仪表盘',
    'remark' => '仪表盘',
    'default' => true,
    'item' => 
    array (
      0 => 
      array (
        'id' => 'yw',
        'name' => '显示业务图表',
        'remark' => '显示业务图表',
        'default' => true,
      ),
    ),
  ),
); ?>