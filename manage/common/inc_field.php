<?php
/************************************************
 功能：获取《字段表》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> 栏目编号
 *************************************************/
function get_field_by_id($id,$col='lc_fieldname'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_customfields where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
//更新对应表字段
function update_field($field,$id){
	$sql = "select lc_table,lc_fieldname,lc_fieldtype,lc_fieldlong from ".lc()."_customfields where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows=mysql_fetch_assoc($rs);
	}
	//执行表更改
	$fieldsql = "alter table ".lc()."_{$rows['lc_table']} change {$field} {$rows['lc_fieldname']} ".$rows['lc_fieldtype']."(".$rows['lc_fieldlong'].") null";
	mysql_query($fieldsql);
}
function del_field($id){
	$sql = "select lc_table,lc_fieldname from ".lc()."_customfields where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows=mysql_fetch_assoc($rs);
	}
	//执行表更改
	$fieldsql = "alter table ".lc()."_{$rows['lc_table']} DROP {$rows['lc_fieldname']}";
	mysql_query($fieldsql);
}
function add_field($id){
	$sql = "select lc_table,lc_fieldtype,lc_fieldname,lc_fieldlong from ".lc()."_customfields where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows=mysql_fetch_assoc($rs);
	}
	//执行表更改
	$fieldsql = "alter table ".lc()."_{$rows['lc_table']} add {$rows['lc_fieldname']} ".$rows['lc_fieldtype']."(".$rows['lc_fieldlong'].") null";
	mysql_query($fieldsql);
}