<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 22:21:19
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:25920327757124a5f1b6949-11330188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '065f1e9faa096bce17821033078555480ce58276' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/index.htm',
      1 => 1455519958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25920327757124a5f1b6949-11330188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'LCMX' => 0,
    'show' => 0,
    'news' => 0,
    'i' => 0,
    'list' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57124a5f287632_67388865',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57124a5f287632_67388865')) {function content_57124a5f287632_67388865($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_3g_danye_show')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_danye_show.php';
if (!is_callable('smarty_function_lcmx_3g_news_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_news_list.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_lcmx_3g_products_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_products_list.php';
?><!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style/webstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style/nav.css" />
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/jquery.toTop.min.js"></script>
<!-- <script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/velocity.min.js"></script> -->
<!-- <script src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/main.js"></script> -->
<script src="http://apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.js"></script>
<title><?php echo $_smarty_tpl->tpl_vars['LCMX']->value['touch_name'];?>
</title>
</head>

<body style="max-width:640px;margin:0 auto;">

<!--header start-->
<?php echo $_smarty_tpl->getSubTemplate ("head_top.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--header end--> 

<!--index start-->

<section class="top_list">
  <ul>
    <li id="a1" style="left:-50%; opacity:0"> <a href="index.php?p=about&lanmu=3">
      <div class="top_list_t">走进公司</div>
      <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/pic1.jpg"> </a></li>
    <li id="a2" style="right:-50%;opacity:0;"> <a href="index.php?p=about&lanmu=7">
      <div class="top_list_t">百度推广</div>
      <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/pic2.jpg"> </a></li>
    <li id="a3" style="left:-50%;opacity:0"> <a href="index.php?p=about&lanmu=8">
      <div class="top_list_t">网站建设</div>
      <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/pic3.jpg"></a> </li>
    <li id="a4" style="right:-50%;opacity:0;"> <a href="index.php?p=about&lanmu=9">
      <div class="top_list_t">联系我们</div>
      <img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/pic4.jpg"> </a></li>
    <div class="cl"></div>
  </ul>
</section>
<section class="product" id="com_nr">
  <div class="com_title"><a href="index.php?p=about&lanmu=3">公司简介</a></div>
  <div class="company">
  <?php echo smarty_function_lcmx_3g_danye_show(array('set'=>"列表名:show,编号:7"),$_smarty_tpl);?>

    <div class="com_pic"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
"></div>
    <?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>
</div>
    
    <div class="com_more"><a href="index.php?p=about&lanmu=3">更多</a></div>
</section>
<section class="news" id="news_list">
  <div class="news_title"><a href="index.php?p=news_list&lanmu=1">新闻中心</a></div>
  <ul>
  
  
  <?php echo smarty_function_lcmx_3g_news_list(array('set'=>"列表名:news,显示数目:4,标题长度:12,栏目:1"),$_smarty_tpl);?>

    <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
     <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
        <li id="n<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" style="position:relative;<?php if ($_smarty_tpl->tpl_vars['i']->value%2==1){?>left<?php }else{ ?>right<?php }?>:-50%;opacity:0"><a href="index.php?p=news_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=1"><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</a>  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%m-%d");?>
</li>
         <!--<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
-->
     <?php } ?>

  </ul>
  <div class="news_more2"><a href="index.php?p=news_list&lanmu=1">更多</a></div>
</section>
<section class="product" id="pro_list">
  <div class="pro_title"><a href="index.php?p=products_list&lanmu=2" >产品展示</a></div>
  <ul class="pro_nr">
    <!-- <li><a href="#">
      <div style="position:relative;height:65px;padding:35px 0 0 0;">
        <div style="position:absolute;left:0;top:0;z-index:999"><img src="images/pic5.jpg" height="120"></div>
        <div class="line-scale">
          <div></div>
          <div></div>
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <div class="pro_text">产品展示</div>
      </a> </li>-->
      
     <?php echo smarty_function_lcmx_3g_products_list(array('set'=>"列表名:products,显示数目:4,栏目:2,标题长度:12,推荐:1"),$_smarty_tpl);?>

        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
    <li>
    <div class="pro_nr_pic">
        <a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=2"><img src="" class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['list']->value['big_pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
" width="100%"  >  </a></div>
        	<div class="pro_text"><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</div>
       
        
    </li>
  <?php } ?> 
      
    <div class="cl"></div>
  </ul>
  <div class="pro_more"><a href="index.php?p=products_list&lanmu=2">更多</a></div>
</section>

<!--index end--> 

<!--footer start-->
<?php echo $_smarty_tpl->getSubTemplate ("foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script type="text/javascript"> 
 
$(document).ready(function() { 
$("img").lazyload({ 
effect: "fadeIn"
}); 
}); 

</script>

<script> 

window.onload = function(){
 $("#a1").animate({
      left: "0%",
     opacity:"1",
    },600);
  $("#a2").animate({
      right: "0%",
     opacity:"1",
    },600);
	 $("#a3").animate({
      left: "0%",
     opacity:"1",
    },800);
	 $("#a4").animate({
      right: "0%",
     opacity:"1",
    },800);
}
$(document).ready(function(){
	
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
 
$(window).scroll(function(){
		var docViewTop = $(window).scrollTop(),
			win_h = $(window).height();
		console.log(docViewTop)
		console.log($("#news_list").offset().top);
			if(docViewTop>=($("#news_list").offset().top-400))
			
			{
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
	
	$(".news_more2").addClass('news_more1');
	
		}else {
			
	 $("#n1").animate({
      left: "-50%",
     opacity:"0",
    },0);
    $("#n2").animate({
      right: "-50%",
     opacity:"0",
    },0);
	 $("#n3").animate({
      left: "-50%",
     opacity:"0",
    },0);
	 $("#n4").animate({
      right: "-50%",
     opacity:"0",
    },0);	
    }

if(docViewTop>=($("#pro_list").offset().top-400))
			
			{
	$(".pro_nr li").addClass('pro_zz');
	$(".pro_more").addClass('news_more1');
	
		}else {
	$(".pro_nr li").removeClass('pro_zz');
	
    }
	
	
	if(docViewTop>=($("#com_nr").offset().top-400))
			
			{
	$(".company").addClass('com_tm');
	$(".com_more").addClass('news_more1');
		}else {
	$(".company").removeClass('com_tm');
	
    }

 });

function getheight(ojb) {
	return $("#"+ojb).height();
}
console.log(getheight("news_list")); 

</script> 

<!--footer end-->
</body>
</html>
<?php }} ?>