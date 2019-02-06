<?php
/*
 * LCMX 4.0 网站会员找回密码
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */

$user=isset($_POST['lc_user'])?$_POST['lc_user']:null;//用户名
$yzm=isset($_POST['yzm'])?$_POST['yzm']:null;//验证码
$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号

if(!$user || !$yzm){
	mx_msg("亲，用户名或者验证码不能为空！",1);
	exit;
}
if($yzm == $_SESSION['validationcode']){
	$lc_title=get_user("lc_title",$user);//用户名
	$lc_email=get_user("lc_email",$user);//邮箱收信地址
	if($user == $lc_title){
		if($lc_email){
			$skey="adfad%7#e53ewt%$#$#^$^adsfg";
			$key=substr(md5($user+time()+$skey),0,50);//生成密钥值
			$key_time= date("Y-m-d H:i:s",strtotime("+3 hours"));//密钥值有效期(3小时)
			$url="http://".$_SERVER['HTTP_HOST'].str_replace("a=user_findpwd","p=user_resetpassword&email=".$lc_email."&key=".$key."&user=".$user,$_SERVER['REQUEST_URI']);//重置密码地址
			$title = "来自 《".constant("web_name")."》 的密码重置邮件";//邮件标题
			$con = '<TBODY><TR><TD style="COLOR: #40aa53"><H1 style="MARGIN-BOTTOM: 10px">龙采 MX</H1></TD></TR>
	  <TR><TD style="BORDER-LEFT: #d1ffd1 1px solid; PADDING-BOTTOM: 0px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BACKGROUND: #ffffff; BORDER-TOP: #40aa53 5px solid; BORDER-RIGHT: #d1ffd1 1px solid; PADDING-TOP: 20px"><P>'.$user.' 您好！ </P></TD>
	  </TR>
	<TR><TD style="BORDER-LEFT: #d1ffd1 1px solid; PADDING-BOTTOM: 10px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BACKGROUND: #ffffff; BORDER-RIGHT: #d1ffd1 1px solid; PADDING-TOP: 10px"><P style="FONT-WEIGHT: bold">请点击下面链接进行密码重置（有效期为：此邮件发出后3小时）：<BR>
	<BR><A href="'.$url.'" target=_blank>'.$url.'</A></P></TD>
	  </TR>
	  <TR>
	    <TD style="BORDER-BOTTOM: #d1ffd1 1px solid; BORDER-LEFT: #d1ffd1 1px solid; PADDING-BOTTOM: 20px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px; BACKGROUND: #ffffff; BORDER-RIGHT: #d1ffd1 1px solid; PADDING-TOP: 0px"><HR style="COLOR: #ccc">
	      <P style="COLOR: #060; FONT-SIZE: 9pt">想了解更多信息，请访问 <A href="http://www.longcai.com" target=_blank>http://www.longcai.com</A></P></TD>
	  </TR>
	</TBODY>';
			$host = "smtp.".get_config_value('email_zt').".com";
			$port = get_config_value('email_port');
			$email_user = get_config_value('email_user');
			$email_psw = get_config_value('email_password');
			
			$str = send_email($host,$port,$lc_email,$email_user,$email_psw,$title,$con);
			$sql="update ".$lc."_user set lc_key='{$key}',lc_key_time='{$key_time}' where lc_title= '{$user}'";
			$rs = mysql_query($sql);
			if($str == "yes" && $rs){
				mx_msg("亲，邮件已发送成功！","1");
			}else{
				echo $str;//输出错误
			}
		}else{
			mx_msg("亲，您没有设置安全邮箱！",1);
		}
	}else{
		mx_msg("亲，此用户不存在！",1);
	}
}else{
	mx_msg("亲，验证码输入有误！",1);
}
?>