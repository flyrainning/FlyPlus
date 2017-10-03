<?php
/**
 *
 */
class loader
{
  public $modules;
  public $classlist;

  function __construct($config)
  {
    $this->modules=$this->load_modules($config);

    $this->classlist=$this->load_classes($config);


  }
  public function classloader($class){
    if (isset($this->classlist[$class])){
      if (file_exists($this->classlist[$class]['path'])) require_once($this->classlist[$class]['path']);
    }else{

    }

  }
  function load_modules($config){//扫描目录，取得所有模块列表
    //取得所有模块信息
    $result=array();
    $modules=($config->get('config.settings.config_cache_enable'))?cache_get('loader.modules',false):false;
    if ($modules===false){

      foreach ($config->modules as $iname=>$path) {
        $names=$config->searchdir($path);
        foreach ($names as $name) {
          $arr=$config->get_one_config_file($name['path'].'/package');
          $arr['id']=$name['name'];
          $arr['path']=$name['path'];
          $arr['type']=$iname;
          $result[$arr['id']]=$arr;
        }
      }
      cache_set('loader.modules',$result);
    }else{
      $result=strtoarr($modules);
    }
    return $result;
  }
  function load_classes($config){
    $result=array();
    $classes=($config->get('config.settings.config_cache_enable'))?cache_get('loader.classes',false):false;
    if ($classes===false){
      //开始获取所有class文件路径

      foreach ($config->modules as $iname=>$path) {
        $names=$config->searchdir($path);
        foreach ($names as $name) {

          //首先合并classes.php配置文件中的配置
          $arr=$config->get_one_config_file($name['path'].'/config/classes');

          foreach ($arr as $a) {

            if (!empty($a['name']) && !empty($a['path'])){
              $result[$a['name']]=array(
                'name'=>$a['name'],
                'path'=>$name['path'].'/'.$a['path'],
              );

            }
          }


          //逐一扫描classes目录，自动生成配置
          $files=glob($name['path'].'/classes/*.php');

          foreach ($files as $file) {
            $cname=basename(basename($file,'.php'),'.class');

            if (!isset($result[$cname])){
              $result[$cname]=array(
                'name'=>$cname,
                'path'=>$file,
              );
            }
          }

        }
      }

      cache_set('loader.classes',$result);
    }else{
      $result=strtoarr($classes);
    }
    return $result;
  }

}

 ?>
