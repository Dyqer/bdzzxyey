<?php /* Smarty version Smarty-3.1.13, created on 2015-10-16 13:40:41
         compiled from "F:\AppServ\www\mx5\install\templates\step1.html" */ ?>
<?php /*%%SmartyHeaderCode:481856208dd92552b5-27002482%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '80ee6175d24c70ee1e21efd3919c05f0ff91b0fb' => 
    array (
      0 => 'F:\\AppServ\\www\\mx5\\install\\templates\\step1.html',
      1 => 1411694827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '481856208dd92552b5-27002482',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56208dd928ca62_72753851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56208dd928ca62_72753851')) {function content_56208dd928ca62_72753851($_smarty_tpl) {?><!doctype html>
<html>
<head>
<title>龙采MX 4.0</title>
<meta charset="utf-8">
<link href="templates/resource/css/base.css" rel="stylesheet" type="text/css">
<script src="templates/resource/js/jquery-1.7.1.min.js"></script>
<script src="templates/resource/js/jscroll.js"></script>
<!--[if IE 6]>
    <script src="templates/resource/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
    <script  type="text/javascript">
        DD_belatedPNG.fix('#logo, .pageTitle, .setupNav, .setupL, .setupR, .setupNav li span, .bton, .jscroll-e, .jscroll-h, .jscroll-u, .jscroll-d, background');
    </script>
<![endif]-->
<script type="text/javascript">
$(function($){
	$.fn.extend({
		btonChange:function(a){
			this.a=a;
			if(a==false){
				this.css("background-position","-440px top");
				this.unbind( "click" ).click(function(){
					return false;
				});
			}else if(a==true){
				this.css("background-position","-265px top");
				this.unbind( "click" ).click(function(){
					return true;
				});
			}
		},
		inputChecked:function(){
			if(this.attr("checked")){
				return true;
			}else{
				return false;
			}
		}
	});
	$("#nextBton").btonChange($("#agreeLic").inputChecked());
	$("#agreeLic").click(function(){
		$("#nextBton").btonChange($("#agreeLic").inputChecked());
	});
	
	$("#licenseCo").jscroll({
	     W:"7px"
		,Bg:"left 0 repeat-y"
		,Bar:{Bd:{Out:"#fff",Hover:"#fff"}
		,Bg:{Out:"-8px 0 repeat-y",Hover:"-8px 0  repeat-y",Focus:"-8px 0  repeat-y"}}
		,Btn:{btn:true
		,uBg:{Out:"-17px 0",Hover:"-17px 0",Focus:"-17px 0"}
		,dBg:{Out:"-17px -8px",Hover:"-17px -8px",Focus:"-17px -8px"}}
		,Fn:function(){}
    });
});
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
      <li><span class="up"></span> <em>许可协议</em></li>
      <li><span></span> <em>环境检测</em></li>
      <li><span></span> <em>参数配置</em></li>
      <li><span></span> <em>开始安装</em></li>
      <li><span></span> <em>安装完成</em></li>
    </ul>
    <div class="setupR"></div>
  </div>
  <!--导航End--> <!--内容-->
  <div id="licenseCo" class="textCo midWrap">
    <h3 class="title">软件安装许可协议</h3>
    <p>特别涉及免除或者限制龙采科技集团责任的免责条款，对用户的权利限制的条款，约定争议解决方式、司法管辖、法律适用的条款。请您审慎阅读并选择接受或不接受本《协议》（未成年人应在法定监护人陪同下阅读）。除非您接受本《协议》所有条款，否则您无权下载、安装或使用本软件及其相关服务。您的下载、安装、使用、帐号获取和登录等行为将视为对本《协议》的接受，并同意接受本《协议》各项条款的约束。 </p>
    <p>特别涉及免除或者限制龙采科技集团责任的免责条款，对用户的权利限制的条款，约定争议解决方式、司法管辖、法律适用的条款。请您审慎阅读并选择接受或不接受本《协议》（未成年人应在法定监护人陪同下阅读）。除非您接受本《协议》所有条款，否则您无权下载、安装或使用本软件及其相关服务。您的下载、安装、使用、帐号获取和登录等行为将视为对本《协议》的接受，并同意接受本《协议》各项条款的约束。 </p>
  </div>
  <div class="agree midWrap">
    <input id="agreeLic" type="checkbox" class="fl">
    <label class="fl" for="agreeLic">我已阅读并同意软件许可协议</label>
  </div>
  <!--内容End-->
  <div class="he32"></div>
  <!--按钮-->
  <div class="midWrap">
    <div class="btonWrap"><a id="nextBton" class="bton fl" href="index.php?action=2">下一步（N）</a>
    <a class="bton fr" href="javascript:void(0)">取消（C）</a></div>
  </div>
  <!--按钮End--> 
</div>
</body>
</html><?php }} ?>