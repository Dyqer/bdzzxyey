<?php
/*
 * LCMX 4.0 分页类
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
class page{
	var $page_name="page";
	var $next_page='下一页';
	var $pre_page='上一页';
	var $first_page='首页';
	var $last_page='尾页';
	var $pre_bar='<<';
	var $next_bar='>>';
	var $format_left='';
	var $format_right='';
	var $pagebarnum=12;
	var $totalpage=0;
	var $nowindex=1;
	var $url="";
	var $offset=0;
	var $rewrite = array();

	function page($array){
		if(is_array($array)){
			if(!array_key_exists('total',$array))$this->error(__FUNCTION__,'need a param of total');
			$total=intval($array['total']);
			$perpage=(array_key_exists('perpage',$array))?intval($array['perpage']):10;
			$nowindex=(array_key_exists('nowindex',$array))?intval($array['nowindex']):'';
			$url=(array_key_exists('url',$array))?$array['url']:'';
			$alias = (array_key_exists('alias', $array)) ? $array['alias'] : '';
			$id0 = (array_key_exists('id0', $array)) ? $array['id0'] : '';
		}else{
			$total=$array;
			$perpage=10;
			$nowindex='';
			$url='';
			$alias = '';
			$id0 = '';
		}

		if((!is_int($total))||($total<0))$this->error(__FUNCTION__,$total.' is not a positive integer!');
		if((!is_int($perpage))||($perpage<=0))$this->error(__FUNCTION__,$perpage.' is not a positive integer!');
		if(!empty($array['page_name']))$this->set('page_name',$array['page_name']);
		$this->_set_nowindex($nowindex);
		$this->_set_url($url);
		$this->totalpage=ceil($total/$perpage);
		$this->offset=($this->nowindex-1)*$perpage;
		$this->alias = $alias;
		$this->rewrite = array('alias'=>$alias,'id0'=>$id0);
	}

	function set($var,$value){
		if(in_array($var,get_object_vars($this)))
		$this->$var=$value;
		else {
			$this->error(__FUNCTION__,$var." does not belong to PB_Page!");
		}
	}
	function next_page($style=''){
		if($this->nowindex<$this->totalpage){
			return $this->_get_link($this->_get_url($this->nowindex+1),$this->next_page,$style);
		}
		return '<a class="'.$style.'">'.$this->next_page.'</a>';
	}
	function pre_page($style=''){
		if($this->nowindex>1){
			return $this->_get_link($this->_get_url($this->nowindex-1),$this->pre_page,$style);
		}
		return '<a class="'.$style.'">'.$this->pre_page.'</a>';
	}
	function first_page($style=''){
		if($this->nowindex==1){
			return '<a class="'.$style.'">'.$this->first_page.'</a>';
		}
		return $this->_get_link($this->_get_url(1),$this->first_page,$style);
	}
	function last_page($style=''){
		if($this->nowindex==$this->totalpage||$this->totalpage==0){
			return '<a class="'.$style.'">'.$this->last_page.'</a>';
		}
		return $this->_get_link($this->_get_url($this->totalpage),$this->last_page,$style);
	}
	function nowbar($style='',$nowindex_style=''){
		$plus=ceil($this->pagebarnum/2);
		if($this->pagebarnum-$plus+$this->nowindex>$this->totalpage)$plus=($this->pagebarnum-$this->totalpage+$this->nowindex);
		$begin=$this->nowindex-$plus+1;
		$begin=($begin>=1)?$begin:1;
		$return='';
		for($i=$begin;$i<$begin+$this->pagebarnum;$i++){
			if($i<=$this->totalpage){
				if($i!=$this->nowindex)
				$return.=$this->_get_text($this->_get_link($this->_get_url($i),$i,$style));
				else
				$return.=$this->_get_text('<a class="'.$nowindex_style.'">'.$i.'</a>');
			}else{
				break;
			}
			$return.="\n";
		}
		unset($begin);
		return $return;
	}
	/**
	 * 获取显示跳转按钮的代码
	 * @return string
	 */
	function select(){
		$return='<select name="PB_Page_Select">';
		for($i=1;$i<=$this->totalpage;$i++){
			if($i==$this->nowindex){
				$return.='<option value="'.$i.'" selected>'.$i.'</option>';
			}else{
				$return.='<option value="'.$i.'">'.$i.'</option>';
			}
		}
		unset($i);
		$return.='</select>';
		return $return;
	}
	/**
	 * 获取mysql 语句中limit需要的值
	 * @return string
	 */
	function offset(){
		return $this->offset;
	}
	/**
	 * 控制分页显示风格（你可以增加相应的风格）
	 * @param int $mode
	 * @return string
	 */
	function show($mode=1){
		switch ($mode){
			case '1':
				$this->next_page='下一页';
				$this->pre_page='上一页';
				return $this->pre_page().$this->nowbar().$this->next_page().'第'.$this->select().'页';
				break;
			case '2':
				$this->next_page='下一页';
				$this->pre_page='上一页';
				$this->first_page='首页';
				$this->last_page='尾页';
				return $this->first_page().$this->pre_page().'[第'.$this->nowindex.'页]'.$this->next_page().$this->last_page().'第'.$this->select().'页';
				break;
			case '3':
				$this->next_page='下一页';
				$this->pre_page='上一页';
				$this->first_page='首页';
				$this->last_page='尾页';
				return $this->first_page()."".$this->pre_page()."".$this->nowbar("","select")."".$this->next_page()."".$this->last_page()."<div class=\"clear\"></div>";
				break;
			case '4':
				$this->next_page='下一页';
				$this->pre_page='上一页';
				return $this->pre_page().$this->nowbar().$this->next_page();
				break;
			case '5':
				return $this->pre_bar().$this->pre_page().$this->nowbar().$this->next_page().$this->next_bar();
				break;
			case '6':
				$this->next_page='下一页';
				$this->pre_page='上一页';
				$this->first_page='首页';
				$this->last_page='尾页';
				return $this->first_page("syy","xyy")."".$this->pre_page("syy","xyy")."".$this->nowbar("ads","abc")."".$this->next_page("syy","xyy")."".$this->last_page("syy","xyy")."<div class=\"clear\"></div>";
				break;
		}
	}
	function _set_url($url=""){
		if(!empty($url)){
			$this->url=$url.((stristr($url,'?'))?'&':'?').$this->page_name."=";
		}else{
			if(empty($_SERVER['QUERY_STRING'])){
				$this->url=$this->request_url()."?".$this->page_name."=";
			}else{
				if(stristr($_SERVER['QUERY_STRING'],$this->page_name.'=')){
					$this->url=str_replace($this->page_name.'='.$this->nowindex,'',$this->request_url());
					$last=$this->url[strlen($this->url)-1];
					if($last=='?'||$last=='&'){
						$this->url.=$this->page_name."=";
					}else{
						$this->url.='&'.$this->page_name."=";
					}
				}else{
					$this->url=$this->request_url().'&'.$this->page_name.'=';
				}
			}
		}
	}
	function _set_nowindex($nowindex){
		if(empty($nowindex)){
			if(isset($_GET[$this->page_name])){
				$this->nowindex=intval($_GET[$this->page_name]);
			}
		}else{
			$this->nowindex=intval($nowindex);
		}
	}
	function _get_url($pageno=1){
		if ($this->alias){
			$arr = $this->rewrite;
			return url_rewrite($arr['alias'], array('id0'=>$arr['id0'],'page'=>$pageno,'totalpage'=>$this->totalpage));
		}else{
			return $this->url.$pageno;
		}
	}
	function _get_text($str){
		return $this->format_left.$str.$this->format_right;
	}
	function _get_link($url,$text,$style=''){
		$style=(empty($style))?'':'class="'.$style.'"';
		return '<a '.$style.' href="'.$url.'">'.$text.'</a>';
	}
	function error($function,$errormsg){
		die('Error in file <b>'.__FILE__.'</b> ,Function <b>'.$function.'()</b> :'.$errormsg);
	}
	function request_url(){
		if (isset($_SERVER['REQUEST_URI'])){
			$url = $_SERVER['REQUEST_URI'];
		}else{
			if (isset($_SERVER['argv'])){
				$url = $_SERVER['PHP_SELF'] .'?'. $_SERVER['argv'][0];
			}else{
				$url = $_SERVER['PHP_SELF'] .'?'.$_SERVER['QUERY_STRING'];
			}
		}
		return $url;
	}
}
?>