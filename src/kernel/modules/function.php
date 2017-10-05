<?php
//core
$GLOBALS['global_values']=array();
function value_add($key,$value=''){
  $GLOBALS['global_values'][$key]=$key;
  global ${$key};
  ${$key}=$value;
}
function value_list(){
  return $GLOBALS['global_values'];
}
$require=function($file){
  foreach (value_list() as $v) global ${$v};
  return require($file);
};

//hooks_action

$GLOBALS['hooks_action']=array();

function add_action($key,$func,$var=array()){
  if (!isset($GLOBALS['hooks_action'][$key])) $GLOBALS['hooks_action'][$key]=array();
  $funcvar=is_array($var)?$var:array($var);
  $GLOBALS['hooks_action'][$key][]=array($func,$funcvar);
}
function do_action($key){
  $res=false;
  if (isset($GLOBALS['hooks_action'][$key])){
    foreach ($GLOBALS['hooks_action'][$key] as $list) {
      $p1=Value::isset($list[0],false);
      $p2=Value::isset($list[1],array());
      if (!empty($p1)) $res=call_user_func_array($p1,$p2);

    }
  }
  return $res;

}
//cache
function cache_set($key,$value){
  $key=str_replace('.','/',$key);
  $filename=CACHE.'/'.$key.'.cache.php';
  mkdirs(dirname($filename));
  file_exists($filename) or touch($filename);
  file_put_contents($filename, '<?php return '.var_export($value, TRUE).'; ?>');
}
function cache_get($key,$v=''){
  $key=str_replace('.','/',$key);
  $filename=CACHE.'/'.$key.'.cache.php';
	return file_exists($filename)? require($filename):$v;
}
function cache_clean($key){

}
//convert
function arrtostr($arr,$parm=','){
		$arr=is_array($arr)?implode($parm, $arr):$arr;
		return trim($arr,$parm);

	}
function strtoarr($str,$parm=','){
	if (is_string($str) && trim($str)==''){
		$str=array();
	}else{
		$str=is_array($str)?$str:explode($parm,trim($str,$parm));
	}
	return $str;

}
function jsontoarr($json){
	return json_decode($json,true);
}
function arrtojson($arr){
	return json_encode($arr);
}

function utf8($s){
	return iconv("gbk", "UTF-8", $s);
}
function gbk($s){
	return iconv("UTF-8","gbk" ,$s);
}


//fs
function mkdirs($dir){
	return is_dir($dir) or (mkdirs(dirname($dir)) and mkdir($dir,0777));
}
function rmdirs($src) {
    $dir = opendir($src);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rmdirs($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
    rmdir($src);
}
 ?>
