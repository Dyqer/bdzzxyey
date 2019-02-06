<?php
/**************************************************
 功能：调用底部内容
 '**************************************************/
function bot(){
	$sql = "select * from ".lc()."_dibu where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		return str_replace("../","",$rows['lc_content']);
	}
}
/**************************************************
 功能：调用友情链接
 '**************************************************/
function links(){
	$sql = "select * from ".lc()."_dibu where lc_id=2";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		return str_replace("../","",$rows['lc_content']);
	}
}
/**************************************************
 功能：企业qq
 '**************************************************/
function qy_qq(){
	$sql = "select * from ".lc()."_dibu where lc_id=3";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		return str_replace("../","",$rows['lc_content']);
	}
}
/**************************************************
 功能：LOGO
 '**************************************************/
function get_logo(){
	$sql = "select * from ".lc()."_dibu where lc_id=5";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		return '<img src="'.str_replace("../","",$rows['lc_content']).'">';
	}
}

/**************************************************
 功能：点击量更新
 参数：$lc_id 所属编号
 	  $type  所属系统的类型
 	  $s_l   所属页面（判断是列表页面list，还是展示页面show）
描述：单页、新闻、图文、下载 运用
 '**************************************************/
function dianjiliang($lc_id,$type,$s_l){
	$str="";
	//单页
	if($type=="danye"){
		if($s_l=="show"){
			//更新点击量
			$sqlhits = "update ".lc()."_danye set lc_hits=lc_hits+1 where lc_id='{$lc_id}'";
			$rshits = mysql_query($sqlhits);
		}
		//获取点击量
		$sql = "select lc_hits from ".lc()."_danye where lc_id={$lc_id}";	
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str=$rows['lc_hits'];
		}
	}
	//新闻
	if($type=="news"){
		if($s_l=="show"){
			//更新点击量
			$sqlhits = "update ".lc()."_news set lc_hits=lc_hits+1 where lc_id='{$lc_id}'";
			$rshits = mysql_query($sqlhits);
		}
		//获取点击量
		$sql = "select lc_hits from ".lc()."_news where lc_id={$lc_id}";	
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str=$rows['lc_hits'];
		}
	}
	//图文
	if($type=="products"){
		if($s_l=="show"){
			//更新点击量
			$sqlhits = "update ".lc()."_products set lc_hits=lc_hits+1 where lc_id='{$lc_id}'";
			$rshits = mysql_query($sqlhits);
		}
		//获取点击量
		$sql = "select lc_hits from ".lc()."_products where lc_id={$lc_id}";	
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str=$rows['lc_hits'];
		}
	}
	//下载
	if($type=="down"){
		if($s_l=="show"){
			//更新点击量
			$sqlhits = "update ".lc()."_down set lc_hits=lc_hits+1 where lc_id='{$lc_id}'";
			$rshits = mysql_query($sqlhits);
		}
		//获取点击量
		$sql = "select lc_hits from ".lc()."_down where lc_id={$lc_id}";	
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str=$rows['lc_hits'];
		}
	}
	return $str;
}
?>