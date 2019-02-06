<?php
/*
 * 龙采MX 4.0安装程序公用函数文件
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
if(!defined('IN_LCMX')){
	die('禁止访问！');
}

function fanxiexian($value){
	if (empty($value)){
		return $value;
	}else{
		if (!get_magic_quotes_gpc()){
			$value=is_array($value) ? array_map('fanxiexian', $value) : addslashes($value);
		}
		$value=is_array($value) ? array_map('fanxiexian', $value) : glhtml($value);
		return $value;
	}
}

function glhtml($string){
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;','&nbsp;',' ','　'), array('&', '"', '<', '>','','',''), $string);
	$string = preg_replace("/\s+/", "", $string);
	$string = strip_tags($string);
	return $string;
}

function install_showmsg($msg,$gourl='goback', $is_write = false){
	global $install_smarty;
	$install_smarty->assign("msg",$msg);
	$install_smarty->assign("gourl",$gourl);
	$install_smarty->display("error.html");
	exit();
}

function check_dirs($dirs){
	$checked_dirs = array();
	foreach ($dirs AS $k=> $dir){
		$checked_dirs[$k]['dir'] = $dir;
		if (!file_exists(LCMX_ROOT_PATH .'/'. $dir)){
			$checked_dirs[$k]['read'] = '<span style="color:red;">目录不存在</span>';
			$checked_dirs[$k]['write'] = '<span style="color:red;">目录不存在</span>';
		}else{
			if (is_readable(LCMX_ROOT_PATH.'/'.$dir)){
				$checked_dirs[$k]['read'] = '<span class="xx">√可读</span>';
			}else{
				$checked_dirs[$k]['read'] = '<span class="xx">×不可读</span>';
			}
			if(is_writable(LCMX_ROOT_PATH.'/'.$dir)){
				$checked_dirs[$k]['write'] = '<span class="xx">√可写</span>';
			}else{
				$checked_dirs[$k]['write'] = '<span class="xx">×不可写</span>';
			}
		}
	}
	return $checked_dirs;
}
?>