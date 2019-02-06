<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('lanmu');//是否有管理栏目权限
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
  <input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">&nbsp;栏&nbsp;目&nbsp;名&nbsp;称&nbsp;：</span></td>
      <td><input type="text" name="c_title" class="edit_input" id="c_title" style="width:400px">
        &nbsp;&nbsp;
        栏目类型：
        <select name="c_type" size="1" class="input" style="width:100px;height:30px">
          <option value="0">单页系统</option>
          <option value="1">文章系统</option>
          <option value="2">图文系统</option>
          <option value="3">下载系统</option>
          <option value="4">招聘系统</option>
          <option value="5">留言系统</option>
        </select>
        &nbsp;&nbsp;
        显示：
        <input type="checkbox" id="c_zt" value="1" name="c_zt" title="是否显示" checked="checked">&nbsp;&nbsp;&nbsp;<strong>禁止删除:</strong><input type="checkbox" value="1" name="c_del" title="禁止删除">
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">栏&nbsp;目&nbsp;链&nbsp;接：</span></td>
      <td>
        <input type="text" name="c_link" class="edit_input" id="c_link" style="width: 400px">&nbsp;如果链接为空，系统将自动生成！
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title" style="height:30px; line-height:30px">显&nbsp;示&nbsp;规&nbsp;则：</span></td>
      <td>
        <div style="float:left;height:35px; line-height:35px">PC版
        <input type="checkbox" id="pc" value="1" name="c_pc" checked="checked" title="PC版">手机版
        <input type="checkbox" id="sj_pc" value="1" name="c_phone" title="手机版" onclick="sj_block()">
        </div>
        <div id="sj_lanmu" style="display: none; float:left; margin-left:16px"><span>手机栏目名称:</span>
          <input type="text" style="width: 188px" name="c_phone_name" class="edit_input">建议两个字以内(如公司简介叫简介)</div>
        </td>   
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">栏&nbsp;目&nbsp;内&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:270px; width: 700px"></textarea>
        </div></td>
    </tr>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>