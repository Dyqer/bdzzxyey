<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('news');//是否有添加文章权限
SetSysEvent('news_add');//添加日志功能

$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//所属栏目
$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;//所属分类
if(!$lanmu){
	mx_msg("亲，请求参数有误！",'');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function news_check(){
  var title=document.getElementById("lc_title").value;
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
<form action="action/news_action.php" method="post" enctype="multipart/form-data" onSubmit="return add_danye_check()">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">文&nbsp;章&nbsp;标&nbsp;题：</span></td>
      <td><table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td> <input type="text" name="lc_title" class="edit_input" id="lc_title" style="width:500px;" ></td>
	<td>
	 &nbsp;&nbsp;图片：
	</td>
    <td>
	<div style="position:relative">
        <input type="button" value="选择图片"  class="checkall_sub1" style="width:82px">
        <input type="file" id="lc_pic" name="lc_pic" class=opacity>
		</div>
	</td>
  </tr>
</table></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">文&nbsp;章&nbsp;类&nbsp;别：</span></td>
      <td><select name="c_id" size="1" class="input" style="background-color: #ECF3FF;width:100px;height:30px;">
          <?php get_news_type(0,$c_id,$lanmu)?>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;来&nbsp;&nbsp;源&nbsp;&nbsp;
        <input type="text" name="lc_from" class="edit_input" id="lc_from" style="width: 300px">
        &nbsp;&nbsp;
        <input type="checkbox" name="lc_tj" value="1">
        推荐
        <input type="checkbox" value="1" checked="checked" name="lc_zt">
        审核
        <?php if($have_phone){?>
        <input type="checkbox" value="1" name="lc_phone">
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
      <td></td>
      <td><a class="edit_but select" onClick="qiehuanPCandTouch(1)" id="pc_touch1">PC版</a> <a id="pc_touch2" onClick="qiehuanPCandTouch(2)" class="edit_but unselect">手机版</a></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">文&nbsp;章&nbsp;内&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:230px; width: 750px"></textarea>
        </div>
        <div id="lc_phone_content" style="display: none">
          <textarea name="lc_phone_content" style="height:230px; width:750px"></textarea>
        </div></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">关&nbsp;键&nbsp;词：</span></td>
      <td><input type="text" name="lc_keywords" class="edit_input keywords">
        <span class="edit_title">描&nbsp;述：</span>
        <input type="text" name="lc_description" class="edit_input description"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">文&nbsp;章&nbsp;简&nbsp;介：</span></td>
      <td><input type="text" name="lc_jianjie" class="edit_input intro"></td>
    </tr>
    <?php echo get_customfields('news')?>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>