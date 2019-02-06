<?php
/*全部删除处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?$_POST['id']:0;//栏目编号id(数组)
$del = isset($_POST['lc_del'])?(int)$_POST['lc_del']:0;//(1是删除，0是放在回收站)
$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//所属栏目
$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;//所属分类

if($action){
	for($i=0;$i<count($id);$i++){
		if($i==0){
			$id_str = $id[$i];
		}else{
			$id_str = $id_str.','.$id[$i];
		}
	}
	if($action=='lanmu'){
		/*栏目*/
		if($del==1){
			$sql = "delete from ".lc()."_lanmu where c_delete=0 and c_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs&&mysql_affected_rows()>0){
				mx_msg("删除成功！","../list.php?C=lanmu_list");
				for($i=0;$i<count($id);$i++){
					$type=get_type_by_lanmu($id[$i]);//通过栏目id获取所属类型
					del_lanmu_by_cid($id[$i],$type);//删除该栏目下所有资源
				}
			}else{
				mx_msg("删除失败！",1);
			}
		}else{
			/*放入回收站*/
			$sql="update ".$lc."_lanmu set c_zt=0 where c_delete=0 and c_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs){
				mx_msg('放入回收站成功！','../list.php?C=lanmu_list');
				for($i=0;$i<count($id);$i++){
					$type = get_type_by_lanmu($id[$i]);//通过栏目id获取所属类型
					recycle_lanmu_by_cid($id[$i],$type);//将该栏目下所有资源 放入回收站
				}
			}else{
				mx_msg('放入回收站失败！',1);
			}
		}
		/*栏目 End*/
	}elseif ($action=='news'){
		/*文章*/
		if($del!=1){
			/*放入回收站*/
			$sql = "update ".$lc."_news SET lc_del = 1,lc_del_time=NOW() WHERE lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs&&mysql_affected_rows()>0){
				$jump_url = "../list.php?C=news_list&lanmu={$lanmu}";
				if($c_id){
					$jump_url.= "&c_id={$c_id}";
				}
				mx_msg("放入回收站成功！",$jump_url);
			}else{
				mx_msg('放入回收站失败！',1);
			}
		}else{
			/*删除*/
			$sql = "delete from ".$lc."_news where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs&&mysql_affected_rows()>0){
				$jump_url = "../list.php?C=news_list&lanmu={$lanmu}";
				if($c_id){
					$jump_url.= "&c_id={$c_id}";
				}
				mx_msg("删除成功！",$jump_url);
				for($i=0;$i<count($id);$i++){
					del_pic_by_newid($id[$i]);//通过文章编号删除其图片
				}
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*文章 End*/
	}

	elseif ($action=='jian'){
			/*删除*/
			/*放入回收站*/
			$sql="delete from ".$lc."_zijian where id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs){
				mx_msg('放入回收站成功！','../list.php?C=add_ziduan');
			}else{
				mx_msg('放入回收站失败！',1);
			}
		
		/*文章 End*/
	}
	
	
	
	elseif ($action=='product'){
		/*图文*/
		if($del!=1){
			/*放入回收站*/
			$sql = "UPDATE ".$lc."_products SET lc_del = 1,lc_del_time=NOW() WHERE lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs&&mysql_affected_rows()>0){
				$jump_url = "../list.php?C=products_list&lanmu={$lanmu}";
				if($c_id){
					$jump_url.= "&c_id={$c_id}";
				}
				mx_msg('放入回收站成功！',$jump_url);
			}else{
				mx_msg('放入回收站失败！',1);
			}
		}else{
			/*删除*/
			$sql = "delete from ".$lc."_products where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs&&mysql_affected_rows()>0){
				$jump_url = "../list.php?C=products_list&lanmu={$lanmu}";
				if($c_id){
					$jump_url.= "&c_id={$c_id}";
				}
				mx_msg("删除成功！",$jump_url);
				//删除图片
				for($i=0;$i<count($id);$i++){
					del_pic_by_productid($id[$i]);//通过产品编号删除其图片
				}
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*图文 End*/
	}elseif ($action=='danye'){
		/*单页*/
		if($del==1){
			/*删除*/
			$sql = "delete from ".$lc."_danye where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				mx_msg("删除成功！","../list.php?C=danye_list&lanmu={$lanmu}");
			}else{
				mx_msg("删除失败！",1);
			}
		}else{
			/*放入回收站*/
			$sql = "update ".$lc."_danye SET lc_del = 1,lc_del_time=NOW() WHERE lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				mx_msg('放入回收站成功！','../list.php?C=danye_list&lanmu={$lanmu}');
			}else{
				mx_msg('放入回收站失败！',1);
			}
		}
		/*单页 End*/
	}elseif ($action=='down'){
		/*下载*/
		if($del==1){
			/*删除*/
			$sql = "delete from ".$lc."_down where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=down_list&lanmu={$lanmu}";
				if($c_id){
					$jump_url.= "&c_id={$c_id}";
				}
				mx_msg("删除成功！",$jump_url);
				//删除图片
				for($i=0;$i<count($id);$i++){
					del_pic_by_downid($id[$i]);//通过产品编号删除其图片
				}
			}else{
				mx_msg("删除失败！",1);
			}
			/*下载  End*/
		}
	}elseif ($action=='gbook'){
		/*留言*/
		if($del==1){
			$sql = "delete from ".$lc."_gbook where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=gbook_list&lanmu={$lanmu}";
				mx_msg("删除成功！",$jump_url);
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*留言  End*/
	}elseif ($action=='resume'){
		/*简历*/
		if($del==1){
			$sql = "delete from ".$lc."_jianli where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=jianli_list";
				mx_msg("删除成功！",$jump_url);
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*简历 End*/
	}elseif ($action=='job'){
		/*职位*/
		if($del==1){
			$sql = "delete from ".$lc."_job where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=job_list";
				mx_msg("删除成功！",$jump_url);
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*职位 End*/
	}elseif ($action=='orderform'){
		/*订单*/
		$zt = isset($_POST['zt'])?(int)$_POST['zt']:0;//类型
		if($del==1){
			$sql = "delete from ".$lc."_dingdan where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=orderform_list&zt={$zt}";
				mx_msg("删除成功！",$jump_url);
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*订单 End*/
	}elseif ($action=='banner'){
		/*横幅图*/
		$type = isset($_POST['type'])?(int)$_POST['type']:0;//类型(横幅图、广告图)
		if($del==1){
			$sql = "delete from ".$lc."_banner where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=banner_list&type={$type}";
				mx_msg("删除成功！",$jump_url);
				//删除图片
				for($i=0;$i<count($id);$i++){
					del_pic_by_bannerid($id[$i]);//通过banner编号删除其图片
				}
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*横幅图 End*/
	}elseif ($action=='friendlink'){
		/*友情链接*/
		if($del==1){
			$sql = "delete from ".$lc."_friendlink where lc_id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				$jump_url = "../list.php?C=friendlink_list";
				if($c_id){
					$jump_url.= "&c_id={$c_id}";
				}
				mx_msg("删除成功！",$jump_url);
				//删除图片
				for($i=0;$i<count($id);$i++){
					del_friendlinkpic_by_id($id[$i]);//通过友情链接编号删除其图片
				}
			}else{
				mx_msg("删除失败！",1);
			}
		}
		/*友情链接 End*/
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("请求参数有误！",1);
}
?>