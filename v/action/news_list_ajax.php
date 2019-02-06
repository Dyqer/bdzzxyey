<?php
require(dirname(dirname(__FILE__))."/common/common.php");

$news_num=$_POST['news_num'];//获取新闻个数
$news_page=$_POST['news_page'];//获取新闻第几个分页
$news_type=$_POST['news_type'];//获取新闻所属分类
$news_lanmu=$_POST['news_lanmu'];//获取新闻所属栏目

$pagesize = $news_num;//新闻个数
$page = $news_page;//新闻第几个分页
$cid=$news_type;//新闻所属分类
$lanmu=$news_lanmu;//新闻所属栏目

$sql_num = "select lc_id from ".lc()."_news where lc_del=0 and lc_zt=1 ";
if($cid<>0){
	$sql_num.=" and c_id in (".get_news_all_child_id($cid)."{$cid})";
}

if($lanmu<>0){
	$sql_num.=" and c_id in (select c_id from ".lc()."_news_type where lanmu = {$lanmu})";
}

$sql_num.=" order by lc_sort_id desc";

$rs_num = mysql_query($sql_num);
if($rs_num){
	$total_num = mysql_num_rows($rs_num);
}else{
	$total_num = 0;
}
$total_page = ceil($total_num/$pagesize);
//$page = isset($page)?intval($page):1;
$page = ($page<1)?1:$page;
if($page>$total_page){
	echo "1";
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

$sql = $sql." order by lc_sort_id desc limit $fromrow,".$pagesize;
$rs = mysql_query($sql);
if($rs){
	while($rows = mysql_fetch_assoc($rs)){
		?>
<article class="list">
<header>
<h3><a href="news_show.php?id=<?php echo $rows["lc_id"] ?>"
	title="<?php echo $rows["lc_title"] ?>"><?php echo $rows['lc_title'] ?></a></h3>
<p class="con"><?php echo mb_strcut(strip_tags(str_replace("../","",$rows['lc_content'])),0,100,"utf-8"); ?></p>
<p class="time"><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></p>
</header>
</article>
		<?php
	}
}
else{
	echo "2";
}
?>