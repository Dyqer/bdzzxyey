<?php
/*
 * LCMX 4.0 自定义方法核心文件(HTML+PHP)
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
defined('LC_MX') or define('LC_MX',dirname(dirname(__FILE__)).'/');//系统目录定义
require(LC_MX."common/conn.php");

/**************************************************
 功能：调用页面标题内容 7是标题,8是关键词,9是描述内容
 '**************************************************/
function top_keys($id){
	$sql = "select * from ".lc()."_config where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		return $rows['lc_value'];
	}
}
/**************************************************
 功能：PC前台导航调用
 '**************************************************/
function pc_nav($pid=0){
	$sql="select * from ".lc()."_navigation where lc_zt=1 and lc_parent_id ='{$pid}' order by lc_sort_id desc";
	$rs = mysql_query($sql);
	$str="";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str.="<li><a href='".$rows["lc_link_url"]."'>".$rows["lc_title"]."</a><ul>".pc_nav($rows["lc_id"])."</ul></li>";
		}
	}
	return $str;
}
/**************************************************
 功能：调用前N条记录
 参数：$num：调用数量$cid：新闻类别$fontsize：新闻显示字数$isshowdate：是否显示日期 $istj：是否推荐
 '**************************************************/
function show_news_ul($num,$cid,$fontsize,$isshowdate,$istj){
	$wheresql=" where lc_del=0 and lc_zt=1 ";
	$sql = "select * from ".lc()."_news".$wheresql;
	if($cid <> 0){
		$sql = $sql." and c_id in (".get_news_all_child_id($cid)."{$cid})";
	}
	if($istj <> 0){
		$sql = $sql." and lc_tj=1";
	}
	$sql = $sql." order by lc_sort_id desc limit {$num}";
	$rs = mysql_query($sql);
	if($rs){
		echo "<ul>";
		while($rows = mysql_fetch_assoc($rs)){?>
<li><span><a href="index.php?p=news_show&id=<?php echo $rows["lc_id"]?>" title="<?php echo $rows["lc_title"]?>"><?php echo mb_substr($rows['lc_title'],0,$fontsize,'utf-8')?></a></span>
		<?php if($isshowdate == 1){?>
	<strong><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></strong>
	<?php }
		}
		echo "</u>";
	}else{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：获取同类别下的上一条信息
 参数：	$lc_id：新闻编号
 '**************************************************/
function get_news_title_last($lc_id){
	$sql = "select * from ".lc()."_news where c_id = ".get_news_c_id_by_lc_id($lc_id)." and lc_sort_id>".get_news_sort_id_by_lc_id($lc_id);
	$sql = $sql."  order by lc_sort_id asc limit 0,1";
	$rs = mysql_query($sql);
	if($rs){
		if($rows = mysql_fetch_assoc($rs))
		{
			?>
<a href="index.php?p=news_show&id=<?php echo $rows['lc_id']?>"><?php echo $rows['lc_title'] ?></a>
			<?php
		}
		else
		{
			echo "暂无";
		}
	}
	else
	{
		echo "暂无";
	}
}

/**************************************************
 功能：获取同类别下的下一条信息
 参数：	$lc_id：新闻编号
 '**************************************************/
function get_news_title_next($lc_id){
	$sql = "select * from ".lc()."_news where c_id = ".get_news_c_id_by_lc_id($lc_id)." and lc_sort_id<".get_news_sort_id_by_lc_id($lc_id);
	$sql = $sql." order by lc_sort_id desc limit 0,1";
	$rs = mysql_query($sql);
	if($rs){
		if($rows = mysql_fetch_assoc($rs))
		{
			?>
<a href="index.php?p=news_show&id=<?php echo $rows['lc_id'] ?>"><?php echo $rows['lc_title'] ?></a>
			<?php
		}else{
			echo "暂无";
		}
	}else{
		echo "暂无";
	}
}
/**************************************************
 功能：调用前N条记录
 参数：$num：调用数量$cid：职位类别$fontsize：职位显示字数
 '**************************************************/
function show_job_ul($num,$fontsize,$isshowdate){
	$sql = "select * from ".lc()."_job order by lc_sort_id desc limit {$num}";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?>
			<li><span><a href="index.php?p=job_show&id=<?php echo $rows["lc_id"]?>"><?php echo $rows['lc_title']?></a></span>
			<?php if($isshowdate == 1){ ?>
				<strong><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></strong></li><?php
			}
		}
	}else{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：调用前N条记录
 参数：$num：调用数量 $hnum：每行显示几个 $cid：产品类别 $fontsize：产品显示字数 $istj：是否推荐 $width：图片宽度 $height：图片高度
 '**************************************************/
function show_products_ul($num,$hnum,$cid,$fontsize,$istj,$width,$height){
	$sql = "select * from ".lc()."_products where  lc_del=0 and lc_zt=1";
	if($cid <> 0){
		$sql = $sql." and c_id in (".get_products_all_child_id($cid)."{$cid})";
	}
	if($istj <> 0){
		$sql = $sql." and lc_tj=1";
	}
	$sql = $sql." order by lc_sort_id desc limit 0,{$num}";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		while($rows = mysql_fetch_assoc($rs)){
			$i++;
			?>
 			<li><a href="index.php?p=products_show&id=<?php echo $rows['lc_id']?>" title="<?php echo $rows['lc_title'] ?>">
            <img src="<?php echo str_replace("../", "", get_products_pic_by_proid($rows['lc_id'])) ?>" width="<?php echo $width?>" height="<?php echo $height?>" border="0"  /></a>
			<h1><a href="index.php?p=products_show&id=<?php echo $rows['lc_id']?>" title="<?php echo $rows['lc_title']?>"><?php echo mb_substr($rows['lc_title'],0,$fontsize,'utf-8')?></a></h1>
			</li>
			<?php
			if($i % $hnum ==0){echo "</tr><tr>";}
		}
	}else{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：前台调用单页类别
 参数：$lanmu：栏目编号
 '**************************************************/
function get_danye_type_qiantai_ul($lanmu){
	$sql = "select * from ".lc()."_danye where lc_del=0 and lc_zt=1";
	if($lanmu<>0){
		$sql = $sql." and lanmu={$lanmu}";
	}
	$sql = $sql." order by lc_sort_id desc";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?><li><a href="index.php?p=about&id=<?php echo $rows["lc_id"]?>&lanmu=<?php echo $rows["lanmu"]?>"><?php echo $rows["lc_title"] ?></a></li><?php
		}
	}
}
/**************************************************
 功能：调用前N条记录
 参数：$num：每页显示数量 $key：关键字
 '**************************************************/
function show_gbook_more($num){
	$pagesize = $num;
	$page = (int)$_GET['page'];
	$sql_num = "select lc_id from ".lc()."_gbook order by lc_id desc";
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
	$wheresql="where lc_zt = 1 ";
	$sql = "select * from ".lc()."_gbook ".$wheresql." order by lc_id desc limit {$fromrow},{$pagesize}";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?>
<table width="100%" border="0" cellspacing="1" cellpadding="3" bgcolor="#dddddd">
	<tr bgcolor="#eeeeee">
		<td height="22" width="90" align="right">&nbsp;标题：</td>
		<td><?php echo $rows['lc_title'] ?></td>
		<td width="45%">&nbsp;留言时间：<?php echo $rows['lc_datetime'] ?></td>
	</tr>
	<tr bgcolor="#eeeeee">
		<td height="22" width="90" align="right">&nbsp;留 言 者：</td>
		<td><?php echo $rows['lc_name'] ?></td>
		<td width="45%">&nbsp;IP：<?php echo $rows['lc_ip'] ?></td>
	</tr>
	<tr bgcolor="#eeeeee">
		<td height="22" align="right">&nbsp;留言内容：</td>
		<td colspan="2"><?php echo $rows['lc_content'] ?></td>
	</tr>
	<tr bgcolor="#eeeeee">
		<td height="22" align="right">&nbsp;留言回复：</td>
		<td colspan="2"><font color="#009900"> <?php if($rows['lc_reply']==""){
			echo "暂无回复！";
		}else{
			echo $rows['lc_reply'];
		}
		?> </font></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td style="height: 5px"></td>
	</tr>
</table>
		<?php
		}
		?>
<table cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td><?php
		if($pagesize<$total_num){
			include_once 'class/page.php';
			$the_page = new PageClass($total_num,$pagesize,$page,"index.php?p=gbook_list&lanmu={$lanmu}&page={page}");
			echo $the_page -> myde_write();
		}
		?></td>
	</tr>
</table>
		<?php
	}
	else
	{
		echo "暂无此类信息！";
	}
}
/************************************************
 功能：根据职位编号获取该职位名称
 参数：$lc_id：职位编号
 *************************************************/
