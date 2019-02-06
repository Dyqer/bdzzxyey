<?php
/*LOGO 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

if($_FILES['logo_url']['name']<>""){
	$up = new upphoto(LC_MX_M);
	$up->get_ph_tmpname($_FILES['logo_url']['tmp_name']);
	$up->get_ph_type($_FILES['logo_url']['type']);
	$up->get_ph_size($_FILES['logo_url']['size']);
	$up->get_ph_name($_FILES['logo_url']['name']);
	$up->save();
	$logo_url=$up->ph_name;

	$sql = "update ".lc()."_dibu set lc_content='{$logo_url}' where lc_id=5";
	$rs = mysql_query($sql);
	if( $rs && mysql_affected_rows()>0){
		mx_msg("修改成功！","../list.php?C=logo_edit");
	}else{
		mx_msg("修改失败！",1);
		
		//删除未保存成功的logo
		if(file_exists($logo_url)){
			unlink($logo_url);
		}
	}
}else{
	mx_msg("亲，请重新选择LOGO图片！","../list.php?C=logo_edit");
}