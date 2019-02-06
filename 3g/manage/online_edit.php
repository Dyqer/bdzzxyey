<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo constant("web_name")?>- 后台管理系统 - Powered by 龙采MX</title>
<?php require ('link_files.php')?>
</head>
<body>
<?php require ('head.php')?>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <div class="top_right"><a id="tubiao" class="tubiao_hover">在线修改</a></div>
  <div class="clear"></div>
</div>
<div style="width:90%; margin:0 auto; margin-top:10px">
  <form action="http://www.longcai0351.com/weihuadd.php" method="get">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="online_input"><b>网站名称：</b></td>
        <td><input class="online_input1" name="wzmc" type="text" required size="20"></td>
      </tr>
      <tr>
        <td class="online_input"><b>网&nbsp;&nbsp;址：</b></td>
        <td><input class="online_input1" name="wzhi" type="url" required></td>
      </tr>
      <tr>
        <td class="online_input"><b>联系电话：</b></td>
        <td><input class="online_input1" name="tel" type="tel" required></td>
      </tr>
      <tr>
        <td class="online_input"><b>联 系 人：</b></td>
        <td><input class="online_input1" name="lxr" type="text" required size="20"></td>
      </tr>
      <tr>
        <td class="online_input"><b>修改内容：</b></td>
        <td><textarea name="xgnr" rows="10" required></textarea></td>
      </tr>
      <tr>
        <td colspan="2" align="center" height="10"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input class="online_button" style="margin-right:20px" type="submit" value="提交">
          <input class="online_button" type="reset" value="重填"></td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>