<?php /* Smarty version Smarty-3.1.13, created on 2015-12-10 15:52:24
         compiled from "D:\AppServ\www\TEMPLET\install\templates\step3.html" */ ?>
<?php /*%%SmartyHeaderCode:3170656692f381253b3-71153503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c21e797cb96f32132ae78fd20025d8edf9b54412' => 
    array (
      0 => 'D:\\AppServ\\www\\TEMPLET\\install\\templates\\step3.html',
      1 => 1449733751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3170656692f381253b3-71153503',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56692f38166da1_20760354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56692f38166da1_20760354')) {function content_56692f38166da1_20760354($_smarty_tpl) {?><!doctype html>
<html>
<head>
<title>龙采MX 4.0</title>
<meta charset="utf-8">
<link href="templates/resource/css/base.css" rel="stylesheet" type="text/css">
<!--[if IE 6]>
    <script src="templates/resource/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
    <script  type="text/javascript">
        DD_belatedPNG.fix('#logo, .pageTitle, .setupNav, .setupL, .setupR, .setupNav li span, .bton, background');
    </script>
<![endif]-->
<script type="text/javascript">
// 表单提交客户端检测
function doSubmit(){
	if (document.myform.dbhost.value==""){
		alert("请填写数据库主机！");
		document.myform.dbhost.focus();
		return false;
	}
	if (document.myform.dbuser.value==""){
		alert("请填写数据库用户名！");
		document.myform.dbuser.focus();
		return false;
	}
	/*if (document.myform.dbpass.value==""){
		alert("请填写数据库密码！");
		document.myform.dbpass.focus();
		return false;
	}*/
	if (document.myform.dbname.value==""){
		alert("请填写数据库名称！");
		document.myform.dbname.focus();
		return false;
	}
	if (document.myform.dbpre.value==""){
		alert("请填写数据库前缀！");
		document.myform.dbpre.focus();
		return false;
	}
	if (document.myform.m_name.value==""){
		alert("请填写管理员姓名！");
		document.myform.m_name.focus();
		return false;
	}
	if (document.myform.m_pwd.value==""){
		alert("请填写登录密码！");
		document.myform.m_pwd.focus();
		return false;
	}
	if (document.myform.m_pwd_again.value==""){
		alert("请再次填写登录密码！");
		document.myform.m_pwd_again.focus();
		return false;
	}
	if(document.myform.m_pwd.value!==document.myform.m_pwd_again.value){
		alert("两次密码不相同！");
		document.myform.m_pwd_again.focus();
		return false;
		}
	/*if (document.myform.m_email.value==""){
		alert("请填写电子邮箱！");
		document.myform.m_email.focus();
		return false;
	}*/
	return true;
}
//提示是否导入数据
function check_data(o){
	if(confirm("确定不导入测试数据吗？")){
		o.checked=true;
	}else{
		o.checked=false;
	}
}
</script>
</head>
<body>
<div class="wrapMain"><!--头部-->
  <div class="header midWrap">
    <h1 id="logo" title="龙采MX 4.0">龙采MX 4.0</h1>
    <h2 class="pageTitle">龙采MX 4.0安装向导</h2>
  </div>
  <!--头部End--> <!--导航-->
  <div class="setupNavBox midWrap">
    <div class="setupL"></div>
    <ul class="setupNav">
      <li><span></span> <em>许可协议</em></li>
      <li><span></span> <em>环境检测</em></li>
      <li><span class="up"></span> <em>参数配置</em></li>
      <li><span></span> <em>开始安装</em></li>
      <li><span></span> <em>安装完成</em></li>
    </ul>
    <div class="setupR"></div>
  </div>
  <!--导航End--> <!--内容-->
  <form action="index.php?action=4" name="myform" method="post" onsubmit="return doSubmit()">
    <div class="midWrap option">
      <div class="fl foBox">
        <h3>数据库配置：</h3>
        <div class="he13"></div>
        <label>数据库主机：</label>
        <input type="text" name="dbhost" value="localhost">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>数据库用户名：</label>
        <input type="text" name="dbuser" value="root">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>数据库密码：</label>
        <input type="password" name="dbpass">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>数据库名称：</label>
        <input type="text" name="dbname" value="">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>数据库前缀：</label>
        <input type="text" name="dbpre" value="mx">
        <span class="tishi">*</span>
        <div class="he13"></div>
      </div>
      <div class="fr foBox">
        <h3>管理员账号：</h3>
        <div class="he13"></div>
        <label>管理员用户名：</label>
        <input type="text" name="m_name" value="admin">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>登录密码：</label>
        <input type="password" name="m_pwd" value="">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>密码确认：</label>
        <input type="password" name="m_pwd_again" value="">
        <span class="tishi">*</span>
        <div class="he13"></div>
        <label>电子邮箱：</label>
        <input type="text" name="m_email" value="">
        <div class="he13"></div>
        <label>联系电话：</label>
        <input type="text" name="m_tel">
        <div class="he13"></div>
        <label>联系QQ：</label>
        <input type="text" name="m_qq">
        <div class="he13"></div>
      </div>
      <div class="clear"></div>
    </div>
    <!--内容End-->
    <div class="he32">
      <div style="width:800px; margin:0 auto">温馨提示：<span style="color: #F00">*</span>号为必填</div>
    </div>
    <div style="width:800px; margin:10px auto"><input name="isimport" type="checkbox" onClick="check_data(this)" value="1">&nbsp;不导入测试数据</div>
    <!--按钮-->
    <div class="midWrap">
      <div class="btonWrap">
      <a class="bton fl" href="index.php?action=2">上一步（B）</a>
      <input class="bton fr" type="submit" value="下一步（N）">
      </div>
    </div>
  </form>
  <!--按钮End--></div>
</body>
</html><?php }} ?>