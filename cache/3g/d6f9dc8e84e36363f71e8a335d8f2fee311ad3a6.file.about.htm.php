<?php /* Smarty version Smarty-3.1.13, created on 2016-04-17 13:30:37
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/about.htm" */ ?>
<?php /*%%SmartyHeaderCode:53378316957131f7d8becf2-23223813%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6f9dc8e84e36363f71e8a335d8f2fee311ad3a6' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/3g/templates/default/about.htm',
      1 => 1455850008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53378316957131f7d8becf2-23223813',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'LCMX' => 0,
    'show' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_57131f7d9511e0_66585209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57131f7d9511e0_66585209')) {function content_57131f7d9511e0_66585209($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_3g_danye_show')) include '/home/bdzzxyey/domains/bdzzxyey.com/public_html/Lib/Smarty/plugins/function.lcmx_3g_danye_show.php';
?><?php echo smarty_function_lcmx_3g_danye_show(array('set'=>"列表名:show,编号:GET[id],栏目:GET[lanmu]"),$_smarty_tpl);?>

<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style/webstyle.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
style/nav.css" />
<title><?php echo $_smarty_tpl->tpl_vars['LCMX']->value['touch_name'];?>
</title>
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
		
		  	<span style="color:#fff;font-size:26px;"> <?php echo $_smarty_tpl->tpl_vars['LCMX']->value['lanmu_name'];?>
</span>
		  </div>
		</div>
	 

        <div class="box_main" style="margin:5%;">
            
                <div class="cent">
                    <?php echo $_smarty_tpl->tpl_vars['show']->value['con'];?>

                </div> 
           
        </div>


<!--index end--> 

<!--footer start-->
<?php echo $_smarty_tpl->getSubTemplate ("foot.htm", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<!--footer end-->
</body>
</html>
<?php }} ?>