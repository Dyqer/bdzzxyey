<?php
/*文章修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//栏目编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//栏目标题

if($action=='title'){
	$sql = "update ".$lc."_news set lc_title='{$title}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif ($action=='del'){

	$del = isset($_POST['del'])?(int)$_POST['del']:0;//删除类型（1是删除0是放入回收站）

	if($del=="0"){
		/*放入回收站*/
		$sql = "update ".$lc."_news set lc_del = 1,lc_del_time=NOW() where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo yes;
		}else{
			echo no;
		}
	}
	if($del=="1"){
		/*删除*/
		$sql = "delete from ".$lc."_news where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo yes;
			del_pic_by_newid($id);//通过编号删除其图片
		}else{
			echo no;
		}
	}
}elseif ($action == 'num'){
	
	$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;
	$key = isset($_POST['key'])?(string)$_POST['key']:null;
	$c_id = isset($_POST['c_id'])?$_POST['c_id']:0;
	
	$total_num = 0;
	$sql_num = "select lc_id from ".$lc."_news ";
	$wheresql = " where lc_del=0 ";
	if($c_id<>0){
		$wheresql.= " and c_id in (".get_news_all_child_id($c_id)."{$c_id})";
	}
	if($lanmu<>0){
		$wheresql.= " and c_id in (select c_id from ".$lc."_news_type where lanmu = '{$lanmu}')";
	}
	if($key<>""){
		$wheresql.= " and lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$wheresql;
	$rs_num = mysql_query($sql_num);
	if($rs_num){
		$total_num = mysql_num_rows($rs_num);
	}
	echo $total_num;
}
?>