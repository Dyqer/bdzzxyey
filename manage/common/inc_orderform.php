<?php
function get_express_way($id,$col='lc_title'){
	$str="";
	if($id){
		$sql = "select * from ".lc()."_express_way where lc_id='{$id}'";
		$rs = mysql_query($sql);
		if($rs){
			$rows = mysql_fetch_assoc($rs);
			$str = $rows[$col];
		}
	}
	return $str;
}
function order_zt_name($zt){
	$str = '';
	switch ($zt) {
		case 0:$str = "未付款";break;
		case 1:$str = "已付款";break;
		case 2:$str = "已发货";break;
		case 3:$str = "已到货";break;
		default:$str = '未知';
	}
	return $str;
}
?>