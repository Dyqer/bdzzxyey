<?php
/*
 * LCMX 4.0 网站简历处理
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */

$lc_title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$lc_sex = isset($_POST['lc_sex'])?escape_str($_POST['lc_sex']):null;
$lc_birthday = isset($_POST['lc_birthday'])?escape_str($_POST['lc_birthday']):null;
$lc_tel = isset($_POST['lc_tel'])?escape_str($_POST['lc_tel']):null;
$lc_sfz = isset($_POST['lc_sfz'])?escape_str($_POST['lc_sfz']):null;
$lc_married = isset($_POST['lc_married'])?escape_str($_POST['lc_married']):null;
$lc_zhicheng = isset($_POST['lc_zhicheng'])?escape_str($_POST['lc_zhicheng']):null;
$lc_school = isset($_POST['lc_school'])?escape_str($_POST['lc_school']):null;
$lc_zhuanye = isset($_POST['lc_zhuanye'])?escape_str($_POST['lc_zhuanye']):null;
$lc_xueli = isset($_POST['lc_xueli'])?escape_str($_POST['lc_xueli']):null;
$lc_address = isset($_POST['lc_address'])?escape_str($_POST['lc_address']):null;
$lc_jiguan = isset($_POST['lc_jiguan'])?escape_str($_POST['lc_jiguan']):null;
$lc_tel = isset($_POST['lc_tel'])?escape_str($_POST['lc_tel']):null;
$lc_zhiwei = isset($_POST['lc_zhiwei'])?escape_str($_POST['lc_zhiwei']):null;
$lc_price = isset($_POST['lc_price'])?escape_str($_POST['lc_price']):null;
$lc_xxjl = isset($_POST['lc_xxjl'])?escape_str($_POST['lc_xxjl']):null;
$lc_gzjl = isset($_POST['lc_gzjl'])?escape_str($_POST['lc_gzjl']):null;
$lc_yaoqiu = isset($_POST['lc_yaoqiu'])?escape_str($_POST['lc_yaoqiu']):null;
$lc_techang = isset($_POST['lc_techang'])?escape_str($_POST['lc_techang']):null;
$lc_ip = getip();//获取ip地址

if($lc_title && $lc_sex && $lc_birthday && $lc_xueli && $lc_tel && $lc_zhiwei){
	$sql = "insert into ".lc()."_jianli (lc_title,lc_sex,lc_birthday,lc_sfz,lc_married,lc_zhicheng,lc_school,lc_zhuanye,lc_xueli,lc_address,lc_jiguan,lc_tel,lc_zhiwei,lc_price,lc_xxjl,lc_gzjl,lc_yaoqiu,lc_techang,lc_datetime) values ('{$lc_title}','{$lc_sex}','{$lc_birthday}','{$lc_sfz}','{$lc_married}','{$lc_zhicheng}','{$lc_school}','{$lc_zhuanye}','{$lc_xueli}','{$lc_address}','{$lc_jiguan}','{$lc_tel}','{$lc_zhiwei}','{$lc_price}','{$lc_xxjl}','{$lc_gzjl}','{$lc_yaoqiu}','{$lc_techang}',NOW())";
	$rs = mysql_query($sql);
	if($rs){
		if(get_config_value('gbook_duanxin_come')==1){
			$con='您有一条名为"'.$lc_title.'"的简历，请尽快登陆后台查看';
			duanxin($con);
		}elseif (get_config_value('job_email_come')==1){
			include ("resource/swift/index.php");
			$con = '<table border="1" width="100%" align="center" cellspacing="0" cellpadding="3" style="border-collapse: collapse" bordercolor="#eeeeee">
	<tr>
		<td align="center">本人姓名：</td>
		<td>'.$lc_title.'</td>
		<td align="center">性别：</td>
		<td>'.$lc_sex.'</td>
		<td align="center">出生年月：</td>
		<td>'.$lc_birthday.'</td>
	</tr>
	<tr>
		<td align="center">身份证号：</td>
		<td>'.$lc_sfz.'</td>
		<td align="center">婚否：</td>
		<td>'.$lc_married.'</td>
		<td align="center">职称/资质：</td>
		<td>'.$lc_zhicheng.'</td>
	</tr>
	<tr>
		<td align="center">毕业院校：</td>
		<td>'.$lc_school.'</td>
		<td align="center">专业：</td>
		<td>'.$lc_zhuanye.'</td>
		<td align="center">最高学历：</td>
		<td>'.$lc_xueli.'</td>
	</tr>
	<tr>
		<td align="center">联系地址：</td>
		<td>'.$lc_address.'</td>
		<td align="center">籍贯：</td>
		<td>'.$lc_jiguan.'</td>
		<td align="center">联系电话：</td>
		<td>'.$lc_tel.'</td>
	</tr>
	<tr>
		<td align="center">应聘职位：</td>
		<td>'.$lc_zhiwei.'</td>
		<td align="center">期望薪金：</td>
		<td>'.$lc_price.'</td>
		<td></td>
		<td></td>
	</tr>
</table>
<table border="1" width="100%" align="center" cellspacing="0" cellpadding="3" style="border-collapse: collapse; margin-top:8px" bordercolor="#eeeeee">
	<tr>
		<td height="100" width="5%" align="center">学<br>
			习<br>
			经<br>
			历</td>
		<td>'.$lc_xxjl.'</td>
	</tr>
	<tr>
		<td height="100" width="5%" align="center">工<br>
			作<br>
			经<br>
			历</td>
		<td>'.$lc_gzjl.'</td>
	</tr>
	<tr>
		<td height="100" width="5%" align="center">对<br>
			公<br>
			司<br>
			要<br>
			求</td>
		<td>'.$lc_yaoqiu.'</td>
	</tr>
	<tr>
		<td width="5%" align="center" height="117"> 特<br>
			长<br>
			爱<br>
			好</td>
		<td colspan="4" height="117">'.$lc_techang.'</td>
	</tr>
</table>';
	email($lc_title,$con,get_config_value('email_user'),web_name);
		}
		mx_msg("亲，简历提交成功咯！","index.php?p=jianli");
	}else{
		mx_msg("亲，简历提交失败！","1");
	}
}else{
	mx_msg("亲，必填项不能为空！","1");
}


function duanxin($con){
	$x_eid=get_config_value('x_eid');
	$x_uid=get_config_value('x_uid');
	$x_pwd_md5=get_config_value('x_pwd_md5');
	$x_target_no=get_config_value('x_target_no');
	$x_memo=$con;
	$url="http://gateway.woxp.cn:6630/gb2312/web_api/?x_eid={$x_eid}&x_uid={$x_uid}&x_pwd_md5={$x_pwd_md5}&x_ac=10&x_target_no={$x_target_no}&x_memo={$x_memo}&x_gate_id=300";
	Get($url);
}

function Get($url)
{
	if(function_exists('file_get_contents'))
	{
		$file_contents = file_get_contents($url);
	}
	else
	{
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		$file_contents = curl_exec($ch);
		curl_close($ch);
	}
	return $file_contents;
}
?>
