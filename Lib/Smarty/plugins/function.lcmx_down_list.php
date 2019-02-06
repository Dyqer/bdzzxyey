<?php
function smarty_function_lcmx_down_list($params, &$smarty)
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
			case "显示数目":
				$aset['row'] = $a[1];
				break;
			case "类别":
				$aset['type_id'] = $a[1];
				break;
			case "栏目":
				$aset['lanmu'] = $a[1];
				break;
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['row']=isset($aset['row'])?intval($aset['row']):10;
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['lanmu']=isset($aset['lanmu'])?intval($aset['lanmu']):0;
	$aset['type_id']=isset($aset['type_id'])?intval($aset['type_id']):0;
	unset($arr,$str,$a,$params);//销毁局部变量

	$wheresql=" where 1=1 ";
	
	if($aset['lanmu']<>0){
		$wheresql.=" and c_id in (select c_id from ".lc()."_down_type where lanmu='{$aset['lanmu']}')";
	}
	if($aset['type_id']){
		$wheresql.=" and c_id in (".get_table_all_child_id($aset['type_id'],"down_type").$aset['type_id'].") ";
	}
	
	$orderbysql = " order by lc_sort_id desc";
	/*分页设置*/
	if (isset($aset['paged'])){
		include_once(LC_MX.'Lib/page.class.php');
		$total_sql="SELECT lc_id FROM ".lc()."_down ".$wheresql;
		$db->query($total_sql);
		$total_count=$db->num_rows();
		$pagelist = new page(array('total'=>$total_count, 'perpage'=>$aset['row']));
		$currenpage=$pagelist->nowindex;
		$aset['start']=($currenpage-1)*$aset['row'];
		if ($total_count>$aset['row']){
			$smarty->assign('page',$pagelist->show(3));
		}else{
			$smarty->assign('page','');
		}
	}
	/*分页设置End*/
	$limit=" limit ".abs($aset['start']).','.$aset['row'];
	$sql="SELECT * FROM ".lc()."_down ".$wheresql.$orderbysql.$limit;
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result))
	{
		$row['id'] = $row['lc_id'];//获取编号
		if($aset['lanmu']){
			$row['lanmu'] = $aset['lanmu'];//获取栏目id
		}else{
			$row['lanmu'] = get_down_lanmu_by_lc_id($row['lc_id']);//通过下载id获取栏目id
		}
		
		$row['keywords']=$row['lc_keywords'];//关键词
		$row['description']=$row['lc_description'];//描述
		$row['title']=mb_substr($row['lc_title'],0,$aset['titlelen'],"utf-8");//根据‘标题长度’获取标题
		$row['content']=str_replace('&nbsp;','',$row['lc_content']);//获取内容
		$row['jianjie']=$row['lc_jianjie'];//获取简介
		$row['url']=$row['lc_url'];//获取简介
		$row['briefly_']=strip_tags($row['lc_content']);//过滤html标签后的内容
		$row['dianjiliang']=$row['lc_hits'];//获取点击量

		$list[] = $row;
	}

	$smarty->assign($aset['listname'],$list);
}
?>