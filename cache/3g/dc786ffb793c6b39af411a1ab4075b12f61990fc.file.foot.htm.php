<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 19:48:47
         compiled from "/home/bdzzxyey/public_html/3g/templates/default/foot.htm" */ ?>
<?php /*%%SmartyHeaderCode:4801527275712269fca6771-95519658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dc786ffb793c6b39af411a1ab4075b12f61990fc' => 
    array (
      0 => '/home/bdzzxyey/public_html/3g/templates/default/foot.htm',
      1 => 1448343906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4801527275712269fca6771-95519658',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'touchbot' => 0,
    'touch' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5712269fcf7c50_56377278',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5712269fcf7c50_56377278')) {function content_5712269fcf7c50_56377278($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_3g_touch_show')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_3g_touch_show.php';
?><link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
fonts/font-awesome-4.3.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
css/menu.css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js1/menu.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js1/TweenMax.min.js"></script> 
<div class="copyright"><?php echo smarty_function_lcmx_3g_touch_show(array('set'=>"列表名:touchbot,编号:1"),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['touchbot']->value['bot'];?>
</div>
<div style="height:60px;"></div>

<!--<footer class="footer">
  <ul>
    <li class="footer_text"><a href="tel:<?php echo smarty_function_lcmx_3g_touch_show(array('set'=>'列表名:touch,编号:1'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['touch']->value['tel'];?>
">电话</a></li>
    <li class="footer_text"><a href="sms:<?php echo smarty_function_lcmx_3g_touch_show(array('set'=>'列表名:touch,编号:1'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['touch']->value['duanxin'];?>
">短信</a></li>
    <li style="padding:10px 0;"><a href="index.php"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/icon1.png"></a></li>
    <li class="footer_text"><a href="index.php?p=map">地图</a></li>
    <li class="footer_text"><a href="index.php?p=fenxiang">分享</a></li>
    <div class="cl"></div>
  </ul>
</footer>-->

<div class="menu">
  <div class="menu-wrapper">
    <ul class="menu-items">
      <li class="menu-item">
        <button class="menu-item-button"> <a href="tel:<?php echo smarty_function_lcmx_3g_touch_show(array('set'=>'列表名:touch,编号:1'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['touch']->value['tel'];?>
" style="color:#FFF;"><div class="menu_text">电话</div></a> </button>
        <div class="menu-item-bounce"></div>
      </li>
      <li class="menu-item">
        <button class="menu-item-button"><a href="sms:<?php echo smarty_function_lcmx_3g_touch_show(array('set'=>'列表名:touch,编号:1'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['touch']->value['duanxin'];?>
" style="color:#FFF;"><div class="menu_text">短信</div></a></button>
        <div class="menu-item-bounce"></div>
      </li>
       <li class="menu-item">
        <button class="menu-item-button"> <a href="index.php" style="color:#FFF;"><div class="menu_text">首页</div></a></button>
        <div class="menu-item-bounce"></div>
      </li>
      <li class="menu-item">
        <button class="menu-item-button"> <a href="index.php?p=map" style="color:#FFF;"><div class="menu_text">地图</div></a></button>
        <div class="menu-item-bounce"></div>
      </li>
      <li class="menu-item">
        <button class="menu-item-button"> <a href="index.php?p=fenxiang" style="color:#FFF;"><div class="menu_text">分享</div></a></button>
        <div class="menu-item-bounce"></div>
      </li>
    </ul>
    <button class="menu-toggle-button"> <i class="fa fa-plus menu-toggle-icon"></i> </button>
  </div>
</div>

<a class="to-top">Top</a> 
<script>
$(function() {
	$('.to-top').toTop();
});
</script> 
<?php if ($_GET['jiance']!=''){?>
<script language="JavaScript"> 
document.body.innerHTML = document.body.innerHTML.replace(/<?php echo $_GET['jiance'];?>
/gi,"<font color=red><?php echo $_GET['jiance'];?>
</font>"); 
</script>
<?php }?><?php }} ?>