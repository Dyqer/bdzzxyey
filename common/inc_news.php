<?php
/************************************************
 功能：根据编号获取该类别名称
 参数： $cid：类别编号
 *************************************************/
function get_news_type_title($cid){
	$sql = "select c_title from ".lc()."_news_type where c_id={$cid}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['c_title'];
	}else{
		$title = "";
	}
	return $title;
}

/************************************************
 功能：根据编栏目号获取该类别栏目编号
 参数： $cid：类别编号
 *************************************************/
function get_news_lanmu_by_c_id($cid){
	$sql = "select lanmu from ".lc()."_news_type where c_id={$cid}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu = $rows['lanmu'];
	}else{
		$lanmu = 0;
	}
	return $lanmu;
}

/************************************************
 功能：根据新闻编号获取该类别名称（先获取类别编号，然后通过类别编号获取类别名称）
 参数： $lc_id：类别编号
 *************************************************/
function get_news_type_title_by_lc_id($lc_id){
	$sql = "select c_id from ".lc()."_news where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = get_news_type_title($rows['c_id']);
	}else{
		$title = "";
	}
	return $title;
}

/************************************************
 功能：获取类别编号
 参数： $lc_id：类别编号
 *************************************************/
function get_news_c_id_by_lc_id($lc_id){
	$sql = "select c_id from ".lc()."_news where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$c_id = $rows['c_id'];
	}else{
		$c_id = 0;
	}
	return $c_id;
}

/************************************************
 功能：根据新闻编号获取该栏目编号（先获取类别编号，然后通过类别编号获取栏目编号）
 参数： $lc_id：类别编号
 *************************************************/
function get_news_lanmu_by_lc_id($lc_id){
	$sql = "select c_id from ".lc()."_news where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu = get_news_lanmu_by_c_id($rows['c_id']);
	}else{
		$lanmu = 0;
	}
	return $lanmu;
}


/************************************************
 功能：获取某父类别下子类别数量
 参数： $cpid：父类别编号
 *************************************************/
function get_news_type_child_count($cpid){
	$total = 0;
	$sql = "select c_id from ".lc()."_news_type where c_pid='{$cpid}' order by c_id desc";
	$rs = mysql_query($sql);
	if($rs){
		$total = mysql_num_rows($rs);
	}
	return $total;
}

/*************************************************
 功能：判断新闻类别是几级类别，用以在无限分类里子级类别空两格显示
 *************************************************/
function news_ji($c_id){
	$sql = "select c_pid from ".lc()."_news_type where c_id='{$c_id}'";
	$rs = mysql_query($sql);
	$row=mysql_fetch_assoc($rs);
	$i = 1;
	if($row["c_pid"]<>0){
		$i = $i + news_ji($row["c_pid"]);
	}
	return $i;
}


/*************************************************
 功能：获取某大类别的所有子类别
 参数：$c_id：当前类别的编号
 *************************************************/
function get_news_all_child_id($c_id){
	$sql = "select c_id from ".lc()."_news_type where c_pid='{$c_id}'";
	$rs = mysql_query($sql);
	$str = "";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str = $str.$rows["c_id"].",";
			$str = $str.get_news_all_child_id($rows["c_id"]);
		}
	}
	return $str;
}


/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：	$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_news_type($pid,$tid,$lanmu){
	$sql = "select * from ".lc()."_news_type where c_pid ='{$pid}' and lanmu={$lanmu} ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<news_ji($rows["c_id"]);$i++)
			{
				$gang = $gang."&nbsp;&nbsp;";
			}
			$gang = $gang."├";
			?>
<option value="<?php echo $rows["c_id"]?>"
<?php
if($tid == $rows["c_id"])
{
	echo ' selected';
}
?>><?php echo $gang.$rows["c_title"] ?></option>
<?php
get_news_type($rows["c_id"],$tid,$lanmu);
		}
	}
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：	$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_news_alltype($pid,$tid){
	$sql = "select * from ".lc()."_news_type where c_pid ='{$pid}' and c_del=0 ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<news_ji($rows["c_id"]);$i++)
			{
				$gang = $gang."&nbsp;&nbsp;";
			}
			$gang = $gang."├";
			?>
<option value="<?php echo $rows["c_id"]?>"
<?php
if($tid == $rows["c_id"])
{
	echo ' selected';
}
?>><?php echo $gang.$rows["c_title"] ?></option>
<?php
get_news_alltype($rows["c_id"],$tid);
		}
	}
}

