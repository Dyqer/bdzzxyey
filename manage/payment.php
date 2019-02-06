<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('dingdan');//订单管理权限验证
SetSysEvent('payment');//添加日志功能

$sql = "select * from ".$lc."_pay_way where lc_id = 1";
$rs = mysql_query($sql);
if($rs){
  $rows=mysql_fetch_assoc($rs);
}
?>
<style type="text/css">
#pay li {
	margin-top: 5px;
	margin-bottom: 5px
}
.input {
	width: 300px;
	padding-left: 2px;
	height: 31px;
	line-height: 31px
}
</style>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a>支付管理</a></li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
      <form method="post" action="action/payment_action.php">
        <table width="90%" cellpadding="3" cellspacing="1" style="margin-left:20px;margin-top:20px">
          <tr>
            <td><input type="checkbox" name="lc_zt" value="1" <?php if($rows['lc_zt']==1){ echo ' checked="checked"';}?>>&nbsp;&nbsp;使用支付宝即时到帐</td>
          </tr>
          <tr>
            <td><ul id="pay">
                <li>帐&nbsp;&nbsp;号：
                  <input type="text" name="partner" value="<?php echo get_config_value("partner")?>" class="input" style="width:300px">
                  *&nbsp;合作身份者id，以2088开头的16位纯数</li>
                <li>密&nbsp;&nbsp;钥：
                  <input type="text" name="key" value="<?php echo get_config_value("key")?>" class="input" style="width:300px">
                  *&nbsp;安全检验码，以数字和字母组成的32位</li>
                <li>帐&nbsp;&nbsp;号：
                  <input type="text" name="seller_email" value="<?php echo get_config_value("seller_email")?>" class="input" style="width:300px">
                  *&nbsp;卖家支付宝帐号</li>
              </ul></td>
          </tr>
          <tr>
            <td><input type="submit" style="margin-top:15px" value="提交" class="checkall_sub"></td>
          </tr>
        </table>
      </form>
    </div>
  </div>
</div>