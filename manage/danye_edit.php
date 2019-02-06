<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('danye');//是否有管理单页权限
SetSysEvent('danye_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//单页编号

$sql = "select * from ".$lc."_danye where lc_id = '{$id}'";
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
function danye_check(){
  var title = document.getElementById('lc_title').value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
KindEditor.ready(function(K) {
  var editor1 = K.create('textarea[name="lc_phone_content"]', {
    allowFileManager : true,
    afterBlur:function(){
      this.sync();
    }
  });
});
</script>
<link rel="stylesheet" type="text/css" href="resource/css/base.css">
</head>
<body>
<form action="action/danye_action.php" method="post" enctype="multipart/form-data" onSubmit="return danye_check()">
  <input name="action" type="hidden" value="edit">
  <input name="id" type="hidden" value="<?php echo $id?>">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">标&nbsp;&nbsp;&nbsp;&nbsp;题：</span></td>
      <td><input name="lc_title" class="edit_input" id="lc_title" style="width: 555px" value="<?php echo $rows['lc_title']?>">
        &nbsp;&nbsp;
        <input type="checkbox" value="1" name="lc_zt" <?php if($rows['lc_zt']==1){echo "checked";}?>>
        审核
        <?php if($have_phone){?>
        <input type="checkbox" value="1" name="lc_phone" <?php if($rows['lc_phone']==1){echo "checked";}?>>
        手机版
        <?php }
    if($program_schema==1){?>
        <input type="checkbox" value="1" name="lc_cant_del">
        不可删
        <?php }else{?>
        <input name="lc_cant_del" type="hidden" value="0">
        <?php } ?>
        <input type="checkbox" name="lc_yc" value="1">
      是否远程图片</td>
    </tr>
    
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;&nbsp;&nbsp;&nbsp;片：</span></td>
      <td><div style="position:relative">
        <input type="button" value="选择图片"  class="checkall_sub1" style="width:82px">
        <input type="file" id="lc_pic" name="lc_pic" class=opacity>
		</div></td>
    </tr>
    
    
    <tr class="edit_tr">
      <td></td>
      <td><a class="edit_but select" onClick="qiehuanPCandTouch(1)" id="pc_touch1">PC版</a><a id="pc_touch2" onClick="qiehuanPCandTouch(2)" class="edit_but unselect">手机版</a></td>
    </tr>
    <tr class="edit_tr">
      <td><span class="edit_title">内&nbsp;&nbsp;&nbsp;&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height: 300px; width: 750px"><?php echo $rows['lc_content']?></textarea>
        </div>
        <div id="lc_phone_content" style="display: none">
          <textarea name="lc_phone_content" style="height: 300px; width:750px"><?php echo $rows['lc_phone_content']?></textarea>
        </div></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">关&nbsp;键&nbsp;词：</span></td>
      <td><input type="text" name="lc_keywords" class="edit_input keywords" value="<?php echo $rows['lc_keywords']?>">
        <span class="edit_title">描&nbsp;&nbsp;&nbsp;&nbsp;述：</span>
        <input type="text" name="lc_description" class="edit_input description" value="<?php echo $rows['lc_description']?>"></td>
    </tr>
     <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">链&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;接：</span></td>
      <td><input type="text" name="lc_url" class="edit_input" style="width:600px;" value="<?php echo $rows['lc_url']; ?>">
      </td>
    </tr>
    
    <?php echo get_customfields('danye',$rows)?>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>
