<?php
/*系统邮箱设置*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$gbook_email_come = isset($_POST['gbook_email_come'])?$_POST['gbook_email_come']:0;
$gbook_email_go = isset($_POST['job'])?$_POST['job']:0;

$job_email_come = isset($_POST['job_email_come'])?$_POST['job_email_come']:0;
$job_email_go = isset($_POST['gbook'])?$_POST['gbook']:0;

$email_zt = isset($_POST['zt'])?$_POST['zt']:"qq";
$email_user = isset($_POST['user'])?$_POST['user']:null;
$email_psw = isset($_POST['pwd'])?$_POST['pwd']:null;
$email_port = isset($_POST['port'])?$_POST['port']:465;

if($email_zt && $email_user &&$email_port){
	update_config('gbook_email_come',$gbook_email_come);
	update_config('gbook_email_go',$gbook_email_go);
	update_config('job_email_come',$job_email_come);
	update_config('job_email_go',$job_email_go);
	
	update_config('email_zt',$email_zt);
	update_config('email_user',$email_user);
	update_config('email_password',$email_psw);
	update_config('email_port',$email_port);
	if(mysql_affected_rows()>0){
		echo "yes";
	}else{
		echo "no";
	}
}else{
	echo "-1";//必填参数不能为空
}
?>