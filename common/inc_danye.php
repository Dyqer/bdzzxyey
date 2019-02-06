<?php
/************************************************
 功能：根据编号获取该单页名称
 参数：$lcid：类别编号
 *************************************************/
function get_danye_title($lcid){
	$sql = "select lc_title from ".lc()."_danye where lc_id={$lcid}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['lc_title'];
	}else{
		$title = "";
	}
	return $title;
}

/************************************************
 功能：根据单页编号获取该类别栏目编号
 参数： $lcid：类别编号
 *************************************************/
function get_danye_lanmu_by_lc_id($id){
	$sql = "select lanmu from ".lc()."_danye where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu = $rows['lanmu'];
	}else{
		$lanmu = 0;
	}
	return $lanmu;
}
?>