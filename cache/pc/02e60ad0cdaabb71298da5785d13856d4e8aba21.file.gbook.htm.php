<?php /* Smarty version Smarty-3.1.13, created on 2016-04-21 13:14:55
         compiled from "/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/gbook.htm" */ ?>
<?php /*%%SmartyHeaderCode:1236718710571861cf054509-66990836%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02e60ad0cdaabb71298da5785d13856d4e8aba21' => 
    array (
      0 => '/home/bdzzxyey/domains/bdzzxyey.com/public_html/templates/default/gbook.htm',
      1 => 1456566780,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1236718710571861cf054509-66990836',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show' => 0,
    'web_name' => 0,
    'URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_571861cf0fe5f7_35439658',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571861cf0fe5f7_35439658')) {function content_571861cf0fe5f7_35439658($_smarty_tpl) {?><!doctype html>
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
	<script type="text/javascript">
function newgdcode(obj,url) {
	obj.src = url+ '&nowtime=' + new Date().getTime();//后面传递一个随机参数，否则在IE7和火狐下，不刷新图片
}
// 表单提交客户端检测
function Isyx(yx){
	var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
	return(reyx.test(yx));
	}
function doSubmit(){
	
    if (document.myform.lc_name.value==""){
        Rname.innerHTML="亲，请写姓名！";
		Rname.style.color="red";
        document.myform.lc_name.focus();
        return false;
    }
    
    if (document.myform.lc_name.value.length>5||document.myform.lc_name.value.length<1 ){
        Rname.innerHTML="亲,您输入的姓名必须在1~5个字之间！";
		Rname.style.color="red";
        document.myform.lc_name.focus();
        return false;
    }
    var reg =/(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/; 
    if (document.myform.lc_tel.value==""){
        Rtel.innerHTML="亲，请写电话！";
		Rtel.style.color="red";
        document.myform.lc_tel.focus();
        return false;
    }
    if(!reg.test(document.myform.lc_tel.value)){ 
        Rtel.innerHTML="亲，请输入正确的电话！";
		Rtel.style.color="red";
        document.myform.lc_tel.focus();
        return false; 
     }
    
    if (document.myform.lc_email.value==""){
        Remail.innerHTML="亲，请写邮箱！";
		Remail.style.color="red";
        document.myform.lc_email.focus();
        return false;
    }
    if (!Isyx(document.myform.lc_email.value)){
		 Remail.innerHTML="亲，请输入正确的邮箱地址！";
		 Remail.style.color="red";
		 document.myform.lc_email.value="";
		 document.myform.lc_email.focus();
		 return false;
     }
     
    if (document.myform.lc_title.value==""){
        Rtitle.innerHTML="亲，请填写您留言的标题！";
		Rtitle.style.color="red";
        document.myform.lc_title.focus();
        return false;
    }
    if (document.myform.lc_content.value==""){
        Rcontent.innerHTML="亲，请填写您的留言内容！";
		Rcontent.style.color="red";
        document.myform.lc_content.focus();
        return false;
    }
    if (document.myform.yzm.value==""){
        Ryzm.innerHTML="亲，请填写验证码！";
		Ryzm.style.color="red";
        document.myform.yzm.focus();
        return false;
    }
}
//数据填写验证
function check_name(obj){
	//验证 姓名
	var name=obj.value;
	var Rname=document.getElementById("Rlc_name");
	if(name){
		var reg=/^((\d)|(1[0-4]\d)|(150))$/;
		if(reg.test(reg)){
			Rname.innerHTML="亲,您输入的姓名必须在1~5个字之间！";
			Rname.style.color="red";
			}else{
				Rname.innerHTML="正确";
				Rname.style.color="green";
				}
		}else{
			alert("亲，请写姓名！限制指数在5个字符内");
			}
	}
function check_tel(obj){
	//验证 电话

	var tel=obj.value;
	var Rtel=document.getElementById("Rlc_tel");
	if(tel){
		var reg =/(^0{0,1}1[3|4|5|6|7|8|9][0-9]{9}$)/;
		if(!reg.test(tel)){
				Rtel.innerHTML="亲，请输入正确的电话！";
				Rtel.style.color="red";
			}else{
				}
		}else{
			alert("亲，请写电话！");
			}
	}
function check_email(obj){
	//验证 邮箱
	var email=obj.value;
	var Remail=document.getElementById("Rlc_email");
	if(email){
		if(!Isyx(email)){
			Remail.innerHTML="亲，请输入正确的邮箱地址！";
	 		Remail.style.color="red";
			}else{
				Remail.innerHTML="正确";
				Remail.style.color="green";
				}
		}else{
			alert("亲，请写邮箱！");
			}
	}
function check_title(obj){
	//验证 标题
	var title=obj.value;
	var Rtitle=document.getElementById("Rlc_title");
	if(title){
		Rtitle.innerHTML="正确";
		Rtitle.style.color="green";
		}else{
			alert("亲，请填写您留言的标题！");
			}
	}


</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ('herder.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="currency_fl">
		<div class="currency_bor">当前位置：<a href="index.php">首页</a> > <a href="index.php?p=gbook&lanmu=6">在线留言</a> > <a href="index.php?p=gbook&lanmu=6">在线留言</a></div>
	</div>
	<div class="conver">
			<div class="Title">
				<div class="TitleMaxSize">在线留言</div>
				<div class="TitleMinSize">about us</div>
			</div>
			<div class="goob_conver">
					<ul>
			          <form action="index.php?a=gbook_save" method="post" name="myform" onSubmit="return doSubmit()">
			          <li>
			            <div class="main_ly_t1">姓   名：</div>
			            <input type="text" name="lc_name" id="lc_name" class="main_bd" required onBlur="check_name(this)">
			              <div class="main_ly_t2"><span id="Rlc_name"></span></div>
			            <div class="cl"></div>
			          </li>
			          <li>
			            <div class="main_ly_t1">电   话：</div>
			            <input type="text" name="lc_tel" id="lc_tel" class="main_bd" required onBlur="check_tel(this)">
			            <div class="main_ly_t2"><span id="Rlc_name"></span></div>
			            <div class="cl"></div>
			          </li>
			          <li>
			            <div class="main_ly_t1">邮   箱：</div>
			            <input type="text" name="lc_email" id="lc_email" class="main_bd" required onBlur="check_email(this)">
			            <div class="main_ly_t2"><span id="Rlc_name"></span></div>
			            <div class="cl"></div>
			          </li>
			          <li>
			            <div class="main_ly_t1">标   题：</div>
			            <input type="text" name="lc_title" id="lc_title" class="main_bd" required onBlur="check_title(this)">
			            <div class="main_ly_t2"><span id="Rlc_name"></span></div>
			            <div class="cl"></div>
			          </li>
			          <li>
			            <div class="main_ly_t1" style="padding:40px 0 0 0;">内   容：</div>
			            <textarea name="lc_content" id="lc_content" class="main_bd1" style="background:#ececec;resize: none;" required onBlur="check_content(this)"></textarea><span id="Rlc_content"></span>
			            <div class="main_ly_t2"><span id="Rlc_name"></span></div>
			            <div class="cl"></div>
			          </li>
			          <li>
			            <div class="main_but">
			              <input type="image" name="tijiao" id="tijiao" src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/tj.jpg" class="fl">
			              <input type="reset" style="margin-left:30px; height:53px; width:187px;background:url('<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/csxz.png')no-repeat;border:none;" value="">
			              <div class="cl"></div>
			            </div>
			          </li>
			          </form>
			        </ul>
			</div>
	</div>
	<div class="cl"></div>
	<?php echo $_smarty_tpl->getSubTemplate ('bot.htm', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>