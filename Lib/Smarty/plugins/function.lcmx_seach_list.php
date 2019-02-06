<?php
function smarty_function_lcmx_seach_list($params, &$smarty){
	global $db;
	$arr=explode(',',$params['set']);
	foreach($arr as $str){
		$a=explode(':',$str);
		switch ($a[0]){
			case "显示数目":
				$aset['row'] = $a[1];
				break;
			case "标题长度":
				$aset['titlelen'] = $a[1];
				break;
		}
	}
	$aset=array_map("get_smarty_request",$aset);
	$aset['row']=isset($aset['row'])?intval($aset['row']):10;
	$aset['titlelen']=isset($aset['titlelen'])?intval($aset['titlelen']):15;
	unset($arr,$str,$a,$params);//销毁局部变量
	
	/*搜索*/
	$key = isset($_GET['key'])?$_GET['key']:null;//获取搜索值
	if(!$key){
		$key = isset($_POST['key'])?$_POST['key']:null;//获取搜索值(如果获取get请求为空，则获取post请求)
	}
	if($key!=''){
		$wheresql=" where lc_title like '%{$key}%' or lc_jianjie like '%{$key}%'";
	}else{
		echo "搜索值不能为空！";
		return ;
	}
	$wheresql.=' and lc_del=0 and lc_zt=1 ';
	
	$limit=" limit ".abs($aset['start']).','.$aset['row'];
	/*新闻查询*/
	$result = $db->query("select * from ".lc()."_news ".$wheresql.$limit);
	$news_list= array();
	while($row = $db->fetch_array($result)){
		$row['id'] = $row['lc_id'];//获取编号
		$row['title_'] = $row['lc_title'];//获取完整的标题
		$row['title'] = mb_substr($row['lc_title'],0,$aset['titlelen'],"utf-8");//根据标题长度获取标题
		$row['pic'] = str_replace("../","",$row['lc_pic']);//获取图文的图片地址
		$row['addtime'] = date('Y-m-d',strtotime($row['lc_datetime']));//获取添加时间
		$row['content'] = str_replace('&nbsp;','',$row['lc_content']);//获取内容
		$row['briefly_'] = strip_tags($row['lc_content']);//获取过滤html标签的内容
		
		$news_list[] = $row;
	}
	/*新闻查询End*/
	
	/*图文查询*/
	$pro_result = $db->query("select * from ".lc()."_products ".$wheresql.$limit);
	$pro_list= array();
	while($pro_row = $db->fetch_array($pro_result)){
		$pro_row['id'] = $pro_row['lc_id'];//获取编号
		$pro_row['title'] = mb_substr($pro_row['lc_title'],0,$aset['titlelen'],"utf-8");//根据标题长度获取标题
		
		$pro_row['pic']=str_replace("../","",get_products_pic_by_proid($pro_row['lc_id']));//获取图文的原图片地址
		$pro_row['big_pic']=str_replace("../","",get_thumb_pic("../",get_products_pic_by_proid($pro_row['lc_id']),big));//获取pc图文的大图片地址
		$pro_row['small_pic']=str_replace("../","",get_thumb_pic("../",get_products_pic_by_proid($pro_row['lc_id']),small));//获取pc图文的小图片地址
		
		$pro_row['addtime'] = date('Y-m-d',strtotime($pro_row['lc_datetime']));//获取添加时间
		$pro_row['content'] = str_replace('&nbsp;','',$pro_row['lc_content']);//获取内容
		$pro_row['briefly_'] = strip_tags($pro_row['lc_content']);//获取过滤html标签的内容
		
		$pro_list[] = $pro_row;
	}
	/*图文查询End*/
	
	$smarty->assign(news_list,$news_list);//文章搜索结果集
	$smarty->assign(pro_list,$pro_list);//图文搜索结果集
}
?>