function get_job_title_by_lc_id($lc_id){
	$sql = "select lc_title from ".lc()."_job where lc_id='{$lc_id}'";
	$rs = mysql_query($sql);
	$lc_title=0;
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lc_title = $rows['lc_title'];
	}
	return $lc_title;
}
/**************************************************
 功能：调用前N条记录
 参数：$num：每页显示数量 $fontsize：职位显示字数 $isshowdate：是否显示日期 $key：关键词
 '**************************************************/
function show_job_more($num,$fontsize,$isshowdate,$key){
	$pagesize = $num;
	$page = (int)$_GET['page'];
	$wheresql=" where 1=1 ";
	$sql_num = "select lc_id from ".lc()."_job";
	if($key<>""){
		$wheresql.=" and lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$wheresql." order by lc_sort_id desc";
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
	$sql = "select * from ".lc()."_job";
	$sql = $sql.$wheresql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";
	$rs = mysql_query($sql);
	if($rs){
		?>
<table width='100%' align=center cellpadding=0 cellspacing=1>
<tr align="center">
	<th bgcolor="#CCCCCC">职位名称</th>
	<th bgcolor="#CCCCCC">招聘人数</th>
	<th bgcolor="#CCCCCC">职位说明</th>
	<th bgcolor="#CCCCCC">应聘</th>
</tr>
		<?php
		while($rows = mysql_fetch_assoc($rs)){
			?>
<tr>
	<td height="21" align="center" bgcolor="#eeeeee"><a href="index.php?p=job_show&id=<?php echo $rows{"lc_id"}?>"><?php echo mb_substr($rows['lc_title'],0,$fontsize,"utf-8")?></a></td>
	<td bgcolor="#eeeeee" align="center"><?php echo $rows['lc_num'] ?></td>
	<td bgcolor="#eeeeee"><?php echo mb_substr($rows['lc_content'],0,$fontsize,"utf-8") ?></td>
	<td bgcolor="#eeeeee" align="center"><a href="index.php?p=jianli&id=<?php echo $rows{'lc_id'}?>">应聘</a></td>
</tr>
			<?php
		}
		?>
</table>
<table cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td class="" align="center"><?php
		if($pagesize<$total_num){
			include_once 'class/page.php';
			$the_page = new PageClass($total_num,$pagesize,$page,"index.php?p=job_list&lanmu={$lanmu}&page={page}");
			echo $the_page -> myde_write();
		}
		?></td>
	</tr>
</table>
		<?php
	}
	else
	{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_down_type_ul($pid,$tid,$lanmu){
	$sql = "select * from ".lc()."_down_type where c_pid = {$pid} and lanmu={$lanmu} ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<down_ji($rows["c_id"]);$i++)
			{
				$gang = $gang."&nbsp;&nbsp;&nbsp;";
			}
			$gang = $gang."";
			?><li><a href="index.php?p=down_list&c_id=<?php echo $rows["c_id"]?>&lanmu=<?php echo $rows["lanmu"]?>"><?php echo $gang.$rows["c_title"]?></a></li><?php
			get_down_type_ul($rows["c_id"],$tid,$lanmu);
		}
	}
}
/**************************************************
 功能：调用前N条记录
 参数：$num：每页显示数量 $cid：下载类别 $lanmu：所属栏目 $fontsize：下载显示字数 $isshowdate：是否显示日期 $istj：是否推荐 $key：关键词
 '**************************************************/
function show_down_more_ul($num,$cid,$lanmu,$fontsize,$isshowdate,$istj,$key){
	$pagesize = $num;
	$page = (int)$_GET['page'];
	$wheresql=" where 1=1 ";
	$sql_num = "select lc_id from ".lc()."_down";
	if($cid<>0){
		$wheresql.=" and c_id in (".get_down_all_child_id($cid)."'{$cid}')";
	}
	if($lanmu<>0){
		$wheresql.=" and c_id in (select c_id from ".lc()."_down_type where lanmu = '{$lanmu}')";
	}
	if($istj <> 0){
		$wheresql.=" and lc_tj=1";
	}
	if($key<>""){
		$wheresql.=" and lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$wheresql." order by lc_sort_id desc";
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
	$sql = "select * from ".lc()."_down";
	$sql = $sql.$wheresql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?>
		<li><span><a href="index.php?p=down_show&id=<?php echo $rows["lc_id"]?>" title="<?php echo $rows["lc_title"] ?>"><?php echo mb_substr($rows['lc_title'],0,$fontsize,'utf-8') ?></a></span>
		<?php if($isshowdate == 1){?><strong><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?> 点击量：<?php echo $rows["lc_hits"] ?></strong><?php }?></li><?php
		}?>
   <div class="clear" style="clear:both; padding-top:20px;"></div>
<?php
		if($pagesize<$total_num){
			include_once 'class/page.php';
			$the_page = new PageClass($total_num,$pagesize,$page,"index.php?p=down_list&lanmu={$lanmu}&c_id={$cid}&page={page}");
			echo $the_page -> myde_write();
		}
		?>
		<?php
	}else{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：获取同类别下的上一条信息
 参数：$lc_id：下载编号
 '**************************************************/
function get_down_title_last($lc_id){
	$sql = "select * from ".lc()."_down where c_id = ".get_down_c_id_by_lc_id($lc_id)." and lc_sort_id>".get_down_sort_id_by_lc_id($lc_id);
	$sql.=" order by lc_sort_id asc limit 0,1";
	$rs = mysql_query($sql);
	if($rs){
		if($rows = mysql_fetch_assoc($rs)){
			?><a href="index.php?p=down_show&id=<?php echo $rows['lc_id']?>"><?php echo $rows['lc_title'] ?></a><?php
		}else{
			echo "暂无";
		}
	}else{
		echo "暂无";
	}
}
/**************************************************
 功能：获取同类别下的下一条信息
 参数：$lc_id：下载编号
 '**************************************************/
function get_down_title_next($lc_id){
	$sql = "select * from ".lc()."_down where c_id = ".get_down_c_id_by_lc_id($lc_id)." and lc_sort_id<".get_down_sort_id_by_lc_id($lc_id);
	$sql = $sql." order by lc_sort_id desc limit 0,1";
	$rs = mysql_query($sql);
	if($rs){
		if($rows = mysql_fetch_assoc($rs)){
			?><a href="index.php?p=down_show&id=<?php echo $rows['lc_id'] ?>"><?php echo $rows['lc_title'] ?></a><?php
		}else{
			echo "暂无";
		}
	}else{
		echo "暂无";
	}
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_products_type_m_ul($pid,$tid,$lanmu){
	$wheresql="";
	if($lanmu){
		$wheresql.=" and lanmu='{$lanmu}' ";
	}
	$sql = "select * from ".lc()."_products_type where c_pid = '{$pid}' ".$wheresql." ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<products_ji($rows["c_id"]);$i++){
				$gang = $gang."&nbsp;";
			}
			?><li><a href="index.php?p=products_list&lanmu=<?php echo $rows["lanmu"]?>&c_id=<?php echo $rows["c_id"]?>"><?php echo $gang.$rows["c_title"]?></a></li><?php
			get_products_type_m_ul($rows["c_id"],$tid,$lanmu);
		}
	}
}

