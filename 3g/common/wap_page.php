<?php
/**************************************************
 * Touch 翻页类
 功能：列表分类类
 **************************************************/
class wapPageClass{
	private $myde_count;      	 //总记录数
	var $myde_size;				//每页记录数
	private $myde_page;        	//当前页
	private $myde_page_count;  	//总页数
	private $page_url;         //页面url
	private $page_i;           //起始页
	private $page_ub;          //结束页
	var $page_limit;

	function __construct($myde_count=0, $myde_size=1, $myde_page=1,$page_url){
		//构造函数
		$this -> myde_count = $this -> numeric($myde_count);
		$this -> myde_size  = $this -> numeric($myde_size);
		$this -> myde_page  = $this -> numeric($myde_page);
		$this -> page_limit = ($this -> myde_page * $this -> myde_size) - $this -> myde_size;
		$this -> page_url   = $page_url;
		if($this -> myde_page < 1) $this -> myde_page =1;
		if($this -> myde_count < 0) $this -> myde_page =0;
		$this -> myde_page_count  = ceil($this -> myde_count/$this -> myde_size);
		if($this -> myde_page_count < 1) $this -> myde_page_count = 1;
		if($this -> myde_page > $this -> myde_page_count) $this -> myde_page = $this -> myde_page_count;
		$this -> page_i = $this -> myde_page - 2;
		$this -> page_ub = $this -> myde_page + 2;

		if($this -> page_i < 1){
			$this -> page_ub = $this -> page_ub + (1 - $this -> page_i);
			$this -> page_i = 1;
		}

		if($this -> page_ub > $this -> myde_page_count){
			$this -> page_i = $this -> page_i - ($this -> page_ub - $this -> myde_page_count);
			$this -> page_ub = $this -> myde_page_count;
			if($this -> page_i < 1) $this -> page_i = 1;
		}
	}
	private function numeric($id){
		//判断是否为数字
		if (strlen($id)){
			if (!ereg("^[0-9]+$",$id)){
				$id = 1;
			}else{
				$id = substr($id,0,11);
			}
		}else{
			$id = 1;
		}
		return $id;
	}

	private function page_replace($page){
		//地址替换
		return str_replace("{page}", $page, $this -> page_url);
	}
	private function myde_home(){
		//首页
		if($this -> myde_page != 1){
			return "<a href=\"".$this -> page_replace(1)."\"  title=\"首页\" >首页</a>\n";
		}else{
			return "<a>首页</a>\n";
		}
	}
	private function myde_prev(){
		//上一页
		if($this -> myde_page != 1){
			return "<a href=\"".$this -> page_replace($this->myde_page-1) ."\"  title=\"上一页\" >上一页</a>\n";
		}else{
			return "<a>上一页</a>\n";
		}
	}

	private function myde_next(){
		//下一页
		if($this -> myde_page != $this -> myde_page_count){
			return "<a href=\"".$this -> page_replace($this->myde_page+1) ."\"  title=\"下一页\" >下一页</a>\n";
		}else{
			return "<a>下一页</a>\n";
		}
	}

	private function myde_last(){
		//尾页
		if($this -> myde_page != $this -> myde_page_count){
			return "<a href=\"".$this -> page_replace($this -> myde_page_count)."\"  title=\"尾页\" >尾页</a>\n";
		}else{
			return "<a>尾页</a>\n";
		}
	}

	function myde_write($id='page'){
		//输出
		$str .= $this -> myde_home();
		for($page_for_i = $this -> page_i;$page_for_i <= $this -> page_ub; $page_for_i++){
			if($this -> myde_page == $page_for_i){
				$str .= "<a>".$page_for_i."</a>\n";
			}else{
				$str .= "<a href=\"".$this -> page_replace($page_for_i)."\" title=\"第".$page_for_i."页\">";

				$str .= $page_for_i . "</a>\n";

			}
		}
		$str .= $this -> myde_last();
		return $str;
	}
}
?>