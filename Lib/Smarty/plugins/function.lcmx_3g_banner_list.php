<?php
function smarty_function_lcmx_3g_banner_list($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
			case "列表名":
				$aset['listname'] = $a[1];
				break;
	 }
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	
	$aset['listname'] = isset($aset['listname'])?$aset['listname']:"list";
	
	unset($arr,$str,$a,$params);

	$orderbysql = " order by lc_sort_id asc";
	$sql = "SELECT * FROM ".lc()."_touch_banner ".$orderbysql;

	$result = $db->query($sql);
	$list = array();
	while($row = $db->fetch_array($result)){

		$row['title'] = $row['lc_title'];//Banner标题
		$row['pic'] = $row['lc_pic'];
		
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>