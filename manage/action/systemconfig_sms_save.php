<?php
/*短信设置*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$gbook_duanxin_come = isset($_POST['gbook_duanxin_come'])?$_POST['gbook_duanxin_come']:0;
$job_duanxin_come = isset($_POST['job_duanxin_come'])?$_POST['job_duanxin_come']:0;

$x_target_no = isset($_POST['x_target_no'])?$_POST['x_target_no']:null;
$x_eid = isset($_POST['x_eid'])?$_POST['x_eid']:null;
$x_uid = isset($_POST['x_uid'])?$_POST['x_uid']:null;
$x_pwd = isset($_POST['x_pwd'])?$_POST['x_pwd']:null;

update_config('gbook_duanxin_come',$gbook_duanxin_come);
update_config('job_duanxin_come',$job_duanxin_come);

update_config('x_target_no',$x_target_no);
update_config('x_eid',$x_eid);
update_config('x_uid',$x_uid);
if($x_pwd){
	$x_pwd_md5 = md5($x_pwd);
	update_config('x_pwd_md5',$x_pwd_md5);
}
if(mysql_affected_rows()>0){
	echo "yes";//修改成功了
}else{
	echo "no";//修改失败了
}
?>