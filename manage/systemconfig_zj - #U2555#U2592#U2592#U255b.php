<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
?>
<style>
#notice{border:#CCC solid 1px;width:90%; margin-top:30px; margin-left:2%; display:none; }
#title{ color:#F00; font-weight:bold; font-size:16px; padding:5px;}
#notice_content{ padding:2%; font-size:14px; line-height:20px;}
#notice_content #one{ color:#F00; font-size:16px;}
#notice_content .two{ font-size:16px; font-weight:bold;}
</style>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <?php require('systemconfig_top.php')?>
      </ul>
    </div>
  </div>
  
   <script>
   function systemconfig_zj(){
	   
	var lm = $("#lm").val();
	var action = 'zj';
    var wrong_content="";
	if(lm!=-1){
		
			$.post("action/inspection_ajax.php",{action:action,lm:lm},function(data){
			
				if(data){
					
						wrong_content+=data;
						$("#notice").fadeIn("slow");	
			            $("#notice_content").html(wrong_content);
						
					
					}
				})
			
		}else{
			mx_msg("亲，请选择自检栏目！")
			}
	}
   
   
   
    </script>
  
  <div class="mx_right_con" style="margin-top:20px">
    <div class="main_con">
      <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-left:30px">
        
        
      
        <tr class="trh">
          <td colspan="2" height="8">
          <select name="lm" id="lm"   class="input" style="background-color: #ECF3FF;width:150px;height:30px;">
          <option value="-1">请选择</option>
          <option value="1">单页栏目</option>
          <option value="2">新闻栏目</option>
          <option value="3">图文栏目</option>
          <option value="4">pc及TOUCH系统设置栏目</option>
          
          </select>
          &nbsp;&nbsp;<input class="checkall_sub" type="button" value="自动检测" onClick="systemconfig_zj()"></td>
        </tr>
      </table>
     <div id="notice">
    <div id="title">检查结果!</div>
    <div id="notice_content"></div>
    </div> 
      
      
    </div>
  </div>
</div>
