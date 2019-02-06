<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".$lc."_jianli where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo constant("web_name")?>- 后台管理系统 - Powered by 龙采MX</title>
<?php require ('link_files.php')?>
<script charset="utf-8" src="../../resource/kindeditor/kindeditor-min.js"></script> 
<script charset="utf-8" src="../../resource/kindeditor/lang/zh_CN.js"></script>
</head>
<body>
<?php require ('head.php')?>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <div class="top_right"><a href="job_list.php">职位管理</a></div>
  <div class="top_right"><a href="jianli_list.php" class="tubiao_hover">简历管理</a></div>
</div>
<table border="1" width="100%" align="center" cellspacing="0" style="border-collapse: collapse" bordercolor="#eeeeee">
  <tr>
    <td align="center" width="10%">本人姓名：</td>
    <td width="23%"><?php echo $rows['lc_title']?></td>
    <td align="center" width="10%">性别：</td>
    <td width="24%"><?php echo $rows['lc_sex']?></td>
    <td align="center" width="10%">出生年月：</td>
    <td width="23%"><?php echo $rows['lc_birthday']?></td>
  </tr>
  <tr>
    <td align="center">身份证号：</td>
    <td><?php echo $rows['lc_sfz']?></td>
    <td align="center">婚否：</td>
    <td><?php echo $rows['lc_married']?></td>
    <td align="center">职称/资质：</td>
    <td><?php echo $rows['lc_zhicheng']?></td>
  </tr>
  <tr>
    <td align="center">毕业院校：</td>
    <td><?php echo $rows['lc_school']?></td>
    <td align="center">专业：</td>
    <td><?php echo $rows['lc_zhuanye']?></td>
    <td align="center">最高学历：</td>
    <td><?php echo $rows['lc_xueli']?></td>
  </tr>
  <tr>
    <td align="center">联系地址：</td>
    <td><?php echo $rows['lc_address']?></td>
    <td align="center">籍贯：</td>
    <td><?php echo $rows['lc_jiguan']?></td>
    <td align="center">联系电话：</td>
    <td><?php echo $rows['lc_tel']?></td>
  </tr>
  <tr>
    <td align="center">应聘职位：</td>
    <td><?php echo $rows['lc_zhiwei']?></td>
    <td align="center">期望薪金：</td>
    <td><?php echo $rows['lc_price']?></td>
    <td></td>
    <td></td>
  </tr>
</table>
<table border="1" width="100%" align="center" cellspacing="0" cellpadding="3" style="border-collapse: collapse; margin-top:8px" bordercolor="#eeeeee">
  <tr>
    <td height="60" width="5%" align="center"> 学<br>
      习<br>
      经<br>
      历</td>
    <td><?php echo $rows['lc_xxjl']?></td>
  </tr>
  <tr>
    <td height="60" width="5%" align="center"> 工<br>
      作<br>
      经<br>
      历</td>
    <td><?php echo $rows['lc_gzjl']?></td>
  </tr>
  <tr>
    <td height="60" width="5%" align="center"> 对<br>
      公<br>
      司<br>
      要<br>
      求</td>
    <td><?php echo $rows['lc_yaoqiu']?></td>
  </tr>
  <tr>
    <td width="5%" align="center" height="60"> 特<br>
      长<br>
      爱<br>
      好</td>
    <td><?php echo $rows['lc_techang']?></td>
  </tr>
</table>
</body>
</html>