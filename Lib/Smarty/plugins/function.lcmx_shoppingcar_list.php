<?php
function smarty_function_lcmx_shoppingcar_list($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
			case "显示数目":
				$aset['row'] = $a[1];
				break;
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
			case "订单":
				$aset['orderform'] = $a[1];
				break;
			case "登录页":
				$aset['loginpage'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	
	$aset['listname']=isset($aset['listname'])?$aset['listname']:"list";
	$aset['row']=isset($aset['row'])?intval($aset['row']):10;
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
	$aset['orderform']=isset($aset['orderform'])?$aset['orderform']:null;//默认不使用订单
	$aset['loginpage']=$aset['loginpage']?$aset['loginpage']:"index.php?p=user";//判断是否设置了登录页
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$user_id = $_SESSION['user_id'];//获取session中会员id
	$wheresql=" WHERE 1=1 ";
	if($aset['orderform']){
		$wheresql.=" and lc_zt='{$aset['orderform']}'";
	}else{
		$wheresql.=" and lc_zt=0";
	}
	if($user_id){
		$wheresql.=" and lc_user_id='{$user_id}'";
	}else{
		mx_msg("您未登录或者登录已经过期,请重新登录！",$aset['loginpage']);
		exit;
	}
	$orderbysql = " order by lc_id desc";
	/*分页设置*/
	if (isset($aset['paged'])){
		include_once(LC_MX.'Lib/page.class.php');
		$total_sql="SELECT lc_id FROM ".lc()."_gwc".$wheresql;
		$total_row = $db->query($total_sql);
		$total_count=mysql_num_rows($total_row);
		$pagelist = new page(array('total'=>$total_count, 'perpage'=>$aset['row']));
		$currenpage=$pagelist->nowindex;
		$aset['start']=($currenpage-1)*$aset['row'];
		if ($total_count>$aset['row']){
			$smarty->assign('page',$pagelist->show(3));
		}else{
			$smarty->assign('page','');
		}
	}
	/*分页设置 End*/
	$limit=" LIMIT ".abs($aset['start']).','.$aset['row'];
	$sql="SELECT * FROM ".lc()."_gwc ".$wheresql.$orderbysql.$limit;
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		$row['product_name'] = get_products_type_title_by_lc_id($row['lc_goods_id']);//获取商品名称
		$row['product_title'] = mb_substr($row['product_name'],0,$aset['titlelen'],'utf-8');//获取商品名称并截取相应字数
		$row['product_pic'] = str_replace("../","",get_products_pic_by_proid($row['lc_goods_id']));//获取商品图片
		$row['lc_price'] = isset($row['lc_price'])?$row['lc_price']:"0";//如果价格为空显示为0
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>