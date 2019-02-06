<?php
/*banner分类添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$type = isset($_POST['type'])?(int)$_POST['type']:0;//分类所属类型（banner和广告图）
$title = isset($_POST['c_title'])?escape_str($_POST['c_title']):null;
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//分类编号

if($title){
	if($action=='add'){
		$sql = "insert into ".$lc."_banner_type(c_title,c_content,c_datetime,c_type) values ('{$title}','{$content}',NOW(),'{$type}')";
		$rs = mysql_query($sql);
		if($rs){
			
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select c_sort_id from ".$lc."_banner_type order by c_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_banner_type set c_sort_id=".($rows['c_sort_id']+1)." order by c_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_banner_type set c_sort_id=c_id order by c_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/
				
			mx_msg("添加成功！","../banner_type_add.php?type={$type}");
		}else{
			mx_msg("添加失败！",1);
		}
	}elseif ($action=='edit' && $id){
		$sql = "update ".$lc."_banner_type set ";
		$sql.=" c_title='{$title}',";
		$sql.="c_content='{$content}'";
		$sql.=" where c_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			mx_msg("修改成功！","../banner_type_edit.php?id={$id}");
		}else{
			mx_msg("修改失败！",1);
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("标题不能为空！",1);
}
?>