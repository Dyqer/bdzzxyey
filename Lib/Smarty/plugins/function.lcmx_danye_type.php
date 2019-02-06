<?php
function smarty_function_lcmx_danye_type($params, &$smarty)
{
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
			case "所属栏目":
				$aset['lanmu'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['lanmu']=isset($aset['lanmu'])?(int)$aset['lanmu']:0;
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$tysql = "";
	if($aset['lanmu']<>0){
		$tysql = " where lanmu =".$aset['lanmu']." and lc_zt=1 and lc_del=0";
	}
	$sql="SELECT * FROM ".lc().'_danye'.$tysql." order by lc_sort_id desc";
	$result = $db->query($sql);
	$list= array();

	while($row = $db->fetch_array($result)){
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>