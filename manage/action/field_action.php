<?php
/*自定义字段 添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$fieldtitle = isset($_POST['fieldtitle'])?escape_str($_POST['fieldtitle']):null;
$tablename = isset($_POST['tablename'])?escape_str($_POST['tablename']):null;
$fieldtype = isset($_POST['fieldtype'])?escape_str($_POST['fieldtype']):null;
$fieldlong = isset($_POST['fieldlong']) && (int)$_POST['fieldlong']!=0?(int)$_POST['fieldlong']:100;
$fieldnotes = isset($_POST['fieldnotes'])?escape_str($_POST['fieldnotes']):null;
$zt = isset($_POST['zt'])?(int)$_POST['zt']:0;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($fieldtitle){
	if($action == 'add'){
		//添加
		$sql = "insert into ".$lc."_customfields(lc_fieldname,lc_fieldtype,lc_fieldlong,lc_fieldnotes,lc_zt,lc_table)
	values ('{$fieldtitle}','{$fieldtype}','{$fieldlong}','{$fieldnotes}','{$zt}','{$tablename}')";

		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			//执行表更改
			$fieldsql = "ALTER TABLE ".lc()."_{$tablename} ADD COLUMN {$fieldtitle} {$fieldtype}";
			if($fieldtype !== 'text' && $fieldtype !== 'mediumtext' && $fieldtype !== 'datetime'){
				$fieldsql.= '('.$fieldlong.')';
			}
			$fieldsql.= ' NULL';
			mysql_query($fieldsql);
			mx_msg("添加成功！","../field_add.php");
		}else{
			mx_msg("添加失败！",1);
		}
	}elseif ($action == 'edit'){
		//修改
		$sql1 = "select * from ".lc()."_customfields where lc_id='{$id}'";
		$rs1 = mysql_query($sql1);
		if($rs1){
			$rows1=mysql_fetch_assoc($rs1);
		}
		$oldfield = $rows1['lc_fieldname'];//获取以前的字段名

		$sql = "update ".$lc."_customfields set ";
		$sql.= "lc_fieldname='{$fieldtitle}',";
		$sql.= "lc_fieldtype='{$fieldtype}',";
		$sql.= "lc_fieldlong='{$fieldlong}',";
		$sql.= "lc_fieldnotes='{$fieldnotes}',";
		$sql.= "lc_zt='{$zt}',";
		$sql.= "lc_table='{$tablename}',";
		$sql.= " where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("修改成功！","../field_edit.php?id={$id}");
			//执行表更改
			$fieldsql = "alter table ".lc()."_{$rows1['lc_table']} change {$oldfield} {$fieldtitle} ".$fieldtype;
			if($fieldtype !== 'text' && $fieldtype !== 'mediumtext' && $fieldtype !== 'datetime'){
				$fieldsql.= '('.$fieldlong.')';
			}
			$fieldsql.= ' NULL';
			mysql_query($fieldsql);
		}else{
			mx_msg("修改失败！",1);
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("字段名不能为空！",1);
}