<?php
function smarty_function_lcmx_nav_list($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0])
		{
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "类别":
				$aset['pid'] = $a[1];
				break;
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['pid']=isset($aset['pid'])?$aset['pid']:0;//类型默认获取主导航
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;//默认长度
	
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$wheresql = " WHERE lc_zt=1 and lc_parent_id ='{$aset['pid']}'";
	$orderbysql = " order by lc_sort_id asc";
	
	$sql = "select * from ".lc()."_navigation ";
	$sql.= $wheresql.$orderbysql;
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result))
	{
		$row['title'] = mb_substr($row['lc_title'],0,$aset['titlelen'],"utf-8");//导航标题
		$row['link'] = $row['lc_link_url'];
		$row['rwlink'] = $row['lc_rwlink_url'];
		$row['target'] = $row['lc_target'];
		$row['pid'] = $row['lc_parent_id'];
		$row['pic'] = $row['lc_pic'];
		$row['pic1'] = str_replace("../","",$row['lc_pic']);
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>