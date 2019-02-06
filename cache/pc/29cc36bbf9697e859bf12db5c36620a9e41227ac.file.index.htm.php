<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 20:02:22
         compiled from "/home/bdzzxyey/public_html/templates/default/index.htm" */ ?>
<?php /*%%SmartyHeaderCode:2020023214571229ce34c3b1-06884900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29cc36bbf9697e859bf12db5c36620a9e41227ac' => 
    array (
      0 => '/home/bdzzxyey/public_html/templates/default/index.htm',
      1 => 1460714488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2020023214571229ce34c3b1-06884900',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'web_name' => 0,
    'URL' => 0,
    'products' => 0,
    'k' => 0,
    'list' => 0,
    'news' => 0,
    'banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_571229ce5dffc9_93103552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571229ce5dffc9_93103552')) {function content_571229ce5dffc9_93103552($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_danye_show')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_danye_show.php';
if (!is_callable('smarty_function_lcmx_products_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_products_list.php';
if (!is_callable('smarty_function_lcmx_news_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_news_list.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_lcmx_products_show')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_products_show.php';
if (!is_callable('smarty_function_lcmx_banner_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_banner_list.php';
?><!doctype html>
<html>
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
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/jquery.SuperSlide.2.1.1.js"></script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ('herder.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="bjajja">
	<div class="index_body">
	<div class="pro_listbor">
		<div class="pro_title">
		<div><span>我爱我的幼儿园</span></div>
		<div><span>I love my kindergarten</span></div>
	</div>
		<div class="pro_bor">
			<div class="pro_conv">
				<script type="text/javascript">
				$(document).ready(function(){

					$(".pro_conv .li").mouseover(function(){
						$(this).find(".pro_pic1").show();
					});
					$(".pro_conv .li").mouseout(function(){
						$(this).find(".pro_pic1").hide();
					});
				});
				</script>
				<ul>
							<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:15,栏目:7"),$_smarty_tpl);?>

							
								<li class="li">
									<a href="index.php?p=about&lanmu=7&id=15">
									<div class="pro_pic"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" width="100%"  height="161px;">	</div>
									<div class="pro_pic2"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/basbhas_05.png" alt=""></div>
									<div class="pro_pic1">
											<div style="height:65px"></div>
											<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
							    			<p>Details</p>
					    		    </div>
					    		    </a>
					    		 </li>   
				    	
				    		

							<li class="li12"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/dd.png" alt=""></li>
				    		<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:14,栏目:7"),$_smarty_tpl);?>

				    		<a href="index.php?p=about&lanmu=7&id=15">
								<li class="li">
									<div class="pro_pic"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" width="100%"  height="161px;">	</div>
									<div class="pro_pic2"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/basbhas_05.png" alt=""></div>
									<div class="pro_pic1">
											<div style="height:65px"></div>
											<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
							    			<p>Details</p>
					    		    </div>
					    		 </li>   
				    	
				    		</a>

							<li class="li12"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/dd.png" alt=""></li>
				    		<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:13,栏目:7"),$_smarty_tpl);?>

				    			<a href="index.php?p=about&lanmu=7&id=15">
								<li class="li">
									<div class="pro_pic"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" width="100%"  height="161px;">	</div>
									<div class="pro_pic2"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/basbhas_05.png" alt=""></div>
									<div class="pro_pic1">
										<div style="height:65px"></div>
											<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
							    			<p>Details</p>
					    		    </div>
					    		 </li>   
				    	
				    			</a>

							<li class="li12"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/dd.png" alt=""></li>
				    		<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:3,栏目:7"),$_smarty_tpl);?>

				    			<a href="index.php?p=about&lanmu=7&id=15">
								<li class="li">
									<div class="pro_pic"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" width="100%"  height="161px;">	</div>
									<div class="pro_pic2"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/basbhas_05.png" alt=""></div>
									<div class="pro_pic1">
											<div style="height:65px"></div>
											<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
							    			<p>Details</p>
					    		    </div>
					    		 </li>   
				    		</a>
				    	

				    		
				    
							</ul>
						
					<script>
						// $(document).ready(function() {
						// 	$("pro_pic").click(function(){
						// 		alert(1);
						// 	})
						// })
							
					</script>
				<!-- <div class="pro_pic"></div>
				<div class="pro_dd"></div>
				<div class="pro_pic"></div>
				<div class="pro_dd"></div>
				<div class="pro_pic"></div> -->
			</div>
		</div>
	</div>
		</div>
		</div>
			<div class="index_body">
	<div class="pro_khal">
		<div class="pro_khalbor">
			<div class="pro_khaltbor">
				<div><span>园内相册</span></div>
				<div><span>Customer Case</span></div>
			</div>
			<div class="pro_khalconv">
				<?php echo smarty_function_lcmx_products_list(array('set'=>"列表名:products,显示数目:3,标题长度:20,类别:4,栏目:2"),$_smarty_tpl);?>

				  <?php if ($_smarty_tpl->tpl_vars['products']->value){?>
				    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
				    	<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0){?>
							<div class="pro_khallist">
								<div class="pro_khal_lisibor1"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" width="100%" height="202px" alt=""></div>
								<a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
"><div class="pro_khal_lisibora"></div></a>

								<div class="cl"></div>
								<div class="pro_khal_lisiconver">
										<a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
" class="adad2">
											<p><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</p>
										</a>
									<span>
										<?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>

									</span>
								</div>
									<a href="index.php?p=products_list&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
"><div class="pro_khal_lisiboraq<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"></div></a>
							</div>

				<?php }else{ ?>
							<div class="pro_khallist">
								<div class="pro_khal_lisiconver">
									<a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
" class="adad2">
											<p><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</p>
										</a>
									<span>
											<?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>

									</span>
								</div>
								<div class="cl"></div>
								<div class="pro_khal_lisibor1"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
"  width="100%" height="202px" alt=""></div>

								<a href="index.php?p=products_show&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['id'];?>
&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
"><div class="pro_khal_lisibora"></div></a>
							</div>
					<?php }?>
					<?php } ?>
					<?php }else{ ?> 
					  暂无该类图文！ 
					<?php }?>


				<!-- <div class="pro_khallist">
					<div class="pro_khal_lisiconver">
						<p>天山茶庄绿茶</p>
						<span>
							产品包装的精美和包装质量的保障，能够有效...
						</span>
					</div>
					<div class="cl"></div>
					<div class="pro_khal_lisibor1"></div>
					<div class="pro_khal_lisibora"></div> -->
				<!-- </div>
				<div class="pro_khallist">
					<div class="pro_khal_lisibor1"></div>
					<div class="pro_khal_lisibora"></div>
					<div class="cl"></div>
					<div class="pro_khal_lisiconver">
						<p>天山茶庄绿茶</p>
						<span>
							产品包装的精美和包装质量的保障，能够有效...
						</span>
					</div>
					<div class="pro_khal_listconbo"></div>
				</div> -->
			</div>
		</div>
	</div>
		</div>
	<div class="news_width">
		<div class="news_bor">
			<div class="news_title">
				<div><span>园内文章</span></div>
				<div><span>News information</span></div>
			</div>
			<div class="news_con">
				<?php echo smarty_function_lcmx_news_list(array('set'=>"列表名:news,栏目:1,类别:1,显示数目:4,分页显示:1,标题长度:20"),$_smarty_tpl);?>

				<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['list']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0){?>
				<div class="news_newsbor news_margin">
					<!-- 日期 -->
					<a href="index.php?p=news_show&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
">
					<div class="news_Datatim">
						<div class="titme">
								<span class="rq_titme"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%d");?>
</span>
								<span class="rq_titme1">/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%y");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%m");?>
月</span>
						</div>
					</div>
					<div class="news_consize">
						<p><?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
</p>
						<span><?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
</span>
					</div>
					</a>
				</div>
				<?php }else{ ?>
				<div class="news_newsbor">
						<!-- 日期 -->
					<a href="index.php?p=news_show&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
">
					<div class="news_Datatim">
						<div class="titme">
							<span class="rq_titme"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%d");?>
</span>
								<span class="rq_titme1">/<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%y");?>
<br><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['list']->value['lc_datetime'],"%m");?>
月</span>
						</div>
					</div>
					<div class="news_consize">
						<p><?php echo $_smarty_tpl->tpl_vars['list']->value['lc_title'];?>
</p>
						<span><?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>
</span>
					</div>
					</a>
				</div>
				<?php }?>
				
				<?php } ?>
				
				<!-- <div class="news_newsbor news_margin"></div>
				<div class="news_newsbor"></div> -->
			</div>

			<div class="cl"></div>
			<div class="xiatiao"></div>
		</div>
	</div>
	<div class="jptj">
		<div class="jptj_bor">
			<!-- 图文 -->
			<?php echo smarty_function_lcmx_products_show(array('set'=>"列表名:show,编号:20"),$_smarty_tpl);?>

			<div class="jptj_bor_cov">
				<div class="jptj_bor_covsiz">
					<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
					<p><?php echo $_smarty_tpl->tpl_vars['show']->value['description'];?>
</p>
				</div>
				<div class="jptj_bor_covimg"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" width="423px;" height="370px" alt=""></div>
			</div>
			<!-- 死链接 -->
			<div class="jptj_tit_bor">
				<div class="jptj_tit_lj ">
				</div>
				<a href="index.php?p=products_show&id=20&lanmu=<?php echo $_smarty_tpl->tpl_vars['show']->value['lanmu'];?>
"><div class="jptj_tit_lj2"></div></a>
				<a href="index.php?p=products_show&id=19&lanmu=<?php echo $_smarty_tpl->tpl_vars['show']->value['lanmu'];?>
"><div class="jptj_tit_lj3"></div></a>
			</div>
			<!-- 图文 -->
			<?php echo smarty_function_lcmx_products_show(array('set'=>"列表名:show,编号:19"),$_smarty_tpl);?>

			<div class="jptj_bor_cov">
				<div class="jptj_bor_covsiz">
					<p><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</p>
					<p><?php echo $_smarty_tpl->tpl_vars['show']->value['description'];?>
</p>
				</div>
				<div class="jptj_bor_covimg"><img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
"  width="423px;" height="370px" alt=""></div>
			</div>
		</div>
	</div>
	<div class="news_width">
		<div class="news_bor">
			<div class="news_title">
				<div><span>教师风采</span></div>
				<div><span>News information</span></div>
			</div>
			<div class="news_gdd">
			<div class="picScroll-left">
			<div class="hd">
				<a class="next"><</a>
				<a class="prev">></a>
			</div>
			<div class="bd">
				<ul class="picList">
					<?php echo smarty_function_lcmx_products_list(array('set'=>"列表名:products,标题长度:20,类别:4,栏目:2"),$_smarty_tpl);?>

					<?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
					<li>
						<a href="index.php?p=products_show&lanmu=<?php echo $_smarty_tpl->tpl_vars['list']->value['lanmu'];?>
&c_id=<?php echo $_smarty_tpl->tpl_vars['list']->value['c_id'];?>
&id=<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_id'];?>
" target="_blank" class="aaaa">
							<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" width="100%" height="252px" /></div>
							
							<div class="picListtitle">
								<span><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</span>
								<?php echo $_smarty_tpl->tpl_vars['list']->value['description'];?>

							</div>
						</a>
					</li>
					<?php } ?>
					<!-- <li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/lunbo_23.jpg" /></a></div>
						<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图2</a></div>
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/lunbo_23.jpg" /></a></div>
						<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图3</a></div>
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/lunbo_23.jpg" /></a></div>
						<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图4</a></div>
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/lunbo_23.jpg" /></a></div>
						<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图5</a></div>
					</li>
					<li>
						<div class="pic"><a href="http://www.SuperSlide2.com" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/lunbo_23.jpg" /></a></div>
						<div class="title"><a href="http://www.SuperSlide2.com" target="_blank">效果图6</a></div>
					</li> -->
				</ul>
			</div>
		</div>
			</div>
			<script type="text/javascript">
		jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,trigger:"click"});
		</script>
		</div>

	</div>
	<div class="gywm">
		<div class="gywm_bor">
				<?php echo smarty_function_lcmx_danye_show(array('set'=>"列表名:show,编号:9,栏目:10"),$_smarty_tpl);?>

			<div class="gywm_img"><!-- <img src="<?php echo $_smarty_tpl->tpl_vars['show']->value['pic'];?>
" height="288px" width="100%" alt=""> -->
					 <?php echo smarty_function_lcmx_banner_list(array('set'=>"列表名:banner,分类:2"),$_smarty_tpl);?>

					<div id="slideBox1" class="slideBox1">
						<div class="bd1">
							<ul>
						<?php if ($_smarty_tpl->tpl_vars['banner']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
								<li><a href="#" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" /></a></li>
						<?php } ?>
                        <?php }?>
							</ul>
						</div>

						<!-- 下面是前/后按钮代码，如果不需要删除即可 -->

					</div>

					<script type="text/javascript">
					jQuery(".slideBox1").slide({mainCell:".bd1 ul",autoPlay:true});
					</script>

			</div>
			<div class="gywm_conver">
				<div class="gywm_titlebo">
				
					<div class="t1"><span><?php echo $_smarty_tpl->tpl_vars['show']->value['lc_title'];?>
</span>about us</div>
					<div class="t2"></div>
				</div>
				<div style="height:215px;width:100%;padding-top:15px;margin-bottom:15px;color:#3c3c3c;font-size:14px;line-height:25px;position: relative;overflow:hidden;">
					<?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>


				</div>
				<p style="text-align:right;"><a href="index.php?p=about&lanmu=10&id=9" style="color:red;">查看更多</a></p>
			</div>
		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>