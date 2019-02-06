<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('weixin');//微信管理权限验证
SetSysEvent('weixin');//添加日志功能

$sql = "select * from ".lc()."_miyao where lc_id=1";
$rs = mysql_query($sql);
if($rs){
  $rows = mysql_fetch_assoc($rs);
}
?>
<script type="text/javascript">
var get_miyue = function() {
  tipwindow("获取密钥", "iframe:http://v.longcai.pw/mx/getmiyao.php", "500", "300", "true", 0, "true");
}
function check_miyue(){
  var miyue=$("#miyaovalue").val();
  if(!miyue){
    mx_msg("亲，请填写密钥值！");
    return false;
    }
  }
</script>
<!--fu_right_top-->
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="release" href="list.php?C=weixin">密钥管理</a></li>
      </ul>
    </div>
  </div>
  <!--end fu_right_top-->
<div style="height:30px"></div>
<!--fu_right_bottom-->
<div class="fu_right_bottom">
  <div style="width: 380px; float: left; margin-left: 25px; margin-bottom: 20px; margin-right: 20px">
    <iframe src="../v/index.php" width="380" height="600" frameborder="0" scrolling="auto"></iframe>
  </div>
  <form method="post" action="action/weixin_action.php" onSubmit="return check_miyue()">
    <table width="400" style="margin: 0 auto; margin-left:25px" align="center" cellpadding="3" cellspacing="1">
      <tr>
        <td colspan="2"><div style="width: 360px; height: 35px; line-height: 35px; background: #fffac5; border: 1px solid #ffb400; padding-left: 25px">因手机浏览器与pc浏览器差异，左侧网站与手机可能不一致！</div></td>
      </tr>
      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td><input type="text" id="miyaovalue" name="key" style="width: 300px; height:27px" class="input" value="<?php echo $rows['lc_value']?>"></td>
        <td><input type="hidden" value="" id="hivalue"><input name="action" type="hidden" value="add">
        <input type="button" value="获取" class="checkall_sub" onClick="get_miyue()"></td>
      </tr>
      <tr>
        <td height="15" colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="绑定" class="checkall_sub"></td>
      </tr>
    </table>
  </form>
</div>
<!--end fu_right_bottom-->