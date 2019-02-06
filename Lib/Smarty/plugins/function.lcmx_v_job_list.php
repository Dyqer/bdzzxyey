<?php
function smarty_function_lcmx_v_job_list($params, &$smarty){
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
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}

	$aset['listname'] = isset($aset['listname'])?$aset['listname']:"list";
	$aset['row'] = isset($aset['row'])?intval($aset['row']):10;
	$aset['start'] = isset($aset['start'])?intval($aset['start']):0;
	$aset['titlelen'] = isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['infolen'] = isset($aset['infolen'])?intval($aset['infolen']):0;

	unset($arr,$str,$a,$params);

	if (isset($aset['paged'])){
		include_once(LC_MX.'/Lib/page.class.php');
		$total_sql="SELECT lc_id FROM ".lc()."_job ".$wheresql;
		$db->query($total_sql);
		$total_count = $db->num_rows();
		$pagelist = new page(array('total'=>$total_count, 'perpage'=>$aset['row']));
		$currenpage = $pagelist->nowindex;
		$aset['start']=($currenpage-1)*$aset['row'];
		if ($total_count>$aset['row']){
			$smarty->assign('page',$pagelist->show(3));
		}else{
			$smarty->assign('page','');
		}
	}
	$limit=" LIMIT ".abs($aset['start']).','.$aset['row'];
	$sql = "SELECT * FROM ".lc()."_job ".$wheresql.$orderbysql.$limit;

	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		$row['title'] = mb_substr($row['lc_title'],0,$aset['titlelen'],'utf-8');
		$row['id'] = $row['lc_id'];
		$row['content_little'] = mb_substr(str_replace('&nbsp;','',$row['lc_content']),0,60,'utf-8');
		$row['content'] = str_replace('&nbsp;','',$row['lc_content']);

		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>