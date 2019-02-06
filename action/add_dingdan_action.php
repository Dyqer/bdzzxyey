<?php
/*
 * LCMX 4.0 网站订单生成
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
check_userlogin();//登录验证

$user_id = $_SESSION['user_id'];//会员id
$lc_name = isset($_POST['lc_name'])?escape_str($_POST['lc_name']):null;//姓名
$lc_place = isset($_POST['lc_place'])?escape_str($_POST['lc_place']):null;//地址
$lc_phone = isset($_POST['lc_phone'])?escape_str($_POST['lc_phone']):null;//电话
$lc_yb = isset($_POST['lc_yb'])?escape_str($_POST['lc_yb']):null;//邮编
$lc_time = isset($_POST['lc_time'])?escape_str($_POST['lc_time']):null;//最佳送货时间
$lc_express_way= isset($_POST['lc_express_way'])?escape_str($_POST['lc_express_way']):null;//送货方式

//向订单表中插入用户信息
$sql = "insert into ".lc()."_dingdan (lc_user_id,lc_name,lc_place,lc_phone,lc_yb,lc_time,lc_add_time,lc_price,lc_express_way,lc_zt)
 values ('{$user_id}','{$lc_name}','{$lc_place}','{$lc_phone}','{$lc_yb}','{$lc_time}',NOW(),'{$lc_price}','{$lc_express_way}',0)";

$rs = mysql_query($sql);
if($rs){
	$lc_dingdan_id = mysql_insert_id();//获取插入的订单的id
	//获取购物车产品列表
	$sql1 = "select * from ".lc()."_gwc where lc_user_id ='{$user_id}' and lc_zt=0 order by lc_id desc";
	$rs1 = mysql_query($sql1);
	if($rs1){
		//更新购物车产品
		while($rows1 = mysql_fetch_assoc($rs1)){
			$sql_2 = "update ".lc()."_gwc set lc_zt ='{$lc_dingdan_id}' where lc_id ='{$rows1['lc_id']}'";
			mysql_query($sql_2);
		}
		mx_msg("订单生成成功！","index.php?p=dingdan_show&lc_id={$lc_dingdan_id}");
	}
}else{
	mx_msg("订单生成失败！","1");
}
?>