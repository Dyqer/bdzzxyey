<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('news');//是否有添加文章权限
SetSysEvent('news_type_add');//添加日志功能

$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//文章分类所属栏目
$c_pid = isset($_GET['c_pid'])?(int)$_GET['c_pid']:0;//文章分类所属父id
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
<form action="action/news_type_action.php" method="post" onSubmit="return type_check()">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="action" type="hidden" value="add">
  <table width="96%" cellpadding="5" cellspacing="1" style="margin:0 auto">
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td width="10%"><h2>类别标题：</h2></td>
      <td><input type="text" id="c_title" name="c_title" style="width: 300px" class="edit_input" ></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2>所属类别：</h2></td>
      <td><select name="c_pid" size="1" class="input" style="background-color: #ECF3FF;width:150px;height:30px;">
          <option value="0">****** 一级类别 ******</option>
          <?php get_news_type(0,$c_pid,$lanmu);?>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <tr>
      <td><h2>类别说明：</h2></td>
      <td><textarea name="lc_content" style="height: 300px; width: 700px"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
    <?php echo get_customfields('news_type')?>
    <tr>
      <td></td>
      <td><input type="submit" value="提交" class="edit_but select">
        &nbsp;&nbsp;
        <input class="edit_but unselect" type="button" value="返回" onClick="location.href='news_type_list.php?lanmu=<?php echo $lanmu?>'" ></td>
    </tr>
    <tr>
      <td colspan="2" height="10"></td>
    </tr>
  </table>
</form>
</body>
</html>