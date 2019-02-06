<?php
function smarty_function_lcmx_downs_type_get($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str)
	{
		$a=explode(':',$str);
		switch ($a[0])
		{
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "类别":
				$aset['c_id'] = $a[1];
				break;
			case "栏目":
				$aset['lanmu'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['lanmu']=isset($aset['lanmu'])?intval($aset['lanmu']):0;
	unset($arr,$str,$a,$params);//销毁局部变量

	$tysql = " where 1=1 ";
	if($aset['c_id']<>0){
		$tysql.= " and c_id = '{$aset['c_id']}'";
	}
	if($aset['lanmu']<>0){
		$tysql.= " and lanmu ='{$aset['lanmu']}'";
	}
	$sql = "select * from ".lc()."_down_type ".$tysql." LIMIT 1";

	$val=$db->getone($sql);
	if (empty($val)){
		return ;
	}

	$val['lanmuname']=get_lanmu_name($val['lanmu']);
	$val['typename']=get_down_type_title($val['c_id']);

	$smarty->assign($aset['listname'],$val);
}
?>