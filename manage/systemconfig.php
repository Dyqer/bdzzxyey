<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
?>
<script type="text/javascript">
function systemconfig_edit(){
	var webname = $("#webname").val();
	var webkeywords = $("#webkeywords").val();
	var webdescription = $("#webdescription").val();
	var havephone = 0;
	var sessiontime = $("#sessiontime").val();
	if($("#havephone").attr("checked")=="checked"){
		havephone = 1;
		}
	if(webname){
		if(sessiontime){
			$.post("action/systemconfig_edit_save.php",{webname:webname,webkeywords:webkeywords,webdescription:webdescription,havephone:havephone,sessiontime:sessiontime},function(data){
				if(data){
					if(data=="yes"){
						mx_msg("亲，修改成功！")
						}else{
							mx_msg("亲，修改失败！")
							}
					}else{
						mx_msg("亲，请求超时，请稍候重试！")
						}
				})
			}else{
				mx_msg("亲，session周期不能为空！")
				}
		}else{
			mx_msg("亲，网站名称不能为空！")
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
          <td align="right" class="tdh" width="10%">网站名称：</td>
          <td><input type="text" name="web_name" id="webname" class="input" value="<?php echo constant("web_name")?>" ></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">关&nbsp;键&nbsp;词：</td>
          <td><input type="text" name="web_keywords" id="webkeywords" class="input" value="<?php echo constant("web_keywords")?>" ></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">描&nbsp;&nbsp;&nbsp;&nbsp;述：</td>
          <td><input type="text" name="web_description" id="webdescription" class="input" value="<?php echo constant("web_description")?>" ></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">手&nbsp;机&nbsp;站：</td>
          <td><input type="checkbox" value="1" name="have_phone" id="havephone" <?php if($have_phone){ echo 'checked="checked"';}?> class="cb" >
            是</td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">session周期：</td>
          <td><input type="text" name="session_time" id="sessiontime" value="<?php echo $session_time?>" class="input" ></td>
        </tr>
        <tr class="trh">
          <td></td>
          <td><input type="button" value="保存" class="checkall_sub" onClick="systemconfig_edit()"></td>
        </tr>
      </table>
    </div>
  </div>
</div>