/**************************************************
 功能：调用前N条记录
 参数：$num：每页显示数量 $hnum：每行显示几个 $cid：产品类别 $lanmu：所属栏目 $fontsize：产品显示字数 $isshowdate：是否显示日期 $istj：是否推荐 $key：关键词 $width：图片宽度 $height：图片高度
 '**************************************************/
function show_products_more_ul($num,$hnum,$cid,$lanmu,$fontsize,$isshowdate,$istj,$key,$width,$height){
	$pagesize = $num;
	$page = (int)$_GET['page'];
	$sql_num = "select lc_id from ".lc()."_products";
	$where_sql=" where lc_del=0 and lc_zt=1";
	if($cid<>0){
		$where_sql.=" and c_id in (".get_products_all_child_id($cid)."'{$cid}')";
	}
	if($lanmu<>0){
		$where_sql.=" and c_id in (select c_id from ".lc()."_products_type where lanmu = '{$lanmu}')";
	}
	if($istj <> 0){
		$where_sql.=" and lc_tj=1";
	}
	if($key<>""){
		$where_sql.=" and lc_title like '%{$key}%'";
	}
	$sql_num = $sql_num.$where_sql." order by lc_sort_id desc";
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
	$sql = "select * from ".lc()."_products";
	$sql = $sql.$where_sql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		while($rows = mysql_fetch_assoc($rs)){
			$i++;
			?>
			<li><a href="index.php?p=products_show&id=<?php echo $rows['lc_id']?>&lanmu=<?php echo $rows['lanmu']?>&c_id=<?php echo $rows['c_id']?>" title="<?php echo $rows['lc_title']?>">
			<img src="<?php echo str_replace("../", "",  get_products_pic_by_proid($rows['lc_id']))?>" width="<?php echo $width?>" height="<?php echo $height?>"
			border="0"  /></a>
			<h1><a href="index.php?p=products_show&id=<?php echo $rows['lc_id']?>" title="<?php echo $rows['lc_title'] ?>"><?php echo mb_substr($rows['lc_title'],0,$fontsize,'utf-8') ?></a></h1>
			</li>
			<?php
		}
		?>
		<div class="clear"></div>
<table cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td><?php
		if($pagesize<$total_num){
			include_once('class/page.php');
			$the_page = new PageClass($total_num,$pagesize,$page,"index.php?p=products_list&lanmu={$lanmu}&c_id={$cid}&page={page}");
			echo $the_page -> myde_write();
		}
		?></td>
	</tr>
</table>
		<?php
	}
	else
	{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：获取同类别下的上一条信息
 参数：	$lc_id：产品编号
 '**************************************************/
function get_products_title_last($lc_id){
	$sql = "select * from ".lc()."_products where c_id = ".get_products_c_id_by_lc_id($lc_id)." and lc_sort_id>".get_products_sort_id_by_lc_id($lc_id);
	$sql = $sql."  order by lc_sort_id asc limit 0,1";
	$rs = mysql_query($sql);
	if($rs){
		if($rows = mysql_fetch_assoc($rs)){
			?>
<a href="products_show.php?id=<?php echo $rows['lc_id'] ?>"><?php echo $rows['lc_title'] ?></a>
			<?php
		}else{
			echo "暂无";
		}
	}else{
		echo "暂无";
	}
}

/**************************************************
 功能：获取同类别下的下一条信息
 参数：	$lc_id：产品编号
 '**************************************************/
function get_products_title_next($lc_id){
	$sql = "select * from ".lc()."_products where c_id = ".get_products_c_id_by_lc_id($lc_id)." and lc_sort_id<".get_products_sort_id_by_lc_id($lc_id);
	$sql = $sql." order by lc_sort_id desc limit 0,1";
	$rs = mysql_query($sql);
	if($rs){
		if($rows = mysql_fetch_assoc($rs))
		{
			?>
<a href="products_show.php?id=<?php echo $rows['lc_id']?>"><?php echo $rows['lc_title'] ?></a>
			<?php
		}
		else
		{
			echo "暂无";
		}
	}
	else
	{
		echo "暂无";
	}
}
/**************************************************
 功能：根据产品型号获取该产品的同型号产品 多图效果1
 参数：$product_id
 '**************************************************/
function show_pic_more1($num,$lc_id,$fontsize,$width,$height){
	$sql = "select * from ".lc()."_products_pics where 1=1";
	if($lc_id){
		$sql.=" and product_id = '{$lc_id}'";
		}
	$sql = $sql." order by lc_sort_id desc limit 0,{$num}";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		while($rows = mysql_fetch_assoc($rs)){
			$i++;
			?>
		<img src="<?php echo str_replace("../", "", $rows['lc_pic'])?>" width="<?php echo $width?>" height="<?php echo $height?>" border="0"  />
			<?php
		}
	}
	else
	{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：根据产品型号获取该产品的同型号产品 多图效果2
 参数：$product_id
 '**************************************************/
function show_pic_more2($num,$lc_id,$fontsize,$width,$height){
	$sql = "select * from ".lc()."_products_pics where 1=1";
	if($lc_id){
		$sql.=" and product_id = '{$lc_id}'";
		}
	$sql = $sql." order by lc_sort_id desc limit 0,{$num}";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		while($rows = mysql_fetch_assoc($rs)){
			$i++;
			?>
		<a href="<?php echo str_replace("../", "", $rows['lc_pic']) ?>" class="MagicZoom"><img src="<?php echo str_replace("../", "", $rows['lc_pic'])?>"
			width="<?php echo $width ?>" height="<?php echo $height ?>" border="0"  /></a>
			<?php
		}
	}else{
		echo "暂无此类信息！";
	}
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$lanmu：栏目
 '**************************************************/
function get_news_type_ul($lanmu){
	$sql = "select * from ".lc()."_news_type where 1=1";
	if($lanmu<>0){
		$sql = $sql. " and lanmu='{$lanmu}'";
		}
	$sql = $sql." order by c_sort_id desc";	
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?><li><a href="index.php?p=news_list&lanmu=<?php echo $rows["lanmu"]?>&c_id=<?php echo $rows["c_id"]?>"> <?php echo $rows["c_title"] ?></a></li><?php
		}
	}
}
/**************************************************
 功能：调用前N条记录
 参数：$num：每页显示数量 $cid：新闻类别 $lanmu：所属栏目 $fontsize：新闻显示字数 $isshowdate：是否显示日期 $istj：是否推荐 $key：关键词
 '**************************************************/
