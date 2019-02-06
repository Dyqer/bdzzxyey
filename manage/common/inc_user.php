<?php
/***************************************************
 * 功能：通过主键获取会员等级字段对应的值
 * 参数：$col 字段名 $id 表主键
 ***************************************************/
function get_user_type($col='lc_title',$id){
	$str="";
	if($id){
		$sql="select {$col} from ".lc()."_user_type where lc_id = '{$id}'";
		$rs=mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
/*获取会员类型列表*/
function user_zt($zt_id){
	$sql="select * from ".lc()."_user_type ";
	$rs = mysql_query($sql);
	if($rs){
		while($rows=mysql_fetch_assoc($rs)){
			?><option value="<?php echo $rows['lc_id']?>"
			<?php if($zt_id == $rows['lc_id']){ echo ' selected="selected"';}?>><?php echo $rows['lc_title']?></option><?php
		}
	}
}
/**************************************************
 功能：获取会员信息(通过用户名获取相应字段值)
 参数：$col 字段名   $user 用户名
 '**************************************************/
function get_user($col,$user){
	$str="";
	if($col && $user){
		$sql ="select {$col} from ".lc()."_user where lc_title = '{$user}'";
		$rs = mysql_query($sql);
		if($rs && $rows=mysql_fetch_assoc($rs)){
			$str = $rows[$col];
		}
	}
	return $str;
}
/**************************************************
 功能：获取会员信息(通过id获取相应字段值)
 参数：$col 字段名   $id 会员编号
 '**************************************************/
function get_user_by_id($col,$id){
	$str="";
	if($col && $id){
		$sql ="select {$col} from ".lc()."_user where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs && $rows=mysql_fetch_assoc($rs)){
			$str = $rows[$col];
		}
	}
	return $str;
}
?>