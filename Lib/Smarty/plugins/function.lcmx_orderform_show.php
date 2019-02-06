<?php
function smarty_function_lcmx_orderform_show($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
			case "编号":
				$aset['id'] = $a[1];
				break;
			case "列表名":
				$aset['listname'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	
	$aset['listname']=$aset['listname']?$aset['listname']:"list";
	$aset['id']=$aset['id']?intval($aset['id']):0;
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$sql = "select * from ".lc()."_dingdan where lc_id='{$aset['id']}'";
	$val=$db->getone($sql);
	if(!empty($val)){
		$val['express_way']=$val['lc_express_way'];//配送方式
	}else{
		$val="";
	}
	$smarty->assign($aset['listname'],$val);
}
?>