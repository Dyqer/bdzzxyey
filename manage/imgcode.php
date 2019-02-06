<?php
require(dirname(__FILE__).'/common/common.php');

require(LC_MX."Lib/yzm.php");//加载验证码生成类

$image = new ValidationCode('60','24','4');//图片长度、宽度、字符个数
$image->outImg();//输出生成验证码的图片
$_SESSION['validationcode'] = $image->checkcode;//存贮验证码到 $_SESSION 中
?>