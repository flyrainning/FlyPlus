<?php

echo HTMLTMP::header('添加用户组');


$AbilityGroup=new AbilityGroup();
$allgroup=$AbilityGroup->select('`id`,`name`','`status`=?',1);
$groups=array();
foreach ($allgroup as $value) {
  # code...
  $groups[$value['id']]=$value['name'];
}

 ?>


 <form id="queryform" class="form-horizontal entertotab" onsubmit="return false;">
  <?php
    echo HTMLTMP::make_input('用户组名','name','',array('class'=>'cl'));
    echo HTMLTMP::make_checkbox('权限组','abilitygroup[]',$groups,'',array('class'=>''));

    echo HTMLTMP::make_input('备注','remark','',array('class'=>'cl'));

    echo HTMLTMP::make_button('保 存','submits(this);',array(
   		'class'=>'btn-primary btn-lg widebtn',

   	));

   ?>
</form>
<script>

function submits(obj){

	ajaxform('admin-user.usergroup-add','queryform',function(msg){
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
