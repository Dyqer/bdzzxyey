<?php
/*
 * LCMX 4.0 Smarty自定义方法文件
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
 
/*************************************************
 功能：解析Smarty标签请求(判断get 或 post 请求)
 *************************************************/
function get_smarty_request($str){
	$str=rawurldecode($str);
	$strtrim=rtrim($str,']');
	if (substr($strtrim,0,4)=='GET['){
		$getkey=substr($strtrim,4);
		return $_GET[$getkey];
	}elseif (substr($strtrim,0,5)=='POST['){
		$getkey=substr($strtrim,5);
		return $_POST[$getkey];
	}else{
		return $str;
	}
}
?>