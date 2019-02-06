<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('gaoji');//高级管理权限验证
SetSysEvent('logo_edit');//添加日志功能

$sql = "select * from ".$lc."_dibu where lc_id =5";
$rs = mysql_query($sql);
if($rs){
  $rows=mysql_fetch_assoc($rs);
}
?>
<style>
.logo_url{background:#48ac2e; color:#FFF; border:none; height:30px; padding:0 5px}
</style>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a>LOGO管理</a></li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form method="post" action="action/logo_action.php" enctype="multipart/form-data">
      <div class="list">
        <table width="90%" style="margin-left:20px" align="center" cellpadding="3" cellspacing="1">
        <tr>
          <td height="10"></td>
          </tr>
          <tr>
            <td><img src="<?php echo $rows['lc_content']?>" onerror="this.src='resource/images/loading.gif'" width="200" onclick="logo_url.click()" title="点击图片更换" align="middle">&nbsp;&nbsp;&nbsp;&nbsp;&lowast;点击图片更换
              <input name="logo_url" id="logo_url" type="file" style="display:none"></td>
          </tr>
          <tr>
            <td height="20"></td>
          </tr>
          <tr>
          <td><input type="submit" value="提交" style="background: #48ac2e;border: none;height: 38px;line-height: 38px;padding-left: 30px;padding-right: 30px;font-size: 16px;color: #FFF; width:100px;"></td>
        </tr>
      </table>
      </div>
    </form>
    </div>
  </div>
</div>  