function show_news_more_ul($num,$cid,$lanmu,$fontsize,$isshowdate,$istj,$key){
	$pagesize = $num;
	$page = (int)$_GET['page'];
	$wheresql=" where lc_del=0 and lc_zt=1 ";
	$sql_num = "select lc_id from ".lc()."_news";
	if($cid<>0){
		$wheresql.=" and c_id in (".get_news_all_child_id($cid)."'{$cid}')";
	}
	if($lanmu<>0){
		$wheresql.=" and c_id in (select c_id from ".lc()."_news_type where lanmu = '{$lanmu}')";
	}
	if($key<>""){
		$wheresql.=" and lc_title like '%{$key}%'";
	}
	if($istj <> 0){
		$wheresql.=" and lc_tj=1";
	}
	$sql_num = $sql_num.$wheresql." order by lc_sort_id desc";
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
	$sql = "select * from ".lc()."_news";
	$sql = $sql.$wheresql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?>
		<li><span><a href="index.php?p=news_show&id=<?php echo $rows["lc_id"]?>" title="<?php echo $rows["lc_title"]?>"><?php echo mb_strcut($rows['lc_title'],0,$fontsize,'utf-8')?></a>
    </span>   
		<?php if($isshowdate == 1){
			echo "<strong>".date('Y-m-d',strtotime($rows['lc_datetime']))."</strong>";
		}?>
	</li>
	<?php
		}
		?>
		<div class="clear"></div>
		<?php
			if($pagesize<$total_num){
				include_once 'class/page.php';
				$the_page = new PageClass($total_num,$pagesize,$page,"index.php?p=news_list&lanmu={$lanmu}&c_id={$cid}&page={page}");
				echo $the_page -> myde_write();
			}
			?>
		<?php
	}else{
		echo "亲，资料正在更新中哦！";
	}
}
/**************************************************
 功能：搜索
 参数：$key搜索关键词 $fontsize标题显示个数
 '**************************************************/
