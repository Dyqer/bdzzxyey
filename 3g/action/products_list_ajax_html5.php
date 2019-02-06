<?php
require(dirname(dirname(__FILE__))."/common/common.php");

$products_num = isset($_POST['products_num'])?$_POST['products_num']:0;//获取新闻个数
$products_page = isset($_POST['products_page'])?$_POST['products_page']:0;//获取新闻第几个分页
$products_type = isset($_POST['products_type'])?$_POST['products_type']:null;//获取新闻所属分类
$products_lanmu = isset($_POST['products_lanmu'])?$_POST['products_lanmu']:null;//获取新闻所属栏目

$pagesize = $products_num;//新闻个数
$page = $products_page;//新闻第几个分页
$cid=$products_type;//新闻所属分类
$lanmu=$products_lanmu;//新闻所属栏目

$sql_num = "select lc_id from ".lc()."_products where lc_del=0 and lc_zt=1 and lc_phone=1 ";
if($cid<>0){
	$sql_num = $sql_num." and c_id in (".get_products_all_child_id($cid)."{$cid})";
}

if($lanmu<>0){
	$sql_num = $sql_num." and c_id in (select c_id from ".lc()."_products_type where lanmu = {$lanmu})";
}
$rs_num = mysql_query($sql_num);
if($rs_num){
	$total_num = mysql_num_rows($rs_num);
}else{
	$total_num = 0;
}
$total_page = ceil($total_num/$pagesize);
$page = ($page<1)?1:$page;
if($page>$total_page){
	echo 1;
	exit;
}
$page = ($page>$total_page)?$total_page:$page;
$fromrow = ($page-1)*$pagesize;

$sql = "select * from ".lc()."_products where lc_del=0 and lc_zt=1 and lc_phone=1 ";
if($cid <> 0){
	$sql = $sql." and c_id in (".get_products_all_child_id($cid)."{$cid})";
}
if($lanmu<>0){
	$sql = $sql." and c_id in (select c_id from ".lc()."_products_type where lanmu = {$lanmu})";
}

$sql = $sql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
if($rs){
	while($rows = mysql_fetch_assoc($rs)){
		?>
		
          <li align="center">
  		        		<div class="pro_img">
  		        			<section>
  		                		<div class="products_list_pic"><a href="index.php?p=products_show&id=<?php echo $rows["lc_id"]?>&lanmu=<?php echo $products_lanmu ?>">
  		                			<img src="" class="lazy" data-original="<?php echo get_thumb_pic("",get_products_pic_by_proid($rows["lc_id"]),sjsmall).get_products_pic_by_proid($rows["lc_id"])?>" alt="<?php echo $rows['lc_title']; ?>">
  		                		</a></div>
  		                		<div class="products_list_t"><?php echo mb_strcut($rows['lc_title'],0,10,"utf-8")?></div>
  		                	</section>
  		        		</div>
  		            </li>
        
				
		
		<?php
	}
}
else{
	echo 2;
}
?>