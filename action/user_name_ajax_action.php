<?php
/*
 * LCMX 4.0 会员ajax响应处理
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */

$lc_user=isset($_POST['lc_user'])?$_POST['lc_user']:null;//获取会员用户名
$action=isset($_POST['action'])?$_POST['action']:null;//判断处理类型(1为登录判断，2为注册判断)

if($lc_user){
	$sqlyz = "select * from ".lc()."_user where  lc_title= '{$lc_user}'";
	$rsyz = mysql_query($sqlyz);
	if($rsyz){
		if($action==1){
			if(mysql_num_rows($rsyz)>0){
				$rowsyz=mysql_fetch_assoc($rsyz);
				if($rowsyz['lc_title']=$lc_user){
					echo '用户名正确';
				}
			}else{
				echo "此会员不存在";
			}
		}
		if($action==2){
			if(mysql_num_rows($rsyz)>0){
				$rowsyz=mysql_fetch_assoc($rsyz);
				if($rowsyz['lc_title']=$lc_user){
					echo '已存在';
				}
			}else{
				echo '正确';
			}
		}
	}
}
?>