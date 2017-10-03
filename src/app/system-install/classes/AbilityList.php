<?php
/**
 *
 */
class AbilityList
{
  private $abilitylist=array();
  function __construct($config)
  {
    $this->abilitylist=$this->load_abilitys($config);


  }
  function getlist(){
    return $this->abilitylist;
  }
  function load_abilitys($config){
    $result=array();
    $abilitys=($config->get('config.settings.config_cache_enable'))?cache_get('loader.abilitys',false):false;
    if ($abilitys===false){

      $resultability=$config->get('ability');
      $result=$this->parse($resultability);

      cache_set('loader.abilitys',$result);
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
          'remark'=>$this->array_value($value,'remark',''),
          'default'=>$this->array_value($value,'default',false),
          'hash'=>$this->array_value($value,'hash',''),
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
  function check($ability_id,$ability_list,$refused_list=array()){
    $result=false;
    if (!in_array($ability_id,$refused_list)){
      if (in_array($ability_id,$ability_list)){
        $result=true;
      }else{
        foreach ($this->abilitylist as $al) {
          if ($ability_id==$al['id']){
            if (isset($al['default'])) $result=$al['default'];
            break;
          }
        }
      }

    }

    return $result;
  }

}

 ?>
