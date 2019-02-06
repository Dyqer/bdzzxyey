<?php
function smarty_function_lcmx_3g_news_list($params, &$smarty){
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
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
			case "推荐":
				$aset['tj'] = $a[1];
				break;
		}
	}
	
	if(is_array($aset)){$aset = array_map("get_smarty_request",$aset);}
	
	$aset['listname'] = isset($aset['listname'])?$aset['listname']:"list";
	$aset['type_id'] = isset($aset['type_id'])?(int)$aset['type_id']:0;
	$aset['row'] = isset($aset['row'])?intval($aset['row']):10;
	$aset['titlelen'] = isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['lanmu'] = isset($aset['lanmu'])?intval($aset['lanmu']):0;
	$key = isset($_GET['key'])?escape_str($_GET['key']):null;
	
	unset($arr,$str,$a,$params);
	
	if($key){
		$wheresql= " WHERE lc_title like '%{$key}%' and lc_phone=1";
	}else{
		$wheresql= " WHERE lc_phone=1";
	}
	if($aset['type_id']>=0){
		$wheresql.=" AND c_id in (".get_table_all_child_id($aset['type_id'],"news_type").$aset['type_id'].") ";
	}
	$wheresql.=' and lc_del=0 and lc_zt=1 ';
	if($aset['lanmu']<>0){
		$wheresql.=" and c_id in (select c_id from ".lc()."_news_type where lanmu='{$aset['lanmu']}')";
	}
	if($aset['tj']<>0){
		$wheresql.=" and lc_tj=1 ";
	}
	$orderbysql = " order by lc_sort_id desc";

	if (isset($aset['paged'])){
		include_once(LC_MX.'/Lib/page.class.php');
		$total_sql="SELECT lc_id FROM ".lc()."_news".$wheresql;
		$db->query($total_sql);
		$total_count = $db->num_rows();
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
	$sql = "SELECT * FROM ".lc()."_news ".$wheresql.$orderbysql.$limit;
	
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		
		$row['title'] = mb_substr($row['lc_title'],0,$aset['titlelen'],"utf-8");
		$row['id'] = $row['lc_id'];
		$row['jianjie'] = mb_substr(strip_tags(str_replace("../","",$row['lc_phone_content'])),0,100,'utf-8');
		$row['content'] = str_replace('&nbsp;','',$row['lc_phone_content']);
		
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>