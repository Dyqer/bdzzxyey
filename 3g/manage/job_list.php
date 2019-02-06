<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
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
  <div class="top_right"><a href="job_add.php" class="tubiao_hover">添加职位</a></div>
  <div class="top_right"><a class="tubiao_hover" href="job_list.php">职位管理</a></div>
  <div class="top_right"><a href="jianli_list.php">简历管理</a></div>
  <div class="clear"></div>
</div>
<div class="danye_show">
  <ul>
    <?php
	$pagesize = 9;
	$sql_num = "select lc_id from ".$lc."_job order by lc_sort_id desc";
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
	
	$sql = "select * from ".$lc."_job order by lc_sort_id desc,lc_datetime desc limit {$fromrow},{$pagesize}";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		while($rows=mysql_fetch_assoc($rs)){
		$i++;?>
    <li id="job_list_li_<?php echo $rows['lc_id']?>">
      <div style=" float:left; padding-right:0.7%">
        <input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>" class="danye_showli_g title_li">
      </div>
      <span>
      <input type="text" disabled value="<?php echo mb_substr($rows['lc_title'],0,20,"utf-8")?>" class="title_li">
      </span> <a onClick="show_guanli_bar(this)"><img src="resource/image/new_list_no.png"></a>
      <div class="guanli_bar">
        <div style="text-align:left; line-height:26px"><span><?php echo mb_substr($rows['lc_content'],0,9,"utf-8")?></span> <span><?php echo date("Y-m-d",strtotime($rows['lc_datetime']))?></span></div>
        <input class="edit_button" type="button" onClick="location.href='job_edit.php?id=<?php echo $rows['lc_id']?>'" value="修改">
        <input class="del_button" type="button" onClick="tips_window('job',<?php echo $rows['lc_id']?>,'确定要删除吗？')" value="删除">
      </div>
    </li>
    <?php
    	}
	}?>
  </ul>
</div>
<div class="page">
<?php
if($pagesize<$total_num){
	include(LC_MX_3G."common/wap_page.php");
	$the_page = new wapPageClass($total_num,$pagesize,$page,"?page={page}");
	echo $the_page -> myde_write();
}?>
</div>
</body>
</html>