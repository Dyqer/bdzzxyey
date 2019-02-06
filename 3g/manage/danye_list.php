<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//获取所属栏目
$type = isset($_GET['type'])?(string)$_GET['type']:null;//获取类型（pc是电脑sj是手机）
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页

if(!$type){
	echo "<script>alert('请求参数不正确！');location.href='danye_lanmu.php'</script>";
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
  <div class="top_left"><?php echo wap_admin_top() ?></span></div>
  <div class="top_right"><a class="tubiao_hover" href="danye_add.php?lanmu=<?php echo $lanmu?>">发布单页</a></div>
  <div class="clear"></div>
</div>
<div class="danye_show">
  <ul>
    <!--单页列表-->
    <?php
$pagesize = 9;
$sql_num = "select lc_id from ".lc()."_danye";
$where_sql=" where lc_del=0";
if($lanmu<>0){
	$where_sql.=" and lanmu='{$lanmu}'";
}
if($type=="touch"){
	$where_sql.=" and lc_phone=1";
	$post_type=1;
}
if($type=="pc"){
	$post_type=2;
}
$sql_num.=$where_sql." order by lc_sort_id desc";
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

$sql = "select * from ".lc()."_danye";
$sql = $sql.$where_sql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
if($rs){
	$i=0;
	while($rows=mysql_fetch_assoc($rs)){
		$i++?>
    <li id="danye_list_li_<?php echo $rows['lc_id']?>">
      <div style="float:left; padding-right:0.7%">
        <input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>" class="danye_showli_g title_li">
      </div>
      <span>
      <input class="title_li" type="text" value="<?php echo $rows['lc_title']?>" id="danye_<?php echo $rows['lc_id']?>" onChange="edit_danyename(<?php echo $rows['lc_id']?>)">
      </span> <a onClick="show_guanli_bar(this)"><img src="resource/image/new_list_no.png"></a>
      <div class="guanli_bar">
        <input class="edit_button" type="button" onClick="location.href='danye_edit.php?lanmu=<?php echo $rows['lanmu']?>&id=<?php echo $rows['lc_id']?>&type=<?php echo $type?>'" value="修改">
        <input class="del_button" type="button" onClick="tips_window('danye',<?php echo $rows['lc_id']?>,'确定要删除吗？')" value="删除">
      </div>
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
	  include(LC_MX_3G."class/wap_page.php");
	  $the_page = new wapPageClass($total_num,$pagesize,$page,"?lanmu={$lanmu}&type={$type}&page={page}");
	  echo $the_page -> myde_write();
	  }?>
</div>
</body>
</html>