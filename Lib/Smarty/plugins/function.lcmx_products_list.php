<?php
function smarty_function_lcmx_products_list($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
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
			case "日期范围":
				$aset['settr'] = $a[1];
				break;
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
			case "推荐":
				$aset['tuijian'] = $a[1];
				break;
			case "简介长度":
				$aset['infolen'] = $a[1];
				break;
			case "结尾字符":
				$aset['dot'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['row']=isset($aset['row'])?intval($aset['row']):10;
	$aset['start']=isset($aset['start'])?intval($aset['start']):0;
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['lanmu']=isset($aset['lanmu'])?intval($aset['lanmu']):0;
	unset($arr,$str,$a,$params);//销毁局部变量

	$wheresql=" WHERE lc_del=0 and lc_zt=1 ";
	
	if($aset['type_id']){
		$wheresql.=" and c_id in (".get_table_all_child_id(intval($aset['type_id']),"products_type").intval($aset['type_id']).") ";
	}
	if($aset['lanmu']){
		$wheresql.=" and c_id in (select c_id from ".lc()."_products_type where lanmu=".$aset['lanmu'].")";
	}
	if($aset['tuijian']==1){
		$wheresql.=" and lc_tj=1 ";
	}
	if (isset($aset['settr'])){
		$settr_val=strtotime("-".intval($aset['settr'])." day");
		$wheresql.=" AND lc_datetime > ".$settr_val;
	}
	$orderbysql = " order by lc_sort_id desc";
	/*分页设置*/
	if (isset($aset['paged'])){
		include_once(LC_MX.'Lib/page.class.php');
		$total_sql="SELECT lc_id FROM ".lc()."_products ".$wheresql;
		$db->query($total_sql);
		$total_count=$db->num_rows();
		$pagelist = new page(array('total'=>$total_count, 'perpage'=>$aset['row']));
		$currenpage=$pagelist->nowindex;
		$aset['start']=($currenpage-1)*$aset['row'];
		if ($total_count>$aset['row']){
			$smarty->assign('page',$pagelist->show(6));
		}else{
			$smarty->assign('page','');
		}
	}
	/*分页设置End*/
	
	$limit=" LIMIT ".abs($aset['start']).','.$aset['row'];
	$sql="SELECT * FROM ".lc()."_products ".$wheresql.$orderbysql.$limit;
	
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		$row['id']=$row['lc_id'];//获取编号
		$row['keywords']=$row['lc_keywords'];//关键词
		$row['description']=$row['lc_description'];//描述
		$row['title']=mb_substr($row['lc_title'],0,$aset['titlelen'],'utf-8');//根据标题长度获取标题
		if($aset['lanmu']){
			$row['lanmu']=$aset['lanmu'];
		}else{
			$row['lanmu']=get_products_lanmu_by_lc_id($row['lc_id']);//通过图文id获取栏目id
		}
		$row['pic']=str_replace("../","",get_products_pic_by_proid($row['lc_id']));//获取图文的原图片地址
		$row['big_pic']=str_replace("../","",get_thumb_pic("../",get_products_pic_by_proid($row['lc_id']),big));//获取pc图文的大图片地址
		$row['small_pic']=str_replace("../","",get_thumb_pic("../",get_products_pic_by_proid($row['lc_id']),small));//获取pc图文的小图片地址
		
		$row['content']=str_replace('&nbsp;','',$row['lc_content']);//获取内容
		$row['briefly']=strip_tags($row['lc_content']);//获取过滤html标签后的内容(简短)
		$row['dianjiliang']=$row['lc_hits'];//获取点击量
		
		if ($aset['infolen']>0){
			if($aset['dot']){
				$dot=$aset['dot'];
			}else{
				$dot="...";
			}
			$row['jianjie']=mb_substr(strip_tags($row['lc_content']),0,$aset['infolen'],"utf-8").$dot;
		}
		
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>