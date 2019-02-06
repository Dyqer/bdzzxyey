<?php
require(dirname(dirname(__FILE__))."/common/common.php");

$news_num = isset($_POST['news_num'])?$_POST['news_num']:0;//获取新闻个数
$news_page = isset($_POST['news_page'])?$_POST['news_page']:0;//获取新闻第几个分页
$news_type = isset($_POST['news_type'])?$_POST['news_type']:null;//获取新闻所属分类
$news_lanmu = isset($_POST['news_lanmu'])?$_POST['news_lanmu']:null;//获取新闻所属栏目

$pagesize = $news_num;//新闻个数
$page = $news_page;//新闻第几个分页
$cid=$news_type;//新闻所属分类
$lanmu=$news_lanmu;//新闻所属栏目

$sql_num = "select lc_id from ".lc()."_news where lc_del=0 and lc_zt=1  ";
if($cid<>0){
	$sql_num = $sql_num." and c_id in (".get_news_all_child_id($cid)."{$cid})";
}
if($lanmu<>0){
	$sql_num = $sql_num." and c_id in (select c_id from ".lc()."_news_type where lanmu = {$lanmu})";
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

$sql = "select * from ".lc()."_news where lc_del=0 and lc_zt=1 ";
if($cid <> 0){
	$sql = $sql." and c_id in (".get_news_all_child_id($cid)."{$cid})";
}
if($lanmu<>0){
	$sql = $sql." and c_id in (select c_id from ".lc()."_news_type where lanmu = {$lanmu})";
}
$sql = $sql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";


$rs = mysql_query($sql);
if($rs){
	while($rows = mysql_fetch_assoc($rs)){
		?>
		<div class="list1" align="left">
			<article class="list">
	          	<a href="index.php?p=news_show&id=<?php echo $rows["lc_id"]?>&lanmu=<?php echo $news_lanmu ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo mb_substr($rows["lc_title"],0,10,"utf-8")?></a>
	          	<span><?php echo date('m-d',strtotime($rows['lc_datetime']))?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		        <div style="clear:both;"></div>
	        </article>
   		</div>
		<?php
	}
	// exit;
}else{
	echo 2;
}
?>
