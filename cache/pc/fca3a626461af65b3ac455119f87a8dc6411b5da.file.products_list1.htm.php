<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 22:18:38
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/products_list1.htm" */ ?>
<?php /*%%SmartyHeaderCode:84848517571249be797d73-92088178%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fca3a626461af65b3ac455119f87a8dc6411b5da' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/products_list1.htm',
      1 => 1457329392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84848517571249be797d73-92088178',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'web_name' => 0,
    'URL' => 0,
    'tshow' => 0,
    'productstype' => 0,
    'list' => 0,
    'products' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_571249be85f8c8_26941487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571249be85f8c8_26941487')) {function content_571249be85f8c8_26941487($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_products_type_get')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_products_type_get.php';
if (!is_callable('smarty_function_lcmx_products_type')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_products_type.php';
if (!is_callable('smarty_function_lcmx_products_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_products_list.php';
?><?php echo smarty_function_lcmx_products_type_get(array('set'=>"列表名:tshow,类别:GET[c_id],栏目:GET[lanmu]"),$_smarty_tpl);?>

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
		<div class="currency_bor">当前位置：<a href="index.php">首页</a> > <a href="index.php?p=products_list&lanmu=<?php echo $_smarty_tpl->tpl_vars['tshow']->value['lanmu'];?>
"><?php echo $_smarty_tpl->tpl_vars['tshow']->value['lanmuname'];?>
</a> > <a href="index.php?p=products_list&lanmu=<?php echo $_smarty_tpl->tpl_vars['tshow']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['tshow']->value['type'];?>
"><?php echo $_smarty_tpl->tpl_vars['tshow']->value['typename'];?>
</a></div>
	</div>
	<div class="conver">
			<div class="Title">
				<div class="TitleMaxSize"><?php echo $_smarty_tpl->tpl_vars['tshow']->value['lanmuname'];?>
</div>
				<div class="TitleMinSize">about us</div>
			</div>
			<div class="currency_type">
					<?php echo smarty_function_lcmx_products_type(array('set'=>"列表名:productstype,所属栏目:GET[lanmu],所属类别:0"),$_smarty_tpl);?>

          			 <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
					<a href="index.php?p=products_list&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
" class="currency_type_lanmu"><?php echo $_smarty_tpl->tpl_vars['list']->value['c_title'];?>
</a>
					 <?php } ?>
			</div>
			<div style="height:40px;width:100%;"></div>
			<div class="pro1_conver">
				<?php echo smarty_function_lcmx_products_list(array('set'=>"列表名:products,标题长度:10,类别:GET[c_id],栏目:GET[lanmu],显示数目:4,分页显示:1"),$_smarty_tpl);?>

					<?php if ($_smarty_tpl->tpl_vars['products']->value){?>
			      	<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
						<a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
" style="color:#000;"><div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" alt="" width="100%" height="252px"></div>
						<div class="por2_size">
							<p><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
				</a>
					<?php } ?>
			        <?php }else{ ?> 
			            暂无该类图文！
			        <?php }?>
			        <div class="cl"></div>
					<div class="main_page" id="page" style="margin-bottom:10px;"><ul><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</ul></div>
					<!-- <div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
					<div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
					<div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
					<div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
					<div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
					<div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div>
					<div class="por2_bor">
						<div class="por2_img"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/asdasd_03.jpg" alt=""></div>
						<div class="por2_size">
							<p>宇华电器企业形象</p>
							<span>产品包装的精美和包装质量的保障，能够有效...</span>
						</div>
					</div> -->
			</div>
	</div>
	<div class="cl"></div>
		<?php echo $_smarty_tpl->getSubTemplate ('bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>