<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('user');//是否有注册会员权限
SetSysEvent('user_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号
$sql = "select * from ".$lc."_user where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
  $rows=mysql_fetch_assoc($rs);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function $_(id){return document.getElementById(id);}
/*会员注册信息验证*/
function edit_user_check(){
  var username=document.getElementById("username").value;
  if(username==""){
    mx_tipmsg('亲，会员名不能为空！');
    return false;
    }
  var name = document.getElementById("lc_name").value;
  if(name==''){
    mx_tipmsg('亲，会员姓名不能为空！');
    return false;
    }
  }
</script>
<style>
.edit_title {
	font-size: 14px;
	display: inline-block
}
</style>
</head>

<body>
<form action="action/user_action.php" method="post" enctype="multipart/form-data" onsubmit="return edit_user_check()">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <input name="action" type="hidden" value="edit">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="qh_con1">
    <tr class="edit_tr">
      <td width="100"><span class="edit_title">会&nbsp;员&nbsp;名:</span></td>
      <td><input type="text" name="username" id="username" class="edit_input" value="<?php echo $rows['lc_title']?>" style="width:240px">
        &nbsp;<span style="color:#ff0000">*</span></td>
    </tr>
    <tr class="edit_tr">
      <td><span class="edit_title">密&nbsp;&nbsp;&nbsp;&nbsp;码：</span></td>
      <td><input type="password" name="password" class="edit_input" style="width: 240px"></td>
    </tr>
    <tr class="edit_tr">
      <td><span class="edit_title">会员等级：</span></td>
      <td><select name="lc_zt" class="edit_input">
          <?php user_zt($rows['lc_zt'])?>
        </select>
        &nbsp;<span style="color: #ff0000">*</span></td>
    </tr>
    <tr class="edit_tr">
      <td><span class="edit_title">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</span></td>
      <td><input type="text" name="lc_name" id="lc_name" class="edit_input" style="width:240px" value="<?php echo $rows['lc_name']?>">
        &nbsp;<span style="color: #ff0000">*</span></td>
    </tr>
    <tr class="edit_tr">
      <td><span class="edit_title">联系电话：</span></td>
      <td><input type="text" name="lc_tel" class="edit_input" style="width: 240px" value="<?php echo $rows['lc_tel']?>"></td>
    </tr>
    <tr class="edit_tr">
      <td><span class="edit_title">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</span></td>
      <td><input type="email" name="lc_email" class="edit_input" style="width: 240px" value="<?php echo $rows['lc_email']?>"></td>
    </tr>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="&nbsp;提&nbsp;&nbsp;&nbsp;交&nbsp;" class="button" style="width:20%"></td>
    </tr>
  </table>
</form>
</body>
</html>
