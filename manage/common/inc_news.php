<?php
/************************************************
 功能：获取《文章分类》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> 文章编号
 *************************************************/
function get_newstype_by_id($id,$col='c_title'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_news_type where c_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
/************************************************
 功能：根据编号获取该类别名称
 参数： $cid -> 类别编号
 *************************************************/
function get_news_type_title($cid){
	$sql = "select c_title from ".lc()."_news_type where c_id = '{$cid}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['c_title'];
	}else{
		$title = "";
	}
	return $title;
}
/*************************************************
 功能：判断文章类别是几级类别，用以在无限分类里子级类别空两格显示
 *************************************************/
function news_ji($c_id){
	$sql = "select c_pid from ".lc()."_news_type where c_id = '{$c_id}'";
	$rs = mysql_query($sql);
	$row=mysql_fetch_assoc($rs);
	$i = 1;
	if($row["c_pid"]<>0){
		$i = $i + news_ji($row["c_pid"]);
	}
	return $i;
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_news_type_m($pid,$tid,$lanmu){
	$wheresql = "";
	if($lanmu){
		$wheresql=" and lanmu = '{$lanmu}' ";
	}
	$sql = "select c_id,c_title from ".lc()."_news_type where c_pid = '{$pid}' ".$wheresql." ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<news_ji($rows["c_id"]);$i++){
				$gang.= "&nbsp;";
			}?><li><span data-cid="<?php echo $rows["c_id"]?>" title="<?php echo $rows["c_title"]?>"><?php echo $gang.$rows["c_title"]?></span></li><?php
			get_news_type_m($rows["c_id"],$tid,$lanmu);
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
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：	$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_news_type($pid,$tid,$lanmu){
	$sql = "select * from ".lc()."_news_type where c_pid ='{$pid}' and lanmu='{$lanmu}' ORDER BY c_sort_id DESC";
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
if($tid == $rows["c_id"]){
	echo ' selected';
}?>><?php echo $gang.$rows["c_title"]?></option>
<?php
get_news_type($rows["c_id"],$tid,$lanmu);
		}
	}
}
/************************************************
 功能：获取某父类别下子类别数量
 参数： $cpid：父类别编号
 *************************************************/
function get_news_type_child_count($cpid){
	$sql = "select c_id from ".lc()."_news_type where c_pid={$cpid} order by c_id desc";
	$rs = mysql_query($sql);
	if($rs){
		$total = mysql_num_rows($rs);
	}else{
		$total = 0;
	}
	return $total;
}
/**************************************************
 功能：通过文章编号删除其对应的图片
 参数：$id  文章编号
 '**************************************************/
function del_pic_by_newid($id){
	$sql = "select * from ".lc()."_news where lc_id={$id}";
	$rs = mysql_query($sql);
	if($rs && mysql_num_rows($rs)>0){
		$rows=mysql_fetch_assoc($rs);
		//判断图片是否存在并删除
		if(file_exists(LC_MX_M.$rows['lc_pic'])){
			unlink(LC_MX_M.$rows['lc_pic']);
		}
	}
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
?>