<?php
/*
 * LCMX 4.0 网站购物车删除
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
check_userlogin();//登录验证

$id = isset($_POST['id'])?$_POST['id']:null;//购物车id

$sql = "delete from ".lc()."_gwc where lc_id ='{$id}'";
$rs = mysql_query($sql);
if($rs && mysql_affected_rows()>0){
	echo "yes";//删除成功
}else{
	echo "no";//删除失败
}
?>