<?php

$themes->lib->add('ztree');

echo HTMLTMP::header('菜单管理');



 ?>



 <div class="row">
   <div class="col-md-6">

    <div class="panel panel-default">
      <div class="panel-heading">主菜单</div>
      <div class="panel-body">
        <ul id="menulist" class="ztree"></ul>
        <script>
        var menulist;
        var menulistsetting = {
          keep: {
            leaf: true,
            parent: true
          },
          view:{

            nameIsHTML: true,
            showLine:false,
            dblClickExpand: false,
            addHoverDom: function(treeId, treeNode) {
              var aObj = $("#" + treeNode.tId + '_a');

        			if ($("#diyBtn1_"+treeNode.id).length>0) return;
        			if ($("#diyBtn2_"+treeNode.id).length>0) return;

        			if (treeNode.isch){
        				$('#editch_rename').val(treeNode.name);
        				var editStr = '<a id="diyBtn1_' +treeNode.id+ '" onclick="editch(\''+treeNode.id+'\');return false;" style="margin:0 0 0 5px;">重命名</a>' +
        					'<a id="diyBtn2_' +treeNode.id+ '" onclick="delch(\''+treeNode.id+'\');return false;" style="margin:0 0 0 5px;">删除章节</a>';
        					 //+'<a id="diyBtn3_' +treeNode.id+ '" onclick="del(\''+treeNode.id+'\');return false;" style="margin:0 0 0 5px;">删除</a>';

        			}else{
        				var editStr = '<a id="diyBtn1_' +treeNode.id+ '" href="<?=$_SYS['uri']?>el/?id=' +treeNode.id+ '" target="_blank" style="margin:0 0 0 5px;">查看</a>' +
        					'<a id="diyBtn2_' +treeNode.id+ '" onclick="editse(\''+treeNode.id+'\');return false;" style="margin:0 0 0 5px;">管理课时</a>';

        			}

        			aObj.append(editStr);

            	var btn = $("#diyBtn_"+treeNode.id);
            	if (btn) btn.bind("click", function(){
                event.stopPropagation();
                alert(1);

              });
            }
          },

         data: {
            simpleData: {
              enable: true,
              idKey: "id",
              pIdKey: "pid",
              rootPId: ''
            }
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
        $(document).ready(function(){
           menulist = $.fn.zTree.init($("#menulist"), menulistsetting, []);
        });
        </script>
      </div>
    </div>

   </div>
   <div class="col-md-6">

     <div class="panel panel-default">
       <div class="panel-heading">所有菜单</div>
       <div class="panel-body">
         <div>
            <ul id="alllist" class="ztree"></ul>
         </div>
         <?php
         $MList=new MenuList($config);
         $list=$MList->getlist();


         $alllist=array();
         foreach ($list as $value) {
           # code...
           $alllist[]=array(
             'id'=>$value['hash'],
             'pid'=>$value['pid'],
             'name'=>$value['name'],
             'remark'=>$value['remark'],
             'open'=>'true',
           );
         }
         $alllistjson=json_encode($alllist);
         ?>
       </div>
     </div>

   </div>
 </div>









  <?php
   echo HTMLTMP::make_button('保 存','submits(this);',array(
   		'class'=>'btn-primary btn-lg widebtn',
      'label_opt'=>array(
        'TMP'=>'none',
      ),

   	));

   ?>

<script>

var alllist;
var setting = {
  keep: {
    leaf: true,
    parent: true
  },
  view:{

    nameIsHTML: true,
    showLine:false,
    dblClickExpand: false,
    addDiyDom: function(treeId, treeNode) {
    	var aObj = $("#" + treeNode.tId + "_a");
    	if ($("#diyBtn_"+treeNode.id).length>0) return;
    	var editStr = "<span id='diyBtn_space_" +treeNode.id+ "' > - </span>"
    		+ "<span class='diyBtn1' id='diyBtn_" + treeNode.id
    		+ "' title='"+treeNode.name+"' onfocus=''>add</span>";
    	aObj.append(editStr);
    	var btn = $("#diyBtn_"+treeNode.id);
    	if (btn) btn.bind("click", function(){
        event.stopPropagation();

      });
    }
  },

 data: {
    simpleData: {
      enable: true,
      idKey: "id",
      pIdKey: "pid",
      rootPId: ''
    }
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
 var alllistNodes = <?=$alllistjson?>;
 $(document).ready(function(){
    alllist = $.fn.zTree.init($("#alllist"), setting, alllistNodes);
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
<script>

function submits(obj){

  //var al=getselid(alllist);
  //$('#abilitygroup').val(al.sid);
var nodes = alllist.transformToArray(alllist.getNodes());
var a=alllist.getNodes();
console.log(a);
return;

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
