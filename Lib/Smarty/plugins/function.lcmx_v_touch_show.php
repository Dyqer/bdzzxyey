<?php
function smarty_function_lcmx_v_touch_show($params, &$smarty){
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
	
	$aset['id'] = $aset['id']?intval($aset['id']):0;
	$aset['listname'] = $aset['listname']?$aset['listname']:"list";
	
	unset($arr,$str,$a,$params);
	
	$sql = "select * from ".lc()."_touch WHERE id='{$aset['id']}'";

	$val=$db->getone($sql);
	if (empty($val)){
		header("HTTP/1.1 404 Not Found");
		$smarty->display("404.htm");
		exit();
	}
	
	$val['pic'] = $val['logo_url'];
	$val['con'] = str_replace("../","",$val['touch_companyinfo']);
	$val['bot'] = $val['touch_footer'];
	$val['tel'] = $val['touch_tel'];
	$val['duanxin'] = $val['touch_duanxin'];
	
	$smarty->assign($aset['listname'],$val);
}
?>