<?php
function smarty_function_lcmx_links_list($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0])
		{
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "分类":
				$aset['c_id'] = $a[1];
				break;
			case "数量":
				$aset['num'] = $a[1];
				break;
	 }
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['c_id']=isset($aset['c_id'])?$aset['c_id']:null;//默认空
	$aset['num']=isset($aset['num'])?$aset['num']:5;//默认获取数量5
	
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$wheresql = " WHERE lc_zt=0 ";
	if($aset['c_id']){
		$wheresql.= " and c_id ='{$aset['c_id']}'";
	}
	$orderbysql = " order by lc_sort_id asc";
	$sql = "select * from ".lc()."_friendlink ";
	$limit = " limit {$aset['num']}";
	$sql.= $wheresql.$orderbysql.$limit;
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		$row['title'] = $row['lc_title'];//友情链接标题
		$row['pic']=str_replace("../","",$row['lc_pic']);
		$row['url'] = $row['lc_url'];
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>