<?php /* Smarty version Smarty-3.1.13, created on 2016-04-17 12:12:20
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/seach_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:203907214757130d242903a2-13435116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2fe6f4f7b99b240601773da24e11d814160a95e5' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/seach_list.htm',
      1 => 1448343906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203907214757130d242903a2-13435116',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LCMX' => 0,
    'URL' => 0,
    'news_list' => 0,
    'pro_list' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57130d243f8379_13544189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57130d243f8379_13544189')) {function content_57130d243f8379_13544189($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_seach_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_seach_list.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/modifier.truncate.php';
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
		  	
		  	<span style="color:#fff;font-size:26px;">搜索列表</span>
		  </div>
		</div> 
<div class="box">
  	<div class="box_main" align="center">
	  	<section>
	  		<div class="index_liebiao">
	  			
	  		</div>
	  		<section> 
		      <?php echo smarty_function_lcmx_seach_list(array('set'=>"显示数目:20,标题长度:40,分页显示:1"),$_smarty_tpl);?>

              <?php if ($_smarty_tpl->tpl_vars['news_list']->value||$_smarty_tpl->tpl_vars['pro_list']->value){?>
              
              
              
              
      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>

      <div class="list1" align="left">
			        <article class="list">
			        	<a href="index.php?p=news_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['list']->value['lc_title'],15,"...",true);?>
</a>
			        	<span>【新闻】&nbsp;&nbsp;&nbsp;&nbsp;</span>
			        </article>
				</div>
      
      <?php } ?>
      <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pro_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
      
      
       <div class="list1" align="left">
			        <article class="list">
			        	<a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['list']->value['lc_title'],15,"...",true);?>
</a>
			        	<span>【图文】&nbsp;&nbsp;&nbsp;&nbsp;</span>
			        </article>
				</div>
      
      
      
      <?php } ?>
      <?php }else{ ?> 暂无该类文章！ <?php }?>
              
              
              
		       
		    </section>
		  
	      	<div class="sub_more" style="text-align:center;margin:3% 0;">
	        
	      	</div>
	  	</section>
	    
	    
	</div>
</div>

<!--index end--> 

<!--footer start-->
<?php echo $_smarty_tpl->getSubTemplate ("foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--footer end-->
</body>
</html>
<?php }} ?>