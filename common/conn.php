<?php
/*
 * LCMX 4.0 系统公用文件
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 * @author LJay <ljay88@vip.qq.com>
 */
ini_set("session.cookie_httponly",true);
defined('LC_MX') or define('LC_MX',dirname(dirname(__FILE__)).'/');//系统目录定义
date_default_timezone_set("PRC");//设定用于所有日期时间函数的默认时区
$db_debug = isset($db_debug)?$db_debug:false;

require(LC_MX."config/config_db.php");//加载数据库配置文件
require_once(LC_MX."config/config.php");//加载配置文件
require(LC_MX."Lib/mysql.class.php");//加载mysql操作类文件

if($db_debug){
	$db = new mysql($dbhost,$dbuser,$dbpass,$dbname,'true');//实例化mysql对象
}else{
	$db = new mysql($dbhost,$dbuser,$dbpass,$dbname,'false');//实例化mysql对象
}
require(LC_MX."Lib/z_session.php");//自定义系统session

/***************************************************
 * 功能：mx系统消息提示
 * 参数：$str 提示消息文字 $url 是1时返回上一页，是空时仅提示，否则跳转对应的地址
 ***************************************************/
function mx_msg($str,$url=""){
	echo '<!doctype html><html><head><meta charset="utf-8"></head><body></body></html><script>function tips_windows(e,t){var n=document.body.appendChild(document.createElement("div"));n.innerHTML="<div id=\'tip_title\'>&nbsp;&nbsp;提示</div><div id=\'tip_con\'>"+e+"</div>";var r=function(e){return typeof e=="string"?document.getElementById(e):e},i=220,s=n.style.height,o=(document.documentElement.clientWidth-i)/2,u=(document.documentElement.clientHeight-s-100)/2;n.style.cssText="left:"+o+"px;top:"+u+"px;background:#f5f5f5;z-index:2;width:"+i+"px;position:fixed;_position:absolute",r("tip_title").style.cssText="background:#e7e7e7;line-height:35px;height:35px;font-weight:bold",r("tip_con").style.cssText="line-height:50px;text-align:center",setTimeout(function(){n.parentNode.removeChild(n),t&&(t==1?history.go(-1):location.href=t)},2e3)};tips_windows("'.$str.'","'.$url.'");</script>';
}

/***************************************************
 * 功能：转义 SQL数据
 * 描述：语句中使用的字符串中的特殊字符
 ***************************************************/
function escape_str($str,$clear_xss=true){
	if(get_magic_quotes_gpc()==0){
		$str = mysql_real_escape_string($str);
	}
	if($clear_xss){
		$str = remove_xss($str);//xss过滤
	}
	return $str;
}
/***************************************************
 * 功能：xss过滤函数
 ***************************************************/
function remove_xss($string) {
	$string = preg_replace('/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]+/S','',$string);
	$parm1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
	$parm2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
	$parm = array_merge($parm1, $parm2);
	for ($i = 0; $i < sizeof($parm); $i++) {
		$pattern = '/';
		for ($j = 0; $j < strlen($parm[$i]); $j++) {
			if ($j > 0) {
				$pattern .= '(';
				$pattern .= '(&#[x|X]0([9][a][b]);?)?';
				$pattern .= '|(&#0([9][10][13]);?)?';
				$pattern .= ')?';
			}
			$pattern .= $parm[$i][$j];
		}
		$pattern .= '/i';
		$string = preg_replace($pattern, '', $string);
	}
	return $string;
}
/***************************************************
 * 功能：获取表名
 * 描述：前缀是可变的 获取表前缀
 ***************************************************/
function lc(){
	global $lc;
	return $lc;
}

/***************************************************
 * 功能：获取IP地址
 ***************************************************/
function getip() {
	if (@$_SERVER["HTTP_X_FORWARDED_FOR"])
	$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	else if (@$_SERVER["HTTP_CLIENT_IP"])
	$ip = $_SERVER["HTTP_CLIENT_IP"];
	else if (@$_SERVER["REMOTE_ADDR"])
	$ip = $_SERVER["REMOTE_ADDR"];
	else if (@getenv("HTTP_X_FORWARDED_FOR"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (@getenv("HTTP_CLIENT_IP"))
	$ip = getenv("HTTP_CLIENT_IP");
	else if (@getenv("REMOTE_ADDR"))
	$ip = getenv("REMOTE_ADDR");
	else
	$ip = "Unknown";//ip未知
	return $ip;
}
/*************************************************
 * 功能：获取某大类别的所有子类别，可以用在各分类表
 * 参数：$c_id当前类别的编号 $table表名
 *************************************************/
function get_table_all_child_id($c_id,$table){
	$sql = "select c_id from ".lc().'_'.$table." where c_pid='{$c_id}'";
	$rs = mysql_query($sql);
	$str = "";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str.=$rows["c_id"].",";
			$str.=get_table_all_child_id($rows["c_id"],$table);
		}
	}
	return $str;
}
/*************************************************
 * 功能：生成缩略图
 * @param string     源图绝对完整地址{带文件名及后缀名}
 * @param string     目标图绝对完整地址{带文件名及后缀名}
 * @param int        缩略图宽{0:此时目标高度不能为0，目标宽度为源图宽*(目标高度/源图高)}
 * @param int        缩略图高{0:此时目标宽度不能为0，目标高度为源图高*(目标宽度/源图宽)}
 * @param int        是否裁切{宽,高必须非0}
 * @param int/float  缩放{0:不缩放, 0<this<1:缩放到相应比例(此时宽高限制和裁切均失效)}
 * @return boolean   返回类型
 *************************************************/
