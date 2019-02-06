<?php
function smarty_function_lcmx_down_show($params, &$smarty)
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
			case "编号":
				$aset['id'] = $a[1];
				break;
			case "点击量":
				$aset['dianjiliang'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['id']=$aset['id']?intval($aset['id']):0;
	$aset['listname']=$aset['listname']?$aset['listname']:"list";
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$sql = "select * from ".lc()."_down WHERE  lc_id='{$aset['id']}' LIMIT 1";
	$val=$db->getone($sql);
	if (empty($val)){
		return ;
	}
	
	$val['lanmu']=get_down_lanmu_by_lc_id($val['lc_id']);//获取所属栏目编号
	$val['lanmuname']=get_lanmu_name($val['lanmu']);//获取所属栏目名称
	$val['typename']=get_down_type_title_by_lc_id($val['lc_id']);//获取所属分类名称
	$val['keywords']=$val['lc_keywords'];//关键词
	$val['description']=$val['lc_description'];//描述
	$val['lc_content']=str_replace("../","",$val['lc_content']);//获取内容（如果有远程图片，需过滤“../”）
	$val['lc_url']=str_replace("../","",$val['lc_url']);
	/*判断是否记录点击量*/
	if($aset['dianjiliang']==1){
		$val['dianjiliang'] = dianjiliang($val['lc_id'],"down","show");//获取点击量
	}
	/*判断是否记录点击量End*/

	//获取上一条记录编号
	$sql_previous = "select * from ".lc()."_down WHERE  lc_sort_id>'{$val['lc_sort_id']}' and c_id ='{$val['c_id']}' order by lc_sort_id asc limit 0,1";
	$val_previous=$db->getone($sql_previous);
	if (empty($val_previous)){
		$val['p_id']=0;
	}else{
		$val['p_id']=$val_previous['lc_id'];//获取上一条的编号
		$val['p_title']=$val_previous['lc_title'];//获取上一条的标题
	}

	//获取下一条记录编号
	$sql_next = "select * from ".lc()."_down WHERE  lc_sort_id<'{$val['lc_sort_id']}' and c_id ='{$val['c_id']}' order by lc_sort_id desc limit 0,1";
	$val_next=$db->getone($sql_next);
	if (empty($val_next)){
		$val['n_id']=0;
	}else{
		$val['n_id']=$val_next['lc_id'];//获取下一条的编号
		$val['n_title']=$val_next['lc_title'];//获取下一条的标题
	}
	
	$smarty->assign($aset['listname'],$val);
}
?>