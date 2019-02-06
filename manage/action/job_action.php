<?php
/*职位添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;
$num = isset($_POST['lc_num'])?(int)$_POST['lc_num']:0;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//图文分类编号

if($title){
	if($action == 'add'){
		$sql = "insert into ".$lc."_job(lc_title,lc_content,lc_num,lc_datetime) values ('{$title}','{$content}','{$num}',NOW())";
		$rs = mysql_query($sql);
		if($rs){
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_job order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_job set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_job set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../job_add.php");
		}else{
			mx_msg("添加失败！",1);
		}
	}elseif ($action == 'edit' && $id){
		$sql = "update ".$lc."_job set ";
		$sql.= " lc_title='{$title}',";
		$sql.= "lc_content='{$content}',";
		$sql.= "lc_num='{$num}'";
		$sql.= " where lc_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("修改成功！","../job_edit.php?id={$id}");
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