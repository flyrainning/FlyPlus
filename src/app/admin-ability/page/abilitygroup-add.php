<?php

$themes->lib->add('ztree');

echo HTMLTMP::header('添加权限组');



 ?>


 <form id="queryform" class="form-horizontal entertotab" onsubmit="return false;">
  <?php
    echo HTMLTMP::make_input('权限组名','name','',array('class'=>'cl'));

  //权限组
  $AbilityList=new AbilityList($config);
  $list=$AbilityList->getlist();

  $abilitys=array();
  foreach ($list as $value) {
    # code...
    $abilitys[]=array(
      'id'=>$value['hash'],
      'pid'=>$value['pid'],
      'name'=>$value['name'],
      'remark'=>$value['remark'],
    );
  }
  $abilitysjson=json_encode($abilitys);
    $htmls= <<<CODE
    <div>
    <input type="hidden" id="abilitygroup" name="abilitygroup" class="" value="" />
       <ul id="abilitytree" class="ztree"></ul>
    </div>
    <script>
      var zTreeObj;
      var setting = {
        keep: {
  				leaf: true,
  				parent: true
  			},
  			view:{

  				nameIsHTML: true,
  				showLine:false,
          dblClickExpand: false
  			},

       data: {
      		simpleData: {
      			enable: true,
      			idKey: "id",
      			pIdKey: "pid",
      			rootPId: ''
      		}
      	},
        check: {
      		enable: true,
      		chkStyle: "checkbox",
      		chkboxType: { "Y": "s", "N": "s" }
      	},
        callback: {
          beforeClick: function(treeId, treeNode) {
    				var zTree = $.fn.zTree.getZTreeObj(treeId);
    				if (treeNode.isParent){
    					zTree.expandNode(treeNode);

    				}else{
    					zTree.checkNode(treeNode, !treeNode.checked, null, true);
    				}
    				return false;
    			},
  				onClick:function(event, treeId, treeNode){

  					return false;
  				}
  			}

      };
       var zNodes = $abilitysjson;
       $(document).ready(function(){
          zTreeObj = $.fn.zTree.init($("#abilitytree"), setting, zNodes);
       });
       function getselid(zTreeObjIn){
      	var nodes = zTreeObjIn.getCheckedNodes(true);
      	var allid = new Array();
      	var allname = new Array();
      	for (var i in nodes){

      		allid.push(nodes[i].id);
      		allname.push(nodes[i].name);

      	}


      	var res={"id":allid,"name":allname,"sid":allid.join(','),"sname":allname.join(',')};
      	return res;

      }
    </script>

CODE;
    echo HTMLTMP::make_label('权限组',$htmls);

    echo HTMLTMP::make_input('备注','remark','',array('class'=>'cl'));

    echo HTMLTMP::make_button('保 存','submits(this);',array(
   		'class'=>'btn-primary btn-lg widebtn',

   	));

   ?>
</form>
<script>

function submits(obj){

  var al=getselid(zTreeObj);
  $('#abilitygroup').val(al.sid);


	ajaxform('admin-ability.abilitygroup-add','queryform',function(msg){
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
