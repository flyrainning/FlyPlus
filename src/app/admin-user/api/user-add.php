<?php
Value::parse('username,passwd,nickname,group,data,remark');

empty($username) and API::out(false,'用户名不能为空');
empty($passwd) and API::out(false,'密码不能为空');


$u=new User();

empty($u->search_by('username',(string)$username)) or API::out(false,'用户名已存在');


$u->username=$username;
$u->passwd=md5($passwd);
$u->nickname=$nickname;
$u->remark=$remark;
$u->group=arrtostr($group);

if (is_array($data)){
  foreach ($data as $key => $value) {
    $u->set_data($key,$value);
  }
}

$u->save() or API::out(false,'遇到错误');

API::out(1,'添加成功');
 ?>
