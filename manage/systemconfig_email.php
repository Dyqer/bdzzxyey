<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
?>
<script type="text/javascript">
function config_email(){
	var email_user = $("#email_user").val();
	var email_psw = $("#email_password").val();
	var email_zt = $("#email_zt").val();
	var email_port = $("#email_port").val();
	var job_receive = 0;
	var gbook_receive = 0;
	if($("#job_receive").attr("checked")=="checked"){
		job_receive = 1;//招贤纳士
		}
	if($("#gbook_receive").attr("checked")=="checked"){
		gbook_receive = 1;//留言
		}
	if(email_user){
		if(email_zt){
			if(!email_port){
				mx_msg("亲，端口不能为空！");
				}else{
						$.post("action/systemconfig_email_save.php",{user:email_user,pwd:email_psw,zt:email_zt,port:email_port,job:job_receive,gbook:gbook_receive},function(data){
							if(data){
								if(data=="yes"){
									mx_msg("亲，修改成功！");
									}else if(data=="no"){
										mx_msg("亲，修改失败！");
										}else if(data==-1){
											mx_msg("亲，必填参数不能为空！");
											}
								}else{
									mx_msg("亲，请求超时，请稍候重试！");
									}
							})
						}
				}else{
					mx_msg("亲，发邮件服务器类型不能为空！");
					}
		}else{
			mx_msg("亲，发邮件账号不能为空！");
			}
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <?php require('systemconfig_top.php')?>
      </ul>
    </div>
  </div>
  <div class="mx_right_con" style="margin-top:20px">
    <div class="main_con">
      <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:30px">
        <tr class="trh">
          <td colspan="2"><b>招贤纳士</b></td>
        </tr>
        <tr class="trh">
          <td width="10%" class="tdh">邮箱接收</td>
          <td><input type="checkbox" value="1" id="job_receive" <?php if(get_config_value('job_email_come')==1){ echo 'checked="checked"';}?>>
            &nbsp;开启</td>
        </tr>
        <tr class="trh">
          <td colspan="2"><b>留言板</b></td>
        </tr>
        <tr class="trh">
          <td class="tdh">邮箱接收</td>
          <td><input type="checkbox" value="1" id="gbook_receive" <?php if(get_config_value('gbook_email_come')==1){ echo 'checked="checked"';}?>>
            &nbsp;开启</td>
        </tr>
        <tr class="trh">
          <td colspan="2"><b>发信邮箱配置</b></td>
        </tr>
        <tr class="trh">
          <td class="tdh">邮箱账号</td>
          <td><input type="text" id="email_user" value="<?php echo get_config_value('email_user')?>" class="input"></td>
        </tr>
        <tr class="trh">
          <td class="tdh">邮箱密码</td>
          <td><input type="password" id="email_password"  class="input"></td>
        </tr>
        <tr class="trh">
          <td class="tdh">服务器类型</td>
          <td><input type="text" id="email_zt" value="<?php echo get_config_value('email_zt')?>" class="input"></td>
        </tr>
        <tr class="trh">
          <td class="tdh">端口</td>
          <td><input type="text" id="email_port" value="<?php echo get_config_value('email_port')?>" class="input"></td>
        </tr>
        <tr class="trh">
          <td colspan="2" height="8"><input class="checkall_sub" type="button" value="提交" onClick="config_email()"></td>
        </tr>
      </table>
    </div>
  </div>
</div>
