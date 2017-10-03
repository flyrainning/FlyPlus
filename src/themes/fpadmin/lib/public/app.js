
function ajax(api,datas,callback,btn){
	if (btn) $(btn).button('loading');

	$.ajax({
		type: "POST",
		//timeout : 20000,
		url: "api.php?api="+api,
		data: datas,
		success: callback,
		error:function(XMLHttpRequest, textStatus, errorThrown){
			if (btn) $(btn).button('reset');
			malert('与服务器链接失败，请重试<br /><br />'+textStatus+'  <br />  '+errorThrown);
		},
		complete:function(){
			if (btn) $(btn).button('reset');
		}

	});

}

function ajaxform(api,formid,callback,btn){
	ajax(api, $("#"+formid).serialize(),callback,btn);

}
function goto(url){
	window.location.href=url;
}
function malert(msg,types,times){


	if ($.scojs_message){
		if (types=='info'){
			$.scojs_message(msg, $.scojs_message.TYPE_INFO,times);
		}else if (types){
			$.scojs_message(msg, $.scojs_message.TYPE_OK,times);
		}else{
			$.scojs_message(msg, $.scojs_message.TYPE_ERROR,times);
		}

	}else{
		alert(msg);
	}

}
function makehtml_byTMP(htmls,objs){
	var res='';
	for(var k in objs){
		var obj=objs[k];

		var html=htmls;
		if (typeof(obj)=='object'){
			for(var k in obj){
				html=html.replace(eval("/"+'{'+k+'}'+"/gi"),obj[k]);
			}
		}
		res+=html;
	}
	return res;
}

function handleEnter (field, event) {
  var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (keyCode == 13) {
   var i;
   for (i = 0; i < field.form.elements.length; i++)
    if (field == field.form.elements[i])
     break;
   i = (i + 1) % field.form.elements.length;
   field.form.elements[i].focus();
   return false;
  }
  else
  return true;
}

$(function(){
	$('.entertotab input').on('keypress',function(events){handleEnter(this,events);});
	if ($.fn.datetimepicker){
		$('.datepicker').prop('readonly','readonly').attr('type','text').datetimepicker({
			format: 'yyyy-mm-dd',
			autoclose:true,
			minView:2,
			todayBtn:true,
			todayHighlight:true,
			language:'zh-CN'
		});
	}

});


//bootstrap modal :poppage
;(function($, undefined) {
	$.extend({
		poppage:function(opt){
			/*
			opt={
				title:'',
				msg:'',
				btn:[
					{title:'btn1',class:"btn-primary",onclick:"alert(1)"}
				],
				event:{
					show:function(){alert(2)},
					hidden:function(){alert(3)}
				}

			}

			*/

			var title=opt.title;
			var msg=opt.msg;
			var btn=opt.btn;
			var event=opt.event;
			var mopt=undefined;

			var html='<div class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
				html+='<h4 class="modal-title">'+title+'</h4>';
			html+='</div><div class="modal-body"><p>';
				html+=msg;
			html+='</p></div><div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';

			if (btn){
				mopt={backdrop:'static'};
				for(var i in btn){
					var obj=btn[i];
					html+='<button type="button" class="btn btn-default '+obj.class+'" data-dismiss="modal" onclick="'+obj.onclick+'">'+obj.title+'</button>';
				}

			}

			html+='</div></div></div></div>';

			var obj=$(html).modal(mopt);
			obj.on('hidden.bs.modal', function (e) {
				obj.remove();
			});
			if (event){
				if (event.show)obj.on('shown.bs.modal',event.show);
				if (event.hidden)obj.on('hidden.bs.modal',event.hidden);
			}

		}


	});
})(jQuery);
