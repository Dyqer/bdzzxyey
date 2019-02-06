<?php
/************************************************
 功能：根据类别编号获取类别名称
 参数：$c_type：栏目类别号(0、单页系统1、文章系统2、图文系统3、下载系统4、招聘系统5、留言系统)
 *************************************************/
function get_lanmu_title($c_type){
	switch ($c_type) {
		case 0:
			$title = "单页系统";
			break;
		case 1:
			$title = "文章系统";
			break;
		case 2:
			$title = "图文系统";
			break;
		case 3:
			$title = "下载系统";
			break;
		case 4:
			$title = "招聘系统";
			break;
		case 5:
			$title = "留言系统";
			break;
	}
	return $title;
}
/************************************************
 功能：根据栏目编号获取该栏目名称
 参数：$lanmu：类别编号
 *************************************************/
function get_lanmu_name($lanmu){
	$sql = "select c_title from ".lc()."_lanmu where c_id='{$lanmu}'";
	$rs = mysql_query($sql);
	$title = "";
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['c_title'];
	}
	return $title;
}
/************************************************
 功能：根据栏目编号获取该手机栏目名称
 参数：$lanmu：类别编号
 ************************************************/
function get_lanmu_name_touch($lanmu){
	$sql = "select c_phone_name from ".lc()."_lanmu where c_id='{$lanmu}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['c_phone_name'];
	}else{
		$title = "";
	}
	return $title;
}
/************************************************
 功能：根据栏目类型获取一个栏目值
 参数：$type{栏目类别:0单页1文章2图文3下载4招聘5留言}
 ************************************************/
function get_lanmu_by_type($type){
	$lanmu=0;
	$sql = "select c_id from ".lc()."_lanmu where c_type='{$type}' limit 1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu=$rows['c_id'];
	}
	return $lanmu;
}
/************************************************
 功能：根据栏目id获取类型
 参数：$type{栏目类别:0单页1文章2图文3下载4招聘5留言}
 ************************************************/
function get_type_by_lanmu($lanmu){
	$type="";
	$sql = "select c_type from ".lc()."_lanmu where c_id='{$lanmu}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$type=$rows['c_type'];
	}
	return $type;
}
?>