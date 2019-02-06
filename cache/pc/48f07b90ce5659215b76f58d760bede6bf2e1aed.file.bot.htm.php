<?php /* Smarty version Smarty-3.1.13, created on 2016-04-17 15:56:00
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/bot.htm" */ ?>
<?php /*%%SmartyHeaderCode:107037785571248603a14a2-85044303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48f07b90ce5659215b76f58d760bede6bf2e1aed' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/bot.htm',
      1 => 1460879757,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107037785571248603a14a2-85044303',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_571248603ed947_24916538',
  'variables' => 
  array (
    'show' => 0,
    'news' => 0,
    'list' => 0,
    'URL' => 0,
    'LCMX' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571248603ed947_24916538')) {function content_571248603ed947_24916538($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_danye_show')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_danye_show.php';
if (!is_callable('smarty_function_lcmx_news_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_list.php';
?><div class="bot">
	<div class="bot_bor">
		<div class="con_bot1">
			<div class="gg1">
				<div class="QQtitle"><span>在线咨询</span>consulting</div><?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:12,栏目:11"),$_smarty_tpl);?>

				
				<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>
&amp;site=qq&amp;menu=yes"><div class="bot1_QQ" style="margin-right:25px;"></div></a>
				<div class="bot1_QQ" style="margin-right:25px;"></div>
				<div class="bot1_QQ" style="margin-right:25px;"></div>
				<div class="bot1_QQ"></div>
			</div>
			<div class="gg2">
				
			</div>
			<div class="gg3">
						<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:11,栏目:11"),$_smarty_tpl);?>

				<div style="font-size:29px;color:#FFF;"><?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>
</div>
				<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:12,栏目:11"),$_smarty_tpl);?>

				<div style="width:195px;height:25px;font-size:18px;color:#b7b7b7;float:right;text-align:left;padding-left:5px;">QQ:<?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>
</div>
			</div>
		</div>
		<div class="cl"></div>
		<div class="con_bot2">
			<div class="con">
				<?php echo smarty_function_lcmx_news_list(array('set'=>"列表名:news,栏目:13,类别:3,显示数目:6,分页显示:1,标题长度:80"),$_smarty_tpl);?>

				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
				<a href="http://<?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
" class="con_a_a"><?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
</a>
				<?php } ?>
			</div>
		</div>
		<div class="cl"></div>
		
		<div class="con_bot3">
			<div class="con3_login">
				<!-- <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/login11.png" alt=""> -->
			</div>
			<div class="dhdz">
				<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:11,栏目:11"),$_smarty_tpl);?>

				<div class="con3_dh1"><?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>
</div>
				<div class="con3_dz2">公司地址:<?php echo $_smarty_tpl->tpl_vars['LCMX']->value['bot'];?>
</div>
			</div>
		</div>
	</div>
	<div class="cl"></div>
	<div class="con_bot4">版权所有：博山区八陡镇中心幼儿园</div>
</div>
<div class="dingbu">
		<ul>
			<li class="li1"> <span>在线咨询</span></li>
			<li class="li2"> <span>0533-4911669</span></li>
			<li class="li3"><a href="#aa" style="color:#FFF;"><span>回到顶部</span></a></li>
		</ul>
		<div class="clear"></div>
	</div>
<div class="fanhui">
			<img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/33.png" alt="">
		    <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/34.png" alt="">
		    <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/35.png" alt="">
</div>

	<script>

	$('.fanhui img').mouseenter(function(){
	    num = $(this).index();
	    $('.dingbu li').eq(num).siblings().hide();
	    $('.dingbu li').eq(num).show();
	  })
	$('.fanhui img').mouseleave(function(){
	    $('.dingbu li').eq(num).hide();
	    // $('.dingbu li').eq(num).siblings().hide();
	    // $('.dingbu li').eq(num).show();
	  })


	</script><?php }} ?>