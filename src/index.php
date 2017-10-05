<?php
define('FP_INTERFACE_APP', true);

/** Loads the FlyPlus Core */
require( dirname( __FILE__ ) . '/kernel/flyplus.php' );

$router->set_modules("app");
$router->set_interface("page");
$router->set_index("dashboard.index");


value_add('themes',new Themes($config));
$themes->route();

$themes->require('header');
$themes->require('body');
$themes->require('footer');

?>
