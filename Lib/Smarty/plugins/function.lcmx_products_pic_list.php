<?php
function smarty_function_lcmx_products_pic_list($params, &$smarty){
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
			case "产品编号":
				$aset['product_id'] = $a[1];
				break;
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
		}
	}
	if(is_array($aset)) $aset=array_map("get_smarty_request",$aset);
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):20;
	unset($arr,$str,$a,$params);//销毁局部变量

	$wheresql=" WHERE product_id='{$aset['product_id']}' ";
	if($aset['row']){
		$wheresql.=" limit ".$aset['row'];
	}
	$sql="SELECT * FROM ".lc()."_products_pics ".$wheresql;
	
	$result = $db->query($sql);
	$list= array();
	
	while($row = $db->fetch_array($result)){
		$row['id'] = $row['lc_id'];//获取编号
		$row['title'] = mb_substr($row['lc_title'],0,$aset['titlelen'],'utf-8');//根据标题长度获取标题
		$row['pic'] = str_replace("../","",$row['lc_pic']);//获取图文的原图片地址
		$row['big_pic'] = str_replace("../","",get_thumb_pic("../",$row['lc_pic'],big));//获取pc图文的大图片地址
		$row['small_pic'] = str_replace("../","",get_thumb_pic("../",$row['lc_pic'],small));//获取pc图文的小图片地址
		
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>