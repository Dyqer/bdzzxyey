<?php
/*系统设置修改*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$web_name = isset($_POST['webname'])?$_POST['webname']:"龙采 MX3.3";
$web_keywords = isset($_POST['webkeywords'])?$_POST['webkeywords']:"龙采 MX3.3";
$web_description = isset($_POST['webdescription'])?$_POST['webdescription']:"龙采 MX3.3";
$have_phone = isset($_POST['havephone'])?$_POST['havephone']:0;
$program_schema = isset($_POST['program_schema'])?$_POST['program_schema']:0;
$session_time = isset($_POST['sessiontime'])?(int)$_POST['sessiontime']:3600;

//写入到config/config.php文件中
$str="<?php\n";
$str.="define(\"web_name\", \"{$web_name}\");\n";
$str.="define(\"web_keywords\", \"{$web_keywords}\");\n";
$str.="define(\"web_description\", \"{$web_description}\");\n";
$str.="\$have_phone = {$have_phone};\n";
$str.="\$program_schema = {$program_schema};\n";
$str.="\$session_time = {$session_time};\n";
$str.="?>";

if(write_file(LC_MX."config/config.php",$str)){
	echo "yes";//修改成功
}else{
	echo "no";//修改失败
}
?>