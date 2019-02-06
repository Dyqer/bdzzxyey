<?php /* Smarty version Smarty-3.1.13, created on 2016-04-17 13:32:57
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/products_list.htm" */ ?>
<?php /*%%SmartyHeaderCode:557665366571320092a44a7-51367395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a51c0f4415d1d52330e2cbb5f3f09e3d9c05eaa' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/products_list.htm',
      1 => 1448343906,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '557665366571320092a44a7-51367395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'LCMX' => 0,
    'URL' => 0,
    'tshow' => 0,
    'productstype' => 0,
    'list' => 0,
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5713200942b290_65019771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5713200942b290_65019771')) {function content_5713200942b290_65019771($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_3g_products_type_get')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_products_type_get.php';
if (!is_callable('smarty_function_lcmx_3g_products_type')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_products_type.php';
if (!is_callable('smarty_function_lcmx_3g_products_list')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_products_list.php';
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
<script src="http://apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.js"></script>
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
					$.post("action/products_list_ajax_html5.php",{products_num:num,products_page:page,products_type:type,products_lanmu:lanmu},function(data){
						if(data){
							if(data=="2"){
								alert("服务器错误，请稍后重试！");
								}else{
									if(data=="1"){
										
										$('.tanchu').fadeIn(1000).html("没有更多数据了");
										setTimeout(
										function () {
											$('.tanchu').fadeOut(1000);
											
										}, 2000
										);
										
										$("#gengduo_button").attr('nodata','no');
										}else{
											$(".products_list").append(data);
											page=page+1;
											$("#gengduo_button").attr('page',page);
											}
									}
							}else{
								
								$('.tanchu').fadeIn(1000);
										setTimeout(
										function () {
											$('.tanchu').fadeOut(1000);
										}, 2000
										);
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
		  	<?php echo smarty_function_lcmx_3g_products_type_get(array('set'=>"列表名:tshow,类别:GET[c_id],栏目:GET[lanmu]"),$_smarty_tpl);?>

		  	<span style="color:#fff;font-size:26px;"><?php echo $_smarty_tpl->tpl_vars['tshow']->value['lanmuname'];?>
</span>
		  </div>
		</div> 
<div class="box">
  	<div class="box_main" align="center">
	  	<section>
	  		<div class="index_liebiao">
	  			<ul width="100%">
	  				<?php echo smarty_function_lcmx_3g_products_type(array('set'=>"列表名:productstype,所属栏目:GET[lanmu],所属类别:0"),$_smarty_tpl);?>

	  				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productstype']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
	  				<li>
	  					<a href="index.php?p=products_list&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['c_title'];?>
</a>
	  				</li>
	  				<?php } ?>
	  			</ul>
	  		</div>
	  		<div class="cl"></div>
            	<article>
  		        <ul class="in_pro_con products_list">
  		        	<?php echo smarty_function_lcmx_3g_products_list(array('set'=>"列表名:products,显示数目:4,类别:GET[c_id],栏目:GET[lanmu],标题长度:8"),$_smarty_tpl);?>

  		          	<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
  		        	<li align="center">
  		        		<div class="pro_img">
  		        			<section>
  		                		<div class="products_list_pic"><a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=<?php echo $_GET['lanmu'];?>
">
  		                			<img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['big_pic'];?>
" class="lazy" data-original="<?php echo $_smarty_tpl->tpl_vars['list']->value['big_pic'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
">
  		                		</a></div>
  		                		<div class="products_list_t"><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</div>
  		                	</section>
  		        		</div>
  		            </li>
  		            <?php } ?>
  		            <div style="clear:both;"></div>
  		        </ul>	
  		    </article>
  		 
            
		  
	      	<div class="sub_more" style="text-align:center;margin:3% 0; clear:both;">
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
 
$(document).ready(function() { 
$("img").lazyload({ 
effect: "fadeIn"
}); 
}); 

 </script>
 
 
</body>
</html>
<?php }} ?>