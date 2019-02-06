<?php
/************************************************
 功能：根据单页编号获取该类别栏目编号
 参数： $id -> 单页编号
 *************************************************/
function get_danye_lanmu_by_id($id){
	$lanmu = 0;
	$sql = "select lanmu from ".lc()."_danye where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu = $rows['lanmu'];
	}
	return $lanmu;
}
?>