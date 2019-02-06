<?php
function smarty_function_lcmx_3g_news_show($params, &$smarty){
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
	
	$sql = "select * from ".lc()."_news WHERE lc_id='{$aset['id']}'";
	$val=$db->getone($sql);
	if (empty($val)){
		header("HTTP/1.1 404 Not Found");
		$smarty->display("404.htm");
		exit;
	}

	$val['lanmuname'] = get_lanmu_name(get_news_lanmu_by_lc_id($val['lc_id']));
	$val['typename'] = get_news_type_title_by_lc_id($val['lc_id']);
	$val['keywords'] = $val['lc_keywords'];
	$val['description'] = $val['lc_description'];
	$val['content'] = str_replace('&nbsp;','',$val['lc_phone_content']);

	//获取上一条记录编号
	$sql_previous = "select * from ".lc()."_news WHERE  lc_sort_id>{$val['lc_sort_id']} and c_id = '{$val['c_id']}' and lc_del=0 and lc_zt=1 order by lc_sort_id asc limit 0,1";
	$val_previous=$db->getone($sql_previous);
	if (empty($val_previous)){
		$val['p_id']=0;
	}else{
		$val['p_id']=$val_previous['lc_id'];
		$val['p_title']=$val_previous['lc_title'];
	}

	//获取下一条记录编号
	$sql_next = "select * from ".lc()."_news WHERE  lc_sort_id<{$val['lc_sort_id']} and c_id = '{$val['c_id']}' and lc_del=0 and lc_zt=1 order by lc_sort_id desc limit 0,1";
	$val_next=$db->getone($sql_next);
	if (empty($val_next)){
		$val['n_id']=0;
	}else{
		$val['n_id']=$val_next['lc_id'];
		$val['n_title']=$val_next['lc_title'];
	}

	$smarty->assign($aset['listname'],$val);
}
?>