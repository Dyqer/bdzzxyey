<?php
/*友情链接 添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//标题
$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;//所属分类
$url = isset($_POST['lc_url'])?escape_str($_POST['lc_url']):null;//外链
$type = isset($_POST['type'])?(int)$_POST['type']:1;//所属类型

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($title){
	if($action == 'add'){
		if($_FILES['pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['pic']['tmp_name']);
			$up->get_ph_type($_FILES['pic']['type']);
			$up->get_ph_size($_FILES['pic']['size']);
			$up->get_ph_name($_FILES['pic']['name']);
			$up->save();
			$pic = $up->ph_name;
		}else{
			$pic = "";
		}

		$sql = "insert into ".lc()."_friendlink(lc_title,lc_pic,lc_url,c_id,lc_datetime) values ('{$title}','{$pic}','{$url}','{$c_id}',NOW())";
		$rs = mysql_query($sql);
		if($rs){
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".lc()."_friendlink order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".lc()."_friendlink set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".lc()."_friendlink set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/
				
			mx_msg("添加成功！","../friendlink_add.php?type={$lc_type}");
		}else{
			mx_msg("添加失败！",1);
				
			/*删除没有保存成功的图片*/
			if(file_exists("../".$pic)){
				unlink("../".$pic);
			}
			/*删除没有保存成功的图片End*/
		}
	}elseif ($action == 'edit'){
		$sql="update ".lc()."_friendlink set ";
		$sql.=" lc_title='{$title}',";
		$sql.=" c_id='{$c_id}',";
		if($_FILES['pic']['name']<>""){
			$up = new upphoto(LC_MX_M);
			$up->get_ph_tmpname($_FILES['pic']['tmp_name']);
			$up->get_ph_type($_FILES['pic']['type']);
			$up->get_ph_size($_FILES['pic']['size']);
			$up->get_ph_name($_FILES['pic']['name']);
			$up->save();
			$pic = $up->ph_name;
			$sql.=" lc_pic='{$pic}',";
		}
		$sql.=" lc_url='{$url}'";
		$sql.=" where lc_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs){
			mx_msg("修改成功！","../friendlink_edit.php?id={$id}");
		}else{
			mx_msg("修改失败！",1);
			
			/*删除没有保存成功的图片*/
			if(file_exists("../".$pic)){
				unlink("../".$pic);
			}
			/*删除没有保存成功的图片End*/
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("标题不能为空！",1);
}
?>