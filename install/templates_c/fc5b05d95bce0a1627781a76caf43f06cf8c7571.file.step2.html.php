<?php /* Smarty version Smarty-3.1.13, created on 2019-02-06 20:40:49
         compiled from "/app/install/templates/step2.html" */ ?>
<?php /*%%SmartyHeaderCode:19637039825c5ad5d110d269-77000119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc5b05d95bce0a1627781a76caf43f06cf8c7571' => 
    array (
      0 => '/app/install/templates/step2.html',
      1 => 1549455337,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19637039825c5ad5d110d269-77000119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'system_info' => 0,
    'dir_check' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5c5ad5d1159e38_62204682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c5ad5d1159e38_62204682')) {function content_5c5ad5d1159e38_62204682($_smarty_tpl) {?><!doctype html>
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
      <li><span class="up"></span> <em>环境检测</em></li>
      <li><span></span> <em>参数配置</em></li>
      <li><span></span> <em>开始安装</em></li>
      <li><span></span> <em>安装完成</em></li>
    </ul>
    <div class="setupR"></div>
  </div>
  <!--导航End--> <!--内容-->
  <div class="midWrap option">
    <div class="fl foBox">
      <h3>服务器信息：</h3>
      <div class="he13"></div>
      服务器操作系统：<span class="xx"><?php echo $_smarty_tpl->tpl_vars['system_info']->value['os'];?>
</span><br>
      服务器解译引擎：<span class="xx"><?php echo $_smarty_tpl->tpl_vars['system_info']->value['web_server'];?>
</span><br>
      PHP版本：<span class="xx"><?php echo $_smarty_tpl->tpl_vars['system_info']->value['php_ver'];?>
</span><br>
      上传附件最大值：<span class="xx"><?php echo $_smarty_tpl->tpl_vars['system_info']->value['max_filesize'];?>
</span></div>
    <div class="fr foBox">
      <h3>目录权限检测：</h3>
      <div class="he13"></div>
      <table width="100%" border="0" cellspacing="1" cellpadding="0">
        <tr>
          <td width="33%" align="center" height="18"><strong>目录名</strong></td>
          <td width="33%" align="center"><strong>读取权限</strong></td>
          <td align="center"><strong>写入权限</strong></td>
        </tr>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['dir'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['name'] = 'dir';
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['dir_check']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] = 1;
            $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total'];
            $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['dir']['total']);
?>
        <tr>
          <td align="center"><?php echo $_smarty_tpl->tpl_vars['dir_check']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]['dir'];?>
</td>
          <td align="center" class="xx"><?php echo $_smarty_tpl->tpl_vars['dir_check']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]['read'];?>
</td>
          <td align="center"><?php echo $_smarty_tpl->tpl_vars['dir_check']->value[$_smarty_tpl->getVariable('smarty')->value['section']['dir']['index']]['write'];?>
</td>
        </tr>
        <?php endfor; endif; ?>
      </table>
    </div>
    <div class="clear"></div>
  </div>
  <!--内容End-->
  <div class="he32"></div>
  <!--按钮-->
  <div class="midWrap">
    <div class="btonWrap"><a class="bton fl" href="index.php?action=1">上一步（B）</a> <a class="bton fr" href="index.php?action=3">下一步（N）</a></div>
  </div>
  <!--按钮End--></div>
</body>
</html><?php }} ?>