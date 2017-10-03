<?php
class HTMLTMP{

	static function make_label($title,$text='',$opt=array()){

		$title=str_replace('*','<span style="color:red;">*</span>',$title);

		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'TMP'=>'basic',
				'label_line1_class'=>'col-sm-2',
				'label_line2_class'=>'col-sm-10',
				'label_oneline_class'=>'col-sm-offset-2 col-sm-10',
				'class'=>'',
				'attr'=>'',
				'libload'=>'',
				'script'=>'',
				'helpblock'=>'',
				'before'=>'',
				'after'=>'',
				'title'=>'',
				'event'=>array(),
			),
			$opt
		);

		$id=$opt['id'];
		$title=(empty($opt['title']))?$title:$opt['title'];

		$initscript='';
		if (!empty($opt['libload'])){
			$initscript='<script>'.$opt['script'].'</script>';
		}
		if (!empty($opt['libload'])){
			global $themes;
			$themes->lib->add($opt['libload']);
		}

		$helpblock=(empty($opt['helpblock']))?'':'<span class="help-block">'.$opt['helpblock'].'</span>';

		$event='';
		foreach($opt['event'] as $k=>$v){
			$event='<script>$(function(){$("#'.$id.'").on("'.$k.'",'.$v.');});</script>';
		}

		$html_TMP='';
		if ($opt['TMP']=='basic'){
			$html_TMP=<<<CODE
$initscript
${opt['before']}
<div class="form-group">
	<label for="$id" class="${opt['label_line1_class']} control-label">$title</label>
	<div class="${opt['label_line2_class']} ${opt['class']}" ${opt['attr']}>

		$text
		$helpblock
		$event
	</div>
</div>
${opt['after']}
CODE;
		}elseif ($opt['TMP']=='one'){
			$html_TMP=<<<CODE
$initscript
${opt['before']}
<div class="form-group">
	<div class="${opt['label_oneline_class']} ${opt['class']}" ${opt['attr']}>
		$text
		$helpblock
		$event
	</div>
</div>
${opt['after']}
CODE;
		}elseif ($opt['TMP']=='none'){
			$html_TMP=<<<CODE
$initscript
${opt['before']}
$text
$helpblock
$event
${opt['after']}
CODE;
		}
	return $html_TMP;
	}
	static function make_labelswitch($title,$name,$checked=false,$val=array(),$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'event'=>array(),
				'label_opt'=>array(),
				'val'=>$val,
			),
			$opt
		);

		$id=$opt['id'];
		$opt2=$opt;
		unset($opt2['label_opt']);
		$htmls=self::make_switch($name,$checked,$opt2);



	return self::make_label($title,$htmls,$opt['label_opt']);
	}
	static function make_switch($name,$checked=false,$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'event'=>array(),
				'val'=>array(),
				'label_opt'=>array(
					'libload'=>'bootstrap-switch',
					'TMP'=>'none',
				),
			),
			$opt
		);

		$jsopt=array(
			'onText'=>'ON',
			'offText'=>'OFF',
			'onColor'=>'success',
			'offColor'=>'warning',
			'size'=>'small',
		);
		if (isset($opt['jsopt'])){
			$jsopt=array_merge($jsopt,$opt['jsopt']);
		}
		if (!empty($opt['val'])){
			if (isset($opt['val'][1])){
				$jsopt['onText']=$opt['val'][0];
				$jsopt['offText']=$opt['val'][1];
			}
		}


		$jsopt['state']=($checked)?true:false;
		$opt['label_opt']['libload']='bootstrap-switch';
		$opt['label_opt']['id']=$opt['id'];
		$opt['label_opt']['event']=(empty($opt['event']))?array():$opt['event'];
		$opt['label_opt']['helpblock']=(empty($opt['helpblock']))?array():$opt['helpblock'];
		$id=$opt['id'];

		$chk=($checked)?'checked="checked"':'';

		$optjson=json_encode($jsopt);
		$htmls=<<<CODE

    <input id="$id" type="checkbox" name="$name"  value="true" $chk/>
