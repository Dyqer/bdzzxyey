<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('products');//是否有修改图文权限
SetSysEvent('products_type_edit');//添加日志功能

$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//分类所属栏目
$id = isset($_GET['id'])?(int)$_GET['id']:0;//分类编号
if(!$id){
	mx_msg("亲，请求参数有误！",'');
}

$sql = "select * from ".$lc."_products_type where c_id = '{$id}'";
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
<form action="action/products_type_action.php" method="post" enctype="multipart/form-data" onSubmit="return type_check()">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="action" type="hidden" value="edit">
  <table width="96%" cellpadding="5" cellspacing="1" style="margin:0 auto">
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td width="10%"><h2 >类别标题：</h2></td>
      <td colspan="3"><input type="text" name="c_title" id="c_title" style="width: 300px" class="edit_input" value="<?php echo $rows['c_title']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 >所属类别：</h2></td>
      <td><select name="c_pid" size="1" class="input" style="background-color: #ECF3FF;width:150px;height:30px;">
          <option value="0">****** 一级类别 ******</option>
          <?php get_products_alltype(0,$rows['c_pid'])?>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2 >类别说明：</h2></td>
      <td><textarea cols="90" id="lc_content" name="lc_content" style="height: 300px; width:700px"><?php echo $rows['c_content'] ?></textarea></td>
    </tr>
    <tr>
      <td height="10"></td>
      <td></td>
    </tr>
    <?php echo get_customfields('products_type',$rows)?>
    <tr class="edit_tr">
      <td></td>
      <td><input type="submit" value="提交" class="edit_but select">
        <input class="edit_but unselect" type="button" value="返回" onClick="location.href='products_type_list.php?lanmu=<?php echo $lanmu?>'"></td>
    </tr>
    <tr>
      <td height="10"></td>
      <td></td>
    </tr>
  </table>
</form>
</body>
</html>