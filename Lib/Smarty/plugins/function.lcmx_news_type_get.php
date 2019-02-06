<?php
function smarty_function_lcmx_news_type_get($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "类别":
				$aset['type'] = $a[1];
				break;
			case "栏目":
				$aset['lanmu'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['lanmu']=isset($aset['lanmu'])?$aset['lanmu']:"-1";
	$aset['type']=isset($aset['type'])?$aset['type']:"-1";
	unset($arr,$str,$a,$params);//销毁局部变量

	$tysql = " WHERE c_del=0 ";
	if($aset['type']>=0){
		$tysql.= " and c_id ='{$aset['type']}'";
	}
	if($aset['lanmu']>0){
		$tysql.= " and lanmu ='{$aset['lanmu']}'";
	}
	$sql = "select * from ".lc()."_news_type ".$tysql." LIMIT 1";
	
	$val = $db->getone($sql);
	
	$val['lanmuname'] = get_lanmu_name($val['lanmu']);
	$val['typename'] = get_news_type_title($val['c_id']);

	$smarty->assign($aset['listname'],$val);
}
?>