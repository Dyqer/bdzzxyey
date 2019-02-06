<?php
function smarty_function_lcmx_3g_job_show($params, &$smarty){
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
	
	$sql = "select * from ".lc()."_job WHERE lc_id='{$aset['id']}'";
	
	$val=$db->getone($sql);
	if (empty($val)){
		header("HTTP/1.1 404 Not Found");
		$smarty->display("404.htm");
		exit();
	}
	$val['keywords'] = $val['lc_title'];
	$val['description'] = mysubstr(strip_tags($val['lc_content']),0,60);
	
	$smarty->assign($aset['listname'],$val);
}
?>