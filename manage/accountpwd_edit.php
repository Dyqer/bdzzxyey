<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
?>
<script type="text/javascript">
function edit_password(){
	var password = $("#password").val();
	var rpassword = $("#rpassword").val();
	if(!password){
		mx_msg("亲，密码不能为空！")
		}else{
			if(password!==rpassword){
				mx_msg("亲，两次输入的密码不相同！");
				}else{
					$.post("action/accountpwd_ajax.php",{password:password},function(data){
						if(data){
							if(data=="yes"){
								mx_msg("亲，密码修改成功！")
								}
							if(data=="no"){
								mx_msg("亲，密码修改失败！")
								}
							if(data==-1){
								mx_tips("亲，您未登录或者登录已经过期！","login.php");
								}
							if(data==-2){
								mx_msg("亲，密码不能为空！")
								}
							}else{
								mx_msg("亲，请求超时，请稍候重试！")
								}
						})
					}
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
      <table width="80%" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px">
        <tr class="trh">
          <td align="right" width="10%" class="tdh">管理员名称：</td>
          <td class="tdh"><input type="text" class="input" value="<?php echo $_SESSION['lc_admin_name']?>" readonly ></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">管理员密码：</td>
          <td><input type="password" id="password" class="input" ></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">重复密码：</td>
          <td><input type="password" id="rpassword" class="input" ></td>
        </tr>
        <tr class="trh">
          <td></td>
          <td class="tdh"><input type="button" value="修改" class="checkall_sub" onClick="edit_password()"></td>
        </tr>
      </table>
    </div>
  </div>
</div>
