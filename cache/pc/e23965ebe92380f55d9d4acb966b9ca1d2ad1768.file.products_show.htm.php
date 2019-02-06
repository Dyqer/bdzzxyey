<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 22:13:32
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/products_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:7465907905712488c3767d2-24116020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e23965ebe92380f55d9d4acb966b9ca1d2ad1768' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/products_show.htm',
      1 => 1457322510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7465907905712488c3767d2-24116020',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5712488c455d11_89366083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5712488c455d11_89366083')) {function content_5712488c455d11_89366083($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_products_type_get')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_products_type_get.php';
if (!is_callable('smarty_function_lcmx_products_type')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_products_type.php';
if (!is_callable('smarty_function_lcmx_products_show')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_products_show.php';
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
			<div class="about_conver">
				<?php echo smarty_function_lcmx_products_show(array('set'=>"列表名:show,编号:GET[id]"),$_smarty_tpl);?>

						<div class="pro_left">
							<div class="tw_title"><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</div>
							<div class="fx_zaixian">
								<div style="width:163px;height:66px;float:left;">
									<div class="bdsharebuttonbox">
										<a title="分享到微信" href="#" class="bds_weixin" data-cmd="weixin"></a>
										<a title="分享到新浪微博" href="#" class="bds_tsina" data-cmd="tsina"></a>
										<a title="分享到腾讯微博" href="#" class="bds_tqq" data-cmd="tqq"></a>
										<a title="分享到豆瓣网" href="#" class="bds_douban" data-cmd="douban"></a>
										<a title="分享到花瓣" href="#" class="bds_huaban" data-cmd="huaban"></a>
									</div>
									<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
								</div>
								<a href="index.php?p=gbook&lanmu=6" class="fx_azaixian">在线咨询</a>
							</div>
							<div class="cl"></div>
							<div class="por_showimg">
									<img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" style="border: 1px solid red;" alt="">
							</div>
							<div class="cl"></div>
							<div class="por_showcon">
								<div style="width:100%;text-align: left;">详细介绍:</div>
								<?php echo $_smarty_tpl->tpl_vars['show']->value['lc_content'];?>

							</div>
							 <div class="pageleft">
	                         		上一条： <?php if ($_smarty_tpl->tpl_vars['show']->value['p_id']){?> <a class="awwa"  href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['show']->value['p_id'];?>
&c_id=<?php echo $_GET['c_id'];?>
&lanmu=<?php echo $_GET['lanmu'];?>
" style="color:#959595;"><?php echo $_smarty_tpl->tpl_vars['show']->value['p_title'];?>
</a> <?php }else{ ?> 暂无 <?php }?>
	                         	</div>
	                            <div class="pageright">下一条： <?php if ($_smarty_tpl->tpl_vars['show']->value['n_id']){?> <a class="awwa"  href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['show']->value['n_id'];?>
&c_id=<?php echo $_GET['c_id'];?>
&lanmu=<?php echo $_GET['lanmu'];?>
" style="color:#959595;"><?php echo $_smarty_tpl->tpl_vars['show']->value['n_title'];?>
</a> <?php }else{ ?> 暂无 <?php }?>
	                            </div>
						</div>
						<div class="pro_right"><?php echo $_smarty_tpl->getSubTemplate ('pro_right.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
			</div>
	</div>
	<div class="cl"></div>
	<?php echo $_smarty_tpl->getSubTemplate ('bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>