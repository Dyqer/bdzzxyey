<?php
/************************************************
 功能：根据编号获取该类别名称
 参数：$cid类别编号
 *************************************************/
function get_products_type_title($cid){
	$sql = "select c_title from ".lc()."_products_type where c_id={$cid}";
	$rs = mysql_query($sql);
	$title="";
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['c_title'];
	}
	return $title;
}

/************************************************
 功能：根据类别编号获取该类别栏目编号
 参数：$cid：类别编号
 *************************************************/
function get_products_lanmu_by_c_id($cid){
	$sql = "select lanmu from ".lc()."_products_type where c_id={$cid}";
	$rs = mysql_query($sql);
	$lanmu = 0;
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu = $rows['lanmu'];
	}
	return $lanmu;
}

/************************************************
 功能：根据产品编号获取该类别名称（先获取类别编号，然后通过类别编号获取类别名称）
 参数：$lc_id：类别编号
 *************************************************/
function get_products_type_title_by_lc_id($lc_id){
	$sql = "select c_id from ".lc()."_products where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	$title = "";
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = get_products_type_title($rows['c_id']);
	}
	return $title;
}

/************************************************
 功能：获取类别编号
 参数：$lc_id：类别编号
 *************************************************/
function get_products_c_id_by_lc_id($lc_id){
	$sql = "select c_id from ".lc()."_products where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	$c_id = 0;
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$c_id = $rows['c_id'];
	}
	return $c_id;
}

/************************************************
 功能：根据产品编号获取该栏目编号（先获取类别编号，然后通过类别编号获取栏目编号）
 参数：$lc_id：类别编号
 *************************************************/
function get_products_lanmu_by_lc_id($lc_id){
	$sql = "select c_id from ".lc()."_products where lc_id='{$lc_id}'";
	$rs = mysql_query($sql);
	$lanmu = 0;
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu = get_products_lanmu_by_c_id($rows['c_id']);
	}
	return $lanmu;
}

/************************************************
 功能：获取某父类别下子类别数量
 参数：$cpid：父类别编号
 *************************************************/
function get_products_type_child_count($cpid){
	$sql = "select c_id from ".lc()."_products_type where c_pid={$cpid} order by c_id desc";
	$rs = mysql_query($sql);
	$total = 0;
	if($rs){
		$total = mysql_num_rows($rs);
	}
	return $total;
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


/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_products_type($pid,$tid,$lanmu){
	$sql = "select * from ".lc()."_products_type where c_pid = {$pid} and lanmu={$lanmu} ORDER BY c_sort_id DESC";
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
			}
			?>><?php echo $gang.$rows["c_title"] ?></option><?php
			get_products_type($rows["c_id"],$tid,$lanmu);
		}
	}
}
/**************************************************
 功能：类别的调用，调用数据库里所有的类别，用在添加类别的时候
 参数：$pid：父类别 $tid：选中的类别
 '**************************************************/
function get_products_alltype($pid,$tid){
	$sql = "select * from ".lc()."_products_type where c_pid ='{$pid}' and c_del=0 ORDER BY c_sort_id DESC";
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
			}
			?>><?php echo $gang.$rows["c_title"] ?></option><?php
			get_products_alltype($rows["c_id"],$tid);
		}
	}
}


/************************************************
 功能：根据产品编号获取该排序编号
 参数： $lc_id：类别编号
 *************************************************/
function get_products_sort_id_by_lc_id($lc_id){
	$sql = "select lc_sort_id from ".lc()."_products where lc_id={$lc_id}";
	$rs = mysql_query($sql);
	$lc_sort_id = 0;
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lc_sort_id = $rows['lc_sort_id'];
	}
	return $lc_sort_id;
}
/**************************************************
 功能：获取同类别下的图文并展示效果
 参数：$cid：类别 $num：调用数量 $width：宽度 $height：高度 $fontheight：字体高度
 '**************************************************/
function get_products_pic_hd($num,$cid,$width,$height,$fontheight){
	$sql = "select * from ".lc()."_products where lc_del=0 and lc_pic<>''";
	if($cid<>0){
		$sql = $sql." and c_id in (".get_products_all_child_id($cid)."{$cid})";
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
				$links = $links."products_show.php?id=".$rows['lc_id'];
				$texts = $texts.$rows['lc_title'];
			}else{
				$pics = $pics."|".str_replace("../","",$rows['lc_pic']);
				$links = $links."|"."products_show.php?id=".$rows['lc_id'];
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
		$str = $str."document.write('<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\" align=\"left\"  hspace=\"0\">');document.write('<param name=\"allowScriptAccess\" value=\"sameDomain\"><param name=\"movie\" value=\"".$_CONFIG['site_dir']."resource/media/pixviewer.swf\"><param name=\"quality\" value=\"high\"><param name=\"bgcolor\" value=\"#F0F0F0\">');document.write('<param name=\"menu\" value=\"false\"><param name=wmode value=\"opaque\">');document.write('<param name=\"FlashVars\" value=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\">');document.write('<embed src=\"".$_CONFIG['site_dir']."resource/media/pixviewer.swf\" wmode=\"opaque\" FlashVars=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\" menu=\"false\" bgcolor=\"#F0F0F0\" quality=\"high\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />');document.write('</object>');";
		$str = $str."</script>";
	}
	return $str;
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
?>