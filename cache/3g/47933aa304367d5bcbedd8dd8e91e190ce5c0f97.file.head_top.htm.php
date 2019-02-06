<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 19:48:47
         compiled from "/home/bdzzxyey/public_html/3g/templates/default/head_top.htm" */ ?>
<?php /*%%SmartyHeaderCode:13695936695712269f9c34f7-91637711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47933aa304367d5bcbedd8dd8e91e190ce5c0f97' => 
    array (
      0 => '/home/bdzzxyey/public_html/3g/templates/default/head_top.htm',
      1 => 1455519882,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13695936695712269f9c34f7-91637711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'lanmu' => 0,
    'list' => 0,
    'touch' => 0,
    'banner' => 0,
    'q' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5712269fa65503_53945582',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5712269fa65503_53945582')) {function content_5712269fa65503_53945582($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_3g_lanmu_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_3g_lanmu_list.php';
if (!is_callable('smarty_function_lcmx_3g_touch_show')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_3g_touch_show.php';
if (!is_callable('smarty_function_lcmx_3g_banner_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_3g_banner_list.php';
?><script type="text/javascript">
function check_seachkey(){
	var key=$("#seach_key").val();
	if(!key){
		alert("请输入查询的关键词！！！");
		return false;
		}
	}
</script>
<header class="logo">
  <div class="search"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/search.png"></div>
  <div class="ss">
    <form action="index.php?p=seach_list" method="post" onSubmit="return check_seachkey()">
      <input type="text" class="ss_bd" id="seach_key" name="key" placeholder="请输入您要搜索的">
      <input type="submit" class="ss_btn" value="搜索">
    </form> 
  </div>
  <!--导航 start--> 
  <!-- <a href="#0" class="cd-nav-trigger">菜单<span class="cd-icon"></span></a>
  <nav>
    <ul class="cd-primary-nav">
    <li><a href="index.php">首页</a></li>
    <?php echo smarty_function_lcmx_3g_lanmu_list(array('set'=>"列表名:lanmu"),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['lanmu']->value){?>
    <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lanmu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
    <li> <a href="<?php echo $_smarty_tpl->tpl_vars['list']->value['c_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
</a> </li>
    <?php } ?>
    <?php }?>
    </ul>
  </nav> -->
 <!--  <div class="cd-overlay-nav"><span></span></div>
  <div class="cd-overlay-content"><span></span></div> -->
  <!--导航 end--> 
  
  <?php echo smarty_function_lcmx_3g_touch_show(array('set'=>"列表名:touch,编号:1"),$_smarty_tpl);?>
<img src="<?php echo $_smarty_tpl->tpl_vars['touch']->value['pic'];?>
" /> </header>
<div>
<div><img src="<?php echo $_smarty_tpl->tpl_vars['touch']->value['pic'];?>
" /> </div>
<div id="Banner">
    	<div class="swipe">
		<ul id="slider">
		<?php echo smarty_function_lcmx_3g_banner_list(array('set'=>"列表名:banner"),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['banner']->value){?>
            <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
             <li onClick="window.location.href='<?php echo $_smarty_tpl->tpl_vars['list']->value['lc_url'];?>
'"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" width="100%" alt=""></li>
            <?php } ?>
        <?php }?>
        </ul>
        <div id="pagenavi">
        <?php echo smarty_function_lcmx_3g_banner_list(array('set'=>"列表名:banner"),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['banner']->value){?>
            <?php $_smarty_tpl->tpl_vars['q'] = new Smarty_variable(1, null, 0);?>
                <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                <?php if ($_smarty_tpl->tpl_vars['q']->value==1){?>
                    <a class="active" href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['q']->value;?>
</a>
                    <?php }else{ ?>
                    <a class="" href="javascript:void(0);"><?php echo $_smarty_tpl->tpl_vars['q']->value;?>
</a>
                <?php }?>
            <!--<?php echo $_smarty_tpl->tpl_vars['q']->value++;?>
-->
        <?php } ?>
        <?php }?>
        </div>
	</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/zVy3.js"></script> 
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
js/zVy5.js"></script> 
<script type="text/javascript">

var active=0,

	as=document.getElementById('pagenavi').getElementsByTagName('a');	

for(var i=0;i<as.length;i++){

	(function(){

		var j=i;

		as[i].onclick=function(){

			t2.slide(j);

			return false;

		}

	})();

}

var t1=new TouchScroll({id:'wrapper','width':5,'opacity':0.7,color:'#555',minLength:20});

var t2=new TouchSlider({id:'slider', speed:600, timeout:3000, before:function(index){

		as[active].className='';

		active=index;

		as[active].className='active';

	}});

</script>
    </div></div><?php }} ?>