<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('db');//是否有管理数据库权限
SetSysEvent('field_add');//添加日志功能
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<style type="text/css">
.ti_s {
  color: #F00
}
</style>
<script type="text/javascript">
function check_field(){
  var title = document.getElementById("fieldtitle").value;
  if(!title){
    mx_tipmsg("亲，字段名不能为空！");
    return false;
    }
  }
</script>
</head>
<body>
<form action="action/field_action.php" method="post" onSubmit="return check_field()">
  <input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">字&nbsp;段&nbsp;名：</span></td>
      <td><input type="text" name="fieldtitle" class="edit_input" id="fieldtitle" style="width:300px"><span style="margin-left:30px;" class="ti_s">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">所&nbsp;属&nbsp;表：</span></td>
      <td>
        <select name="tablename" id="tablename" class="input" style="background-color: #ECF3FF;width:100px;height:30px;">
        <option value="danye">单页</option>
        <option value="news">文章</option>
        <option value="products">图文</option>
        <option value="down">下载</option>
        </select><span style="margin-left:30px;" class="ti_s">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">数&nbsp;据&nbsp;类&nbsp;型：</span></td>
      <td>
        <label>
          <input name="fieldtype" type="radio" value="varchar" checked="checked">
          单行文本</label>
        <label>
          <input type="radio" name="fieldtype" value="text">
          多行文本</label>
        <label>
          <input type="radio" name="fieldtype" value="mediumtext">
          更多内容</label>
        <label>
          <input type="radio" name="fieldtype" value="int">
          整&nbsp;&nbsp;数</label>
        <label>
          <input type="radio" name="fieldtype" value="decimal">
          货&nbsp;&nbsp;币</label>
        <label>
          <input type="radio" name="fieldtype" value="datetime">
          日期时间</label>
        <span style="margin-left:30px;" class="ti_s">&nbsp;*</span>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">长&nbsp;&nbsp;&nbsp;&nbsp;度：</span></td>
      <td><input type="text" name="fieldlong" class="edit_input" id="fieldlong" style="width:300px"><span style="margin-left:30px;" class="ti_s">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">备&nbsp;&nbsp;&nbsp;&nbsp;注：</span></td>
      <td><input type="text" name="fieldnotes" class="edit_input" id="fieldnotes" style="width:300px"><span style="margin-left:30px;" class="ti_s">&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">审&nbsp;&nbsp;&nbsp;&nbsp;核：</span></td>
      <td>
        <p>
          <label>
            <input name="zt" type="radio" value="0" checked="checked">
            启用</label>
          <label>
            <input type="radio" name="zt" value="1">
            禁用</label><span style="margin-left:30px;" class="ti_s">&nbsp;*</span>
        </p>
      </td>
    </tr>
    <?php
    $sql = "SELECT * FROM ".$lc."_customfields WHERE lc_table = 'field' AND lc_zt=0";
    $rs_list = mysql_query($sql);
    if($rs_list && mysql_num_rows($rs_list)>0){
      while($rows_list=mysql_fetch_assoc($rs_list)){?>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title"><?php echo $rows_list['lc_fieldnotes']?>：</span></td>
      <td><input name="<?php echo $rows_list['lc_fieldname']?>" style="width:95%" class="edit_input"></td>
    </tr>
    <?php
      }
    }
    ?>
    <tr class="edit_tr">
      <td></td>
      <td>
        <input type="submit" value="提交" class="edit_but select">
        &nbsp;
        <input type="reset" value="重置" class="edit_but unselect">
      </td>
    </tr>
  </table>
</form>
</body>
</html>