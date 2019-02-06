<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 22:13:26
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/news_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:4347061055712488671a451-23769610%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13bb183de847307d7cd11759215063556fc474a0' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/news_list.htm',
      1 => 1457329646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4347061055712488671a451-23769610',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'web_name' => 0,
    'URL' => 0,
    'type' => 0,
    'newstype' => 0,
    'list' => 0,
    'news' => 0,
    'k' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57124886961a05_53888230',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57124886961a05_53888230')) {function content_57124886961a05_53888230($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_news_type_get')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_type_get.php';
if (!is_callable('smarty_function_lcmx_news_type')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_type.php';
if (!is_callable('smarty_function_lcmx_news_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_list.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/modifier.date_format.php';
?><?php echo smarty_function_lcmx_news_type_get(array('set'=>"列表名:type,栏目:GET[lanmu],类别:GET[c_id]"),$_smarty_tpl);?>

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
		<div class="currency_bor">当前位置：<a href="index.php">首页</a> > <a href="index.php?p=news_list&lanmu=<?php echo $_GET['lanmu'];?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value['lanmuname'];?>
</a> > <a href="index.php?p=news_list&lanmu=<?php echo $_GET['lanmu'];?>
&c_id=<?php echo $_GET['c_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value['typename'];?>
</a></div>
	</div>
	<div class="conver1s">
			<div class="Title">
				<div class="TitleMaxSize"><?php echo $_smarty_tpl->tpl_vars['type']->value['lanmuname'];?>
</div>
				<div class="TitleMinSize">about us</div>
			</div>
			<div class="currency_type">
				<?php echo smarty_function_lcmx_news_type(array('set'=>"列表名:newstype,所属栏目:GET[lanmu]"),$_smarty_tpl);?>

			<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
					<a href="index.php?p=news_list&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
" class="currency_type_lanmu"><?php echo $_smarty_tpl->tpl_vars['list']->value['c_title'];?>
</a>
					<?php } ?>
			</div>
			<div class="about_conver">
				<?php echo smarty_function_lcmx_news_list(array('set'=>"列表名:news,栏目:GET[lanmu],类别:GET[c_id],显示数目:4,分页显示:1,标题长度:80"),$_smarty_tpl);?>

				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0){?>
				<div class="news_newsbor1 news_margin1 n<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
					<!-- 日期 -->
					<div class="news_Datatim">
						<div class="titme1">
								<span class="rq_titme"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%d");?>
</span>
								<span class="rq_titme1">/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%y");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%m");?>
月</span>
						</div>
					</div>
					<div class="news_consize">
						<p><a href="index.php?p=news_show&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
</a></p>
						<span><?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
</span>
					</div>
				</div>
				<?php }else{ ?>
				<div class="news_newsbor1 news_margin1 n<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
					<!-- 日期 -->
					<div class="news_Datatim">
						<div class="titme1">
								<span class="rq_titme"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%d");?>
</span>
								<span class="rq_titme1">/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%y");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%m");?>
月</span>
						</div>
					</div>
					<div class="news_consize">
						<p><a href="index.php?p=news_show&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
</a></p>
						<span><?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
</span>
					</div>
				</div>
				<?php }?>
				
				<?php } ?>
				<div class="cl"></div>
					<div class="main_page" id="page" style="margin-bottom:10px;"><ul><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</ul></div>
			</div>
	</div>
	<div class="cl"></div>
	<?php echo $_smarty_tpl->getSubTemplate ('bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>