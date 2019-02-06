<?php
//检查会员是否登录或者会话过期
function check_userlogin(){
	if(!$_SESSION['user_id']){
		mx_msg("您未登录或者登录已经过期,请重新登录！",1);
		exit;
	}
}
/**************************************************
 功能：获取会员信息(通过用户名获取相应字段值)
 参数：$col 字段名   $user 用户名
 '**************************************************/
function get_user($col,$user){
	$str="";
	if($col && $user){
		$sql ="select {$col} from ".lc()."_user where lc_title= '{$user}'";
		$rs = mysql_query($sql);
		if($rs && $rows=mysql_fetch_assoc($rs)){
			$str = $rows[$col];
		}
	}
	return $str;
}
/***************************************************
 * 功能：通过主键获取会员等级字段对应的值
 * 参数：$col 字段名 $id 表主键
 ***************************************************/
function get_user_type($col='lc_title',$id){
	$str="";
	if($id){
		$sql="select {$col} from ".lc()."_user_type where lc_id = '{$id}'";
		$rs=mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
?>