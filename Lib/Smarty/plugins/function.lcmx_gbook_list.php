<?php
function smarty_function_lcmx_gbook_list($params, &$smarty)
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
			case "简介长度":
				$aset['infolen'] = $a[1];
				break;
			case "结尾字符":
				$aset['dot'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['lanmu'] = isset($aset['lanmu'])?$aset['lanmu']:0;
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['row']=isset($aset['row'])?intval($aset['row']):10;
	$aset['start']=isset($aset['start'])?intval($aset['start']):0;
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['infolen']=isset($aset['infolen'])?intval($aset['infolen']):0;
	unset($arr,$str,$a,$params);//销毁局部变量

	$wheresql="where lc_zt = 1 and lanmu = '{$aset['lanmu']}'";
	//日期范围
	if (isset($aset['settr'])){
		$settr_val=strtotime("-".intval($aset['settr'])." day");
		$wheresql.=" AND lc_datetime > ".$settr_val;
	}
	//分页设置
	if (isset($aset['paged'])){
		include_once(LC_MX.'Lib/page.class.php');//加载分页类
		$total_sql="SELECT lc_id FROM ".lc()."_gbook ".$wheresql;
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
	
	$limit=" LIMIT ".abs($aset['start']).','.$aset['row'];
	$sql="SELECT * FROM ".lc()."_gbook ".$wheresql.$limit;
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result))
	{
		$row['title']=mb_substr($row['lc_title'],0,$aset['titlelen'],"utf-8");//根据标题长度获取标题
		$row['content']=str_replace('&nbsp;','',$row['lc_content']);
		$row['briefly']=strip_tags($row['lc_content']);//获取过滤html标签的内容(简短)
		
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