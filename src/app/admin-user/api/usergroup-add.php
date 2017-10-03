<?php
Value::parse('name,abilitygroup,data,remark');

empty($name) and API::out(false,'名称不能为空');


$ug=new UserGroup();


empty($ug->search_by('name',$name)) or API::out(false,'名称已存在');


$ug->name=$name;
$ug->remark=$remark;


if (is_array($data)){
  foreach ($data as $key => $value) {
    $ug->set_data($key,$value);
  }
}

$ug->save() or API::out(false,'遇到错误');

API::out(1,'添加完成');
 ?>
