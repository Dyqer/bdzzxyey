<?php
/*
* ==================================
* LCMX 4.0 For Touch 手机网站后台登录
* ==================================
*/
defined('LC_MX_3G') or define('LC_MX_3G',dirname(dirname(__FILE__)).'/');//系统3G目录定义
require (LC_MX_3G."manage/common/common.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
<title><?php echo constant("web_name")?> - 后台登录</title>
<link href="resource/css/base.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//更换验证码
function newgdcode(obj) {
	obj.src = obj.src+'?nowtime='+new Date().getTime();
}
</script>
</head>
<body>
<div class="box" id="header">
  <div class="logo"><img src="resource/image/logo.png" /></div>
  <div class="clear"></div>
</div>
<div class="login">
  <form method="post" action="action/login_check.php">
    <table cellpadding="0" cellspacing="0" border="0">
      <tr>
        <td colspan="2"><input id="user" name="c_name" type="text" required placeholder="用户名" /></td>
      </tr>
      <tr>
        <td colspan="2" height="20"></td>
      </tr>
      <tr>
        <td colspan="2"><input id="password" name="c_password" type="password" required placeholder="密码"/></td>
      </tr>
      <tr>
        <td colspan="2" height="20"></td>
      </tr>
      <tr>
        <td width="46%"><input name="yzm" type="text" required placeholder="验证码" id="yzm" /></td>
        <td><img src="common/imagecode.php" alt="看不清楚，换一张" align="absmiddle" onClick="newgdcode(this)"/></td>
      </tr>
      <tr>
        <td colspan="2" height="30"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input value="登 录" type="submit" id="login_button"/></td>
      </tr>
      <tr>
        <td colspan="2" height="30"></td>
      </tr>
      <tr>
        <td colspan="2"><p id="notice"><span>注</span>：使用微信扫一扫,打开后台会导致部分功能不能用。如果已打开可点微信右上角图标，选择在浏览器中打开。</p></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>