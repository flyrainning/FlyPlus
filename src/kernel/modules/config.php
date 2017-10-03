<?php
/**
 *
 */
class config
{
  public $config=array();
  public $modules=array();
  private $cachedir=CACHE.'/config';

  function __construct()
  {
    $this->config['config']=require(CONFIG.'/config.php');
    $this->modules=$this->config['config']['settings']['modules'];
  }
  function get($key,$default=array()){
    $return=$default;

    if (!empty($key)){
      $keys=explode('.',$key);
      $mainkey=$keys[0];
      if (!isset($this->config[$mainkey])){
        $this->load($mainkey);
      }
      $return=$this->config;
      foreach ($keys as $k) {
        if (isset($return[$k])){
          $return=$return[$k];
        }else{
          $return=$default;
          break;
        }
      }
    }

    return $return;
  }
  function load($key){

    $conf=($this->config['config']['settings']['config_cache_enable'])?cache_get('config.'.$key,false):false;
    if ($conf===false){
      $conf=$this->collect($key);
      cache_set('config.'.$key,$conf);
    }else{
      $conf=strtoarr($conf);
    }

    if (isset($this->config[$key])){
      $this->config[$key]=array_merge($this->config[$key],$conf);
    }else{
      $this->config[$key]=$conf;
    }
  }
  function collect($key,$modules=""){
    $result=array();

    $intf=empty($modules)?$this->modules:$modules;
    $intf=strtoarr($intf);
    foreach ($intf as $name=>$path) {
      $names=$this->searchdir($path);
      foreach ($names as $name) {

        $arr=$this->get_one_config_file($name['path'].'/config/'.$key);
        $result=array_merge($result,$arr);
      }
    }


    return $result;
  }
  function searchdir($dir){
    $res=array();

    $d=glob($dir."/*");
    foreach ($d as $subd) {
      if (is_dir($subd)){
        $res[]=array(
          'name'=>basename($subd),
          'path'=>$subd,
        );
      }
    }

    return $res;
  }
  function get_one_config_file($file){
    $res=array();
    if (file_exists($file.'.php')){
      $res=require($file.'.php');
    }else if (file_exists($file.'.json')){
      $res=json_decode(file_get_contents($file.'.json'),true);

    }
    return $res;
  }

};


 ?>