<script>
$(function(){
	$("#$id").bootstrapSwitch($optjson);
});
</script>
CODE;
	return self::make_label('',$htmls,$opt['label_opt']);
	}
	static function make_checkbox($title,$name,$valarray,$checkval='',$opt=array()){
		$opt=array_merge(
			array(
				'type'=>'checkbox',
				'divclass'=>'checkbox',
			),
			$opt
		);
		return self::make_radio($title,$name,$valarray,$checkval,$opt);
	}
	static function make_radio($title,$name,$valarray,$checkval='',$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'class'=>'',
				'jsopt'=>'',
				'type'=>'radio',
				'divclass'=>'radio',
				'label_opt'=>array(
					'libload'=>'icheck',
				),
			),
			$opt
		);
		$opt['label_opt']['libload']='icheck';
		$opt['label_opt']['id']=$opt['id'];
		$opt['label_opt']['event']=(empty($opt['event']))?array():$opt['event'];
		$opt['label_opt']['helpblock']=(empty($opt['helpblock']))?array():$opt['helpblock'];
		$id=$opt['id'];

		$rh='';
		foreach($valarray as $k=>$t){
			$checkvalarr=Func::strtoarr($checkval);
			$chk=(in_array($k,$checkvalarr))?'checked="checked"':'';

			$iremark='';
			if (is_array($t)){
				$iremark=isset($t['remark'])?'data-remark="'.$t['remark'].'"':'';
				$t=isset($t['title'])?$t['title']:$t['name'];
			}

			$rh.=<<<CODE
<div class="${opt['divclass']}">
  <label>
    <input type="${opt['type']}" class="${opt['class']}" name="$name" value="$k" $chk $iremark>
    $t
  </label>
</div>
CODE;
		}
		$htmls=<<<CODE
$rh
<script>
$(function(){
	$("input").iCheck({
		checkboxClass: "icheckbox_flat-blue",
		${opt['jsopt']}
		radioClass:"iradio_flat-blue"
	});
});
</script>
CODE;
		return self::make_label($title,$htmls,$opt['label_opt']);
	}
	static function make_select($title,$name,$valarray,$checkval='',$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'class'=>'',
				'jsopt'=>'width:"auto",',
				'search'=>false,

			),
			$opt
		);
		$opt['label_opt']['libload']='bootstrap-select';
		$opt['label_opt']['id']=$opt['id'];
		$opt['label_opt']['event']=(empty($opt['event']))?array():$opt['event'];
		$opt['label_opt']['helpblock']=(empty($opt['helpblock']))?array():$opt['helpblock'];
		$id=$opt['id'];

		$search=($opt['search'])?'liveSearch:true,liveSearchPlaceholder:"Search ...",':'';

		$ismobile=(ISAPP)?'true':'false';

		$rh='';
		foreach($valarray as $k=>$t){
		$chk=($checkval==$k)?'selected="selected"':'';

		$iremark='';
		if (is_array($t)){
			$iremark=isset($t['remark'])?'data-remark="'.$t['remark'].'"':'';
			$t=isset($t['title'])?$t['title']:$t['name'];
		}

		$rh.=<<<CODE
<option value="$k" $chk $iremark>$t</option>
CODE;
		}
		$htmls=<<<CODE
<select class="selectpicker ${opt['class']}" id="$id" name="$name" >
	$rh
</select>
<script>
$(function(){
	$("#$id").selectpicker({
		style:"btn-default",
		$search
		${opt['jsopt']}
		mobile:$ismobile,
		size: 8
	});
});
</script>
CODE;
		return self::make_label($title,$htmls,$opt['label_opt']);
	}
	static function make_textarea($title,$name,$default='',$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'class'=>'',
				'attr'=>'',
				'jsopt'=>'',
				'p'=>'',

			),
			$opt
		);
		$opt['label_opt']['id']=$opt['id'];
		$opt['label_opt']['event']=(empty($opt['event']))?array():$opt['event'];
		$opt['label_opt']['helpblock']=(empty($opt['helpblock']))?array():$opt['helpblock'];
		$id=$opt['id'];

		$placeholder=(empty($opt['p']))?str_replace('*','',$title):$opt['p'];

		$htmls=<<<CODE
		<textarea name="$name" class="form-control ${opt['class']}" id="$id" placeholder="$placeholder" ${opt['attr']} >$default</textarea>
