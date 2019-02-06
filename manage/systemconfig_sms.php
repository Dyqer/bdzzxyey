<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
?>
<script type="text/javascript">
function config_sms(){
  var x_target_no = $("#x_target_no").val();
  var x_eid = $("#x_eid").val();
  var x_uid = $("#x_uid").val();
  var x_pwd = $("#x_pwd").val();
  var job_receive = 0;
  var gbook_receive = 0;
  
  if($("#job_receive").attr("checked")=="checked"){
    job_receive = 1;//招贤纳士
    }
  if($("#gbook_receive").attr("checked")=="checked"){
    gbook_receive = 1;//留言
    }
  if(x_target_no){
    if(x_eid){
      if(x_uid){
        if(!x_pwd){
          mx_msg("亲，会员密码不能为空！");
          }else{
            $.post("action/systemconfig_sms_save.php",{x_target_no:x_target_no,x_eid:x_eid,x_uid:x_uid,x_pwd:x_pwd,job_receive:job_receive,gbook_receive:gbook_receive},function(data){
              if(data){
                if(data=="yes"){
                  mx_msg("亲，保存成功！");
                  }else{
                    mx_msg("亲，保存失败！");
                    }
                }else{
                  mx_msg("亲，请求超时，请稍候重试！");
                  }
              })
            }
        }else{
          mx_msg("亲，会员账号不能为空！");
          }
      }else{
        mx_msg("亲，个人账号值不能为空！");
        }
    }else{
      mx_msg("亲，接收手机号不能为空！");
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
          <td width="8%" class="tdh">短信接收</td>
          <td><input type="checkbox" value="1" id="job_receive" <?php if(get_config_value('job_duanxin_come')==1){ echo 'checked="checked"';}?>>
            &nbsp;开启</td>
        </tr>
        <tr class="trh">
          <td colspan="2"><b>留言板</b></td>
        </tr>
        <tr class="trh">
          <td class="tdh">短信接收</td>
          <td><input type="checkbox" value="1" id="gbook_receive" <?php if(get_config_value('gbook_duanxin_come')==1){ echo 'checked="checked"';}?>>
            &nbsp;开启</td>
        </tr>
        <tr class="trh">
          <td colspan="2"><b>发信短信配置</b></td>
        </tr>
        <tr class="trh">
          <td class="tdh">接收手机号</td>
          <td><input type="input" id="x_target_no" value="<?php echo get_config_value('x_target_no')?>" class="input"></td>
        </tr>
        <tr class="trh">
          <td class="tdh">个人账号值</td>
          <td><input type="input" id="x_eid" value="<?php echo get_config_value('x_eid')?>" class="input"></td>
        </tr>
        <tr class="trh">
          <td class="tdh">会员账号</td>
          <td><input type="input" id="x_uid" value="<?php echo get_config_value('x_uid')?>" class="input"></td>
        </tr>
        <tr class="trh">
          <td class="tdh">登陆密码</td>
          <td><input type="password" id="x_pwd" class="input"></td>
        </tr>
        <tr class="trh">
          <td colspan="2" height="8"><input type="button" class="checkall_sub" value="提交" onClick="config_sms()"></td>
        </tr>
      </table>
    </div>
  </div>
</div>
