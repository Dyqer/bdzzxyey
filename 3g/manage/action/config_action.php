<?php
require (dirname(dirname(__FILE__))."/common/common.php");

$action = isset($_POST['action'])?$_POST['action']:null;

$web_name = isset($_POST['web_name'])?$_POST['web_name']:null;
$web_keywords = isset($_POST['web_keywords'])?$_POST['web_keywords']:null;
$web_description = isset($_POST['web_description'])?$_POST['web_description']:null;

if($action=='touch'){
	/*手机配置修改*/

	if($web_name&$web_keywords&$web_description){
		$sql = "update ".lc()."_touch set touch_name='{$web_name}',touch_keywords='{$web_keywords}',touch_description='{$web_description}',datatime=NOW() where id=1";
		$rs = mysql_query($sql);
		if($rs && mysql_affected_rows()>0){
			mx_msg("修改成功！",'../config_edit.php');
		}else{
			mx_msg("修改失败！",1);
		}
	}else{
		mx_msg("修改失败,必填值不能为空！",1);
	}
}elseif ($action=='pc'){
	/*手机配置修改*/
	
	$str="<?php\n";
	$str.="define(\"web_name\", \"{$web_name}\");\n";
	$str.="define(\"web_keywords\", \"{$web_keywords}\");\n";
	$str.="define(\"web_description\", \"{$web_description}\");\n";
	$str.="\$have_phone = {$have_phone};\n";
	$str.="\$program_schema = {$program_schema};\n";
	$str.="\$session_time = {$session_time};\n";
	$str.="?>";

	if($web_name&$web_keywords&$web_description){
		write_file(LC_MX."config/config.php",$str);//写入到config/config.php文件中
		//更新数据库config表对应的值
		update_config("web_name",$web_name);
		update_config("web_keywords",$web_keywords);
		update_config("web_description",$web_description);
		
		mx_msg("修改成功！",'../config_edit.php');
	}
}else{
	mx_msg("请求参数有误！",1);
}
