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
  <div class="top_right"><a href="job_list.php">职位管理</a></div>
  <div class="top_right"><a class="tubiao_hover" href="jianli_list.php">简历管理</a></div>
  <div class="clear"></div>
</div>
<div class="danye_show">
  <ul>
    <?php 
	  $pagesize = 9;
	  $sql_num = "select lc_id from ".$lc."_jianli order by lc_datetime desc";
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
	  $sql = "select * from ".$lc."_jianli order by lc_datetime desc limit {$fromrow},{$pagesize}";
	  $rs = mysql_query($sql);
	  if($rs){
		  $i=0;
		  while($rows=mysql_fetch_assoc($rs)){
		  $i++;?>
    <li>
      <input type="checkbox" value="<?php echo $rows['lc_id']?>" name="id[]">
      <a href="jianli_show.php?id=<?php echo $rows['lc_id']?>"><?php echo $rows['lc_title']?>&nbsp;&nbsp;<?php echo $rows['lc_tel']?></a></li>
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