function resize_img($src_img,$dst_img,$width=75,$height=75,$cut=0,$proportion=0){
	if(!is_file($src_img)){
		return false;
	}
	$ot = pathinfo($dst_img,PATHINFO_EXTENSION);
	$ot=strtolower($ot);//后缀大写转换为小写
	$otfunc = 'image' . ($ot == 'jpg' ? 'jpeg' : $ot);
	$srcinfo = getimagesize($src_img);
	$src_w = $srcinfo[0];
	$src_h = $srcinfo[1];
	$type  = strtolower(substr(image_type_to_extension($srcinfo[2]), 1));
	$createfun = 'imagecreatefrom' . ($type == 'jpg' ? 'jpeg' : $type);
	$dst_h = $height;
	$dst_w = $width;
	$x = $y = 0;
	/*缩略图不超过源图尺寸（前提是宽或高只有一个）*/
	if(($width> $src_w && $height> $src_h) || ($height> $src_h && $width == 0) || ($width> $src_w && $height == 0)){
		$proportion = 1;
	}
	if($width> $src_w){
		$dst_w = $width = $src_w;
	}
	if($height> $src_h){
		$dst_h = $height = $src_h;
	}
	if(!$width && !$height && !$proportion){
		return false;
	}
	if(!$proportion){
		if($cut == 0){
			if($dst_w && $dst_h){
				if($dst_w/$src_w> $dst_h/$src_h){
					$dst_w = $src_w * ($dst_h / $src_h);
					$x = 0 - ($dst_w - $width) / 2;
				}else{
					$dst_h = $src_h * ($dst_w / $src_w);
					$y = 0 - ($dst_h - $height) / 2;
				}
			}else if($dst_w xor $dst_h){
				if($dst_w && !$dst_h){
					//有宽无高
					$propor = $dst_w / $src_w;
					$height = $dst_h  = $src_h * $propor;
				}else if(!$dst_w && $dst_h)  //有高无宽
				{
					$propor = $dst_h / $src_h;
					$width  = $dst_w = $src_w * $propor;
				}
			}
		}else{
			if(!$dst_h)  //裁剪时无高
			{
				$height = $dst_h = $dst_w;
			}
			if(!$dst_w)  //裁剪时无宽
			{
				$width = $dst_w = $dst_h;
			}
			$propor = min(max($dst_w / $src_w, $dst_h / $src_h), 1);
			$dst_w = (int)round($src_w * $propor);
			$dst_h = (int)round($src_h * $propor);
			$x = ($width - $dst_w) / 2;
			$y = ($height - $dst_h) / 2;
		}
	}else{
		$proportion = min($proportion, 1);
		$height = $dst_h = $src_h * $proportion;
		$width  = $dst_w = $src_w * $proportion;
	}
	$src = $createfun($src_img);
	$dst = imagecreatetruecolor($width ? $width : $dst_w, $height ? $height : $dst_h);
	$white = imagecolorallocate($dst, 255, 255, 255);
	imagefill($dst, 0, 0, $white);
	if(function_exists('imagecopyresampled')){
		imagecopyresampled($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
	}else{
		imagecopyresized($dst, $src, $x, $y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
	}
	$otfunc($dst, $dst_img);
	//imagejpeg($dst,$src,100);
	imagedestroy($dst);
	imagedestroy($src);
	return true;
}
/*************************************************
 * 功能：创建路径文件夹
 * ***********************************************/
function create_folder($dir){
	if(!is_dir($dir)){
		create_folder(dirname($dir));
		mkdir($dir);
	}
	return ;
}
/***************************************************
 * 功能：获取config表中的变量值
 ***************************************************/
function get_config_value($lc_name){
	$sql = "select * from ".lc()."_config where lc_name='{$lc_name}'";
	$rs = mysql_query($sql);
	if($rs){
		$rows=mysql_fetch_assoc($rs);
		return $rows['lc_value'];
	}
}
/*************************************************
 * 功能：获取缩略图
 * 参数：$url图片相对路径，$pic图片路径,$type图片类型（big是pc大图，small是pc小图，sjbig是Touch大图，sjsmall是Touch小图）
 * ***********************************************/
function get_thumb_pic($url,$pic,$type){
	$file = str_replace($url,"",$pic);
	$picname = substr($pic,strrpos($pic,"/")+1);
	$filename = substr($pic,0,strrpos($pic,"/")+1);
	$thumb_pic = str_replace($url,"",$filename.$type."_".$picname);

	if(file_exists($file)){
		if(!file_exists($thumb_pic)){
			//生成pc略缩大图
			if($type=="big"){
				$out_pc_bwidth=get_config_value("pc_big_width");//获取pc版大图宽
				$out_pc_bheight=get_config_value("pc_big_height");//获取pc版大图高
				$out_pc_bcut=get_config_value("pc_big_cut");//获取pc版大图是否裁剪

				$pc_bmulu=dirname($thumb_pic);//获取目录
				create_folder($pc_bmulu);
				resize_img($file,$thumb_pic,$out_pc_bwidth,$out_pc_bheight,$out_pc_bcut,0);
			}
			//生成pc略缩小图
			if($type=="small"){
				$out_pc_swidth=get_config_value("pc_small_width");//获取pc版小图宽
				$out_pc_sheight=get_config_value("pc_small_height");//获取pc版小图高
				$out_pc_scut=get_config_value("pc_small_cut");//获取pc版小图是否裁剪
				$pc_smulu=dirname($thumb_pic);//获取目录
				create_folder($pc_smulu);
				resize_img($file,$thumb_pic,$out_pc_swidth,$out_pc_sheight,$out_pc_scut,0);
			}
			//生成touch略缩大图
			if($type=="sjbig"){
				$out_sj_bwidth=get_config_value("sj_big_width");//获取touch版大图宽
				$out_sj_bheight=get_config_value("sj_big_height");//获取touch版大图高
				$out_sj_bcut=get_config_value("sj_big_cut");//获取touch版大图是否裁剪
				$sj_bmulu=dirname($thumb_pic);//获取目录
				create_folder($sj_bmulu);
				resize_img($file,$thumb_pic,$out_sj_bwidth,$out_sj_bheight,$out_sj_bcut,0);
			}
			//生成touch略缩小图
			if($type=="sjsmall"){
				$out_sj_swidth=get_config_value("sj_small_width");//获取touch版小图宽
				$out_sj_sheight=get_config_value("sj_small_height");//获取touch版小图高
				$out_sj_scut=get_config_value("sj_small_cut");//获取touch版小图是否裁剪
				$sj_smulu=dirname($thumb_pic);//获取目录
				create_folder($sj_smulu);
				resize_img($file,$thumb_pic,$out_sj_swidth,$out_sj_sheight,$out_sj_scut,0);
			}
		}
		return $thumb_pic;
	}
}
/*************************************************
 * 功能：远程保存图片
 * 描述：把内容中的远程图片路径替换为本地图片路径，返回新内容
 * ***********************************************/
function dhtmlspecialchars($string, $is_url = 0) {
	if(is_array($string)){
		foreach($string as $key => $val){
			$string[$key] = dhtmlspecialchars($val);
		}
	}else{
		if(!$is_url) $string = str_replace('&', '&', $string);
		$string = preg_replace('/&((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',str_replace(array('&', '"', '<', '>'), array('&', '"', '<', '>'), $string));
	}
	return $string;
}
/*************************************************
 * 功能：生成随机数
 * ***********************************************/
function random($length){
	$hash = '';
	$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
	$max = strlen($chars) - 1;
	mt_srand((double)microtime() * 1000000);
	for($i = 0; $i < $length; $i++) {
		$hash .= $chars[mt_rand(0, $max)];
	}
	return $hash;
}
/*************************************************
 * 功能：远程图片保存
 * ***********************************************/
function yuancheng($content){
	$img_array = array();
	if(get_magic_quotes_gpc()){
		$content1 = stripslashes($content);
	}
	preg_match_all("/(src|SRC)=\"(http:\/\/(.+).(gif|jpg|jpeg|bmp|png))/isU",$content1,$img_array);//正则开始匹配所有的图片并放入数据
	$img_array = array_unique(dhtmlspecialchars($img_array[2]));
	set_time_limit(1000);//设置超时
	foreach ($img_array as $key => $value) {
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $value);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
		$get_file = curl_exec($ch);
		$filetime = time();
		$filepath = "../uploadfile/image/".date("Y",$filetime)."/".date("m",$filetime)."/";//图片保存的路径目录
		!is_dir($filepath) ? create_folder($filepath) : null;
		$filename = date("YmdHis",$filetime).random(1).'.'.substr($value,-3,3);
		$fp = @fopen($filepath.$filename,"w");
		@fwrite($fp,$get_file);
		fclose($fp);
		$content = preg_replace("/".addcslashes($value,"/")."/isU", "../uploadfile/".date("Y",$filetime)."/".date("m",$filetime)."/".$filename, $content1);//把文章内容中的图片对应的也替换为本地图片的路径
		$content1 = $content;
	}
	return $content;
}
?>