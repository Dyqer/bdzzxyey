<?php
function smarty_function_lcmx_danye_show($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0])
		{
			case "编号":
				$aset['id'] = $a[1];
				break;
			case "列表名":
				$aset['listname'] = $a[1];
				break;
			case "栏目":
				$aset['lanmu'] = $a[1];
				break;
			case "点击量":
				$aset['dianjiliang'] = $a[1];
				break;
		}
	}
	if(is_array($aset)){$aset=array_map("get_smarty_request",$aset);}
	$aset['id']=$aset['id']?intval($aset['id']):0;
	$aset['lanmu']=$aset['lanmu']?intval($aset['lanmu']):0;
	$aset['listname']=$aset['listname']?$aset['listname']:"list";
	unset($arr,$str,$a,$params);//销毁局部变量
	
	$sql = "select * from ".lc()."_danye WHERE lc_del=0 and lc_zt=1 ";
	if($aset['lanmu']<>0){
		$sql.= " and lanmu='{$aset['lanmu']}'";
	}
	if($aset['id']==0){
		$sql.= " order by lc_sort_id desc LIMIT 1";
	}else{
		$sql.= " and lc_id='{$aset['id']}'";
	}
	$val = $db->getone($sql);
	if (empty($val)){
		return ;
	}

	$val['keywords']=$val['lc_keywords'];//关键词
	$val['description']=$val['lc_description'];//描述
	$val['lanmuname']=get_lanmu_name(get_danye_lanmu_by_lc_id($val['lc_id']));//获取所属栏目
	$val['jianjie']=mb_substr(strip_tags($val['lc_content']),0,60,'utf-8');//获取内容的截取
	$val['con']=str_replace("../","",$val['lc_content']);//获取内容（如果有远程图片，需过滤“../”）
	$val['pic']=str_replace("../","",$val['lc_pic']);//获取内容（如果有远程图片，需过滤“../”）
	//单页分页（KindEditor分页符 分页）
	$page = isset($_GET["page"])?(int)$_GET["page"]:1;//获取分页参数
	
	$con=str_replace("<hr style=\"page-break-after:always;\" class=\"ke-pagebreak\" />","[--page--]",$val['con']);
	$arr=explode("[--page--]",$con);
	$count=count($arr);
	if($count>1){
		$page_con="<div class=\"contPage\"><a href=\"?p=about&id={$val['lc_id']}&lanmu={$aset['lanmu']}\">&lt;&lt;</a>";
		for($i=1;$i<=$count;$i++){
			if($i==$page){
				$page_con.="<a href=\"javascript:void(0)\">{$i}</a>";//当前页
			}else{
				$page_con.="<a href=\"?p=about&id={$val['lc_id']}&lanmu={$aset['lanmu']}&page={$i}\">{$i}</a>";
			}
		}
		$page_con.="<a href=\"?p=about&id={$val['lc_id']}&lanmu={$aset['lanmu']}&page={$count}\">&gt;&gt;</a><div class=\"clear\"></div></div>";
		$val['con']=$arr[$page-1].$page_con;
	}
	/*判断是否记录点击量*/
	if($aset['dianjiliang']==1){
		$val['dianjiliang']=show_dianjiliang($val['lc_id'],"danye","show");//获取点击量
	}
	/*判断是否记录点击量End*/

	$smarty->assign($aset['listname'],$val);
}
?>