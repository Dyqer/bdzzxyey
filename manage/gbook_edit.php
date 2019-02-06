<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('gbook');//是否有管理职位权限
SetSysEvent('gbook_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".$lc."_gbook where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
if($rows['lc_zt']==-1){
	$sql1 = "update ".$lc."_gbook set lc_zt = 0 where lc_id='{$id}'";
	mysql_query($sql1);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function add_job_check(){
  var title = document.getElementById('lc_title').value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
</script>
</head>
<body>
<form action="action/gbook_action.php" method="post" enctype="multipart/form-data">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <input name="action" type="hidden" value="edit">
  <table cellpadding="0" cellspacing="0" align="center" border="0" width="95%" style="margin:0 auto">
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td width="75">是否通过：</td>
      <td><input type="radio" name="lc_zt" value="1" <?php if($rows['lc_zt']==1 or $rows['lc_zt']==-1){ echo 'checked="checked"';}?>>
        通过
        <input type="radio" name="lc_zt" value="0" <?php if($rows['lc_zt']==0){ echo 'checked="checked"';}?>>
        不通过</td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>姓&nbsp;&nbsp;&nbsp;&nbsp;名：</td>
      <td><input type="text" disabled="disabled" class="input" value="<?php echo $rows['lc_name']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>联系电话：</td>
      <td><input type="text" disabled="disabled" class="input" value="<?php echo $rows['lc_tel']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>电子邮箱：</td>
      <td><input type="text" disabled="disabled" class="input" value="<?php echo $rows['lc_email']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>留言标题：</td>
      <td><input type="text" disabled="disabled" class="input" value="<?php echo $rows['lc_title']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>留言内容：</td>
      <td><textarea rows="5" disabled="disabled" cols="50" style="width:700px"><?php echo $rows['lc_content']?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td>回复内容：</td>
      <td><textarea name="lc_reply" rows="5" cols="50" style="width:700px; height:160px"><?php echo $rows['lc_reply']?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>