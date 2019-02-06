<?php
/*单页添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证
require(LC_MX."Lib/upload.php");//加载图片上传类
$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//单页所属栏目
$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title'],false):null;//标题
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content'],false):null;
$phone_content = isset($_POST['lc_phone_content'])?escape_str($_POST['lc_phone_content']):null;//手机版
$url = isset($_POST['lc_url'])?escape_str($_POST['lc_url']):null;//外部链接
$zt = isset($_POST['lc_zt'])?(int)$_POST['lc_zt']:0;
$phone = isset($_POST['lc_phone'])?(int)$_POST['lc_phone']:0;
$cant_del = isset($_POST['lc_cant_del'])?(int)$_POST['lc_cant_del']:0;
$yc = isset($_POST['lc_yc'])?(int)$_POST['lc_yc']:0;//是否保存远程图片
$keywords = isset($_POST['lc_keywords'])?escape_str($_POST['lc_keywords']):null;//关键词
$description = isset($_POST['lc_description'])?escape_str($_POST['lc_description']):null;//描述

$field_res = customfields_action('danye',$action);//自定义字段处理结果集

$id = isset($_POST['id'])?(int)$_POST['id']:0;//单页编号

if($title){
	if($action == 'add'){
		/*保存远程图片*/
		if($yc==1){
			$content = yuancheng($content);
		}
		/*保存远程图片End*/

		/*是否同步手机内容*/
		if(!$phone_content){
			if($phone==1){
				$phone_content=glhtml($content);//如果手机版内容为空，把手机版同步
			}else{
				$phone_content="";
			}
		}
		
		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$pic = $up->ph_name;
		}else{
			$pic = "";
		}
		
		
		/*是否同步手机内容*/
		$sql = "insert into ".$lc."_danye(lc_title,lc_content,lc_phone_content,lc_zt,lc_phone,lc_cant_del,lanmu,lc_url,lc_keywords,lc_pic,lc_description {$field_res['f_str']})
	values ('{$title}','{$content}','{$phone_content}','{$zt}','{$phone}','{$cant_del}','{$lanmu}','{$url}','{$keywords}','{$pic}','{$description}' {$field_res['fv_str']})";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){

			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_danye order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_danye set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_danye set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../danye_add.php?lanmu=".$lanmu);
		}else{
			mx_msg("添加失败！",1);
		}
	}elseif ($action == 'edit' && $id){
		/*保存远程图片*/
		if($yc==1){
			$content = yuancheng($content);
		}
		/*保存远程图片End*/
		$sql = "update ".$lc."_danye set ";
		$sql.= " lc_title='{$title}',";
		
		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$sql.= "lc_pic = '{$up->ph_name}',";
		}
		
		$sql.= "lc_url='{$url}',";
		$sql.= "lc_keywords='{$keywords}',";
		$sql.= "lc_description='{$description}',";
		$sql.= "lc_content='{$content}',";
		$sql.= "lc_phone_content='{$phone_content}',";
		$sql.= "lc_zt={$zt},";
		$sql.= "lc_phone={$phone},";
		$sql.= "lc_cant_del={$cant_del}";
		$sql.= $field_res['up_str']." where lc_id={$id}";

		$rs = mysql_query($sql);

		if($rs){
			mx_msg("修改成功！","../danye_edit.php?id=".$id);
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