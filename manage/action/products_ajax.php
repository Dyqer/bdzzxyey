<?php
/*图文修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?(int)$_POST['id']:0;//图文编号
$title = isset($_POST['title'])?escape_str($_POST['title']):null;//图文标题

if($action == 'title'){
	$sql = "update ".$lc."_products set lc_title='{$title}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo "yes";//成功了
	}else{
		echo "no";//失败了
	}
}elseif ($action == 'del'){

	$del = isset($_POST['del'])?escape_str($_POST['del']):null;//删除类型(0放入回收站，1删除)

	if($del==0){
		/*放入回收站*/
		$sql = "update ".$lc."_products set lc_del = 1,lc_del_time=NOW() where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo yes;
		}else{
			echo no;
		}
	}elseif ($del==1){
		/*删除掉*/
		del_pic_by_productid($id);//通过产品编号删除其图片

		$sql = "delete from ".$lc."_products where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo yes;
		}else{
			echo no;
		}
	}else{
		echo '-1';//删除类型参数为空
	}
}elseif ($action == 'picdel'){
	/*图文多图删除处理*/
	$picid = isset($_POST['picid'])?(int)$_POST['picid']:0;//图片编号
	$type = isset($_POST['type'])?$_POST['type']:null;//多图操作类型

	if($type=="one"){
		$select_sql = "select lc_pic from ".$lc."_products_pics where lc_id = '{$picid}'";
		$select_rs = mysql_query($select_sql);
		if($select_rs){
			$select_rows = mysql_fetch_assoc($select_rs);
		}
		$sql = "delete from ".$lc."_products_pics where lc_id = '{$picid}'";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			echo "yes";
			//判断图片是否存在并删除
			if(file_exists(LC_MX_M.$select_rows['lc_pic'])){
				unlink(LC_MX_M.$select_rows['lc_pic']);
			}
		}else{
			echo "no";
		}
	}
	if($type=="all"){
		$picids = explode(",",$picid);//分割为数组
		foreach ($picids as $value){
			/*查询删除的内容*/
			$select_sql="select lc_pic from ".$lc."_products_pics where lc_id = '{$value}'";
			$select_rs = mysql_query($select_sql);
			if($select_rs){
				$select_rows = mysql_fetch_assoc($select_rs);
			}
			/*查询删除的内容end*/
			/*删除内容*/
			$sql = "delete from ".$lc."_products_pics where lc_id = '{$value}'";
			$rs = mysql_query($sql);
			if($rs && mysql_affected_rows()>0){
				//判断图片是否存在并删除
				if(file_exists(LC_MX_M.$select_rows['lc_pic'])){
					unlink(LC_MX_M.$select_rows['lc_pic']);
				}
			}
			/*删除内容End*/
		}
		echo "yes";
	}
}elseif ($action == 'pictitle'){
	/*多图图片标题*/
	$sql = "update ".$lc."_products_pics set lc_title='{$title}' where lc_id = '{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;//成功了
	}else{
		echo no;//失败了
	}
}elseif ($action == 'picsort'){
	/*多图图片排序*/
	$paixu = isset($_POST['paixu'])?(int)$_POST['paixu']:0;

	$sql = "update ".$lc."_products_pics set lc_sort_id='{$paixu}' where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs && mysql_affected_rows()>0){
		echo yes;//成功了
	}else{
		echo no;//失败了
	}
}elseif ($action == 'picfm'){
	/*多图图片封面设定*/
	$pro_id = isset($_POST['pro_id'])?(int)$_POST['pro_id']:0;

	//先设置所有图片不是封面图
	$sql = "update ".$lc."_products_pics set lc_fengmian='0' where product_id='{$pro_id}'";
	mysql_query($sql);
	//再设置某张图片为封面图
	$sqlw = "update ".$lc."_products_pics set lc_fengmian='1' where lc_id='{$id}'";
	$rs = mysql_query($sqlw);

	if($rs && mysql_affected_rows()>0){
		echo yes;//成功了
	}else{
		echo no;//失败了
	}
}elseif ($action == 'num'){
	
	$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;
	$key = isset($_POST['key'])?(string)$_POST['key']:null;
	$c_id = isset($_POST['c_id'])?$_POST['c_id']:0;

	$total_num = 0;
	$sql_num = "select lc_id from ".$lc."_products ";
	$where_sql = " where lc_del=0";
	if($c_id<>0){
		$where_sql.= " and c_id in (".get_products_all_child_id($c_id)."{$c_id})";
	}
	if($lanmu<>0){
		$where_sql.= " and c_id in (select c_id from ".$lc."_products_type where lanmu = '{$lanmu}')";
	}
	if($key<>""){
		$where_sql.= " and lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$where_sql;
	$rs_num = mysql_query($sql_num);
	if($rs_num){
		$total_num = mysql_num_rows($rs_num);
	}
	echo $total_num;
}
?>