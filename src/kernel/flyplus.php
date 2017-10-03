<?php
define('WWWROOT',dirname( __DIR__ ));
define('CONFIG',WWWROOT.'/config');
define('THEMES',WWWROOT.'/themes');
define('CACHE',WWWROOT.'/cache');
define('STORAGE',WWWROOT.'/storage');

require __DIR__.'/modules/function.php';
require __DIR__.'/modules/config.php';
require __DIR__.'/modules/loader.php';
require __DIR__.'/modules/router.php';



value_add('config',new config());
($config->get('config.settings.debug'))?(ini_set("display_errors", "On") && error_reporting(E_ALL)):error_reporting(0);
($config->get('config.settings.ob_enable')) and ob_start();
date_default_timezone_set($config->get('config.settings.default_timezone'));

value_add('loader',new loader($config));
spl_autoload_register(array($loader, 'classloader'));

value_add('router',new router($config));





?>
