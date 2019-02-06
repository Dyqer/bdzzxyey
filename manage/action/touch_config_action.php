<?php
/*下载添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$logo_name = isset($_POST['logo_name'])?escape_str($_POST['logo_name']):null;//手机logo名称
$name = isset($_POST['touch_name'])?escape_str($_POST['touch_name']):null;//手机网站名称
$url = isset($_POST['touch_url'])?escape_str($_POST['touch_url']):null;//路径
$keywords = isset($_POST['touch_keywords'])?escape_str($_POST['touch_keywords']):null;//手机网站关键词
$description = isset($_POST['touch_description'])?escape_str($_POST['touch_description']):null;//手机网站描述

$tel = isset($_POST['touch_tel'])?escape_str($_POST['touch_tel']):null;//手机网站电话号码
$msg = isset($_POST['touch_duanxin'])?escape_str($_POST['touch_duanxin']):null;//手机网站短信

$lng = isset($_POST['touch_lng'])?escape_str($_POST['touch_lng']):null;//手机网站经度
$lat = isset($_POST['touch_lat'])?escape_str($_POST['touch_lat']):null;//手机网站纬度
$mapdizhi = isset($_POST['touch_mapdizhi'])?escape_str($_POST['touch_mapdizhi']):null;//手机网站地图地址
if($_FILES['logo_url']['name']<>""){
	$up = new upphoto(LC_MX_M);
	$up->get_ph_tmpname($_FILES['logo_url']['tmp_name']);
	$up->get_ph_type($_FILES['logo_url']['type']);
	$up->get_ph_size($_FILES['logo_url']['size']);
	$up->get_ph_name($_FILES['logo_url']['name']);
	$up->save();
	$pic= $up->ph_name;
	$logo_sql = ",logo_url='{$pic}'";
}else {
	$logo_sql="";
}

$sql = "update ".lc()."_touch set logo_name='{$logo_name}',
		touch_name='{$name}',
		touch_url='{$url}',
		touch_keywords='{$keywords}',
		touch_description='{$description}',
		touch_tel='{$tel}',
		touch_duanxin='{$msg}',
		touch_lng='{$lng}',
		touch_lat='{$lat}',
		touch_mapdizhi='{$mapdizhi}',
		datatime=NOW()".$logo_sql." where id=1";

$rs = mysql_query($sql);
if( $rs && mysql_affected_rows()>0){
	mx_msg("修改成功！","../list.php?C=touchconfig");
}else{
	mx_msg("修改失败！",1);
	
	/*未添加成功 删除保存的图片*/
	if(file_exists("../".$pic)){
		unlink("../".$pic);
	}
}