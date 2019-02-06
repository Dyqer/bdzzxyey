<?php
/*下载添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//所属栏目
$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;//所属分类
$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$from = isset($_POST['lc_from'])?escape_str($_POST['lc_from']):null;
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;
$jianjie = isset($_POST['lc_jianjie'])?escape_str($_POST['lc_jianjie']):null;
$tj = isset($_POST['lc_tj'])?(int)$_POST['lc_tj']:0;//是否推荐
$qx = isset($_POST['lc_qx'])?(int)$_POST['lc_qx']:0;//获取下载的权限
$url = isset($_POST['lc_url'])?escape_str($_POST['lc_url']):null;//接收文件上传的地址
$yc = isset($_POST['lc_yc'])?(int)$_POST['lc_yc']:0;//是否保存远程图片
$keywords = isset($_POST['lc_keywords'])?escape_str($_POST['lc_keywords']):null;//关键词
$description = isset($_POST['lc_description'])?escape_str($_POST['lc_description']):null;//描述

$field_res = customfields_action('down',$action);//自定义字段处理结果集

$id = isset($_POST['id'])?(int)$_POST['id']:0;//编号

if($title){
	if($action == 'add'){
		/*保存远程图片*/
		if($yc){
			$content = yuancheng($content);
		}
		/*保存远程图片End*/
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

		$sql = "insert into ".$lc."_down(lc_title,lc_pic,lc_content,lc_jianjie,lc_from,lc_qx,lc_datetime,lc_tj,c_id,lc_url,lc_keywords,lc_description {$field_res['f_str']})
		values ('{$title}','{$pic}','{$content}','{$jianjie}','{$from}','{$qx}',NOW(),'{$tj}','{$c_id}','{$url}','{$keywords}','{$description}' {$field_res['fv_str']})";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){

			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".$lc."_down order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_down set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_down set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../down_add.php?lanmu={$lanmu}");
		}else{
			mx_msg("添加失败！",1);
			
			/*未添加成功 删除保存的图片*/
			if($pic){
				if(file_exists("../".$pic)){
					unlink("../".$pic);
				}
			}
		}
	}elseif ($action == 'edit'){

		$sql = "update ".$lc."_down set ";
		$sql.= " lc_title='{$title}',";
		if($_FILES['lc_pic']['name']<>""){
			$up=new upphoto(LC_MX_M);;
			$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
			$up->get_ph_type($_FILES['lc_pic']['type']);
			$up->get_ph_size($_FILES['lc_pic']['size']);
			$up->get_ph_name($_FILES['lc_pic']['name']);
			$up->save();
			$pic = $up->ph_name;
			$sql.= "lc_pic='{$pic}',";
		}

		$sql.= "lc_keywords='{$keywords}',";
		$sql.= "lc_description='{$description}',";
		$sql.= "lc_content='{$content}',";
		$sql.= "lc_jianjie='{$jianjie}',";
		$sql.= "lc_from='{$from}',";
		$sql.= "lc_qx='{$qx}',";
		$sql.= "lc_url='{$url}',";
		$sql.= "lc_tj='{$tj}',";
		$sql.= "c_id='{$c_id}'";
		$sql.= $field_res['up_str']." where lc_id={$id}";

		$rs = mysql_query($sql);
		if($rs){
			mx_msg("修改成功！","../down_edit.php?lanmu={$lanmu}&id={$id}");
		}else{
			//mx_msg("修改失败！",1);
			/*未添加成功 删除保存的图片*/
			if($pic){
				if(file_exists("../".$pic)){
					unlink("../".$pic);
				}
			}
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("标题不能为空！",1);
}
?>