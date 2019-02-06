<?php
/************************************************
 功能：获取《栏目》信息(通过id获取相应字段值)
 参数：$col -> 字段名   $id -> 栏目编号
 *************************************************/
function get_lanmu_by_id($id,$col='c_title'){
	$str = "";
	if($col && $id){
		$sql = "select {$col} from ".lc()."_lanmu where c_id = '{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
/************************************************
 功能：根据栏目id获取栏目所属类型
 参数：$type{栏目所属类型:0单页1文章2图文3下载4招聘5留言}
 ************************************************/
function get_type_by_lanmu($lanmu){
	$type="";
	$sql = "select c_type from ".lc()."_lanmu where c_id='{$lanmu}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$type = $rows['c_type'];
	}
	return $type;
}
/************************************************
 功能：根据栏目类别获取该栏目下属子栏目列表
 参数：1、$c_type：栏目类别号2、$url：栏目链接
 描述：左侧调用
 *************************************************/
function get_lanmu_list($c_type,$urltype){
	$sql = "select c_id,c_title from ".lc()."_lanmu where c_pc =1 and c_zt!=0 and c_type='{$c_type}'";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			switch($urltype){
				case "danye":
					?><li onclick="singlepagecolumn(<?php echo $rows["c_id"]?>)"><a><?php echo $rows["c_title"]?><span class="mxicon">&#xe385;</span></a></li><?php
					break;
				case "news":
					?><li onclick="articlecolumn(<?php echo $rows["c_id"]?>)"><a><?php echo $rows["c_title"]?><span class="mxicon">&#xe385;</span></a></li><?php
					break;
				case "products":
					?><li onclick="productcolumn(<?php echo $rows["c_id"]?>)"><a><?php echo $rows["c_title"]?><span class="mxicon">&#xe385;</span></a></li><?php
					break;
				case "down":
					?><li onclick="downcolumn(<?php echo $rows["c_id"]?>)"><a><?php echo $rows["c_title"]?><span class="mxicon">&#xe385;</span></a></li><?php
					break;
				case "gbook":
					?><li onclick="gbookcolumn(<?php echo $rows["c_id"]?>)"><a><?php echo $rows["c_title"]?><span class="mxicon">&#xe385;</span></a></li><?php
					break;
			}
		}
	}
}
/************************************************
 功能：根据类别编号获取类别名称
 参数：$type -> 栏目所属类型(0:单页系统1:文章系统2:图文系统3:下载系统4:招聘系统5:留言系统)
 *************************************************/
function get_lanmu_type($type){
	$title = '';
	switch ($type) {
		case 0:
			$title = "单页系统";
			break;
		case 1:
			$title = "文章系统";
			break;
		case 2:
			$title = "图文系统";
			break;
		case 3:
			$title = "下载系统";
			break;
		case 4:
			$title = "招聘系统";
			break;
		case 5:
			$title = "留言系统";
			break;
	}
	return $title;
}
/************************************************
 功能：根据栏目编号获取该栏目标题
 参数：$lanmu -> 栏目编号
 *************************************************/
function get_lanmu_title($lanmu){
	$sql = "select c_title from ".lc()."_lanmu where c_id='{$lanmu}'";
	$rs = mysql_query($sql);
	$title = "";
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['c_title'];
	}
	return $title;
}
/************************************************
 功能：根据栏目类型获取一个栏目值
 参数：$type{栏目类别:0单页1文章2图文3下载4招聘5留言}
 ************************************************/
function get_lanmu_by_type($type){
	$lanmu=0;
	$sql = "select c_id from ".lc()."_lanmu where c_type='{$type}' limit 1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$lanmu=$rows['c_id'];
	}
	return $lanmu;
}
/************************************************
 功能：根据栏目类型和栏目id删除栏目下所有资源
 参数：$type{栏目类别:0单页1文章2图文3下载4招聘5留言}
 ************************************************/
