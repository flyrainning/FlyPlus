<?php return array (
  0 => 
  array (
    'id' => 'admin.abilitygroup',
    'pid' => '',
    'order' => '0',
    'name' => '权限组管理',
    'remark' => '权限组管理',
    'default' => false,
    'item' => 
    array (
      0 => 
      array (
        'id' => 'add',
        'name' => '添加编辑权限组',
        'remark' => '添加编辑权限组',
        'default' => false,
      ),
    ),
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
        'allow' => 
        array (
          'page' => 
          array (
            0 => 'user-add',
            1 => 'user-modify',
            2 => 'user-del',
          ),
          'api' => 
          array (
            0 => 'user-add',
            1 => 'user-modify',
            2 => 'user-del',
          ),
        ),
      ),
    ),
  ),
  2 => 
  array (
    'id' => 'admin.usergroup',
    'pid' => '',
    'order' => '0',
    'name' => '用户组管理',
    'remark' => '用户组管理',
    'default' => false,
    'item' => 
    array (
      0 => 
      array (
        'id' => 'add',
        'name' => '添加编辑用户组',
        'remark' => '添加编辑用户组',
        'default' => false,
        'allow' => 
        array (
          'page' => 
          array (
            0 => 'usergroup-add',
            1 => 'usergroup-modify',
            2 => 'usergroup-del',
          ),
          'api' => 
          array (
            0 => 'usergroup-add',
            1 => 'usergroup-modify',
            2 => 'usergroup-del',
          ),
        ),
      ),
    ),
  ),
  3 => 
  array (
    'id' => 'dashboard',
    'pid' => '',
    'order' => '0',
    'name' => '仪表盘',
    'remark' => '仪表盘',
    'default' => true,
  ),
  4 => 
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
  5 => 
  array (
    'id' => 'admin.abilitygroup',
    'pid' => '',
    'order' => '0',
    'name' => '权限组管理',
    'remark' => '权限组管理',
    'default' => false,
    'item' => 
    array (
      0 => 
      array (
        'id' => 'add',
        'name' => '添加编辑权限组',
        'remark' => '添加编辑权限组',
        'default' => false,
      ),
    ),
  ),
  6 => 
  array (
    'id' => 'system.menu',
    'pid' => 'system',
    'order' => '0',
    'name' => '菜单管理',
    'remark' => '菜单管理',
    'default' => false,
    'item' => 
    array (
      0 => 
      array (
        'id' => 'add',
        'name' => '添加编辑菜单',
        'remark' => '添加编辑菜单',
        'default' => false,
        'allow' => 
        array (
          'page' => 
          array (
            0 => 'add',
          ),
          'api' => 
          array (
            0 => 'add',
          ),
        ),
      ),
    ),
  ),
); ?>