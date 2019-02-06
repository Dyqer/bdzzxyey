<?php
require (dirname(__FILE__).'/common/common.php');
/********************************
 * 获取对应栏目子菜单
 * $type(栏目类别(0单页1文章2图文3下载4招聘5留言))
 */
$type = isset($_POST['type'])?$_POST['type']:null;

if($type==0){
	//单页
	echo get_lanmu_list(0,"danye");
}elseif($type==1){
	//文章
	echo get_lanmu_list(1,"news");
}elseif($type==2){
	//图文
	echo get_lanmu_list(2,"products");
}elseif($type==3){
	//下载
	echo get_lanmu_list(3,"down");
}
?>