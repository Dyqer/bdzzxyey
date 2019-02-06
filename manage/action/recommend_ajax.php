<?php
/*推荐开启与关闭处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$id = isset($_POST['id'])?(int)$_POST['id']:0;//操作的编号id
$operation = isset($_POST['operation'])?(int)$_POST['operation']:0;//操作(开启或关闭)
$type = isset($_POST['type'])?(int)$_POST['type']:0;//推荐类型(1:文章、2：图文、3：下载)

$table="";//数据库表名

if($type==1){
	//文章
	$table=$lc."_news";
}elseif($type==2){
	//图文
	$table=$lc."_products";
}elseif($type==3){
	//下载
	$table=$lc."_down";
}
$sql = "update ".$table." set lc_tj='{$operation}' where lc_id='{$id}'";
$rs = mysql_query($sql);
if($rs && mysql_affected_rows()>0){
	echo "yes";//成功了
}else{
	echo "no";//失败了
}
?>