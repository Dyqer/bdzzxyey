<?php
function smarty_function_lcmx_3g_danye_show($params, &$smarty){
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
			case "栏目":
				$aset['lanmu'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	
	$aset['id'] = $aset['id']?intval($aset['id']):0;
	$aset['lanmu'] = $aset['lanmu']?intval($aset['lanmu']):0;
	$aset['listname'] = $aset['listname']?$aset['listname']:"list";
	
	unset($arr,$str,$a,$params);
	
	$sql = "select * from ".lc()."_danye WHERE lc_del=0 and lc_zt=1 ";
	if($aset['lanmu']<>0){
		$sql.= " and lanmu='{$aset['lanmu']}'";
	}
	if($aset['id']==0){
		$sql.= " order by lc_sort_id desc LIMIT 1";
	}else{
		$sql.= " and lc_id='{$aset['id']}'";
	}
	$val = $db->getone($sql);
	if (empty($val)){
		header("HTTP/1.1 404 Not Found");
		$smarty->display("404.htm");
		exit();
	}

	$val['keywords'] = $val['lc_title'];
	$val['lanmuname'] = get_lanmu_name(get_danye_lanmu_by_lc_id($val['lc_id']));
	$val['description'] = mb_strcut(strip_tags(str_replace("../","",$val['lc_phone_content'])),0,120,'utf-8');
	$val['jianjie'] = mb_strcut(strip_tags($val['lc_phone_content']),0,60);
	$val['con'] = $val['lc_phone_content'];
	$val['pic'] = $val['lc_pic'];	
	$smarty->assign($aset['listname'],$val);
}
?>