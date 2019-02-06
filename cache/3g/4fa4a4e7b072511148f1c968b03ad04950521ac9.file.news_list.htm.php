<?php /* Smarty version Smarty-3.1.13, created on 2016-04-17 12:13:00
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/news_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:129585899357130d4c2e13a7-11191532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fa4a4e7b072511148f1c968b03ad04950521ac9' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/news_list.htm',
      1 => 1455615030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129585899357130d4c2e13a7-11191532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LCMX' => 0,
    'URL' => 0,
    'tshow' => 0,
    'newstype' => 0,
    'list' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57130d4c43f893_09397344',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57130d4c43f893_09397344')) {function content_57130d4c43f893_09397344($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_news_type_get')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_type_get.php';
if (!is_callable('smarty_function_lcmx_news_type')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_news_type.php';
if (!is_callable('smarty_function_lcmx_3g_news_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_news_list.php';
if (!is_callable('smarty_modifier_truncate')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/modifier.date_format.php';
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
<script type="text/javascript">
$(function(){
  $("#gengduo_button").click(function(){
	  var num=4;//显示个数
	  var page=$("#gengduo_button").attr('page');//第几个分页
	  var nodata=$("#gengduo_button").attr('nodata');//判断是否有数据
	  if(page){
		  page=parseInt(page);
		  }else{
			  page=1;
			  }
	  var type='<?php echo $_GET['c_id'];?>
';//新闻所属分类
	  var lanmu='<?php echo $_GET['lanmu'];?>
';//新闻所属栏目
	  //$("#test").text("栏目:"+lanmu+"数量:"+num+"类型:"+type+"分页:"+page);
	  
	  if(lanmu){
		  if(nodata!=="no"){
			  $.post("action/news_list_ajax_html5.php",{news_num:num,news_page:page,news_type:type,news_lanmu:lanmu},function(data){
			  if(data){
				  if(data=="2"){
					  alert("服务器错误，请稍后重试！");
					  }else{
						  if(data=="1"){
							  $('.tanchu').html("没有更多数据了")
										$('.tanchu').fadeIn(1000);
										setTimeout(
										function () {
											$('.tanchu').fadeOut(1000);
											
										}, 2000
										);
							  $("#gengduo_button").attr('nodata','no');
							  }else{
								  $(".one").append(data);
								  page=page+1;
								  $("#gengduo_button").attr('page',page);
								  }
						  }
				  }else{
					  alert("网络错误，请稍候重试！")
					  }
			  })
			  }else{
				
										$('.tanchu').fadeIn(1000);
										setTimeout(
										function () {
											$('.tanchu').fadeOut(1000);
											
										}, 2000
										);
				  }
		  }else{
			  alert("请求参数不正确！");
			  }
	  })
})
</script>
</head>

<body style="max-width:640px;margin:0 auto;">
<div class="tanchu"></div>
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
<div class="box">
  	<div class="box_main" align="center">
	  	<section>
	  		<div class="index_liebiao">
	  			<ul width="100%">
	  				<?php echo smarty_function_lcmx_news_type(array('set'=>"列表名:newstype,所属栏目:GET[lanmu],所属类别:0"),$_smarty_tpl);?>

	  				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['newstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
	  				<li style="width:23%;">
	  					<a href="index.php?p=news_list&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['c_title'];?>
</a>
	  				</li>
	  				<?php } ?>
	  			</ul>
	  		</div>
	  		<section class="one" > 
		      	<?php echo smarty_function_lcmx_3g_news_list(array('set'=>"列表名:news,显示数目:4,标题长度:8,类别:GET[c_id],栏目:GET[lanmu],分页显示:1,简介长度:15"),$_smarty_tpl);?>

		        <?php if ($_smarty_tpl->tpl_vars['news']->value){?>
		        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
				<div class="list1" align="left">
			        <article class="list">
			        	<a href="index.php?p=news_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=<?php echo $_GET['lanmu'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['list']->value['lc_title'],15,"...",true);?>
</a>
			        	<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%m-%d");?>
&nbsp;&nbsp;&nbsp;&nbsp;</span>
			        </article>
				</div>
		        <?php } ?>
		        <?php }?> 
		    </section>
		  
	      	<div class="sub_more" style="text-align:center;margin:3% 0;">
	        	<input name="查看更多信息" type="image" id="gengduo_button" page="2"  src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/g.png" style="width:12%;">
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