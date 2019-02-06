<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('touch');//是否有权限管理手机
SetSysEvent('touchconfig');//添加日志功能

$sql="SELECT * FROM ".$lc."_touch WHERE id=1";
$rs = mysql_query($sql);
if($rs){
	$rows = mysql_fetch_assoc($rs);
}
?>
<style type="text/css">
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
        <li><a class="typemanageh" href="list.php?C=touchconfig">系统设置</a></li>
        <li><a class="typemanage" href="list.php?C=touch_banner_list">Banner管理</a></li>
        <li><a class="typemanage" href="list.php?C=touch_bot">底部信息</a></li>
        <li><a class="typemanage" href="list.php?C=touch_introduction">公司简介</a></li>
      </ul>
    </div>
  </div>
  <div style="height:30px"></div>
  <div class="fu_right_bottom">
    <div style="width: 380px; float: left; margin-left: 25px; margin-bottom: 20px; margin-right: 20px">
      <iframe src="../3g/index.php" width="380" height="600" frameborder="0" scrolling="auto"></iframe>
    </div>
    <form method="post" action="action/touch_config_action.php" enctype="multipart/form-data">
      <table width="520" align="center" cellpadding="3" cellspacing="1">
        <tr>
          <td colspan="5"><div style="width:360px; height:35px; line-height:35px; margin-left:15px; background: #fffac5; border: 1px solid #ffb400; padding-left: 25px">因手机浏览器与pc浏览器差异，左侧网站与手机可能不一致！</div></td>
        </tr>
        <tr>
          <td colspan="5"><div style="height:120px; line-height:120px; margin-top:15px; margin-bottom:15px; padding-left: 12px">请用手机扫描此二维码访问<img align="absmiddle" src="action/3g_qr_code.php?a=3g" style="margin-left:30px"></div></td>
        </tr>
        <tr>
          <td align="right" class="tdh" width="200">LOGO：</td>
          <td><table width="300" border="0">
              <tr>
                <td><img src="<?php echo $rows['logo_url']?>" onerror="this.src='resource/images/loading.gif'" width="200"></td>
                <td>
<style>
 .opacity{
filter:alpha(opacity=50);      
-moz-opacity:0.5;             
-khtml-opacity:0.5;             
opacity: 0.5;    
position:absolute;
left:0;
top:0;
width:60px;
height:40px;       
}
</style>
	<div style="position:relative">
                  <input type="button" style="width:130px" value="选&nbsp;择&nbsp;图&nbsp;片" onmouseover="floatFile()" class="checkall_sub">
                  <input type="file" id="logo_url" name="logo_url" class=opacity>
				  </div>
                </td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="5" height="8"></td>
        </tr>
        <tr>
          <td align="right" class="tdh">网站名称：</td>
          <td><input type="text" name="touch_name" style="width: 400px" class="input" value="<?php echo $rows['touch_name']?>"></td>
        </tr>
        <tr>
          <td colspan="5" height="8"></td>
        </tr>
        <tr>
          <td align="right" class="tdh">关&nbsp;键&nbsp;词：</td>
          <td><input type="text" name="touch_keywords" style="width: 400px" class="input" value="<?php echo $rows['touch_keywords']?>"></td>
        </tr>
        <tr>
          <td colspan="5" height="8"></td>
        </tr>
        <tr>
          <td align="right" class="tdh">描&nbsp;&nbsp;&nbsp;&nbsp;述：</td>
          <td><input type="text" name="touch_description" style="width: 400px" class="input" value="<?php echo $rows['touch_description']?>"></td>
        </tr>
        <tr>
          <td colspan="5" height="8"></td>
        </tr>
        <tr>
          <td align="right" class="tdh">电&nbsp;话&nbsp;号：</td>
          <td><input type="text" name="touch_tel" style="width: 400px" class="input" value="<?php echo $rows['touch_tel']?>"></td>
        </tr>
        <tr>
          <td colspan="5" height="8"></td>
        </tr>
        <tr>
          <td align="right" class="tdh">短&nbsp;信&nbsp;号：</td>
          <td><input type="text" name="touch_duanxin" style="width: 400px" class="input" value="<?php echo $rows['touch_duanxin']?>"></td>
        </tr>
        <tr>
          <td colspan="5" height="8"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="确定" class="checkall_sub"></td>
        </tr>
      </table>
    </form>
  </div>
</div>
</div>
<!--end fu_right_bottom-->