<?php
/**************************************************
 功能：调用前N条记录
 参数：	$num：调用数量
 $cid：职位类别
 $fontsize：职位显示字数

 '**************************************************/
function show_job($num,$fontsize){
	$sql = "select * from ".lc()."_job where 1=1";
	$sql = $sql." order by lc_sort_id desc limit 0,{$num}";
	$rs = mysql_query($sql);
	if($rs){
		echo "<table width='100%' align=center cellpadding=0 cellspacing=0>";
		?>
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
	<td height="21" align="center" bgcolor="#eeeeee"><?php echo $rows['lc_title'] ?></td>
	<td bgcolor="#eeeeee" align="center"><?php echo $rows['lc_num'] ?></td>
	<td bgcolor="#eeeeee"><?php echo mysubstr($rows['lc_content'],0,$fontsize) ?></td>
	<td bgcolor="#eeeeee" align="center"><a href="jianli.php">应聘</a></td>
</tr>
			<?php
		}
		echo "</table>";
	}
	else
	{
		echo "暂无此类信息！";
	}
}
/************************************************
 功能：根据职位编号获取该排序编号
 参数： $lc_id：类别编号
 *************************************************/
function get_job_sort_id_by_lc_id($lc_id){
	$sql = "select lc_sort_id from ".lc()."_job where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lc_sort_id = $rows['lc_sort_id'];
	}else{
		$lc_sort_id = 0;
	}
	return $lc_sort_id;
}
?>