<?php
/*
 * LCMX 4.0 后台公用
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */

/***************************************************
 * 功能：管理员登陆验证
 ***************************************************/
//主页面登录验证
function admin_checklogin(){
	if(!$_SESSION['lc_admin_user_id']){
		mx_msg("您未登录或者登录已经过期！","login.php");
		exit;
	}
}
//子窗体页面登录验证
function admin_checklogin_sub(){
	if(!$_SESSION['lc_admin_user_id']){
		echo '<!doctype html><html><head></head><body></body></html><script>function chtipw(e,t){var n=document.body.appendChild(document.createElement("div"));n.innerHTML="<div id=\'tip_title\'>&nbsp;&nbsp;提示</div><div id=\'tip_con\'>"+e+"</div>";var r=function(e){return typeof e=="string"?document.getElementById(e):e},i=220,s=n.style.height,o=(document.documentElement.clientWidth-i)/2,u=(document.documentElement.clientHeight-s-100)/2;n.style.cssText="left:"+o+"px;top:"+u+"px;background:#f5f5f5;z-index:2;width:"+i+"px;position:fixed;_position:absolute",r("tip_title").style.cssText="background:#e7e7e7;line-height:35px;height:35px;font-weight:bold",r("tip_con").style.cssText="line-height:50px;text-align:center",setTimeout(function(){n.parentNode.removeChild(n),t&&(t==1?history.go(-1):window.top.location.href=t)},2e3)};chtipw("您未登录或者登录已经过期！","login.php");</script>';
		exit;
	}
}
//登录验证
function admin_check($type=''){
	if(!$_SESSION['lc_admin_user_id']){
		if($type){
			if($type=='ajax'){
				exit('notlogin');//登录已失效或者未登录
			}
			if($type=='action'){
				mx_msg("您未登录或者登录已经过期！","../login.php");
			}
		}else{
			exit('notlogin');//登录已失效或者未登录
		}
	}
}
/***************************************************
 * 功能：管理员权限检查
 ***************************************************/
//判断字段$lc_qx对应的权限
function check_quanxian($qx){
	$sql="select * from ".lc()."_admin where lc_admin_id='{$_SESSION['lc_admin_user_id']}'";
	$rs=mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		if($rows[$qx]==1){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}
//判断字段$lc_qx对应的权限
function get_qx($qx){
	$sql="select * from ".lc()."_admin where lc_admin_id='{$_SESSION['lc_admin_user_id']}'";
	$rs=mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		if($rows[$qx]!=1){
			mx_msg("抱歉您的权限不足！",1);die;
		}
	}else{
		mx_msg("抱歉您的权限不足！",1);die;
	}
}
/***************************************************
 * 功能：写文件
 ***************************************************/
function write_file($filename, $buffer){
	$fp = fopen($filename, "w") or die("couldn't open $filename");
	flock( $fp, LOCK_EX );
	$write = fputs($fp, $buffer);
	flock( $fp, LOCK_UN );
	fclose($fp);
	return true;
}
/***************************************************
 * 功能：更新config表中的变量值
 ***************************************************/
function update_config($lc_name,$lc_value){
	$sql = "update ".lc()."_config set lc_value='{$lc_value}' where lc_name='{$lc_name}'";
	mysql_query($sql);
}
/***************************************************
 * 功能：过滤HTML代码
 ***************************************************/
function glhtml($string){
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;','&nbsp;',' ','　'), array('&', '"', '<', '>','','',''), $string);
	$string = preg_replace("/\s+/", "", $string);
	$string = strip_tags($string);
	return $string;
}
/***************************************************
 * 功能：字符串是否为空值
 ***************************************************/
function val_isset($str=NULL){
	$str = $str?$str:'暂无';
	return $str;
}
/***************************************************
 * 功能：显示自定义字段内容
 * $table 表名
 ***************************************************/
function get_customfields($table,$list = array()){
	$sql = "SELECT * FROM ".lc()."_customfields WHERE lc_table = '{$table}' AND lc_zt=0";
	$rs_list = mysql_query($sql);
	$str = '';
	if($rs_list && mysql_num_rows($rs_list)>0){
		while($rows_list=mysql_fetch_assoc($rs_list)){
			if(empty($list)){
				$str.= "<tr class=\"edit_tr\"><td class=\"edit_t\"><span class=\"edit_title\">".$rows_list['lc_fieldnotes']."：</span></td>
		      			<td><input name=\"".$rows_list['lc_fieldname']."\" style=\"width:95%\" class=\"edit_input\"></td></tr>";
			}else{
				$str.= "<tr class=\"edit_tr\"><td class=\"edit_t\"><span class=\"edit_title\">".$rows_list['lc_fieldnotes']."：</span></td>
	      			<td><input name=\"".$rows_list['lc_fieldname']."\" style=\"width:95%\" class=\"edit_input\" value=\"".$list[$rows_list['lc_fieldname']]."\"></td></tr>";
			}
		}
	}
	return $str;
}
/***************************************************
 * 功能：action处理中获取自定义字段sql字符串（字段与对应的值）
 * $table 表名
 * $a     action的值（add or edit）
 * 返回数组 array
 ***************************************************/
function customfields_action($table,$a='add'){
	$field_str ='';
	$field_val_str ='';
	$field_up_str = '';
	$res = array();
	$sql = "SELECT lc_fieldname FROM ".lc()."_customfields WHERE lc_table = '{$table}' AND lc_zt=0";
	$rs_list = mysql_query($sql);
	if($rs_list && mysql_num_rows($rs_list)>0){
		while($rows_list = mysql_fetch_assoc($rs_list)){
			$field_val = isset($_POST[$rows_list['lc_fieldname']])?escape_str($_POST[$rows_list['lc_fieldname']]):null;
			if($a == 'add'){
				$field_str.= ','.$rows_list['lc_fieldname'];
				$field_val_str.= ",'".$field_val."'";
			}else{
				$field_up_str.= ",".$rows_list['lc_fieldname']."='{$field_val}'";
			}
		}
		if($a == 'add'){
			$res['f_str'] = $field_str;
			$res['fv_str'] = $field_val_str;
		}else{
			$res['up_str'] = $field_up_str;
		}
	}
	return $res;
}
/***************************************************
 * 新增功能：添加操作日志
 ***************************************************/
function SetSysEvent($m='', $cid=0, $a='all'){
	$ip = getip();
	$time=time();//获取当前时间
	$lc_uname=$_SESSION['lc_admin_name'];//获取登陆时 存入的session
	$sql = "insert into ".lc()."_sysevent(lc_uname,lc_siteid,lc_model,lc_classid,lc_action,lc_posttime,lc_ip) values ('$lc_uname','','$m','$cid','$a','$time','$ip')";
	//更新操作日志
	//一分钟内连续操作只记录一次
	$sqls="SELECT `lc_posttime` FROM ".lc()."_sysevent WHERE `lc_uname`='".$_SESSION['lc_admin_name']."' AND `lc_model`='$m'  AND `lc_action`='$a' ORDER BY lc_id DESC";
	$shuju = mysql_query($sqls);
	$r = mysql_fetch_assoc($shuju);
	if(!isset($r['lc_posttime'])){
		mysql_query($sql);
	}else if(isset($r['lc_posttime']) && ($r['lc_posttime']<time()-60)){
		mysql_query($sql);
	}
}