<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 20:43:00
         compiled from "/home/bdzzxyey/public_html/templates/default/about.htm" */ ?>
<?php /*%%SmartyHeaderCode:91574939571233547a6373-36315560%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '050019088d70374888fc08ae8811a47144075c38' => 
    array (
      0 => '/home/bdzzxyey/public_html/templates/default/about.htm',
      1 => 1456716190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91574939571233547a6373-36315560',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'web_name' => 0,
    'URL' => 0,
    'type' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57123354936741_62030023',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57123354936741_62030023')) {function content_57123354936741_62030023($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_danye_show')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_danye_show.php';
if (!is_callable('smarty_function_lcmx_danye_type')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_danye_type.php';
?><?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:GET[id],栏目:GET[lanmu]"),$_smarty_tpl);?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['show']->value['description'];?>
">
	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['show']->value['keywords'];?>
">
	<title><?php echo $_smarty_tpl->tpl_vars['web_name']->value;?>
</title>
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style.css">
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/jquery-1.11.3.js"></script> 
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ('herder.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="currency_fl">
		<div class="currency_bor">当前位置：<a href="index.php">首页</a> > <a href="index.php?p=about&lanmu=<?php echo $_smarty_tpl->tpl_vars['show']->value['lanmu'];?>
"><?php echo $_smarty_tpl->tpl_vars['show']->value['lanmuname'];?>
</a> > <a href="index.php?p=about&lanmu=<?php echo $_smarty_tpl->tpl_vars['show']->value['lanmu'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['show']->value['lc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</a></div>
	</div>
	<div class="conver">
			<div class="Title">
				<div class="TitleMaxSize"><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</div>
				<div class="TitleMinSize">about us</div>
			</div>
			<div class="currency_type">
				<?php echo smarty_function_lcmx_danye_type(array('set'=>"列表名:type,所属栏目:GET[lanmu]"),$_smarty_tpl);?>

				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['type']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
					<a href="index.php?p=about&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
" class="currency_type_lanmu"><?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
</a>
				<?php } ?>
			</div>
			<div class="about_conver">
						<?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>

			</div>
			<div class="cl"></div>
	</div>
	<div class="cl"></div>
	<?php echo $_smarty_tpl->getSubTemplate ('bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>