function del_lanmu_by_cid($id,$type){
	switch ($type){
		case 0:
			//"单页系统";
			$sql = "delete from ".lc()."_danye where lanmu = '{$id}'";
			mysql_query($sql);
			break;
		case 1:
			//"文章系统";
			$sql = "select * from ".lc()."_news where c_id in (select c_id from ".lc()."_news_type where lanmu='{$id}')";
			$rs = mysql_query($sql);
			if($rs && mysql_num_rows($rs)>0){
				while($rows=mysql_fetch_assoc($rs)){
					//判断图片是否存在并删除
					if(file_exists(LC_MX_M.$rows['lc_pic'])){
						unlink(LC_MX_M.$rows['lc_pic']);
					}
				}
			}
			$sql2 = "delete from ".lc()."_news where c_id in (select c_id from ".lc()."_news_type where lanmu='{$id}')";
			$sql1 = "delete from ".lc()."_news_type where lanmu = '{$id}'";
			mysql_query($sql2);
			mysql_query($sql1);
			break;
		case 2:
			//"图文系统";
			$sql = "select * from ".lc()."_products where c_id in (select c_id from ".lc()."_products_type where lanmu='{$id}')";
			$rs = mysql_query($sql);
			if($rs && mysql_num_rows($rs)>0){
				while($rows=mysql_fetch_assoc($rs)){
					del_pic_by_productid($rows['lc_id']);//删除图片文件
				}
			}
			$sql2 = "delete from ".lc()."_products where c_id in (select c_id from ".lc()."_products_type where lanmu='{$id}')";
			$sql1 = "delete from ".lc()."_products_type where lanmu = '{$id}'";
			mysql_query($sql2);
			mysql_query($sql1);
			break;
		case 3:
			//"下载系统";
			$sql = "select * from ".lc()."_down where c_id in (select c_id from ".lc()."_down_type where lanmu='{$id}')";
			$rs = mysql_query($sql);
			if($rs && mysql_num_rows($rs)>0){
				while($rows=mysql_fetch_assoc($rs)){
					//判断图片是否存在并删除
					if(file_exists(LC_MX_M.$rows['lc_pic'])){
						unlink(LC_MX_M.$rows['lc_pic']);
					}
				}
			}
			$sql2 = "delete from ".lc()."_down where c_id in (select c_id from ".lc()."_down_type where lanmu='{$id}')";
			$sql1 = "delete from ".lc()."_down_type where lanmu = '{$id}'";
			mysql_query($sql2);
			mysql_query($sql1);
			break;
		case 4:
			//"招聘系统";
			break;
		case 5:
			//"留言系统";
			break;
	}
}
/************************************************
 功能：根据栏目类型和栏目id将该栏目下的所有资源移入回收站
 参数：$type{栏目类别:0单页1文章2图文3下载4招聘5留言}
 ************************************************/
function recycle_lanmu_by_cid($id,$type){
	switch ($type){
		case 0:
			//"单页系统";
			$danye_sql = "update ".lc()."_danye set lc_del=1,lc_del_time=now() where lanmu='{$id}'";
			mysql_query($danye_sql);
			break;
		case 1:
			//"文章系统";
			$sql2 = "update ".lc()."_news set lc_del=1,lc_del_time=now() where c_id in (select c_id from ".lc()."_news_type where lanmu='{$id}')";
			$sql1 = "update ".lc()."_news_type set c_del=1,c_del_time=now() where lanmu = '{$id}'";
			mysql_query($sql2);
			mysql_query($sql1);
			break;
		case 2:
			//"图文系统";
			$sql2 = "update ".lc()."_products set lc_del=1,lc_del_time=now() where c_id in (select c_id from ".lc()."_products_type where lanmu='{$id}')";
			$sql1 = "update ".lc()."_products_type set c_del=1,c_del_time=now() where lanmu = '{$id}'";
			mysql_query($sql2);
			mysql_query($sql1);
			break;
		case 3:
			//"下载系统";
			break;
		case 4:
			//"招聘系统";
			break;
		case 5:
			//"留言系统";
			break;
	}
}
?>