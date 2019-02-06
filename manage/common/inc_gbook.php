<?php
/************************************************
 功能：获取留言系统未读取
 描述：后台主页使用
 ************************************************/
function get_gbook_num(){
	$sql = "select * from ".lc()."_gbook where lc_zt=-1";
	$rs = mysql_query($sql);
	$str = '';
	if($rs){
		$total = mysql_num_rows($rs);
		if($total>0){
			if($total>999){
				$str = '<span>N</span>';
			}else{
				$str = '<span>'.$total.'</span>';
			}
		}
	}
	return $str;
}
?>