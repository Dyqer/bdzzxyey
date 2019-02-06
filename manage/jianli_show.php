<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('job');//是否有添加文章权限
SetSysEvent('jianli_show');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".$lc."_jianli where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
	/*更新当前简历的状态*/
	$upsql="update ".$lc."_jianli set lc_zt=0 where lc_id='{$id}'";
	mysql_query($upsql);
	/*更新当前简历的状态End*/
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
</head>
<style>
td {
	padding-left: 15px
}
.text_a{font-size:16px; padding-left:10px; font-weight:900}
</style>
<style>
	@media print{
	#one{display:none;}
	}
</style>
<body>
<table border="1" cellpadding="0" style="border-collapse:collapse" cellspacing="0" align="center" width="100%">
  <tr>
    <td colspan="7" height="35px" align="center" class="text_a">基本资料</td>
  </tr>
  <tr>
    <td height="35">本人姓名：</td>
    <td><?php echo $rows['lc_title']?></td>
    <td>性别：</td>
    <td><?php echo $rows['lc_sex']?></td>
    <td>出生年月：</td>
    <td><?php echo $rows['lc_birthday']?></td>
    <td rowspan="5" align="center" style="width: 175px"><img src="" onerror="this.src='resource/images/loading.gif'"></td>
  </tr>
  <tr>
    <td height="35">身份证号：</td>
    <td><?php echo $rows['lc_sfz']?></td>
    <td>婚否：</td>
    <td><?php echo $rows['lc_married']?></td>
    <td>职称/资质：</td>
    <td><?php echo $rows['lc_zhicheng']?></td>
  </tr>
  <tr>
    <td height="35">毕业院校：</td>
    <td><?php echo $rows['lc_school']?></td>
    <td>专业：</td>
    <td><?php echo $rows['lc_zhuanye']?></td>
    <td>最高学历：</td>
    <td><?php echo $rows['lc_xueli']?></td>
  </tr>
  <tr>
    <td height="35">联系地址：</td>
    <td><?php echo $rows['lc_address']?></td>
    <td>籍贯：</td>
    <td><?php echo $rows['lc_jiguan']?></td>
    <td>联系电话：</td>
    <td><?php echo $rows['lc_tel']?></td>
  </tr>
  <tr>
    <td height="35">应聘职位：</td>
    <td colspan="2"><?php echo $rows['lc_zhiwei']?></td>
    <td>期望薪金：</td>
    <td colspan="2"><?php echo $rows['lc_price']?>元/月</td>
  </tr>
  <tr>
    <td colspan="7" height="35px" align="left" class="text_a">学习经历</td>
  </tr>
  <tr>
    <td colspan="7" height="150px" align="left"><?php echo $rows['lc_xxjl']?></td>
  </tr>
  <tr>
    <td colspan="7" height="35px" align="left" class="text_a">工作经历</td>
  </tr>
  <tr>
    <td colspan="7" height="150px" align="left"><?php echo $rows['lc_gzjl']?></td>
  </tr>
  <tr>
    <td colspan="7" height="35px" align="left" class="text_a">对公司要求</td>
  </tr>
  <tr>
    <td colspan="7" height="150px" align="left"><?php echo $rows['lc_yaoqiu']?></td>
  </tr>
  <tr>
    <td colspan="7" height="35px" align="left" class="text_a">特长爱好</td>
  </tr>
  <tr>
    <td colspan="7" height="150px" align="left"><?php echo $rows['lc_techang']?></td>
  </tr>
  
</table>
<div id="one" style="width:100%; text-align:center; margin-top:2%;"><input type="button" value="打印" class="button" onClick="window.print();"></div>
</body>
</html>
