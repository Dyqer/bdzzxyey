<?php
/************************************************
 功能：获取《图文》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> 图文编号
 *************************************************/
function get_products_by_id($id,$col='lc_title'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_products where lc_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
/************************************************
 功能：获取《图文分类》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> 分类编号
 *************************************************/
function get_producttype_by_id($id,$col='c_title'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_products_type where c_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
/*************************************************
 功能：判断产品类别是几级类别，用以在无限分类里子级类别空两格显示
 *************************************************/
function products_ji($c_id){
	$sql = "select c_pid from ".lc()."_products_type where c_id={$c_id}";
	$rs = mysql_query($sql);
	$i = 1;
	if($rs){
		$row=mysql_fetch_assoc($rs);
		if($row["c_pid"]<>0){
			$i = $i + products_ji($row["c_pid"]);
		}
	}
	return $i;
}
/**************************************************
 功能：获取同一个产品的第一张图片
 参数：$id 产品编号
 **************************************************/
function get_products_pic_by_proid($id){
	$pic_url="";
	$sql_list="select * from ".lc()."_products_pics where product_id='{$id}' and lc_fengmian=1";
	$rs_list = mysql_query($sql_list);
	if($rs_list && mysql_num_rows($rs_list)>0){
		while($rows_list=mysql_fetch_assoc($rs_list)){
			$pic_url=$rows_list['lc_pic'];
		}
	}else{
		$sql_list1="select * from ".lc()."_products_pics where product_id='{$id}' limit 1";
		$rs_list1 = mysql_query($sql_list1);
		if($rs_list1 && mysql_num_rows($rs_list1)>0){
			while($rows_list1=mysql_fetch_assoc($rs_list1)){
				$pic_url=$rows_list1['lc_pic'];
			}
		}
	}
	return $pic_url;
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_products_type($pid,$tid,$lanmu){
	$sql = "select * from ".lc()."_products_type where c_pid = '{$pid}' and lanmu = '{$lanmu}' ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<products_ji($rows["c_id"]);$i++){
				$gang = $gang."&nbsp;&nbsp;";
			}
			$gang = $gang."├";
			?><option value="<?php echo $rows["c_id"]?>"<?php
			if($tid == $rows["c_id"]){
				echo ' selected';
			}?>><?php echo $gang.$rows["c_title"] ?></option><?php
			get_products_type($rows["c_id"],$tid,$lanmu);
		}
	}
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_products_alltype($pid,$tid){
	$sql = "select * from ".lc()."_products_type where c_pid = '{$pid}' and c_del=0 ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<products_ji($rows["c_id"]);$i++){
				$gang.="&nbsp;&nbsp;";
			}
			$gang.="├";
			?><option value="<?php echo $rows["c_id"]?>"<?php
			if($tid == $rows["c_id"]){
				echo ' selected';
			}?>><?php echo $gang.$rows["c_title"] ?></option><?php
			get_products_alltype($rows["c_id"],$tid);
		}
	}
}
/*************************************************
 功能：获取某大类别的所有子类别
 参数：$c_id：当前类别的编号
 *************************************************/
function get_products_all_child_id($c_id){
	$sql = "select c_id from ".lc()."_products_type where c_pid={$c_id}";
	$rs = mysql_query($sql);
	$str = "";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str.=$rows["c_id"].",";
			$str.=get_products_all_child_id($rows["c_id"]);
		}
	}
	return $str;
}
/************************************************
 功能：获取某父类别下子类别数量
 参数：$cpid：父类别编号
 *************************************************/
function get_products_type_child_count($cpid){
	$sql = "select c_id from ".lc()."_products_type where c_pid = '{$cpid}' order by c_id desc";
	$rs = mysql_query($sql);
	$total = 0;
	if($rs){
		$total = mysql_num_rows($rs);
	}
	return $total;
}

/**************************************************
 * 功能：类别的调用
 * 描述: 调用数据库里所有的类别，用在添加类别的时候
 * 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_products_type_m($pid,$tid,$lanmu){
	$wheresql="";
	if($lanmu){
		$wheresql.=" and lanmu='{$lanmu}' ";
	}
	$sql = "select c_id,c_title from ".lc()."_products_type where c_pid = '{$pid}' ".$wheresql." ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<products_ji($rows["c_id"]);$i++){
				$gang.= "&nbsp;";
			}?><li><span data-cid="<?php echo $rows["c_id"]?>" title="<?php echo $rows["c_title"]?>"><?php echo $gang.$rows["c_title"]?></span></li><?php
			get_products_type_m($rows["c_id"],$tid,$lanmu);
		}
	}
}
/**************************************************
 功能：删除同一产品id的所有图片文件
 参数：$id
 '**************************************************/
function del_pic_by_productid($id){
	if($id){
		$sql="select * from ".lc()."_products_pics where product_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs && mysql_num_rows($rs)>0){
			$rows=mysql_fetch_assoc($rs);
			//判断图片是否存在并删除
			if(file_exists(LC_MX_M.$rows['lc_pic'])){
				unlink(LC_MX_M.$rows['lc_pic']);
			}
		}
	}
}
?>