<?php
/*导航添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$lc_title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$lc_link_url = isset($_POST['lc_link_url'])?escape_str($_POST['lc_link_url']):null;
$lc_rwlink_url = isset($_POST['lc_rwlink_url'])?escape_str($_POST['lc_rwlink_url']):null;
$lc_target = isset($_POST['lc_target'])?escape_str($_POST['lc_target']):null;
$lc_content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;
$lc_zt = isset($_POST['lc_zt'])?escape_str($_POST['lc_zt']):1;
$pid = isset($_POST['pid'])?(int)$_POST['pid']:0;//默认为主导航(pid=0)
$lc_pic = "";

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($action == 'add'){
	if($lc_title && $lc_link_url){
		//导航图片保存
		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$lc_pic = $up->ph_name;
		}
		$sql = "insert into ".$lc."_navigation(lc_title,lc_parent_id,lc_link_url,lc_rwlink_url,lc_target,lc_pic,lc_content,lc_zt,lc_datetime) values
	 ('{$lc_title}',{$pid},'{$lc_link_url}','{$lc_rwlink_url}','{$lc_target}','{$lc_pic}','{$lc_content}','{$lc_zt}',NOW())";

		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_navigation order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_navigation set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_navigation set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../nav_add.php?pid=".$pid);
		}else{
			mx_msg("添加失败！",1);

			/*未添加成功 删除保存的图片*/
			if(file_exists("../".$lc_pic)){
				unlink("../".$lc_pic);
			}
		}
	}else{
		mx_msg("标题或导航链接不能为空！",1);
	}
}elseif ($action == 'edit'){
	if($lc_title && $lc_link_url){
		$sql = "update ".$lc."_navigation set ";
		$sql.= "lc_title='{$lc_title}',";
		$sql.= "lc_link_url='{$lc_link_url}',";
		$sql.= "lc_rwlink_url='{$lc_rwlink_url}',";
		$sql.= "lc_target='{$lc_target}',";
		//导航图片保存
		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$lc_pic = $up->ph_name;
			$sql.= "lc_pic='{$lc_pic}',";
		}
		$sql.= "lc_content='{$lc_content}',";
		$sql.= "lc_zt='{$lc_zt}',";
		$sql.= "lc_edit_datetime=NOW()";
		$sql.= " where lc_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("修改成功！","../nav_edit.php?id={$id}");
		}else{
			mx_msg("修改失败！",1);
				
			/*未添加成功 删除保存的图片*/
			if(file_exists("../".$lc_pic)){
				unlink("../".$lc_pic);
			}
		}
	}else{
		mx_msg("标题或导航链接不能为空！",1);
	}
}else{
	mx_msg("请求参数有误！",1);
}
?>