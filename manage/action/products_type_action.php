<?php
/*图文分类添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//图文分类所属栏目
$title = isset($_POST['c_title'])?escape_str($_POST['c_title']):null;
$c_pid = isset($_POST['c_pid'])?(int)$_POST['c_pid']:null;//图文分类所属父id
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//图文分类编号

if($title){
	if($action == 'add'){
		$sql = "insert into ".$lc."_products_type(c_title,c_pid,c_content,c_datetime,lanmu) values ('{$title}',{$c_pid},'{$content}',NOW(),{$lanmu})";
		$rs = mysql_query($sql);

		if($rs){

			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select c_sort_id from ".$lc."_products_type order by c_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_products_type set c_sort_id=".($rows['c_sort_id']+1)." order by c_id desc LIMIT 1";
				mysql_query($sql2);
			}else{
				$sql = "update ".$lc."_products_type set c_sort_id=c_id order by c_id desc LIMIT 1";
				mysql_query($sql);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../products_type_add.php?lanmu={$lanmu}&c_pid={$c_pid}");
		}else{
			mx_msg("添加失败！",1);
		}
	}elseif ($action == 'edit' && $id){
		
		$sql = "update ".$lc."_products_type set ";
		$sql.= " c_title='{$title}',";
		$sql.= "c_pid='{$c_pid}',";
		$sql.= "c_content='{$content}'";
		$sql.= " where c_id = '{$id}'";
		
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("修改成功！","../products_type_edit.php?lanmu={$lanmu}&id={$id}");
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