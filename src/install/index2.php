<?php
require( dirname(dirname( __DIR__ )) . '/kernel/flyplus.php' );





//安装模块
$install_list=$config->get('install');
foreach ($install_list as $list) {
  $p1=Value::isset($list[0],false);
  $p2=Value::isset($list[1],array());
  if (!empty($p1)) call_user_func_array($p1,$p2);

}



 ?>
