<?php
/*全部删除处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

$action = isset($_POST['action'])?$_POST['action']:null;

$id = isset($_POST['id'])?$_POST['id']:0;//栏目编号id(数组)

if($action){
	for($i=0;$i<count($id);$i++){
		if($i==0){
			$id_str = $id[$i];
		}else{
			$id_str = $id_str.','.$id[$i];
		}
	}
			/*放入回收站*/
			$sql="delete ".$lc."_zijian where id in (".$id_str.")";
			$rs = mysql_query($sql);
			if($rs){
				mx_msg('放入回收站成功！','../list.php?C=add_ziduan&nav=8');
			}else{
				mx_msg('放入回收站失败！',1);
			}
		
		/*友情链接 End*/
	}else{
		mx_msg("请求参数有误！",1);
	}

?>