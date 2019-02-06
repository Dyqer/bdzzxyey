<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证

$id = isset($_GET['id'])?(int)$_GET['id']:0;
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页

if(!$id){
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
  <div class="clear"></div>
</div>
<div class="Products_list">
  <form>
    <ul>
      <?php
$pagesize = 6;
$sql_num = "select lc_id from ".$lc."_products_pics where product_id='{$id}'";
$sql_num.=" order by lc_sort_id desc";
$rs_num = mysql_query($sql_num);
if($rs_num){
	$total_num = mysql_num_rows($rs_num);
}else{
	$total_num = 0;
}

$total_page = ceil($total_num/$pagesize);
$page = isset($page)?intval($page):1;
$page = ($page<1)?1:$page;
$page = ($page>$total_page)?$total_page:$page;
$fromrow = ($page-1)*$pagesize;

$sql = "select * from ".$lc."_products_pics where product_id='{$id}'";
$sql.=" order by lc_sort_id desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
if($rs){
	$i=0;
	while($rows=mysql_fetch_assoc($rs)){
		$i++;?>
      <li id="products_pic_list_li_<?php echo $rows['lc_id']?>"><img src="<?php echo str_replace("../", "../../",$rows['lc_pic'])?>" >
        <p><span>
          <input type="text" value="<?php echo $rows['lc_title']?>" id="products_pic_<?php echo $rows['lc_id']?>" onChange="edit_products_picname(<?php echo $rows['lc_id']?>)">
          </span>
        <div class="projj"><span>
          <input type="checkbox" value="<?php echo $rows['lc_id'] ?>" name="lc_id[]">
          </span>
          <input name="fengmian" type="radio" id="fengmian_<?php echo $rows['lc_id']?>" onClick="xuan_fengmian(<?php echo $rows['lc_id']?>,<?php echo $id?>)"
		<?php if($rows['lc_fengmian']==1){echo "checked";}?>>
          &nbsp;封面<a
		onClick="del_products_pic(<?php echo $rows['lc_id']?>)">删除</a></div>
        </p>
      </li>
      <?php
	}
}
?>
    </ul>
  </form>
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
