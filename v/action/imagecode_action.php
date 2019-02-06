<?php
/*
 * LCMX 4.0 For Micro 网站验证码生成
 */
require(dirname(dirname(dirname(__FILE__)))."/common/yzm.php");//加载验证码生成类

$image = new ValidationCode('60','24','4');//图片长度、宽度、字符个数
$image->outImg();//输出生成验证码的图片
$_SESSION['validationcode'] = $image->checkcode;//存贮验证码到 $_SESSION 中