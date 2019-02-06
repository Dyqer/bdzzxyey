<?php
/************************************************
 功能：获取一个友情链接 分类的id值
 *************************************************/
function get_friendlink_type_cid(){
	$c_id=0;
	$sql = "select c_id from ".lc()."_friendlink_type limit 1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$c_id = $rows['c_id'];
	}
	return $c_id;
}
/**************************************************
 功能：通过友情链接编号id删除其对应的图片
 参数：$id -> 友情链接编号
 '**************************************************/
function del_friendlinkpic_by_id($id){
	$sql="select lc_pic from ".lc()."_friendlink where lc_id='{$id}'";
	$rs=mysql_query($sql);
	if($rs && mysql_num_rows($rs)>0){
		$rows = mysql_fetch_assoc($rs);
		//判断图片是否存在并删除
		if(file_exists(LC_MX_M.$rows['lc_pic'])){
			unlink(LC_MX_M.$rows['lc_pic']);
		}
	}
}
/************************************************
 功能：获取《友情链接分类》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> 友情链接编号
 *************************************************/
function get_friendlinktype_by_id($id,$col='c_title'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_friendlink_type where c_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
?>