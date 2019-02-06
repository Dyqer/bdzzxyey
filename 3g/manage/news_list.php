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
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <!--<div class="top_right"><a id="tubiao">分类列表</a></div>-->
  <div class="top_right"><a class="tubiao_hover" href="news_add.php?lanmu=<?php echo $lanmu?>">发布新闻</a></div>
  <div class="clear"></div>
</div>
<form method="post" action="news_del_all.php?lanmu=<?php echo $lanmu ?>" name="myform">
  <div class="danye_show nl">
    <ul>
      <!--新闻列表-->
      <?php
$pagesize = 9;
$sql_num = "select lc_id from ".$lc."_news";
$where_sql = " where lc_del=0";
if($lanmu<>0){
	$where_sql.= " and c_id in (select c_id from ".$lc."_news_type where lanmu = {$lanmu})";
}
if($c_id<>0){
	$where_sql.= " and c_id in (".get_news_all_child_id($c_id)."{$c_id})";
}
if($type=="touch"){
	$where_sql.= " and lc_phone=1";
	$post_type = 1;
}
if($type=="pc"){
	$post_type = 2;
}

$sql_num = $sql_num.$where_sql." order by lc_sort_id desc";

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

$sql = "select * from ".$lc."_news";
$sql = $sql.$where_sql." order by lc_sort_id desc,lc_datetime desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
if($rs){
	$i=0;
	while($rows=mysql_fetch_assoc($rs)){
		$i++;?>
      <li id="news_list_li_<?php echo $rows['lc_id']?>">
        <div style=" float:left; padding-right:0.7%">
          <input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>" class="danye_showli_g title_li">
        </div>
        <span>
        <input class="title_li" type="text" value="<?php echo $rows['lc_title']?>" id="news_<?php echo $rows['lc_id']?>" onChange="edit_newsname(<?php echo $rows['lc_id']?>)">
        </span> <a onClick="show_guanli_bar(this)"><img src="resource/image/new_list_no.png"></a>
        <div class="guanli_bar">
          <div style="text-align:left; line-height:26px">
          <span>文章类别：<?php echo mb_substr(wap_get_news_type_name($rows['c_id']),0,5,"utf-8")?></span> <span>发布时间：<?php echo date("Y-m-d",strtotime($rows['lc_datetime']))?></span></div>
          <input class="edit_button" type="button" onClick="location.href='news_edit.php?lanmu=<?php echo $lanmu?>&id=<?php echo $rows['lc_id']?>&type=<?php echo $type?>'" value="修改">
          <input class="del_button" type="button" onClick="tips_window('news',<?php echo $rows['lc_id']?>,'确定要删除吗？')" value="删除">
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
	include(LC_MX_3G."common/wap_page.php");
	$the_page = new wapPageClass($total_num,$pagesize,$page,"?lanmu={$lanmu}&page={page}");
	echo $the_page -> myde_write();
}
?>
  </div>
</form>
</body>
</html>