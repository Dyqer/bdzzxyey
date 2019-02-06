<?php
/*
 * LCMX 4.0 网站留言处理
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
$lanmu = isset($_POST['lanmu'])?$_POST['lanmu']:0;//所属栏目
$lc_title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;//留言标题
$lc_content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;//留言内容
$lc_name = isset($_POST['lc_name'])?escape_str($_POST['lc_name']):null;//留言者
$lc_tel = isset($_POST['lc_tel'])?escape_str($_POST['lc_tel']):null;//电话
$lc_email = isset($_POST['lc_email'])?escape_str($_POST['lc_email']):null;//邮件地址
$yzm = isset($_POST['yzm'])?$_POST['yzm']:null;//验证码
$lc_ip = getip();//获取ip地址
$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号

if($yzm == $_SESSION['validationcode']){
	
	$sql = "insert into ".lc()."_gbook (lc_title,lc_content,lc_name,lc_tel,lc_email,lc_ip,lc_datetime,lanmu) values ('{$lc_title}','{$lc_content}','{$lc_name}','{$lc_tel}','{$lc_email}','{$lc_ip}',NOW(),'{$lanmu}')";
	$rs = mysql_query($sql);
	if($rs){
		mx_msg("亲，留言成功咯！","index.php?p=gbook&lanmu=".$lanmu);
	}else{
		mx_msg("亲，留言失败！","1");
	}
}else{
	mx_msg("亲，验证码不正确，请重新填写！","1");
}
?>