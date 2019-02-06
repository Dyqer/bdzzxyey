<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('xitong');//是否有管理高级功能权限
SetSysEvent('account_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;

$sql = "select * from ".$lc."_admin where lc_admin_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows = mysql_fetch_assoc($rs);
}?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<style type="text/css">
.input{line-height:28px; border:#dfdfdf 1px solid; padding-left:3px}
</style>
<script type="text/javascript">
function SelectCheckBox_a(o){
	for (i = 0; i < document.account.elements.length; i++){
		if(o.checked == true){
			document.account.elements[i].checked = true;
		}else{
			document.account.elements[i].checked = false;
		}
	}
}
</script>
</head>
<body>
<form name="account" action="action/account_action.php" method="post">
  <input name="action" type="hidden" value="edit">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">管理员名称：</span></td>
      <td><input type="text" name="admin_username" id="user" class="input" value="<?php echo $rows['lc_admin_name']?>"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">管理员密码：</span></td>
      <td><input type="password" name="admin_password" class="input">
        <span class="edit_title">如果不修改请留空</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">&nbsp;&nbsp;重复密码：</span></td>
      <td><input type="password" name="admin_rpassword" class="input">
        <span class="edit_title">如果不修改请留空</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">权限：</span></td>
      <td><input type="checkbox" value="1" name="xitong" <?php if($rows['xitong']==1){ echo 'checked="checked"';}?> >
        系统设置
        <input type="checkbox" value="1" name="lanmu" <?php if($rows['lanmu']==1){ echo 'checked="checked"';}?> >
        全部栏目
        <input type="checkbox" value="1" name="danye" <?php if($rows['danye']==1){ echo 'checked="checked"';}?> >
        单页系统
        <input type="checkbox" value="1" name="news" <?php if($rows['news']==1){ echo 'checked="checked"';}?> >
        新闻系统
        <input type="checkbox" value="1" name="products" <?php if($rows['products']==1){ echo 'checked="checked"';}?> >
        图文系统
        <input type="checkbox" value="1" name="down" <?php if($rows['down']==1){ echo 'checked="checked"';}?> >
        下载系统
        <input type="checkbox" value="1" name="user" <?php if($rows['user']==1){ echo 'checked="checked"';}?> >
        会员系统
        <div style="height:10px"></div>
        <input type="checkbox" value="1" name="gbook" <?php if($rows['gbook']==1){ echo 'checked="checked"';}?> >
        留言系统
        <input type="checkbox" value="1" name="job" <?php if($rows['job']==1){ echo 'checked="checked"';}?> >
        招聘系统
        <input type="checkbox" value="1" name="dingdan" <?php if($rows['dingdan']==1){ echo 'checked="checked"';}?> >
        订单系统
        <input type="checkbox" value="1" name="gaoji" <?php if($rows['gaoji']==1){ echo 'checked="checked"';}?> >
        高级功能
        <input type="checkbox" value="1" name="weixin" <?php if($rows['"weixin"']==1){ echo 'checked="checked"';}?> >
        微信管理
        <input type="checkbox" value="1" name="touch" <?php if($rows['touch']==1){ echo 'checked="checked"';}?> >
        touch系统
        <input type="checkbox" value="1" name="hsz" <?php if($rows['hsz']==1){ echo 'checked="checked"';}?> >
        回收站
        <div style="height:10px"></div>
        <input type="checkbox" onclick="SelectCheckBox_a(this)">&nbsp;全选
        </td>
    </tr>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>