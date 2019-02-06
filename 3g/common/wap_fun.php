<?php
//Touch通过分类id获取分类的标题
function wap_get_news_type_name($id){
	$srt="";
	$sql = "select c_title from ".lc()."_news_type where c_id='{$id}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$srt=$rows['c_title'];
	}
	return $srt;
}
/*********	以下为wap相关函数  *******/
function wap_get_lanmu_list($c_type,$url){
	$str="";
	$sql = "select c_id,c_phone_name from ".lc()."_lanmu where c_type='{$c_type}' and c_phone=1 and c_zt!=0";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str.="<li><div><input type=\"text\" value=\"{$rows["c_phone_name"]}\" id=\"touch_lanmu_{$rows["c_id"]}\" onChange=\"edit_lanmuname({$rows["c_id"]},1)\" />
				<a href=\"{$url}?lanmu={$rows["c_id"]}&type=touch\">管理</a></div></li>";
		}
	}
	return $str;
}
function wap_get_pc_lanmu_list($c_type,$url){
	$str="";
	$sql = "select c_id,c_title from ".lc()."_lanmu where c_type='{$c_type}' and c_pc =1 and c_zt!=0";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str.="<li><div><input type=\"text\" value=\"{$rows["c_title"]}\" id=\"pc_lanmu_{$rows["c_id"]}\" onChange=\"edit_lanmuname({$rows["c_id"]},2)\" />
				<a href=\"{$url}?lanmu={$rows["c_id"]}&type=pc\">管理</a></div></li>";
		}
	}
	return $str;
}
function wap_get_lanmu_list_div($c_type,$url){
	$sql = "select c_id,c_title from ".lc()."_lanmu where  c_type='{$c_type}'";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){?>
			<li><a href="<?php echo $url ?>?lanmu=<?php echo $rows["c_id"]?>"><?php echo $rows["c_title"]; ?></a></li><?php
		}
	}
}

function wap_get_news_type($pid,$tid,$lanmu){
	$sql = "select * from ".lc()."_news_type where c_pid = {$pid} and lanmu={$lanmu} ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			for($i=0;$i<news_ji($rows["c_id"]);$i++){
				$gang.= "&nbsp;&nbsp;";
			}
			$gang.= "&nbsp;&nbsp;"?>
			<option value="<?php echo $rows["c_id"]?>"<?php if($tid == $rows["c_id"]){echo 'selected';}?>><?php echo $gang.$rows["c_title"]?></option><?php
			wap_get_news_type($rows["c_id"],$tid,$lanmu);
		}
	}
}
/************************************************
 功能：前台导航调用(手机版)
 *************************************************/
function nav(){
	$sql = "select * from ".lc()."_lanmu where c_zt=1 and c_phone =1 order by c_sort_id desc";
	$rs = mysql_query($sql);
	$str = "<li><a href=\"index.php\">首页</a></li>";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str .= "<li><a href=\"".$rows["c_link"]."\">".$rows["c_phone_name"]."</a></li>";
		}
	}
	return $str;
}
/**************************************************
 功能：手机站标题
 '**************************************************/
function touch_name(){
	$srt="";
	$sql = "select touch_name from ".lc()."_touch where id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$srt=$rows['touch_name'];
	}
	return $srt;
}
?>