<?php
/*系统设置修改*/
header('Content-type: text/html; charset=utf-8');
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$mingzi = isset ( $_POST ['mingzi'] ) ? $_POST ['mingzi'] : null;


if($mingzi!=''){
	
	
	$sql = "select * from ".$lc."_zijian where name='$mingzi'";
	$rs = mysql_query($sql);
	$num = mysql_num_rows($rs);
			if($num <> 0){
			 
				 echo "no";
				   
			  }else{
					   
	$sqll = "insert into ".lc()."_zijian (name) values ('".$_POST['mingzi']."')";
	$rss = mysql_query($sqll);
	
	if($rss){
		echo "yes";
	        }
					   
		}

}
		



?>
