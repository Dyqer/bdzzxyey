<?php
/*
 * LCMX 4.0 For Micro 留言保存
 */
require(dirname(dirname(__FILE__))."/common/common.php");

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//所属栏目
$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content']):null;
$name = isset($_POST['lc_name'])?escape_str($_POST['lc_name']):null;
$tel = isset($_POST['lc_tel'])?escape_str($_POST['lc_tel']):null;
$email = isset($_POST['lc_email'])?escape_str($_POST['lc_email']):null;
$ip = getip();//获取浏览器客户端ip地址
$yzm = isset($_POST['yzm'])?$_POST['yzm']:null;//验证码
$yzm = strtoupper(trim($yzm));//将验证码转换为大写且清除空格和其他符号

if($yzm == $_SESSION['validationcode']){
	$sql = "insert into ".lc()."_gbook (lc_title,lc_content,lc_name,lc_tel,lc_email,lc_ip,lc_datetime,lanmu) values 
	('{$title}','{$content}','{$name}','{$tel}','{$email}','{$ip}',NOW(),'{$lanmu}')";
	$rs = mysql_query($sql);
	if($rs){
		echo "<script>alert('留言成功！');location.href='../index.php?p=gbook&lanmu={$lanmu}'</script>";
	}else{
		echo "<script>alert('留言失败！');history.back()</script>";
	}
}else{
	echo "<script>alert('亲，验证码不正确，请重新填写！');history.back()</script>";
}
?>