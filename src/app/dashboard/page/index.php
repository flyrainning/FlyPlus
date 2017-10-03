
<?php

$c=new Settings();
//
// $c->set('aa.bb','ddd333fff');
// echo $c->get('aa.bb');
//
// $c=array();
// for ($i=0; $i < 50; $i++) {
//   $c[$i]=new Settings();
//   $c[$i]->set('aa.bb','ddd333fff');
// }


function aa(){
  global $require;
  $require(__DIR__.'/aa.php');
}


aa();
phpinfo();
 ?>
