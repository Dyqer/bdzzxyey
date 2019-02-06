<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('user');//是否有注册会员权限
SetSysEvent('user_add');//添加日志功能
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
/*会员注册信息验证*/
function reg_user_check(){
	var username=document.getElementById("username").value;
	if(username==""){
		mx_tipmsg('亲，会员名不能为空！');
		return false;
		}
	var password=document.getElementById("passw1").value;
	var repassword=document.getElementById("passw2").value;
	if(password==""){
		mx_tipmsg('亲，密码不能为空！');
		return false;
		}
	if(password!==repassword){
		mx_tipmsg('亲，两次输入的密码不相同！');
		return false;
		}
	var name = document.getElementById("lc_name").value;
	if(name==''){
		mx_tipmsg('亲，会员姓名不能为空！');
		return false;
		}
	}
/*填写信息验证*/
function CheckPassword(){
	var pwd1=$("#passw1").val(),
		pwd2=$("#passw2").val();
	var $pwd2span = $("#pwd2span"),
		$pwd1span = $("#pwd1span");
	if(pwd1==""){
		$pwd2span.css({"color":"red"}).html("&nbsp;*&nbsp;密码不能为空！");
		}else{
			if(pwd1!==pwd2){
				$pwd2span.css({"color":"red"}).html("&nbsp;*&nbsp;两次输入密码不相同！");
				}else{
					$pwd2span.css({"color":"green"}).html("&nbsp;*&nbsp;正确！");
					$pwd1span.css({"color":"green"}).html("&nbsp;*&nbsp;正确！");
				}
			}
	}
function checkpassword1(){
	var pwd1=$("#passw1").val();
	if(pwd1==""){
		$("#pwd1span").css({"color":"red"}).html("&nbsp;*&nbsp;密码不能为空！");
		}
	}
function checkusername(){
	var username=$("#username").val();
	if(username==""){
		$("#usernamespan").css({"color":"red"}).html("&nbsp;*&nbsp;会员名不能为空！");
		}else{
			$("#usernamespan").css({"color":"green"}).html("&nbsp;*&nbsp;正确！");
			}
	}
function CheckName(){
	var name = $("#lc_name").val();
	if(name==''){
		$("#lc_namespan").css({"color":"red"}).html("&nbsp;*&nbsp;会员姓名不能为空！");
		}else{
			$("#lc_namespan").css({"color":"green"}).html("&nbsp;*&nbsp;正确！");
			}
	}
</script>
<style>
input{ width:200px}
</style>
</head>

<body>
<form method="post" action="action/user_action.php" onsubmit="return reg_user_check()">
<input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t" width="100"><span class="edit_title">会&nbsp;员&nbsp;名：</span></td>
      <td><input name="username" id="username" type="text" onblur="checkusername()" class="edit_input">
        <span id="usernamespan" style="color:#ff0000">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span></td>
      <td><input id="passw1" name="password" type="password" onblur="checkpassword1()" class="edit_input">
        <span id="pwd1span" style="color: #ff0000">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">确认密码：</span></td>
      <td><input id="passw2" name="password2" type="password" onblur="CheckPassword()" class="edit_input">
        <span id="pwd2span" style="color: #ff0000">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">会员等级：</span></td>
      <td><select name="lc_zt" class="edit_input">
          <?php user_zt($rows['lc_zt'])?>
        </select></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">真实姓名：</span></td>
      <td><input name="lc_name" id="lc_name" type="text" class="edit_input" onBlur="CheckName()">
        <span id="lc_namespan" style="color: #ff0000">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">联系电话：</span></td>
      <td><input name="lc_tel" type="text" class="edit_input"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">电子邮箱：</span></td>
      <td><input name="lc_email" type="text" class="edit_input"></td>
    </tr>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="&nbsp;提&nbsp;&nbsp;&nbsp;交&nbsp;" class="button" style="width:20%"></td>
    </tr>
  </table>
</form>
</body>
</html>