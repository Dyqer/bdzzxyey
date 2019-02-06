<?php
/*
 * LCMX 4.0 网站购物车添加
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
check_userlogin();//登录验证

$user_id = $_SESSION['user_id'];//会员id
$product_id = isset($_GET['id'])?(int)$_GET['id']:null;//产品id

$sql="insert into ".lc()."_gwc(lc_user_id,lc_goods_id,lc_zt) values ('{$user_id}','{$product_id}','0')";
$rs = mysql_query($sql);
if($rs){
	mx_msg("添加成功！","index.php?p=shoppingcart_list");
}
?>