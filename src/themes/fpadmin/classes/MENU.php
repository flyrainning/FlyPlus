<?php
/**
 * MENU class
 */
class MENU
{
  private $settings;
  public $list;

  function __construct($id="1")
  {
    $this->settings=new Settings();
    $this->list=$this->settings->get("menu.$id");


    global $config;
    $m=$config->get('menu');
    print_r($m);

    print_r($this->list);
  }
  function siderhtmlone($menu,$l=1){
		$html='';
		$l=$l+1;

		foreach($menu as $v){
			$name=empty($v['name'])?'':$v['name'];
			$iconcss=isset($v['iconcss'])?'<i class="fa-fw '.$v['iconcss'].'" ></i>':'';
			$href=isset($v['href'])?$v['href']:'#';
			$href=($href=='??')?'??'.$v['name']:$href;
			$target=empty($v['target'])?'':'target="'.$v['target'].'"';
			$title=$v['title'];

			$level='';
			if ($l==2) $level='nav-second-level';
			if ($l==3) $level='nav-third-level';

			if (empty($v['type'])) continue;
			if ($v['type']=='label'){
				if (empty($v['item'])) continue;
				$rhtml=$this->siderhtmlone($v['submenu'],$l);
				if (empty($rhtml)) continue;

				$html.='<li><a href="'.$href.'" '.$target.' >'.$iconcss.' '.$title.'<span class="fa arrow"></span></a>';
				$html.='<ul class="nav '.$level.'">'.$rhtml.'</ul></li>';

			}elseif($v['type']=='menu'){
				if (in_array($name, $this->vlist)){
					$html.='<li><a href="'.$href.'" '.$target.' >'.$iconcss.' '.$title.'</a></li>';
				}

			}



		}
		return $html;

	}

}

 ?>
