<?php /* Smarty version Smarty-3.1.13, created on 2015-12-10 15:52:58
         compiled from "D:\AppServ\www\TEMPLET\install\templates\error.html" */ ?>
<?php /*%%SmartyHeaderCode:2229256692f5a456a89-51328311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25dc6db80b3fd5d927f6cc746f53684b20283110' => 
    array (
      0 => 'D:\\AppServ\\www\\TEMPLET\\install\\templates\\error.html',
      1 => 1449733751,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2229256692f5a456a89-51328311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'gourl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_56692f5a4b1253_07037200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56692f5a4b1253_07037200')) {function content_56692f5a4b1253_07037200($_smarty_tpl) {?><!doctype html>
<html>
<head>
<title>龙采MX 4.0</title>
<meta charset="utf-8">
<link href="templates/resource/css/base.css" rel="stylesheet" type="text/css">
<!--[if IE 6]>
    <script src="templates/resource/js/DD_belatedPNG_0.0.8a-min.js" type="text/javascript"></script>
    <script  type="text/javascript">
        DD_belatedPNG.fix('%logo, .pageTitle, .setupNav, .setupL, .setupR, .setupNav li span, .bton, background');
    </script>
<![endif]-->
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
      <li><span></span> <em>参数配置</em></li>
      <li><span></span> <em>开始安装</em></li>
      <li><span></span> <em>安装完成</em></li>
    </ul>
    <div class="setupR"></div>
  </div>
  <!--导航End--> <!--内容-->
  <div class="midWrap option">
    <div>
      <table width="50%" border="0" align="center" cellpadding="6" cellspacing="0">
        <tr>
          <td style="font-size: 13px; padding-left: 15px"><strong>系统提示</strong></td>
        </tr>
        <tr>
          <td style="line-height: 200%;"><table width="100%" border="0" cellpadding="0" cellspacing="7">
              <tr>
                <td height="30" align="center"><strong style="color: % 009900; font-size: 14px"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</strong></td>
              </tr>
              <tr>
                <td align="center"><?php if ($_smarty_tpl->tpl_vars['gourl']->value=='goback'){?>
                  <p class="marginbot"><a class="lightlink"
					href="javascript:history.back();">点击这里返回</a></p>
                  <?php }else{ ?>
                  <p><a class="lightlink" href="<?php echo $_smarty_tpl->tpl_vars['gourl']->value;?>
">如果您的浏览器没有反应，请点击这里</a></p>
                  <script type="text/javascript">setTimeout("location.replace('<?php echo $_smarty_tpl->tpl_vars['gourl']->value;?>
')",'2000')</script> 
                  <?php }?></td>
              </tr>
            </table></td>
        </tr>
      </table>
    </div>
    <div class="clear"></div>
  </div>
  <!--内容End-->
  <div class="he32"></div>
</div>
</body>
</html><?php }} ?>