<?php
/*栏目添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$title = isset($_POST['c_title'])?escape_str($_POST['c_title']):null;//标题
$type = isset($_POST['c_type'])?(int)$_POST['c_type']:0;//栏目类型(默认是单页)
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;//内容
$link = isset($_POST['c_link'])?escape_str($_POST['c_link']):null;//栏目链接
$pc = isset($_POST['c_pc'])?(int)$_POST['c_pc']:null;//pc显示否
$phone = isset($_POST['c_phone'])?(int)$_POST['c_phone']:null;//手机显示否
$phone_name = isset($_POST['c_phone_name'])?escape_str($_POST['c_phone_name']):null;//手机栏目标题
$zt = isset($_POST['c_zt'])?(int)$_POST['c_zt']:-1;//默认不显示
$del = isset($_POST['c_del'])?(int)$_POST['c_del']:0;//默认是可以删除

$id = isset($_POST['id'])?(int)$_POST['id']:0;//栏目编号

if($title){
	if($action=='add'){
		$sql = "insert into ".$lc."_lanmu (c_title,c_type,c_content,c_link,c_pc,c_phone,c_phone_name,c_zt,c_delete)
		values ('{$title}',{$type},'{$content}','{$link}','{$pc}','{$phone}','{$phone_name}','{$zt}','{$del}')";

		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			/*栏目链接处理*/
			$new_id = mysql_insert_id();//获取刚添加的记录的ID
			if($link==""){
				switch ($type) {
					case 0:
						//"单页系统"
						$link = "index.php?p=about&lanmu=".$new_id;
						break;
					case 1:
						//"文章系统"
						$link = "index.php?p=news_list&lanmu=".$new_id;
						break;
					case 2:
						//"图文系统"
						$link = "index.php?p=products_list&lanmu=".$new_id;
						break;
					case 3:
						//"下载系统"
						$link = "index.php?p=down_list&lanmu=".$new_id;
						break;
					case 4:
						//"招聘系统"
						$link = "index.php?p=job_list&lanmu=".$new_id;
						break;
					case 5:
						//"留言系统"
						$link = "index.php?p=gbook_list&lanmu=".$new_id;
						break;
				}
				$link_sql = "update ".$lc."_lanmu set c_link='".$link."' where c_id=".$new_id;
				mysql_query($link_sql);
			}

			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select c_sort_id from ".$lc."_lanmu order by c_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".$lc."_lanmu set c_sort_id=".($rows['c_sort_id']+1)." order by c_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".$lc."_lanmu set c_sort_id=c_id order by c_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../lanmu_add.php");
		}else{
			mx_msg("添加失败！","");
		}
	}elseif ($action=='edit' && $id){
		$old_type = isset($_POST['old_type'])?(int)$_POST['old_type']:0;//以前的栏目类型

		if($old_type!=$type){
			//如果更改了栏目的类型需要更改url地址
			switch ($type) {
				case 0:
					//"单页系统";
					$link = "index.php?p=about&lanmu={$id}";
					break;
				case 1:
					//"文章系统"
					$link = "index.php?p=news_list&lanmu={$id}";
					break;
				case 2:
					//"图文系统"
					$link = "index.php?p=products_list&lanmu={$id}";
					break;
				case 3:
					//"下载系统"
					$link = "index.php?p=down_list&lanmu={$id}";
					break;
				case 4:
					//"招聘系统"
					$link = "index.php?p=job_list&lanmu={$id}";
					break;
				case 5:
					//"留言系统"
					$link = "index.php?p=gbook_list&lanmu={$id}";
					break;
			}
		}
		$sql = "update ".$lc."_lanmu set c_title='{$title}',c_type='{$type}',c_content='{$content}',c_link='{$link}',c_pc='{$pc}',c_phone='{$phone}',
		c_phone_name='{$phone_name}',c_zt='{$zt}' where c_id='{$id}'";

		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("修改成功！","../lanmu_edit.php?c_id=".$id);
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