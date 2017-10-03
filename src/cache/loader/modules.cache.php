<?php return array (
  'DEV.system.memcache' => 
  array (
    'name' => 'memcache',
    'version' => '1.0.0',
    'description' => 'memcache的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'DEV.system.memcache',
    'path' => '/app/wwwroot/plugins/DEV.system.memcache',
    'type' => 'plugins',
  ),
  '__delete' => 
  array (
    'id' => '__delete',
    'path' => '/app/wwwroot/plugins/__delete',
    'type' => 'plugins',
  ),
  'app.BaseTable' => 
  array (
    'name' => 'BaseTable',
    'version' => '1.0.0',
    'description' => '单表处理的基类',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'app.BaseTable',
    'path' => '/app/wwwroot/plugins/app.BaseTable',
    'type' => 'plugins',
  ),
  'db.FPPDO' => 
  array (
    'name' => 'FPPDO',
    'version' => '1.0.0',
    'description' => 'PDO数据库封装',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'db.FPPDO',
    'path' => '/app/wwwroot/plugins/db.FPPDO',
    'type' => 'plugins',
  ),
  'db.MySQL' => 
  array (
    'name' => 'MySQL',
    'version' => '1.0.0',
    'description' => 'MySQL连接功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'dependencies' => 
    array (
      0 => 'db.FPPDO',
    ),
    'id' => 'db.MySQL',
    'path' => '/app/wwwroot/plugins/db.MySQL',
    'type' => 'plugins',
  ),
  'db.SQLite' => 
  array (
    'name' => 'SQLite',
    'version' => '1.0.0',
    'description' => 'SQLite连接功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'dependencies' => 
    array (
      0 => 'db.FPPDO',
    ),
    'id' => 'db.SQLite',
    'path' => '/app/wwwroot/plugins/db.SQLite',
    'type' => 'plugins',
  ),
  'func.settings' => 
  array (
    'name' => 'Settings',
    'version' => '1.0.0',
    'description' => 'Settings基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'func.settings',
    'path' => '/app/wwwroot/plugins/func.settings',
    'type' => 'plugins',
  ),
  'system.API' => 
  array (
    'name' => 'API',
    'version' => '1.0.0',
    'description' => 'API的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.API',
    'path' => '/app/wwwroot/plugins/system.API',
    'type' => 'plugins',
  ),
  'system.Header' => 
  array (
    'name' => 'Header',
    'version' => '1.0.0',
    'description' => '包含常用的HTTP头',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.Header',
    'path' => '/app/wwwroot/plugins/system.Header',
    'type' => 'plugins',
  ),
  'system.JSON' => 
  array (
    'name' => 'JSON',
    'version' => '1.0.0',
    'description' => 'JSON的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.JSON',
    'path' => '/app/wwwroot/plugins/system.JSON',
    'type' => 'plugins',
  ),
  'system.LibLoader' => 
  array (
    'name' => 'LibLoader',
    'version' => '1.0.0',
    'description' => '库加载类',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.LibLoader',
    'path' => '/app/wwwroot/plugins/system.LibLoader',
    'type' => 'plugins',
  ),
  'system.Session' => 
  array (
    'name' => 'Session',
    'version' => '1.0.0',
    'description' => '会话管理的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.Session',
    'path' => '/app/wwwroot/plugins/system.Session',
    'type' => 'plugins',
  ),
  'system.Themes' => 
  array (
    'name' => 'Themes',
    'version' => '1.0.0',
    'description' => '主题处理类',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'dependencies' => 
    array (
      0 => 'system.Value',
      1 => 'system.LibLoader',
      2 => 'system.Header',
    ),
    'id' => 'system.Themes',
    'path' => '/app/wwwroot/plugins/system.Themes',
    'type' => 'plugins',
  ),
  'system.URL' => 
  array (
    'name' => 'URL',
    'version' => '1.0.0',
    'description' => 'URL基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.URL',
    'path' => '/app/wwwroot/plugins/system.URL',
    'type' => 'plugins',
  ),
  'system.Value' => 
  array (
    'name' => 'Value',
    'version' => '1.0.0',
    'description' => 'GET和POST变量的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system.Value',
    'path' => '/app/wwwroot/plugins/system.Value',
    'type' => 'plugins',
  ),
  'verify.format' => 
  array (
    'name' => 'VerifyFormat',
    'version' => '1.0.0',
    'description' => '提供常用格式验证功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'verify.format',
    'path' => '/app/wwwroot/plugins/verify.format',
    'type' => 'plugins',
  ),
  'fpadmin' => 
  array (
    'name' => 'fpadmin',
    'version' => '1.0.0',
    'description' => 'FlyPlus管理主题',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'fpadmin',
    'path' => '/app/wwwroot/themes/fpadmin',
    'type' => 'themes',
  ),
  'admin-ability' => 
  array (
    'name' => 'admin-ability',
    'version' => '1.0.0',
    'description' => '权限组的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'admin-ability',
    'path' => '/app/wwwroot/app/admin-ability',
    'type' => 'app',
  ),
  'admin-user' => 
  array (
    'name' => 'admin-user',
    'version' => '1.0.0',
    'description' => 'admin-user',
    'main' => 'index.php',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'admin-user',
    'path' => '/app/wwwroot/app/admin-user',
    'type' => 'app',
  ),
  'dashboard' => 
  array (
    'name' => 'dashboard',
    'version' => '1.0.0',
    'description' => 'dashboard',
    'main' => 'index.php',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'dashboard',
    'path' => '/app/wwwroot/app/dashboard',
    'type' => 'app',
  ),
  'system-install' => 
  array (
    'name' => 'system-install',
    'version' => '1.0.0',
    'description' => '权限组的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system-install',
    'path' => '/app/wwwroot/app/system-install',
    'type' => 'app',
  ),
  'system-menu' => 
  array (
    'name' => 'system-menu',
    'version' => '1.0.0',
    'description' => '权限组的基本处理功能',
    'author' => 'flyrainning',
    'license' => 'GPLv3',
    'id' => 'system-menu',
    'path' => '/app/wwwroot/app/system-menu',
    'type' => 'app',
  ),
); ?>