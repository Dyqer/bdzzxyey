<?php
/**************************************************
 * Touch 核心公用
 **************************************************/
defined('LC_MX') or define('LC_MX',dirname(dirname(dirname(__FILE__))).'/');//系统目录定义
defined('LC_MX_3G') or define('LC_MX_3G',dirname(dirname(__FILE__)).'/');//系统3G目录定义
require(LC_MX.'common/core.php');//加载核心文件
require(LC_MX_3G."common/wap_fun.php");

/***************************************************
 * 功能：mx系统 TOUCH消息提示
 * 参数：$str 提示消息文字 $url 是1时返回上一页，是空时仅提示，否则跳转对应的地址
 ***************************************************/
function mx_wap_msg($str,$url=""){
	echo '<!doctype html><html><head></head><body></body></html><script>function tips_windows(e,b){var a=document.body.appendChild(document.createElement("div"));a.innerHTML="<div id=\'tip_title\'>&nbsp;&nbsp;\u63d0\u793a</div><div id=\'tip_con\'>"+e+"</div>";var c=function(a){return"string"==typeof a?document.getElementById(a):a},d=document.documentElement.clientWidth*0.8;a.style.cssText="left:"+(document.documentElement.clientWidth-d)/2+"px;top:"+(document.documentElement.clientHeight-a.offsetHeight-100)/2+"px;background:#f5f5f5;z-index:2;width:"+d+"px;position:fixed;_position:absolute;border-radius:20px";
c("tip_title").style.cssText="font-size:2em;background:#e7e7e7;font-weight:bold;padding:20px 0;border-radius:20px";c("tip_con").style.cssText="font-size:2em;text-align:center;padding:30px 0";setTimeout(function(){a.parentNode.removeChild(a);b&&(1==b?history.go(-1):location.href=b)},2E3)}tips_windows("'.$str.'","'.$url.'")</script>';
}
?>