CODE;
		return self::make_label($title,$htmls,$opt['label_opt']);
	}
	static function make_input($title,$name,$default='',$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'class'=>'',
				'attr'=>'',
				'jsopt'=>'',
				'type'=>'text',
				'p'=>'',

			),
			$opt
		);
		$opt['label_opt']['id']=$opt['id'];
		$opt['label_opt']['event']=(empty($opt['event']))?array():$opt['event'];
		$opt['label_opt']['helpblock']=(empty($opt['helpblock']))?array():$opt['helpblock'];
		$id=$opt['id'];

		$placeholder=(empty($opt['p']))?str_replace('*','',$title):$opt['p'];



		$htmls=<<<CODE
		<input type="${opt['type']}" class="form-control ${opt['class']}" name="$name" id="$id" placeholder="$placeholder" value="$default" ${opt['attr']} >
CODE;
		return self::make_label($title,$htmls,$opt['label_opt']);
	}
	static function make_button($title,$onclick='',$opt=array()){

		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'size'=>'',
				'c'=>'btn-default',
				'class'=>'',
				'attr'=>'',
				'is_href'=>false,
				'target'=>'_self',
				'type'=>'button',
				'label_opt'=>array(
					'libload'=>'',
					'TMP'=>'one',
				),
			),
			$opt
		);

		$titles=(is_array($title))?$title:array($title);
		$onclicks=(is_array($onclick))?$onclick:array($onclick);

		$htmls='';
		foreach($titles as $k=>$v){
			$id=$opt['id'].'_'.$k;

			$class=' '.$opt['size'].' '.$opt['c'].' ';
			if ($opt['is_href']){
				$ck=empty($onclicks[$k])?'':'href="'.$onclicks[$k].'"';
				$htmls.=<<<CODE
				<a id="$id" class="btn ${opt['class']} $class" $ck ${opt['attr']} ${opt['target']} type="${opt['type']}">$v</a>
CODE;
			}else{
				$ck=empty($onclicks[$k])?'':'onclick="'.$onclicks[$k].'"';
				$htmls.=<<<CODE
				<button id="$id" class="btn ${opt['class']} $class" $ck ${opt['attr']} type="${opt['type']}">$v</button>
CODE;
			}
		}

		return self::make_label('',$htmls,$opt['label_opt']);
	}
	static function header($title='',$small='',$targ='3'){//输出一个带格式的page标题
		if (empty($title)){
			global $pagehash;
			global $sidermenu;

			if ((!empty($pagehash))&&(!empty($sidermenu))){

				$title=$sidermenu->getbyhash($pagehash->hash,'title','');
			}
		}
		$small=empty($small)?'':'<small>'.$small.'</small>';
		return '<div class="page-header"><h'.$targ.'>'.$title.$small.'</h'.$targ.'></div>';
	}
	static function onlytitle(){//输出一个文本的page标题
			$title='';
			global $pagehash;
			global $sidermenu;
			if ((!empty($pagehash))&&(!empty($sidermenu))){
				$title=$sidermenu->getbyhash($pagehash->hash,'title','');
			}
		return $title;
	}
	static function error($msg){
		echo '<header class="page-header"><h1 class="page-title">'.$msg.'</h1></header>';
		die();
	}
	static function make_alert($msg,$opt=array()){
		$opt=array_merge(
			array(
				'id'=>uniqid(),
				'close'=>true,
				'type'=>'4',
				'class'=>'',

			),
			$opt
		);
		$button=($opt['close'])?'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>':'';

		switch ($opt['type']){
			case '1':
				$typeclass='success';
			break;
			case '2':
				$typeclass='info';
			break;
			case '3':
				$typeclass='warning';
			break;
			case '4':
				$typeclass='danger';
			break;
			default:
				$typeclass='danger';

		}

		$htmls=<<<CODE
		<div id="${opt['id']}" class="alert alert-$typeclass alert-dismissible ${opt['class']}" role="alert">$button
		$msg
</div>
CODE;
		return $htmls;
	}

}


?>
