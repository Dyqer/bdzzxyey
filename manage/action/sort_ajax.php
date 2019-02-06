<?php
/*栏目排序修改*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$type = isset($_POST['type'])?$_POST['type']:null;//处理类型

$order = isset($_POST['order'])?$_POST['order']:0;//排序值
$ids = isset($_POST['ids'])?trim($_POST['ids']):0;//排序编号

$orderArr=explode(",",$order);
$oldidsArr=explode(",",$ids);
$len=count($orderArr);//数组长度
if($type){
	$table = '';
	switch($type){
		/*栏目列表*/
		case 'lanmu':
			$table = 'lanmu';
			$sort_col = 'c_sort_id';
			$id_col = 'c_id';
			break;
		/*单页列表*/
		case 'danye':
			$table = 'danye';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
		/*文章列表*/
		case 'news':
			$table = 'news';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
		/*图文列表*/
		case 'products':
			$table = 'products';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
		/*下载列表*/
		case 'down':
			$table = 'down';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
		/*职位列表*/
		case 'job':
			$table = 'job';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
		/*Banner列表*/
		case 'banner':
			$table = 'banner';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
		/*友情链接列表*/
		case 'friendlink':
			$table = 'friendlink';
			$sort_col = 'lc_sort_id';
			$id_col = 'lc_id';
			break;
	}
	if($table){
		for($i=0;$i<$len;$i++){
			$rs = mysql_query("update ".lc()."_".$table." set ".$sort_col." = '{$orderArr[$i]}' where ".$id_col." = '{$oldidsArr[$i]}'");
		}
		if($rs){
			echo "yes";
		}else{
			echo "no";
		}
	}else{
		echo "-2";//数据库表名为空
	}
}else{
	echo "-1";//类型参数错误
}
?>