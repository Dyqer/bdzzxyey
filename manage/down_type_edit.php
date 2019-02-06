<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('down');//是否有管理图文分类权限
SetSysEvent('down_type_edit');//添加日志功能

$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//所属栏目
$id = isset($_GET['id'])?(int)$_GET['id']:0;//分类编号

$sql = "select * from ".$lc."_down_type where c_id = '{$id}'";
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
  var title=document.getElementById("c_title").value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
</script>
</head>
<body>
<form action="action/down_type_action.php" method="post" onSubmit="return type_check()">
  <input name="action" type="hidden" value="edit">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">类&nbsp;别&nbsp;标&nbsp;题：</span></td>
      <td><input type="text" name="c_title" class="edit_input" id="c_title" style="width: 500px" value="<?php echo $rows['c_title']?>"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">所&nbsp;属&nbsp;类&nbsp;别：</span></td>
      <td><select name="c_pid" size="1" style="background-color: #ECF3FF;width:150px;height:30px;" class="input">
            <option value="0">****** 一级类别 ******</option>
            <?php get_down_type(0,$c_pid,$lanmu)?>
          </select>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">内&nbsp;&nbsp;&nbsp;&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:300px; width: 700px"><?php echo $rows['c_content']?></textarea>
        </div>
      </td>
    </tr>
    <tr class="edit_tr">
      <td></td>
      <td>
        <input type="submit" value="提交" class="edit_but select">
        <input type="button" value="返回" onClick="location.href='down_type_list.php?lanmu=<?php echo $lanmu?>'" class="edit_but unselect">
      </td>
    </tr>
  </table>
</form>
</body>
</html>