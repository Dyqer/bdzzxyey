<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//获取所属栏目
$type = isset($_GET['type'])?(string)$_GET['type']:null;//获取类型（pc是电脑sj是手机）
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页

if(!$type){
	echo "<script>alert('请求参数不正确！');location.href='products_lanmu.php'</script>";
	exit;
}
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
  <!--<div class="top_right"><a id="tubiao">分类列表</a></div>-->
  <div class="top_right"><a class="tubiao_hover" href="products_add.php?lanmu=<?php echo $lanmu?>">发布图文</a></div>
  <div class="clear"></div>
</div>
  <div class="Products_list">
    <ul>
      <!--新闻列表-->
      <?php
$pagesize = 8;
$sql_num = "select lc_id from ".$lc."_products";
$wheresql = " where lc_del=0";
if($c_id<>0){
	$wheresql.= " and c_id in (".get_products_all_child_id($c_id)."{$c_id})";
}
if($lanmu<>0){
	$wheresql.= " and c_id in (select c_id from ".$lc."_products_type where lanmu = '{$lanmu}')";
}
if($type=="touch"){
	$wheresql.= " and lc_phone=1";
}
$sql_num = $sql_num.$wheresql." order by lc_sort_id desc";
$rs_num = mysql_query($sql_num);
if($rs_num){
	$total_num = mysql_num_rows($rs_num);
}else{
	$total_num = 0;
}

$total_page = ceil($total_num/$pagesize);
$page = ($page<1)?1:$page;
$page = ($page>$total_page)?$total_page:$page;
$fromrow = ($page-1)*$pagesize;

$sql = "select * from ".$lc."_products";
$sql = $sql.$wheresql." order by lc_sort_id desc,lc_datetime desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
if($rs){
	$i=0;
	while($rows=mysql_fetch_assoc($rs)){
		$i++;?>
      <li id="products_list_li_<?php echo $rows['lc_id']?>">
      <a href="products_edit.php?lanmu=<?php echo $lanmu?>&id=<?php echo $rows['lc_id']?>&type=<?php echo $type?>"> <img src="<?php echo get_thumb_pic('',str_replace("../", "../../",get_products_pic_by_proid($rows['lc_id'])),'sjsmall')?>"> </a>
        <p> <span>
          <input type="text" value="<?php echo $rows['lc_title']?>" id="products_<?php echo $rows['lc_id']?>" onChange="edit_productsname(<?php echo $rows['lc_id']?>)">
          </span></p>
        <div class="projj"> <span>
          <input type="checkbox" value="<?php echo $rows['lc_id']?>" name="lc_id[]">
          </span> <a href="products_edit.php?lanmu=<?php echo $lanmu?>&id=<?php echo $rows['lc_id']?>&type=<?php echo $type?>">修改</a> <a onClick="tips_window('products',<?php echo $rows['lc_id']?>,'确定要删除吗？')">删除</a> </div>
      </li>
      <?php
	}
}
?>
    </ul>
  </div>
  <div class="page">
    <?php
if($pagesize<$total_num){
	include(LC_MX_3G."common/wap_page.php");
	$the_page = new wapPageClass($total_num,$pagesize,$page,"?lanmu={$lanmu}&page={page}");
	echo $the_page -> myde_write();
}
?>
  </div>
</body>
</html>