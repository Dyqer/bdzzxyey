<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 22:13:32
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/pro_right.htm" */ ?>
<?php /*%%SmartyHeaderCode:6050108325712488c470d23-07848982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02ae8ba9abd3d62c6ab0f4679caf674234ea0c25' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/pro_right.htm',
      1 => 1457331244,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6050108325712488c470d23-07848982',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'URL' => 0,
    'news' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5712488c4bbc98_74140719',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5712488c4bbc98_74140719')) {function content_5712488c4bbc98_74140719($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_danye_show')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_danye_show.php';
if (!is_callable('smarty_function_lcmx_news_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_list.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/modifier.date_format.php';
?><div class="lxr">
	<div class="right_xl">
		<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:11,栏目:11"),$_smarty_tpl);?>

		<span><?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>
</span>
	</div>
	<div class="cl"></div>
	<div class="right_xl_conver">
		<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:16,栏目:11"),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>

	</div>
	<div class="cl"></div>
	<div class="lxr_jptj">
		<div class="lxr_jptj_size">
			<p>精品推荐</p>
			Recommend
		</div>
	</div>
	<div class="cl"></div>
	<div class="lxr_news">
			<span style="text-align: left;float:left; font-size:20px; color:#000;">新闻动态</span>
			 <a href=""><span style="text-align: right; float:right;color:#3c3c3c;">了解更多   <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/ljgd.png"></span></a>
	</div>
	<div class="cl"></div>
	<?php echo smarty_function_lcmx_news_list(array('set'=>"列表名:news,栏目:1,类别:1,显示数目:3,标题长度:25"),$_smarty_tpl);?>

	<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
	<a class="anewsa" href="index.php?p=news_show&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
">
	<div class="lxnews_list">
		<div class="title_Time">
			<div class="rq_title">
					<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%d.%m");?>
<span style="font-size:14px;"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%Y");?>
</span>
			</div>
			<div class="rq_ms">
				<?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>

			</div>
		</div>
		<div class="lxnews_list_conver">
				<?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>

		</div>
	</div>
	</a>
	<div class="cl"></div>
	<?php } ?>


</div><?php }} ?>