function show_search_ul($key,$fontsize){
	if($key){
		$wheresql=" where lc_title like '%{$key}%' or lc_jianjie like '%{$key}%'";
	}else{
		echo "搜索值不能为空！";
		exit;
	}
	$wheresql.=' and lc_del=0 and lc_zt=1 ';
	$sqlnew = "select * from ".lc()."_news ".$wheresql;
	$rs1 = mysql_query($sqlnew);
	$sqlpro = "select * from ".lc()."_products ".$wheresql;
	$rs2 = mysql_query($sqlpro);
	$num1=mysql_num_rows($rs1);
	$num2=mysql_num_rows($rs2);
		if($num1>0 || $num2>0){
			while($rows1 = mysql_fetch_assoc($rs1)){
			?><li> <span><a href="index.php?p=news_show&id=<?php echo $rows1["lc_id"]?>" title="<?php echo $rows1["lc_title"]?>"><?php echo mb_strcut($rows1['lc_title'],0,$fontsize,'utf-8')?></a>
    </span>  <strong>新闻[<?php echo $rows1['lc_datetime']?>]</strong></li><?php }?>
		<div class="clear"></div><?php
			while($rows2 = mysql_fetch_assoc($rs2)){
			?>
		<li> <span><a href="index.php?p=products_show&id=<?php echo $rows2["lc_id"]?>" title="<?php echo $rows2["lc_title"]?>"><?php echo mb_strcut($rows2['lc_title'],0,$fontsize,'utf-8')?></a>
    </span>  <strong>图文[<?php echo $rows2['lc_datetime']?>]</strong></li>
	<?php
		}
		?>
		<div class="clear"></div>
	<?php
		}else{ echo "亲，没有查询到相关内容！";}
}
 ?>