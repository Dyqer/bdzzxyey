<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
?>
<style type="text/css">
.num_input{ width:30px !important}
</style>
<script type="text/javascript">
function pic_config_sava(){
	var pc_big_pic_whith=parseInt($("#pc_big_pic_whith").val());
	var pc_big_pic_height=parseInt($("#pc_big_pic_height").val());
	if($("input[name='pc_big_caijian']").attr("checked")){
		var pc_big_pic_cut=1;
		}else{
			var pc_big_pic_cut=0;
			}
	
	var pc_small_pic_whith=parseInt($("#pc_small_pic_whith").val());
	var pc_small_pic_height=parseInt($("#pc_small_pic_height").val());
	if($("input[name='pc_small_caijian']").attr("checked")){
		var pc_small_pic_cut=1;
		}else{
			var pc_small_pic_cut=0;
			}
	
	var touch_big_pic_whith=parseInt($("#touch_big_pic_whith").val());
	var touch_big_pic_height=parseInt($("#touch_big_pic_height").val());
	if($("input[name='touch_big_caijian']").attr("checked")){
		var touch_big_pic_cut=1;
		}else{
			var touch_big_pic_cut=0;
			}
	
	var touch_small_pic_whith=parseInt($("#touch_small_pic_whith").val());
	var touch_small_pic_height=parseInt($("#touch_small_pic_height").val());
	if($("input[name='touch_small_caijian']").attr("checked")){
		var touch_small_pic_cut=1;
		}else{
			var touch_small_pic_cut=0;
			}
			
	if(!pc_big_pic_whith){
		$("#Rpc_big_pic_whith").text("请填写大图宽！").css("color","#F00");
		}
	if(!pc_small_pic_whith){
		$("#Rpc_small_pic_whith").text("请填写小图宽！").css("color","#F00");
		}
	if(!touch_big_pic_whith){
		$("#Rtouch_big_pic_whith").text("请填写大图宽！").css("color","#F00");
		}
	if(!touch_small_pic_whith){
		$("#Rtouch_small_pic_whith").text("请填写小图宽！").css("color","#F00");
		}
	if(pc_small_pic_whith>0&&pc_big_pic_whith>0&&touch_big_pic_whith>0&&touch_small_pic_whith>0){
		if(!pc_big_pic_height){
			pc_big_pic_cut=0;
			}
		if(!pc_small_pic_height){
			pc_small_pic_cut=0;
			}
		if(!touch_big_pic_height){
			touch_big_pic_cut=0;
			}
		if(!touch_small_pic_height){
			touch_small_pic_cut=0;
			}
		$.post("action/systemconfig_pic_save.php",{pc_bw:pc_big_pic_whith,pc_sw:pc_small_pic_whith,t_bw:touch_big_pic_whith,t_sw:touch_small_pic_whith,pc_bh:pc_big_pic_height,pc_sh:pc_small_pic_height,t_bh:touch_big_pic_height,t_sh:touch_small_pic_height,pc_bcut:pc_big_pic_cut,pc_scut:pc_small_pic_cut,t_bcut:touch_big_pic_cut,t_scut:touch_small_pic_cut},function(data){
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
	}
function caijian(k){
	if(k==1){
		var pcbw=parseInt($("#pc_big_pic_whith").val());
		var pcbh=parseInt($("#pc_big_pic_height").val());
		if(!pcbw){
			$("#msgBox span").text("请填写大图宽！").stop(true).show('fast').delay(3000).hide("fast");
			$("#pc_big_caijian").attr("checked",false);
			}else if(!pcbh){
			$("#msgBox span").text("请填写大图高！").stop(true).show('fast').delay(3000).hide("fast");
			$("#pc_big_caijian").attr("checked",false);
			}
		}
	if(k==2){
		var pcbw=parseInt($("#pc_small_pic_whith").val());
		var pcbh=parseInt($("#pc_small_pic_height").val());
		if(!pcbw){
			$("#msgBox span").text("请填写小图宽！").stop(true).show('fast').delay(3000).hide("fast");
			$("#pc_small_caijian").attr("checked",false);
			}else if(!pcbh){
			$("#msgBox span").text("请填写小图高！").stop(true).show('fast').delay(3000).hide("fast");
			$("#pc_small_caijian").attr("checked",false);
			}
		}
	if(k==3){
		var pcbw=parseInt($("#touch_big_pic_whith").val());
		var pcbh=parseInt($("#touch_big_pic_height").val());
		if(!pcbw){
			$("#msgBox span").text("请填写大图宽！").stop(true).show('fast').delay(3000).hide("fast");
			$("#touch_big_caijian").attr("checked",false);
			}else if(!pcbh){
			$("#msgBox span").text("请填写大图高！").stop(true).show('fast').delay(3000).hide("fast");
			$("#touch_big_caijian").attr("checked",false);
			}
		}
	if(k==4){
		var pcbw=parseInt($("#touch_small_pic_whith").val());
		var pcbh=parseInt($("#touch_small_pic_height").val());
		if(!pcbw){
			$("#msgBox span").text("请填写小图宽！").stop(true).show('fast').delay(3000).hide("fast");
			$("#touch_small_caijian").attr("checked",false);
			}else if(!pcbh){
			$("#msgBox span").text("请填写小图高！").stop(true).show('fast').delay(3000).hide("fast");
			$("#touch_small_caijian").attr("checked",false);
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
      <table width="80%" border="0" cellspacing="0" cellpadding="0" style="padding-left:30px">
        <tr class="trh">
          <td><b>官方网站图片设置</b></td>
        </tr>
        <tr class="trh">
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" class="tdh" width="10%">大图设置</td>
                <td>宽：
                  <input name="pc_big_pic_whith" type="text" class="input num_input" id="pc_big_pic_whith" placeholder="默认600" value="<?php echo get_config_value("pc_big_width")?>">
                  <span id="Rpc_big_pic_whith">*&nbsp;必填&nbsp;</span>&nbsp;&nbsp;高：
                  <input name="pc_big_pic_height" type="text" class="input num_input" id="pc_big_pic_height" placeholder="默认0" title="0表示高根据宽自动伸缩" value="<?php echo get_config_value("pc_big_height")?>">
                  <span id="Rpc_big_pic_height">选填</span> &nbsp;&nbsp;是否裁切：
                  <input name="pc_big_caijian" type="checkbox" id="pc_big_caijian" onClick="caijian(1)" <?php if(get_config_value("pc_big_cut")==1){echo "checked";}?>>
                  <span id="Rpc_big_caijian">若勾选，宽与高必须设置非零</span></td>
              </tr>
              <tr>
                <td height="30" class="tdh">小图设置</td>
                <td>宽：
                  <input name="pc_small_pic_whith" type="text" class="input num_input" id="pc_small_pic_whith" placeholder="默认220" value="<?php echo get_config_value("pc_small_width")?>">
                  <span id="Rpc_small_pic_whith">*&nbsp;必填&nbsp;</span>&nbsp;&nbsp;高：
                  <input name="pc_small_pic_height" type="text" class="input num_input" id="pc_small_pic_height" placeholder="默认0" title="0表示高根据宽自动伸缩" value="<?php echo get_config_value("pc_small_height")?>">
                  <span id="Rpc_small_pic_height">选填</span> &nbsp;&nbsp;是否裁切：
                  <input name="pc_small_caijian" type="checkbox" id="pc_small_caijian" onClick="caijian(2)" <?php if(get_config_value("pc_small_cut")==1){echo "checked";}?>>
                  <span id="Rpc_small_caijian">若勾选，宽与高必须设置非零</span></td>
              </tr>
            </table></td>
        </tr>
        <tr class="trh">
          <td><b>手机网站图片设置</b></td>
        </tr>
        <tr class="trh">
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" class="tdh" width="10%">大图设置</td>
                <td>宽：
                  <input name="touch_big_pic_whith" type="text" class="input num_input" id="touch_big_pic_whith" placeholder="默认300" value="<?php echo get_config_value("sj_big_width")?>">
                  <span id="Rtouch_big_pic_whith">*&nbsp;必填&nbsp;</span>&nbsp;&nbsp;高：
                  <input name="touch_big_pic_height" type="text" class="input num_input" id="touch_big_pic_height" placeholder="默认0" title="0表示高根据宽自动伸缩" value="<?php echo get_config_value("sj_big_height")?>">
                  <span id="Rtouch_big_pic_height">选填</span> &nbsp;&nbsp;是否裁切：
                  <input name="touch_big_caijian" type="checkbox" id="touch_big_caijian" onClick="caijian(3)" <?php if(get_config_value("sj_big_cut")==1){echo "checked";}?>>
                  <span id="Rtouch_big_caijian">若勾选，宽与高必须设置非零</span></td>
              </tr>
              <tr>
                <td height="30" class="tdh">小图设置</td>
                <td>宽：
                  <input name="touch_small_pic_whith" type="text" class="input num_input" id="touch_small_pic_whith" placeholder="默认120" value="<?php echo get_config_value("sj_small_width")?>">
                  <span id="Rtouch_small_pic_whith">*&nbsp;必填&nbsp;</span>&nbsp;&nbsp;高：
                  <input name="touch_small_pic_height" type="text" class="input num_input" id="touch_small_pic_height" placeholder="默认0" title="0表示高根据宽自动伸缩" value="<?php echo get_config_value("sj_small_height")?>">
                  <span id="Rtouch_small_pic_height">选填</span> &nbsp;&nbsp;是否裁切：
                  <input name="touch_small_caijian" type="checkbox" id="touch_small_caijian" onClick="caijian(4)" <?php if(get_config_value("sj_small_cut")==1){echo "checked";}?>>
                  <span id="Rtouch_small_caijian">若勾选，宽与高必须设置非零</span></td>
              </tr>
            </table></td>
        </tr>
        <tr class="trh">
          <td><input class="checkall_sub" onClick="pic_config_sava()" type="button" value="保存"></td>
        </tr>
      </table>
    </div>
  </div>
</div>
