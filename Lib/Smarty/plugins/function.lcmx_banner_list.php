<?php
function smarty_function_lcmx_banner_list($params, &$smarty){
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
			case "类型":
				$aset['type'] = $a[1];
				break;
	 }
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['type']=isset($aset['type'])?$aset['type']:1;//类型默认获取Banner(1是Banner，2是广告图)
	$aset['num']=isset($aset['num'])?$aset['num']:5;//默认获取数量5
	
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$wheresql=" WHERE lc_zt=1 and lc_type ='{$aset['type']}' ";
	if($aset['c_id']){
		$wheresql.=" and c_id ='{$aset['c_id']}'";
	}
	$orderbysql = " order by lc_sort_id asc";
	$sql="select * from ".lc()."_banner ";
	$limit=" limit {$aset['num']}";
	$sql.=$wheresql.$orderbysql.$limit;

	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result))
	{
		$row['title']=$row['lc_title'];//Banner标题
		$row['pic']=str_replace("../","",$row['lc_pic']);
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>