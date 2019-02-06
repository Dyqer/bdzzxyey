<?php
function smarty_function_lcmx_down_type($params, &$smarty)
{
	global $db,$_CONFIG;
	$arr=explode(',',$params['set']);
	foreach($arr as $str)
	{
		$a=explode(':',$str);
		switch ($a[0])
		{
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "所属栏目":
				$aset['lanmu'] = $a[1];
				break;
			case "所属类别":
				$aset['type'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['lanmu']=isset($aset['lanmu'])?intval($aset['lanmu']):0;
	$aset['type']=isset($aset['type'])?$aset['type']:"-1";
	unset($arr,$str,$a,$params);//销毁局部变量

	$tysql = '';
	if($aset['lanmu']<>0){
		$tysql = " where lanmu = ".$aset['lanmu'];
	}
	if($aset['type']>=0){
		$tysql.= " and c_pid ='{$aset['type']}' ";
	}
	$sql = "SELECT * FROM ".lc()."_down_type ".$tysql." order by c_sort_id desc";
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result))
	{
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>