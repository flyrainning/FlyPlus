<?php

echo HTMLTMP::header('添加用户');

$usergroup=new UserGroup();
$allgroup=$usergroup->select('`id`,`name`','`status`=?',1);
$groups=array();
foreach ($allgroup as $value) {
  # code...
  $groups[$value['id']]=$value['name'];
}

 ?>


 <form id="queryform" class="form-horizontal entertotab" onsubmit="return false;">
  <?php
    echo HTMLTMP::make_input('用户名','username','',array('class'=>'cl'));
    echo HTMLTMP::make_input('密码','passwd','',array('class'=>'cl','type'=>'password'));
    echo HTMLTMP::make_input('昵称','nickname','',array('class'=>'cl'));

    echo HTMLTMP::make_checkbox('用户组','group[]',$groups,'',array('class'=>''));

    echo HTMLTMP::make_button('保 存','submits(this);',array(
   		'class'=>'btn-primary btn-lg widebtn',

   	));

   ?>
</form>
<script>

function submits(obj){

	ajaxform('admin-user.user-add','queryform',function(msg){
		//btn.button('reset');
		if (msg.result){
			$('.cl').val('');
			malert(msg.data,1);

		}else{
			malert(msg.data);
		}

	},obj);

}

</script>
