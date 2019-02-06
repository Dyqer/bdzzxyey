<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$action = isset($_POST['action'])?$_POST['action']:null;

$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//标题
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;//内容
$num = isset($_POST['lc_num'])?(int)$_POST['lc_num']:0;//招聘人数

$id = isset($_POST['id'])?(int)$_POST['id']:0;

if($title){
	if($action == 'add'){
		$sql = "insert into ".$lc."_job(lc_title,lc_content,lc_num,lc_datetime) values ('{$title}','{$content}','{$num}',NOW())";
		$rs = mysql_query($sql);
		if($rs){

			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_job order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows = mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_job set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_job set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_wap_msg("添加成功！","job_add.php");
		}else{
			mx_wap_msg("添加失败！",1);
		}
	}elseif ($action == 'edit'){
		$sql = "update ".$lc."_job set lc_title='{$title}',";
		$sql.= "lc_content='{$content}',";
		$sql.= "lc_num='{$num}'";
		$sql = $sql." where lc_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs){
			mx_wap_msg("修改成功！","job_edit.php?id={$id}");
		}else{
			mx_wap_msg("修改失败！",1);
		}
	}
}else{
	mx_wap_msg("标题不能为空！",1);
}
?>