<?php
/************************************************
 功能：获取一个banner分类的id值
 参数：$type -> 类型（banner或者广告图）
 *************************************************/
function get_banner_type_cid($type){
	$c_id=0;
	$sql = "select c_id from ".lc()."_banner_type where c_type='{$type}' limit 1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$c_id = $rows['c_id'];
	}
	return $c_id;
}
/************************************************
 功能：获取《banner分类》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> banner编号
 *************************************************/
function get_bannertype_by_id($id,$col='c_title'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_banner_type where c_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
/**************************************************
 功能：通过Banner编号id删除其对应的图片
 参数：$id -> Banner编号
 '**************************************************/
function del_pic_by_bannerid($id){
	$sql="select lc_pic from ".lc()."_banner where lc_id='{$id}'";
	$rs=mysql_query($sql);
	if($rs && mysql_num_rows($rs)>0){
		$rows = mysql_fetch_assoc($rs);
		//判断图片是否存在并删除
		if(file_exists(LC_MX_M.$rows['lc_pic'])){
			unlink(LC_MX_M.$rows['lc_pic']);
		}
	}
}
?>