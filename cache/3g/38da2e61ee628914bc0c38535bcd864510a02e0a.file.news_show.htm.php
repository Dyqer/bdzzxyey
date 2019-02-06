<?php /* Smarty version Smarty-3.1.13, created on 2016-04-17 13:31:58
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/news_show.htm" */ ?>
<?php /*%%SmartyHeaderCode:110551712857131fceb6d6d7-50417271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38da2e61ee628914bc0c38535bcd864510a02e0a' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/news_show.htm',
      1 => 1448343906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110551712857131fceb6d6d7-50417271',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LCMX' => 0,
    'URL' => 0,
    'tshow' => 0,
    'show' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57131fced9a370_14634091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57131fced9a370_14634091')) {function content_57131fced9a370_14634091($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_news_type_get')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_type_get.php';
if (!is_callable('smarty_function_lcmx_3g_news_show')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_news_show.php';
?><!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title><?php echo $_smarty_tpl->tpl_vars['LCMX']->value['touch_name'];?>
</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style/webstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style/nav.css" />
<script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/velocity.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/main.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/jquery.toTop.min.js"></script>
<script> 
$(document).ready(function(){
	 $("#a1").animate({
      left: "0%",
     opacity:"1",
    },800);
  $("#a2").animate({
      right: "0%",
     opacity:"1",
    },800);
	 $("#a3").animate({
      left: "0%",
     opacity:"1",
    },1000);
	 $("#a4").animate({
      right: "0%",
     opacity:"1",
    },1000);

 

	 $("#n1").animate({
      left: "0%",
     opacity:"1",
    },700);
    $("#n2").animate({
      right: "0%",
     opacity:"1",
    },800);
	 $("#n3").animate({
      left: "0%",
     opacity:"1",
    },900);
	 $("#n4").animate({
      right: "0%",
     opacity:"1",
    },1000);
	
		$(".search").click(function(){
			if($(".ss").width()==0){
				$(".ss").animate({width:'100%'});
			}
			else
			{
				$(".ss").animate({width:'0%'});
			}
		});
 });
 </script>
</head>

<body style="max-width:640px;margin:0 auto;">
<!--header start-->
<?php echo $_smarty_tpl->getSubTemplate ("head.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--header end--> 

<!--index start-->

	<div class="lanmu" align="center">
		  <div style="width:94%;padding-top: 4%;padding-bottom:5%;" align="center">
		  	<?php echo smarty_function_lcmx_news_type_get(array('set'=>"列表名:tshow,类别:GET[c_id],栏目:GET[lanmu]"),$_smarty_tpl);?>

		  	<span style="color:#fff;font-size:26px;"><?php echo $_smarty_tpl->tpl_vars['tshow']->value['lanmuname'];?>
</span>
		  </div>
		</div> 

  	<div class="box_main">
	  		
	  	
        <div class="news_show_cont" style="padding:5%;">
			<?php echo smarty_function_lcmx_3g_news_show(array('set'=>"列表名:show,编号:GET[id],栏目:GET[lanmu]"),$_smarty_tpl);?>

			<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
			<span><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_content'];?>
</span>
		</div>
        
   </div>
   
   <div class="page1">
        <ul>
          <li>
            <div><?php if ($_smarty_tpl->tpl_vars['show']->value['p_id']){?><a href="index.php?p=news_show&id=<?php echo $_smarty_tpl->tpl_vars['show']->value['p_id'];?>
&lanmu=<?php echo $_GET['lanmu'];?>
">上一页</a><?php }else{ ?>暂无<?php }?></div>
          </li>
          <li>
            <div><?php if ($_smarty_tpl->tpl_vars['show']->value['n_id']){?><a href="index.php?p=news_show&id=<?php echo $_smarty_tpl->tpl_vars['show']->value['n_id'];?>
&lanmu=<?php echo $_GET['lanmu'];?>
">下一页</a><?php }else{ ?>暂无<?php }?></div>
          </li>
        </ul>
      </div>

<div class="cl"></div>
<!--index end--> 

<!--footer start-->
<?php echo $_smarty_tpl->getSubTemplate ("foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--footer end-->
</body>
</html>
<?php }} ?>