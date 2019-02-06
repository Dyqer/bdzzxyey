<?php
/*
 * LCMX 4.0 系统session操作
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 * @author LJay <ljay88@vip.qq.com>
 */
/*ini_set("session.save_handler",'user');
session_module_name('user');//开启用户自定义
if(!$session_time){
	$session_time = 1800;//判断session周期，如果是0，则默认30分钟
}
$z_dtable = $lc.'_session';//session(会话)数据库表名
$z_lifetime = $session_time;//session(会话)生命周期
$z_probability = 1;//0-100

//open
function z_s_open($z_s_path,$z_s_name){
	return true;
}
//close
function z_s_close(){
	return true;
}
//read
function z_s_read($zr_s_id){
	global $z_dtable;
	$zr_sql="select s_value from {$z_dtable} where s_id like '{$zr_s_id}' and s_expired > ".time();
	$zr_query=mysql_query($zr_sql);
	if($zr_query){
		list($zr_value)=mysql_fetch_row($zr_query);
		return $zr_value;
	}else{
		return false;
	}
}
//write
function z_s_write($zw_s_id,$zw_s_value){
	global $z_lifetime,$z_dtable;
	$zw_expired = time()+$z_lifetime;
	$zw_value = $zw_s_value;
	mysql_query("delete from {$z_dtable} where s_id like '{$zw_s_id}' and s_expired < ".time());
	mysql_query("select id from {$z_dtable} where s_id like '{$zw_s_id}'");
	if(mysql_affected_rows() > 0){
		$zw_query = mysql_query("update {$z_dtable} set s_expired = '{$zw_expired}',s_value='{$zw_value}' where s_id like '{$zw_s_id}' and s_expired > ".time());
	}else{
		$zw_query = mysql_query("insert into {$z_dtable} (s_id,s_expired,s_value) values ('{$zw_s_id}','{$zw_expired}','{$zw_value}')");
	}
	return $zw_query;
}
//destroy
function z_s_destroy($zd_s_id){
	global $z_dtable;
	$zd_query = mysql_query("delete from {$z_dtable} where s_id like '{$zd_s_id}' limit 1");
	return $zd_query;
}
//gc
function z_s_gc($z_s_maxlifetime){
	return true;
}
//delete expired sessions
function z_del_sessions(){
	global $z_dtable;
	mysql_query("delete from {$z_dtable} where s_expired < ".time());
	mysql_query("optimize table {$z_dtable}");
}
//z_gc
function gc_mt_rand($gc_t=20){
	$r = mt_rand(0,99);
	if($r < $gc_t) return true;
	return false;
}
//gc delete expired sessions
if(gc_mt_rand($z_probability)){z_del_sessions();}
//set handler,session start
session_set_save_handler('z_s_open','z_s_close','z_s_read','z_s_write','z_s_destroy','z_s_gc');*/
session_start();
?>