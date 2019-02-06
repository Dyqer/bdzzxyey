<?php
/*Banner添加修改处理*/
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
		if($_FILES['banner']['name']<>""){
			$up_banner = new upphoto(LC_MX_M);
			$up_banner->get_ph_tmpname($_FILES['banner']['tmp_name']);
			$up_banner->get_ph_type($_FILES['banner']['type']);
			$up_banner->get_ph_size($_FILES['banner']['size']);
			$up_banner->get_ph_name($_FILES['banner']['name']);
			$up_banner->save();
			$banner = $up_banner->ph_name;
		}else{
			$banner = "";
		}

		$sql = "insert into ".lc()."_banner(lc_title,lc_pic,lc_url,c_id,lc_datetime,lc_type) values ('{$title}','{$banner}','{$url}','{$c_id}',NOW(),'{$type}')";
		$rs = mysql_query($sql);
		if($rs){
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".lc()."_banner order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".lc()."_banner set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				mysql_query($sql2);
			}else{
				$sql2 = "update ".lc()."_banner set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				mysql_query($sql2);
			}
			/****************** 排序结束 *****************/
				
			mx_msg("添加成功！","../banner_add.php?type={$type}");
		}else{
			mx_msg("添加失败！",1);
				
			/*删除没有保存成功的图片*/
			if(file_exists("../".$banner)){
				unlink("../".$banner);
			}
			/*删除没有保存成功的图片End*/
		}
	}elseif ($action == 'edit'){
		$sql="update ".lc()."_banner set ";
		$sql.=" lc_title='{$title}',";
		$sql.=" c_id='{$c_id}',";
		if($_FILES['banner']['name']<>""){
			$up_banner = new upphoto(LC_MX_M);
			$up_banner->get_ph_tmpname($_FILES['banner']['tmp_name']);
			$up_banner->get_ph_type($_FILES['banner']['type']);
			$up_banner->get_ph_size($_FILES['banner']['size']);
			$up_banner->get_ph_name($_FILES['banner']['name']);
			$up_banner->save();
			$banner = $up_banner->ph_name;
			$sql.=" lc_pic='{$banner}',";
		}
		$sql.=" lc_url='{$url}'";
		$sql.=" where lc_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs){
			mx_msg("修改成功！","../banner_edit.php?id={$id}");
		}else{
			mx_msg("修改失败！",1);
			
			/*删除没有保存成功的图片*/
			if(file_exists("../".$banner)){
				unlink("../".$banner);
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