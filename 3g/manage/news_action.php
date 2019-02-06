<?php
require (dirname(__FILE__)."/common/common.php");

require(LC_MX."Lib/upload.php");//加载图片上传类

wap_admin_check_login();//登录验证

$action = isset($_POST['action'])?$_POST['action']:null;

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//所属栏目
$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//标题
$from = isset($_POST['lc_from'])?escape_str($_POST['lc_from']):null;//来源
$c_id = isset($_POST['c_id'])?escape_str($_POST['c_id']):null;//分类
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;//pc版内容
$phone_content = isset($_POST['lc_phone_content'])?escape_str($_POST['lc_phone_content']):null;//手机版

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号
$type = isset($_POST['type'])?(string)$_POST['type']:null;//修改类型（touch和pc）
$content = isset($_POST['content'])?escape_str($_POST['content']):null;

if($title){

	if($action == 'add'){

		$pic = "";
		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_3G);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$pic = $up->ph_name;
		}

		$sql = "insert into ".$lc."_news (lc_title,lc_pic,lc_content,lc_phone_content,lc_from,lc_datetime,c_id)
		values ('{$title}','{$pic}','{$content}','{$phone_content}','{$from}',NOW(),'{$c_id}')";
		$rs = mysql_query($sql);
		if($rs){
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_news order by lc_sort_id desc LIMIT 1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_news set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_news set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_wap_msg("添加成功！","news_add.php?lanmu={$lanmu}");
		}else{
			mx_wap_msg("添加失败，请检查！",1);
		}
	}elseif ($action == 'edit'){
		$sql = "update ".$lc."_news set lc_title = '{$title}',";
		
		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_3G);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$sql.= "lc_pic = '{$up->ph_name}',";
		}
		if($type=="pc"){
			$sql.="lc_content = '{$content}',";
		}elseif($type=="touch"){
			$sql.="lc_phone_content = '{$content}',";
		}
		$sql = $sql."lc_from = '{$from}',";
		$sql = $sql."c_id = '{$c_id}'";
		$sql = $sql." where lc_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs){
			mx_wap_msg("修改成功！","news_edit.php?lanmu={$lanmu}&type={$type}&id={$id}");
		}else{
			mx_wap_msg("修改失败！",1);
		}
	}else{
		mx_wap_msg("请求参数错误！",1);
	}
}else{
	mx_wap_msg("标题不能为空！",1);
}
?>