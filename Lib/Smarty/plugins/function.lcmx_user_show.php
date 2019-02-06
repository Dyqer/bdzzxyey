<?php
function smarty_function_lcmx_user_show($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "登录页":
				$aset['loginpage'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['listname']=$aset['listname']?$aset['listname']:"list";
	$aset['loginpage']=$aset['loginpage']?$aset['loginpage']:"index.php?p=user";//判断是否设置了登录页
	unset($arr,$str,$a,$params);//销毁局部变量
	 
	$sql = "select * from ".lc()."_user WHERE 1=1";
	if($_SESSION['user_id']){
		$sql.=" and lc_id = '{$_SESSION['user_id']}'";
		$val = $db->getone($sql);
		if (empty($val)){
			mx_msg("Sorry系统错误了,请重新登录再试！",$aset['loginpage']);
			exit;
		}
		$val['type'] = get_user_type('lc_title',$val['lc_id']);//获取会员所属类型
		$smarty->assign($aset['listname'],$val);
	}else{
		mx_msg("您未登录或者登录已经过期,请重新登录！",$aset['loginpage']);
	}
}
?>