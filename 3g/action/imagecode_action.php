<?php
/*
 * LCMX 4.0 网站验证码生成
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
require(dirname(dirname(dirname(__FILE__)))."/Lib/yzm.php");//加载验证码生成类

$image = new ValidationCode('60','24','4');//图片长度、宽度、字符个数
$image->outImg();//输出生成验证码的图片
$_SESSION['validationcode'] = $image->checkcode;//存贮验证码到 $_SESSION 中