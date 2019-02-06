<?php
function smarty_function_lcmx_products_show($params, &$smarty){
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
			case "点击量":
				$aset['dianjiliang'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['id']=$aset['id']?intval($aset['id']):0;
	$aset['listname']=$aset['listname']?$aset['listname']:"list";
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$sql = "select * from ".lc()."_products WHERE lc_id='{$aset['id']}'";
	
	$val=$db->getone($sql);
	if(empty($val)){
		return ;
	}
	$val['lanmu']=get_products_lanmu_by_lc_id($val['lc_id']);//获取所属栏目编号
	$val['lanmuname']=get_lanmu_name($val['lanmu']);//获取所属栏目的名称
	$val['typename']=get_products_type_title_by_lc_id($val['lc_id']);//获取所属分类名称
	
	$val['pic']=str_replace("../","",get_products_pic_by_proid($val['lc_id']));//获取图文的原图片地址
	$val['big_pic']=str_replace("../","",get_thumb_pic("../",get_products_pic_by_proid($val['lc_id']),big));//获取pc图文的大图片地址
	$val['small_pic']=str_replace("../","",get_thumb_pic("../",get_products_pic_by_proid($val['lc_id']),small));//获取pc图文的小图片地址
	
	$val['keywords']=$val['lc_keywords'];//关键词
	$val['description']=$val['lc_description'];//描述
	$val['lc_content']=str_replace("../","",$val['lc_content']);//获取内容（如果有远程图片，需过滤“../”）
	
	/*判断是否记录点击量*/
	if($aset['dianjiliang']==1){
		$val['dianjiliang']=dianjiliang($val['lc_id'],"products","show");//获取点击量
	}
	/*判断是否记录点击量End*/

	//获取上一条记录编号
	$sql_previous = "select * from ".lc()."_products where  lc_sort_id>".intval($val['lc_sort_id'])." and c_id = ".$val['c_id']." and lc_del=0 and lc_zt=1 order by lc_sort_id asc LIMIT 1";
	$val_previous=$db->getone($sql_previous);
	if (empty($val_previous)){
		$val['p_id']=0;
	}else{
		$val['p_id']=$val_previous['lc_id'];//获取上一条的编号
		$val['p_title']=$val_previous['lc_title'];//获取上一条的标题
	}
	//获取下一条记录编号
	$sql_next = "select * from ".lc()."_products where lc_sort_id<".intval($val['lc_sort_id'])." and c_id = ".$val['c_id']." and lc_del=0 and lc_zt=1 order by lc_sort_id desc LIMIT 1";
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