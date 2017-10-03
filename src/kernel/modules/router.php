<?php
/**
 *
 */
class router
{
  public $modules,$interface;
  public $index;
  public $route;

  function __construct($config,$modules="app",$interface="app",$index="dashboard.index")
  {


    $this->load_routes($config);
    $this->set_modules($modules);
    $this->set_interface($interface);
    $this->set_index($index);
  }
  function load_routes($config){
    $result=array();
    $route=($config->get('config.settings.config_cache_enable'))?cache_get('loader.route',false):false;
    if ($route===false){
      //开始获取所有route文件路径

      foreach ($config->modules as $iname=>$path) {
        $names=$config->searchdir($path);
        foreach ($names as $name) {

          $arr=$config->get_one_config_file($name['path'].'/config/route');
          foreach ($arr as $a) {

            if (!empty($a['key'])){
              $a['header']=$name['path'];
              $result[$a['key']]=$a;
            }
          }

        }
      }

      cache_set('loader.route',$result);
    }else{
      $result=strtoarr($route);
    }

    foreach ($result as $v) {
      $this->set_route($v['key'],$v['header'].'/'.ltrim($v['path'],'/'));
    }

  }

  function set_modules($modules){
    $this->modules=$modules;
  }
  function set_interface($interface){
    $this->interface=$interface;
  }
  function set_index($index){
    $this->index=$index;
  }
  function uhash($p){
    if (is_array($p)){
      $hashs=implode('/', $p);
    }else{
      $hashs=strtr($p,array('.' => '/'));
    }
    return $hashs;

	}
  function set_route($key,$path){
    $this->route[$key]=$path;
  }
  function route($key){
    if (isset($this->route[$key])){
      return $this->route[$key];
    }else{
      return "";
    }
  }
  function error($key){
    $f=$this->route($key);
		if (empty($f)){
      die('404 page not found');
    }else if (!file_exists($f)){
      die('404 page not found');
    }
    return $f;
	}

  function load($hash=''){//加载页面，加载.分割的hash
    if (empty($hash)) {
			$hash=$this->index;
		}
		$filename=$this->getpath($hash);


		if (file_exists($filename)) {
			return array(
        'result'=>true,
        'hash'=>$hash,
        'error'=>'',
        'file'=>$filename,
      );

		}else{
      return array(
        'result'=>false,
        'hash'=>$hash,
        'error'=>'404',
        'file'=>$this->error('404'),
      );
		}

	}
  function getpath($hash="",$modules="",$interface=""){
    if (empty($hash)) {
			$hash=$this->index;
		}
    if (empty($modules)) {
			$modules=$this->modules;
		}
    if (empty($interface)) {
			$interface=$this->interface;
		}
    $filename=$this->route($hash);
    if (empty($filename)){
      $arr=explode('.',$hash);
      $key=array_shift($arr);
      $fullhash=$modules.'/'.$key.'/'.$interface.'/'.$this->uhash($arr).'.php';

      $filename=WWWROOT.'/'.$fullhash;
    }

		return $filename;
	}
  function require($key=""){
    global $require;
    $file= $this->parse($key);
    $require($file['file']);
  }
  function ob_require($key=""){

    ob_start();
    $this->require($key);
    $out=ob_get_contents();
    ob_end_clean();
    return $out;
  }
  function parse($path=""){//处理请求，转换成.分割的hash，交给load
    if (empty($path)){
      foreach ($_GET as $k => $v){
        if (empty($v)&&($k{0}=='?')){
          $path=$k;
        }
      }
    }

    $path=trim(strtr($path,array('_' => '.')),'?');
    return $this->load($path);

  }
  public function uhashfile($file){
		return (pathinfo($file,PATHINFO_EXTENSION)=='php')?$file:$this->uhash($file).'.php';
	}
  function gotopage($gotopage){
		header("location: $gotopage");
		die();
	}

}


 ?>
