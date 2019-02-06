<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('user');//是否有添加会员分类权限
SetSysEvent('user_type_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//文章分类编号
if(!$id){
  mx_msg("亲，请求参数有误！",'');
}
$sql = "select * from ".$lc."_user_type where lc_id = '{$id}'";
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
function type_check(){
  var title=document.getElementById("lc_title").value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
</script>
</head>

<body>
<form action="action/user_type_action.php" method="post" onSubmit="return type_check()">
  <input name="action" type="hidden" value="edit">
  <input name="id" type="hidden" value="<?php echo $rows['lc_id']?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">等&nbsp;级&nbsp;标&nbsp;题：</span></td>
      <td><input type="text" name="lc_title" class="edit_input" id="lc_title" style="width: 555px" value="<?php echo $rows['lc_title']?>"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">等&nbsp;级&nbsp;说&nbsp;明：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:300px; width: 750px"><?php echo $rows['lc_content']?></textarea>
        </div></td>
    </tr>
    <tr class="edit_tr">
      <td></td>
      <td><input type="submit" class="edit_but select" value="提交">&nbsp;&nbsp;&nbsp;<a id="pc_touch2" onClick="location.href='user_type_list.php'" class="edit_but unselect">返回</a></td>
    </tr>
  </table>
</form>
</body>
</html>