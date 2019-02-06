<?php
/**************************************************
 * 数据转发处理
 '**************************************************/

//发送跨域请求
function msg_send1($url){
	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$str = curl_exec($ch);
	curl_close($ch);
	return $str;
}
//发送短信
function send_text_messages($con){
	$x_eid=get_config_value('x_eid');
	$x_uid=get_config_value('x_uid');
	$x_pwd_md5=get_config_value('x_pwd_md5');
	$x_target_no=get_config_value('x_target_no');
	$x_memo=$con;
	$url="http://gateway.woxp.cn:6630/gb2312/web_api/?x_eid={$x_eid}&x_uid={$x_uid}&x_pwd_md5={$x_pwd_md5}&x_ac=10&x_target_no={$x_target_no}&x_memo={$x_memo}&x_gate_id=300";
	$str = msg_send1($url);//获取响应内容
	return $str;
}
//发送电子邮件
function send_email($host,$port,$email,$user,$pwd,$email_t,$email_c){
	$str = "";
	include (LC_MX."resource/PHPMailer/class.phpmailer.php");
	include (LC_MX."resource/PHPMailer/class.smtp.php");
	
	$mail = new phpmailer();//实例化phpmailer
	$mail->CharSet = "utf-8";//设置字符集编码
	$mail->IsSMTP();//使用SMTP方式发送
	$mail->SMTPSecure = 'ssl';
	$mail->Host = $host;//邮件发送者的域名
	$mail->SMTPAuth = true;//启用SMTP验证功能
	$mail->Username = $user;//邮件发送者用户名(请填写完整的email地址)
	$mail->Password = $pwd;//邮件发送者密码
	$mail->Port = $port;//设置ssl连接smtp服务器的远程服务器端口(可选465或587)
	$mail->From = $user;//邮件发送者email地址
	$mail->FromName = $user;
	$mail->AddAddress($email,$email);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	//$mail->AddReplyTo("", "");
	//$mail->AddAttachment("/var/tmp/file.zip"); // 添加附件
	$mail->IsHTML(true);//是否使用HTML格式
	$mail->Subject = $email_t;//邮件标题
	$mail->Body = $email_c;//邮件内容
	//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";//附加信息，可以省略
	$status = $mail->Send();
	if($status){
		$str = "yes";
	}else{
		$str = "邮件发送失败. <p>错误原因:".$mail->ErrorInfo;
		}
	return $str;
}
?>
