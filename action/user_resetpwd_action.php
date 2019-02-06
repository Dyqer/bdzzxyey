<?php
/*
 * LCMX 4.0 网站会员重置密码
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
$user=isset($_POST['user'])?$_POST['user']:null;//用户名
$email = isset($_POST['email'])?$_POST['email']:null;
$key = isset($_POST['key'])?$_POST['key']:null;
$lc_password = isset($_POST['lc_password'])?$_POST['lc_password']:null;
$lc_password2 = isset($_POST['lc_password2'])?$_POST['lc_password2']:null;
$yzm=isset($_POST['yzm'])?$_POST['yzm']:null;//验证码
$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号

if(!$user || !$email || !$key){
	mx_msg("亲，链接已失效！",1);
	exit;
}
if($lc_password && $lc_password2){
	if($lc_password == $lc_password2){
		$lc_password = md5($lc_password);
		$sql ="select lc_email,lc_key_time from ".lc()."_user where lc_email= '{$email}' and lc_title='{$user}'";
		$rs = mysql_query($sql);
		if($rs && $rows=mysql_fetch_assoc($rs)){
			$key_time = $rows['lc_key_time'];//过期时效
			$now_time = date('Y-m-d H:i:s',time());//现在时间
			if($now_time<$key_time){
				$r_sql="update ".$lc."_user set lc_password='{$lc_password}',lc_key_time='{$now_time}' where lc_email= '{$email}' and lc_title='{$user}'";
				$rs = mysql_query($r_sql);
				if($rs && mysql_affected_rows()>0){
					mx_msg("亲，密码重置成功！","index.php?p=user");
				}else{
					mx_msg("亲，密码重置失败，请重试！",1);
				}
			}else{
				mx_msg("亲，密码重置有效期已过！",1);
			}
		}else{
			mx_msg("亲，该会员不存在！",1);
		}
	}else{
		mx_msg("亲，密码或确认密码不相同！",1);
	}
}else{
	mx_msg("亲，密码或确认密码不能为空！",1);
}
?>