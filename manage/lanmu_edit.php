<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('lanmu');//是否有管理栏目权限

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;//栏目编号

$sql = "select * from ".$lc."_lanmu where c_id = '{$c_id}'";
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
function lanmuchecked(){
	var title=$("#c_title").val();
	if(title==""){
		mx_tipmsg('亲，栏目名称不能为空！');
		return false;
	}
}
function sj_block(){
	if(document.getElementById("sj_pc").checked){
		document.getElementById('sj_lanmu').style.display="block";
	}else{
		document.getElementById('sj_lanmu').style.display="none";
	}
}
</script>
</head>

<body>
<form action="action/lanmu_action.php" method="post" enctype="multipart/form-data" onSubmit="return lanmuchecked()">
  <input name="action" type="hidden" value="edit">
  <input name="id" type="hidden" value="<?php echo $c_id?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">&nbsp;栏&nbsp;目&nbsp;名&nbsp;称&nbsp;：</span></td>
      <td><input type="text" name="c_title" class="edit_input" id="c_title" style="width:400px" value="<?php echo $rows['c_title']?>">
        &nbsp;&nbsp;
        栏目类型：
        <select name="c_type" size="1" class="input" style="width:100px;height:30px">
          <option <?php if($rows['c_type'] == 0){echo " selected";}?> value="0">单页系统</option>
          <option <?php if($rows['c_type'] == 1){echo " selected";}?> value="1">文章系统</option>
          <option <?php if($rows['c_type'] == 2){echo " selected";}?> value="2">图文系统</option>
          <option <?php if($rows['c_type'] == 3){echo " selected";}?> value="3">下载系统</option>
          <option <?php if($rows['c_type'] == 4){echo " selected";}?> value="4">招聘系统</option>
          <option <?php if($rows['c_type'] == 5){echo " selected";}?> value="5">留言系统</option>
        </select>
        &nbsp;&nbsp;
        显示：
        <input type="checkbox" id="c_zt" value="1" name="c_zt" title="是否显示" checked="checked" <?php if($rows['c_zt'] == 1){echo "checked='checked'";}?>>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">栏&nbsp;目&nbsp;链&nbsp;接：</span></td>
      <td>
        <input type="text" name="c_link" class="edit_input" id="c_link" style="width: 400px" value="<?php echo $rows['c_link']?>">&nbsp;如果链接为空，系统将自动生成！
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title" style="height:30px; line-height:30px">显&nbsp;示&nbsp;规&nbsp;则：</span></td>
      <td>
        <div style="float:left;height:35px; line-height:35px">PC版
        <input type="checkbox" id="pc" value="1" name="c_pc" <?php if($rows['c_pc'] == 1){echo "checked='checked'";}?> title="PC版">
        手机版
        <input type="checkbox" id="sj_pc" value="1" name="c_phone" title="手机版" onclick="sj_block()" <?php if($rows['c_phone'] == 1){echo "checked='checked'";}?>>
        </div>
        <div id="sj_lanmu" style=" <?php if($rows['c_phone'] != 1){ echo 'display:none;';}?> float:left; margin-left:16px"><span>手机栏目名称:</span>
          <input name="c_phone_name" type="text" class="edit_input" style="width: 188px" value="<?php echo $rows['c_phone_name']?>">
      建议两个字以内(如公司简介叫简介)</div>
        </td>   
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">栏&nbsp;目&nbsp;内&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:270px; width: 700px"><?php echo $rows['c_content']?></textarea>
        </div></td>
    </tr>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>