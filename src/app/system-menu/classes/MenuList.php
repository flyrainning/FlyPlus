<?php
/**

 */
class MenuList
{
  private $settings;
  public $list;

  function __construct($config)
  {
    $this->list=$this->load($config);
  }
  function getlist(){
    return $this->list;
  }
  function getlistarray(){
    return $this->make_array();
  }
  function make_array($pid=""){
    $listarray=array();
    foreach ($this->list as $value) {
      if ($value['pid']==$pid){
        $value['item']=$this->make_array($value['hash']);
        $listarray[]=$value;
      }

    }
    return $listarray;
  }
  function load($config){
    $result=array();
    $menus=($config->get('config.settings.config_cache_enable'))?cache_get('loader.menulist',false):false;
    if ($menus===false){

      $resultmenus=$config->get('menu');
      $result=$this->parse($resultmenus);

      cache_set('loader.menulist',$result);
    }else{
      $result=strtoarr($result);
    }
    return $result;
  }
  function parse($list,$pid=''){

    $result=array();
    foreach ($list as $value) {
      if (!empty($value['id'])){
        $result=array_merge($result,$this->parse_one($value,$pid));
      }
    }
    return $result;

  }
  function parse_one($value,$pid){

    $result=array();
    if (!empty($value['id'])){

        $arr=array(
          'id'=>$value['id'],
          'pid'=>$this->array_value($value,'pid',$pid),
          'order'=>$this->array_value($value,'order',1000),
          'name'=>$this->array_value($value,'name',''),
          'type'=>$this->array_value($value,'type',''),
          'remark'=>$this->array_value($value,'remark',''),
          'default'=>$this->array_value($value,'default',false),
          'iconcss'=>$this->array_value($value,'iconcss',''),
          'hash'=>$this->array_value($value,'hash',''),
          'href'=>$this->array_value($value,'href','??'),
          'target'=>$this->array_value($value,'target',''),

        );

        if (empty($arr['hash'])){
          $arr['hash']=trim($arr['pid'].'.'.$arr['id'],'.');
        }
        $result[]=$arr;
        if (isset($value['item']) && is_array($value['item'])){
          $result=array_merge($result,$this->parse($value['item'],$arr['hash']));
        }
    }

    return $result;
  }
  function array_value(&$arr,$key,$default=""){
    return isset($arr[$key])?$arr[$key]:$default;
  }

}

 ?>
