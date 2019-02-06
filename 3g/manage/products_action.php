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

		$sql = "insert into ".$lc."_products(lc_title,lc_content,lc_phone_content,lc_from,lc_datetime,c_id)
	values ('{$title}','{$content}','{$phone_content}','{$from}',NOW(),'{$c_id}')";
		$rs = mysql_query($sql);
		if($rs){
			//图片路径保存
			if($_FILES['lc_pic']['name']<>""){
				$up = new upphoto(LC_MX_3G);
				$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
				$up->get_ph_type($_FILES['lc_pic']['type']);
				$up->get_ph_size($_FILES['lc_pic']['size']);
				$up->get_ph_name($_FILES['lc_pic']['name']);
				$up->save();
				$pic = $up->ph_name;
					
				$id = mysql_insert_id();//获取刚刚插入图文的id
				$pic_sql = "insert into ".lc()."_products_pics(lc_pic,product_id) values ('{$pic}','{$id}')";
				mysql_query($pic_sql);
				//更新一张图为封面图
				$up_sql="update ".$lc."_products_pics set lc_fengmian=1 where product_id='{$id}' LIMIT 1";
				mysql_query($up_sql);
			}
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_products order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_products set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_products set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_wap_msg("添加成功！","products_add.php?lanmu={$lanmu}");
		}else{
			mx_wap_msg("添加失败，请检查！",1);
		}
	}elseif ($action == 'edit'){

		if($_FILES['lc_pic']['name']<>""){
			$up = new upphoto(LC_MX_3G);
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$pic = $up->ph_name;

			//$pic_sql="insert into ".lc()."_products_pics(lc_pic,product_id) values ('{$pic}','{$id}')";
			$pic_sql="update ".$lc."_products_pics set lc_pic='{$pic}' where product_id='{$id}' AND lc_fengmian=1";
			mysql_query($pic_sql);
			//更新一张图为封面图
			$up_sql="update ".$lc."_products_pics set lc_fengmian=1 where product_id='{$id}' LIMIT 1";
			mysql_query($up_sql);
		}
		$sql = "update ".$lc."_products set lc_title='{$title}',";
		if($type=="pc"){
			$sql.="lc_content='{$content}',";
		}elseif($type=="touch"){
			$sql.="lc_phone_content='{$content}',";
		}
		$sql = $sql."lc_from='{$from}',";
		$sql = $sql."c_id='{$c_id}'";
		$sql = $sql." where lc_id = '{$id}'";

		$rs = mysql_query($sql);
		if($rs){
			mx_wap_msg("修改成功！","products_edit.php?lanmu={$lanmu}&id={$id}&type={$type}");
		}else{
			mx_wap_msg("修改失败！",1);
		}
	}else{
		mx_wap_msg("请求参数错误！",1);
	}
}else{
	mx_wap_msg("标题不能为空！");
}
?>