/**************************************************
 功能：前台调用新闻类别
 参数：$pid：父类别 $lanmu：栏目编号
 '**************************************************/
function get_news_type_qiantai($pid,$lanmu){
	$sql = "select * from ".lc()."_news_type where c_pid = {$pid}";

	if($lanmu<>0){
		$sql = $sql." and lanmu={$lanmu}";
	}

	$sql = $sql." order by c_sort_id desc";

	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<news_ji($rows["c_id"]);$i++)
			{
				$gang = $gang."&nbsp;&nbsp;&nbsp;";
			}
			$gang = $gang."├┈";
			?>
<div><?php echo $gang ?><a
	href="news_more.php?lanmu=<?php echo $rows["lanmu"] ?>&c_id=<?php echo $rows["c_id"] ?>"><?php echo $rows["c_title"] ?></a></div>
			<?php
			get_news_type_qiantai($rows["c_id"],$lanmu);
		}
	}
}

/**************************************************
 功能：调用前N条记录
 参数：$lc_id：新闻编号
 '**************************************************/
function show_news_content($lc_id){
	//增加点击率
	$sqlhits = "update ".lc()."_news set lc_hits = lc_hits + 1 where lc_id={$lc_id}";
	$rshits = mysql_query($sqlhits);

	$sql = "select * from ".lc()."_news where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		?>
<table width='100%' align=center cellpadding=0 cellspacing=0>
	<tr>
		<td align="center">
		<h3><?php echo $rows['lc_title'] ?></h3>
		</td>
	</tr>
	<tr>
		<td align="center">点击率：<?php echo $rows['lc_hits']?> 添加日期：<?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></td>
	</tr>
	<tr>
		<td><?php echo str_replace("../","",$rows['lc_content']) ?></td>
	</tr>
</table>
		<?php
	}
}
/************************************************
 功能：根据新闻编号获取该排序编号
 参数：$lc_id：类别编号
 *************************************************/
function get_news_sort_id_by_lc_id($lc_id){
	$sql = "select lc_sort_id from ".lc()."_news where lc_id='{$lc_id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lc_sort_id = $rows['lc_sort_id'];
	}else{
		$lc_sort_id = 0;
	}
	return $lc_sort_id;
}
/**************************************************
 功能：新闻幻灯
 参数：$cid：类别 $num：调用数量 $width：宽度 $height：高度 $fontheight：字体高度
 '**************************************************/
function get_news_pic_hd($num,$cid,$width,$height,$fontheight){
	$sql = "select * from ".lc()."_news where lc_pic<>''";
	if($cid<>0){
		$sql = $sql." and c_id in (".get_news_all_child_id($cid)."{$cid})";
	}
	$sql = $sql." order by lc_sort_id desc limit 0,{$num}";
	$rs = mysql_query($sql);

	$pics="";
	$links="";
	$texts="";
	$i = 0;
	$str="";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			if($i==0){
				$pics = $pics.str_replace("../","",$rows['lc_pic']);
				$links = $links."news_show.php?id=".$rows['lc_id'];
				$texts = $texts.$rows['lc_title'];
			}else{
				$pics = $pics."|".str_replace("../","",$rows['lc_pic']);
				$links = $links."|"."news_show.php?id=".$rows['lc_id'];
				$texts = $texts."|".$rows['lc_title'];
			}
			$i++;
		}
		$str = $str."<script type=\"text/javascript\">";
		$str = $str."var focus_width={$width};";
		$str = $str."var focus_height={$height};";
		$str = $str."var text_height={$fontheight};";
		$str = $str."var swf_height = focus_height+text_height;";
		$str = $str."var pics='".$pics."';";
		$str = $str."var links='".$links."';";
		$str = $str."var texts='".$texts."';";
		
		$str = $str."document.write('<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\" align=\"left\"  hspace=\"0\">');document.write('<param name=\"allowScriptAccess\" value=\"sameDomain\"><param name=\"movie\" value=\"resource/media/pixviewer.swf\"><param name=\"quality\" value=\"high\"><param name=\"bgcolor\" value=\"#F0F0F0\">');document.write('<param name=\"menu\" value=\"false\"><param name=wmode value=\"opaque\">');document.write('<param name=\"FlashVars\" value=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\">');document.write('<embed src=\"resource/media/pixviewer.swf\" wmode=\"opaque\" FlashVars=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\" menu=\"false\" bgcolor=\"#F0F0F0\" quality=\"high\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />');document.write('</object>');";
		$str = $str."</script>";
	}else{
		$str="";
	}
	return $str;
}
?>