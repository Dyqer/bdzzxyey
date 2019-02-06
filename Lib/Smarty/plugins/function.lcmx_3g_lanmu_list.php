<?php
function smarty_function_lcmx_3g_lanmu_list($params, &$smarty){
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
	
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	
	unset($arr,$str,$a,$params);
	
	
	$wheresql=" WHERE 1=1 and c_phone=1";
	$orderbysql = " order by c_sort_id asc";
	$sql = "SELECT * FROM ".lc()."_lanmu ".$wheresql.$orderbysql;
	
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		if($row['c_phone_name']<>""){
			$row['title'] = $row['c_phone_name'];
		}else{
			$row['title'] = $row['c_title'];
		}
		$row['c_link'] = $row['c_link'];
		
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>