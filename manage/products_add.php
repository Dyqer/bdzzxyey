<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('products');//是否有添加图文权限
SetSysEvent('products_add');//添加日志功能

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
/*提交判断*/
function products_check(){
  var title = document.getElementById("lc_title").value;
  if(title==""){
    mx_tipmsg('亲，标题不能为空！');
    return false;
    }
  }
/*编辑器组件调用*/
KindEditor.ready(function(K) {
  var editor = K.editor({
    allowFileManager : true
  });
  /*多图上传*/
  K('#duotu_upload').click(function() {
    editor.loadPlugin('multiimage', function() {
      editor.plugin.multiImageDialog({
        clickFn : function(urlList){
          var div = K('#duotu_view');
          div.html('');
          K.each(urlList, function(i, data) {
            div.append('<input name="duotu_url[]" type="hidden" value="' + data.url + '">');
          });
          editor.hideDialog();
        }
      });
    });
  });
  /*手机版编辑器*/
  var editor1 = K.create('textarea[name="lc_phone_content"]',{
    allowFileManager : true,
    afterBlur:function(){
      this.sync();
      }
    });
});
</script>
</head>
<body>
<form action="action/products_action.php" method="post" enctype="multipart/form-data" onSubmit="return products_check()">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="action" type="hidden" value="add">
  <div id="duotu_view"></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;标&nbsp;题：</span></td>
      <td><input type="text" name="lc_title" class="edit_input" id="lc_title" style="width: 480px">
        &nbsp;&nbsp;图&nbsp;片&nbsp;上&nbsp;传：
      <input type="button" style="margin-left:10px" class="button" id="duotu_upload" value="&nbsp;&nbsp;选&nbsp;择&nbsp;图&nbsp;片&nbsp;&nbsp;">      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;类&nbsp;别：</span></td>
      <td><select name="c_id" size="1" class="input" style="background-color: #ECF3FF;width:150px;height:30px">
        <?php get_products_type(0,$c_id,$lanmu)?>
      </select>
        <span style="margin-left:50px;">来&nbsp;&nbsp;&nbsp;源：&nbsp;&nbsp;</span>
        <input type="text" name="lc_from" class="edit_input" id="lc_from" style="width: 200px">
        &nbsp;&nbsp;
        <input type="checkbox" value="1" name="lc_tj">
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
      是否远程图片</td></tr>
    <tr class="edit_tr">
      <td></td>
      <td>
        <a class="edit_but select" onClick="qiehuanPCandTouch(1)" id="pc_touch1">PC版</a>
        <a id="pc_touch2" onClick="qiehuanPCandTouch(2)" class="edit_but unselect">手机版</a>      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;内&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:220px; width: 750px"></textarea>
        </div>
        <div id="lc_phone_content" style="display: none">
          <textarea name="lc_phone_content" style="height:220px; width:750px"></textarea>
        </div></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">关&nbsp;键&nbsp;词：</span></td>
      <td><input type="text" name="lc_keywords" class="edit_input keywords">
        <span class="edit_title">描&nbsp;述：</span>
        <input type="text" name="lc_description" class="edit_input description"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;简&nbsp;介：</span></td>
      <td><input type="text" name="lc_jianjie" class="edit_input" style="width:67%">
        <span class="edit_title">金&nbsp;额：</span>
        <input type="text" name="lc_price" class="edit_input"></td>
    </tr>
    <?php echo get_customfields('products')?>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
</body>
</html>