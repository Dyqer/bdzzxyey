<?php
/************************************************
 功能：获取招聘系统简历未读取
 描述：后台主页使用
 ***********************************************/
function get_jianli_num(){
	$sql = "select * from ".lc()."_jianli where lc_zt=-1";
	$rs = mysql_query($sql);
	$str = '';
	if($rs){
		$num = mysql_num_rows($rs);
		if($num>0){
			if($num>999){
				$str = '<span>N</span>';
			}else{
				$str = '<span>'.$num.'</span>';
			}
		}
	}
	return $str;
}
?>