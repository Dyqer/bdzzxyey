<?php require('lcyunchack.php');
require_once 'common/x.php';
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>MX营销平台 - 后台登录</title>
<link href="resource/images/mxpro.ico" rel="shortcut icon"/>
<link rel="stylesheet" type="text/css" href="resource/css/login.css">
<script src="resource/js/jquery-1.7.2.min.js"></script>
<script src="resource/js/login.js"></script>
</head>

<body>
<div class="login_win">
  <div id="tips"><span></span></div>
  <div class="login_form">
    <div class="user"><span class="mxicon login_icon">&#xe971;</span><input type="text" class="login_input" id="user" placeholder="用户名">
    </div>
    <div class="psw" id="psw"><span class="mxicon login_icon">&#xe98f;</span><input type="password" class="login_input" id="password" placeholder="密码" onKeyDown="Enter_login(event)">
    </div>
    <div class="sub_but">
      <input type="button" class="mxicon" id="login_sub" value="登   录" onClick="login()">
    </div>
    <div class="line"></div>
    <div class="qrcode"><span class="qr_code"><img src="action/3g_qr_code.php?a=3g/manage" width="100" height="100" align="left"/></span><span class="qr_code_tip"><samp>扫一扫</samp>，登录手机版后台</span></div>
  </div>
</div>
<div class="login_date" id="login_date"><span><samp id="d_point">:</samp></span></div>
</body>
</html>