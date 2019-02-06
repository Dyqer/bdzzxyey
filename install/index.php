<?php
/*
 * 龙采MX 4.0 安装向导
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
@set_time_limit(1000);
header("Content-Type:text/html;charset=utf-8");
define('IN_LCMX',true);
define('LCMX_PRE','mx_');//数据库前缀
define('LCMX_install',dirname(__FILE__)."/");//安装目录定义
define('LCMX_ROOT_PATH',dirname(dirname(__FILE__))."/");//系统目录定义

if(file_exists(LCMX_ROOT_PATH.'config/config_db.php')){
	exit('您已经安装过本软件了，如果您要重新安装,请删除config文件夹下面的config_db.php文件再执行安装。</br>温馨提示：重新安装会导致以前的不能再运行,谢谢！');
}
if(phpversion() < '5.2.0'){
	exit('您的php版本过低，不能安装本软件，请升级到5.2.0或更高版本再安装，谢谢！');
}
require(LCMX_install.'inc/install.inc.php');

$action = !empty($_REQUEST['action']) ? trim($_REQUEST['action']) : '1';

if($action =="1"){
	$install_smarty->assign("action", $action);
	$install_smarty->display('step1.html');
}

if($action =="2"){
	$system_info = array();
	$system_info['version'] = "LCMX 5.0";
	$system_info['os'] = PHP_OS;
	$system_info['ip'] = $_SERVER['SERVER_ADDR'];
	$system_info['web_server'] = $_SERVER['SERVER_SOFTWARE'];
	$system_info['php_ver'] = PHP_VERSION;
	$system_info['max_filesize'] = ini_get('upload_max_filesize');
	if(PHP_VERSION<5.0){exit("安装失败，请使用PHP5.0及以上版本");}
	$dir_check = check_dirs($list_check_dirs);
	$install_smarty->assign("dir_check", $dir_check);
	$install_smarty->assign("system_info", $system_info);
	$install_smarty->assign("action", $action);
	$install_smarty->display('step2.html');
}

if($action =="3"){
	$install_smarty->assign("action", $action);
	$install_smarty->display('step3.html');
}

if($action =="4"){
	$dbhost = isset($_POST['dbhost']) ? trim($_POST['dbhost']) : '';
	$dbname = isset($_POST['dbname']) ? trim($_POST['dbname']) : '';
	$dbuser = isset($_POST['dbuser']) ? trim($_POST['dbuser']) : '';
	$dbpass = isset($_POST['dbpass']) ? trim($_POST['dbpass']) : '';
	$dbpre  = isset($_POST['dbpre']) ? trim($_POST['dbpre']) : 'mx';
	
	$m_name = isset($_POST['m_name']) ? trim($_POST['m_name']) : '';
	$m_pwd = isset($_POST['m_pwd']) ? trim($_POST['m_pwd']) : '';
	$m_pwd_again = isset($_POST['m_pwd_again']) ? trim($_POST['m_pwd_again']) : '';
	$m_email = isset($_POST['m_email']) ? trim($_POST['m_email']) : '';
	$m_tel = isset($_POST['m_tel']) ? trim($_POST['m_tel']) : '';
	$m_qq = isset($_POST['m_qq']) ? trim($_POST['m_qq']) : '';
	
	$isimport = isset($_POST['isimport'])?(int)$_POST['isimport']:0;//是否导入测试数据(数据库,默认导入)
	
	$web_keywords = "MX营销平台";
	$web_description = "MX营销平台";
	$web_name = "MX营销平台";
	
	//$root_url=substr(dirname($php_self),0,-7)?substr(dirname($php_self),0,-7):'/';//获取网站的根目录
	//$site_domain = "http://".$_SERVER['HTTP_HOST'].$root_url;
	
	if($dbhost == '' || $dbname == ''|| $dbuser == ''|| $m_name == ''|| $m_pwd == '' || $m_pwd_again == ''){
		install_showmsg('您填写的信息不完整，请核对');
	}
	if($admin_pwd != $admin_pwd_again){
		install_showmsg('您两次输入的密码不一致');
	}
	/*if (!preg_match("/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/",$m_email))install_showmsg('电子邮箱格式错误！');*/
	if(!$db = @mysql_connect($dbhost, $dbuser, $dbpass)){
		install_showmsg('连接数据库错误，请核对信息是否正确');
	}
	if (mysql_get_server_info()<5.0) exit("安装失败，请使用mysql5以上版本");

	if(mysql_get_server_info() > '4.1') {
		mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname` DEFAULT CHARACTER SET ".LCMX_DBCHARSET, $db);
	} else {
		mysql_query("CREATE DATABASE IF NOT EXISTS `$dbname`", $db);
	}
	mysql_query("CREATE DATABASE IF NOT EXISTS `".$dbname."`;",$db);

	if(!mysql_select_db($dbname)){
		install_showmsg('选择数据库错误，请检查是否拥有权限或存在此数据库');
	}
	mysql_query("SET NAMES '".LCMX_DBCHARSET."',character_set_client=binary,sql_mode='';",$db);
	$mysql_version = mysql_get_server_info($db);
	//生成数据库配置文件
	$str = "<?php\n";
	$str.= "\$dbhost = '{$dbhost}';\n";
	$str.= "\$dbuser = '{$dbuser}';\n";
	$str.= "\$dbpass = '{$dbpass}';\n";
	$str.= "\$dbname = '{$dbname}';\n";
	$str.= "\$lc = '{$dbpre}';\n";
	$str.= "?>";
	
	$fp = @fopen(LCMX_ROOT_PATH.'config/config_db.php', 'wb+');
	if (!$fp){
		install_showmsg('打开数据库配置文件失败');
	}
	if (!@fwrite($fp, trim($str))){
		install_showmsg('写入数据库配置文件失败');
	}
	@fclose($fp);
	//创建数据表
	if(!$fp = @fopen(LCMX_install.'lcmx_table.sql','rb')){
		install_showmsg('打开文件lcmx_table.sql出错，请检查文件是否存在');
	}
	$query = '';
	while(!feof($fp)){
		$line = rtrim(fgets($fp,1024));
		if(preg_match('/;$/',$line)){
			$query .= $line."\n";
			$query = str_replace(LCMX_PRE,$dbpre."_",$query);
			if ( $mysql_version >= 4.1 ){
				mysql_query(str_replace("TYPE=MyISAM", "ENGINE=MyISAM  DEFAULT CHARSET=".LCMX_DBCHARSET,  $query), $db);
			}else{
				mysql_query($query, $db);
			}
			$query='';
		}else if(!ereg('/^(//|--)/',$line)){
			$query .= $line;
		}
	}
	@fclose($fp);
	
	//导入默认数据
	$mx_data_filename = $isimport==1 ? 'lcmx_data.sql' : 'lcmx_test_data.sql';
	$query = '';
	if(!$fp = @fopen(LCMX_install.$mx_data_filename,'rb')){
		install_showmsg('打开文件'.$mx_data_filename.'出错，请检查文件是否存在');
	}
	while(!feof($fp)){
		$line = rtrim(fgets($fp,1024));
		if(ereg(";$",$line)){
			$query .= $line;
			$query = str_replace(LCMX_PRE,$dbpre."_",$query);
			mysql_query($query,$db);
			$query='';
		}else if(!ereg("^(//|--)",$line)){
			$query .= $line;
		}
	}
	@fclose($fp);
	
	//创建后台管理员帐号
	$md5pwd = md5($m_pwd);
	mysql_query("INSERT INTO `".$dbpre."_admin`(lc_admin_id,lc_admin_name, lc_admin_password, lc_admin_issuper,lc_admin_rank,lc_admin_email,lc_admin_tel,lc_admin_qq,xitong,lanmu,danye,news,products,down,user,gbook,job,dingdan,gaoji,touch,hsz,weixin,nav,db) 
	VALUES (1, '{$m_name}', '{$md5pwd}', 1, '','{$m_email}', '{$m_tel}', '{$m_qq}',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1)", $db);
	
	$install_smarty->display('step5.html');
}
?>