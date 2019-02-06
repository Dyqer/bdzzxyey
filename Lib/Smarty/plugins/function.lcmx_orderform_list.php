<?php
function smarty_function_lcmx_orderform_list($params, &$smarty){
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
			case "分页显示":
				$aset['paged'] = $a[1];
				break;
			case "会员编号":
				$aset['userid'] = $a[1];
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
	$aset['userid']=isset($aset['userid'])?intval($aset['userid']):0;
	$aset['loginpage']=$aset['loginpage']?$aset['loginpage']:"index.php?p=user";//判断是否设置了登录页
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$user_id = $_SESSION['user_id'];//获取session中会员id
	$wheresql = " where 1=1 ";
	if($user_id){
		$wheresql.=" and lc_user_id='{$user_id}'";
	}else{
		mx_msg("您未登录或者登录已经过期,请重新登录！",$aset['loginpage']);
		exit;
	}
	
	/*分页设置*/
	$orderbysql = " order by lc_id desc";
	if (isset($aset['paged'])){
		include_once(LC_MX.'Lib/page.class.php');//加载分页类
		$total_sql="SELECT lc_id FROM ".lc()."_dingdan".$wheresql;
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
	/*分页设置 End*/
	
	$limit=" LIMIT ".abs($aset['start']).','.$aset['row'];
	$sql="SELECT * FROM ".lc()."_dingdan ".$wheresql.$orderbysql.$limit;
	$result = $db->query($sql);
	$list= array();
	while($row = $db->fetch_array($result)){
		switch($row['lc_zt']){
			case 0:
				$row['zt'] = "未付款";
				break;
			case 0:
				$row['zt'] = "已付款";
				break;
			case 0:
				$row['zt'] = "未发货";
				break;
			case 0:
				$row['zt'] = "已发货";
				break;
		}
		$list[] = $row;
	}
	$smarty->assign($aset['listname'],$list);
}
?>