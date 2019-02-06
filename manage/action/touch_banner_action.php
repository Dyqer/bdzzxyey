<?php
/*下载添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//手机banner名称
$url = isset($_POST['lc_url'])?escape_str($_POST['lc_url']):null;//手机banner外链

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($title){
	if($action == 'add'){
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
		$sql = "insert into ".lc()."_touch_banner(lc_title,lc_pic,lc_url,lc_datetime) values ('{$title}','{$pic}','{$url}',NOW())";
		$rs = mysql_query($sql);
		if($rs){
			mx_msg("添加成功！","../touch_banner_add.php");
		}else{
			mx_msg("添加失败！",1);

			/*未添加成功 删除保存的图片*/
			if(file_exists("../".$pic)){
				unlink("../".$pic);
			}
		}
	}elseif ($action == 'edit'){

		$sql = "update ".$lc."_touch_banner set ";
		$sql.= " lc_title='{$title}',";

		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$pic = $up->ph_name;
			$sql = $sql."lc_pic='{$pic}',";
		}
		$sql = $sql."lc_url='{$url}'";
		$sql = $sql." where lc_id='{$id}'";
		
		$rs = mysql_query($sql);
		if($rs){
			mx_msg("修改成功！","../touch_banner_edit.php?id={$id}");
			
		}else{
			mx_msg("修改失败！",1);
			
			/*未添加成功 删除保存的图片*/
			if(file_exists("../".$pic)){
				unlink("../".$pic);
			}
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("标题不能为空！",1);
}
?>