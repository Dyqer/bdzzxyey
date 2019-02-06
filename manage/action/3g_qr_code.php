<?php
/*手机后台地址二维码图片生成*/
require(dirname(dirname(dirname(__FILE__)))."/Lib/phpqrcode.php");//加载php二维码生成类

$action = isset($_GET['a'])?$_GET['a']:'3g';//默认3g后台

if($action=='3g/manage'){
	$qrdata="http://".$_SERVER['HTTP_HOST'].str_replace('manage/action/3g_qr_code.php','',$_SERVER['PHP_SELF']).$action;//二维码数据
	$Level = "M";//纠错级别：L、M、Q、H
	$size = "4";//点的大小：1到10
	$margin = "0";//生成的二维码离边框的距离
	QRcode::png($qrdata,false,$Level,$size,$margin);
}elseif ($action=='productshow'){
	
	$id = isset($_GET['id'])?$_GET['id']:0;//产品id
	
	$qrdata="http://".$_SERVER['HTTP_HOST'].str_replace('manage/action/3g_qr_code.php','',$_SERVER['PHP_SELF']).'3g/?p=products_show&id='.$id;//二维码数据
	$Level = "M";//纠错级别：L、M、Q、H
	$size = "6";//点的大小：1到10
	$margin = "1";//生成的二维码离边框的距离
	QRcode::png($qrdata,false,$Level,$size,$margin);
}
?>