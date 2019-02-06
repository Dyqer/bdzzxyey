<?php
/*帐号 修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$action = isset ( $_POST ['action'] ) ? $_POST ['action'] : null;

$text='';
$num = 100;
if($action == 'scan'){
	
	$sql = "select * from ".lc()."_zijian";
	$rs = mysql_query($sql);
	if($rs){
	while($rows=mysql_fetch_assoc($rs)){	

	$sqll = "select * from ".lc()."_danye where  and  lc_title like '%{$rows['name']}%' or lc_content like '%{$rows['name']}%' or lc_keywords like '%{$rows['name']}%' or  lc_description like '%{$rows['name']}%' lc_del=0 ";
	$rss = mysql_query($sqll);
	
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){

		$text.="单页栏目&nbsp;中标题为【".$rowss['lc_title']."】的文章中含有不正确词语&nbsp;【".$rows['name']."】&nbsp;&nbsp;<a href='../index.php?p=about&id=".$rowss['lc_id']."&jiance=".$rows['name']."' target='_blank' style='color:red'>【查看】</a><br/>";
        $num -=1;
		
		
		  }
		 }
	$sqll = "select * from ".lc()."_danye where   lc_phone_content like '%{$rows['name']}%' and lc_del=0 ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
		
		$text.="TOUCH单页栏目&nbsp;中标题为【".$rowss['lc_title']."】的文章中含有不正确词语&nbsp;【".$rows['name']."】&nbsp;&nbsp;<a href='../3g/index.php?p=about&lanmu=".$rowss['lanmu']."&id=".$rowss['lc_id']."&jiance=".$rows['name']."' target='_blank' style='color:red'>【查看】</a><br/>";
        $num -=1;
		  }
		 }	 
        
	
	$sqll = "select * from ".lc()."_news where  lc_title like '%{$rows['name']}%' or lc_content like '%{$rows['name']}%' or lc_phone_content like '%{$rows['name']}%' or lc_keywords like '%{$rows['name']}%' or  lc_description like '%{$rows['name']}%' or lc_jianjie like '%{$rows['name']}%' or  lc_key like '%{$rows['name']}%' and lc_del=0 ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
	$sqlll = "select * from ".lc()."_news_type where c_id='{$rowss['c_id']}' ";
	$lanmu = mysql_query($sqlll);	
	while($rowsss=mysql_fetch_assoc($lanmu)){
		$text.="新闻栏目&nbsp;中标题为【".$rowss['lc_title']."】的文章中含有不正确词语&nbsp;【".$rows['name']."】&nbsp;&nbsp;<a href='../index.php?p=news_show&lanmu=".$rowsss['lanmu']."&id=".$rowss['lc_id']."&jiance=".$rows['name']."' target='_blank' style='color:red'>【查看】</a><br/>";
	}
        $num -=1;
		  }
		 }
     	
	$sqll = "select * from ".lc()."_news where  lc_phone_content like '%{$rows['name']}%' and lc_del=0 ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
    $sqlll = "select * from ".lc()."_news_type where c_id='{$rowss['c_id']}' ";
	$lanmu = mysql_query($sqlll);
	while($rowsss=mysql_fetch_assoc($lanmu)){
		
		$text.="TOUCH新闻栏目&nbsp;中标题为【".$rowss['lc_title']."】的文章中含有不正确词语&nbsp;【".$rows['name']."】&nbsp;&nbsp;<a href='../3g/index.php?p=news_show&lanmu=".$rowsss['lanmu']."&id=".$rowss['lc_id']."&jiance=".$rows['name']."' target='_blank' style='color:red'>【查看】</a><br/>";
		 }
        $num -=1;
		 
		  }
		 }	
		

	$sqll = "select * from ".lc()."_news_type where  c_title like '%{$rows['name']}%' or c_content like '%{$rows['name']}%' ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
		
		$text.="新闻类别&nbsp;【".$rowss['c_title']."】&nbsp;中类别名称中含有不正确信息<br/>";
        $num -=1;
		  }
		 }
          
	
	$sqll = "select * from ".lc()."_products where  lc_title like '%{$rows['name']}%' or lc_content like '%{$rows['name']}%' or lc_keywords like '%{$rows['name']}%' or  lc_description like '%{$rows['name']}%' or lc_jianjie like '%{$rows['name']}%' or  lc_key like '%{$rows['name']}%' and lc_del=0 ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
	$sqlll = "select * from ".lc()."_products_type where c_id='{$rowss['c_id']}' ";
	$lanmu = mysql_query($sqlll);
	while($rowsss=mysql_fetch_assoc($lanmu)){	
		
		$text.="图片栏目&nbsp;中标题为【".$rowss['lc_title']."】的文章中含有不正确词语&nbsp;【".$rows['name']."】&nbsp;&nbsp;<a href='../index.php?p=products_show&lanmu=".$rowsss['lanmu']."&id=".$rowss['lc_id']."&jiance=".$rows['name']."' target='_blank' style='color:red'>【查看】</a><br/>";
	}
        $num -=1;
		  }
		 }
		 
		 
	
	$sqll = "select * from ".lc()."_products where lc_phone_content like '%{$rows['name']}%' and lc_del=0 ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
	$sqlll = "select * from ".lc()."_products_type where c_id='{$rowss['c_id']}' ";
	$lanmu = mysql_query($sqlll);
	while($rowsss=mysql_fetch_assoc($lanmu)){		
		$text.="TOUCH图片栏目&nbsp;中标题为【".$rowss['lc_title']."】的文章中含有不正确词语&nbsp;【".$rows['name']."】&nbsp;&nbsp;<a href='../3g/index.php?p=products_show&lanmu=".$rowsss['lanmu']."&id=".$rowss['lc_id']."&jiance=".$rows['name']."' target='_blank' style='color:red'>【查看】</a><br/>";
	}
        $num -=1;
		  }
		 }	 
     	
	
	$sqll = "select * from ".lc()."_products_type where  c_title like '%{$rows['name']}%' or c_content like '%{$rows['name']}%' ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
		
		$text.="图片类别&nbsp;【".$rowss['c_title']."】&nbsp;中类别名称中含有不正确信息<br/>";
        $num -=1;
		  }
		 }
        	 	  
		  
	
	$sqll = "select * from ".lc()."_touch where logo_name like '%{$rows['name']}%' or touch_name like '%{$rows['name']}%' or touch_keywords like '%{$rows['name']}%' or touch_description like '%{$rows['name']}%' or touch_footer like '%{$rows['name']}%' or touch_tel like '%{$rows['name']}%'   or touch_duanxin like '%{$rows['name']}%'  or touch_companyinfo like '%{$rows['name']}%'   or touch_lng like '%{$rows['name']}%'   or touch_lat like '%{$rows['name']}%' or touch_mapdizhi like '%{$rows['name']}%' ";
	//echo $sqll;
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
		$text.="手机设置&nbsp;中含有不正确信息【".$rows['name']."】&nbsp;&nbsp;<a href='list.php?C=touchconfig' style=' color:red;'>【查看】</a><br/>";
          $num -=1;
		  }
		 }
		 
	$sqll = "select * from ".lc()."_touch where touch_footer like '%{$rows['name']}%' ";
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
		$text.="手机设置底部信息&nbsp;中含有不正确信息【".$rows['name']."】&nbsp;&nbsp;<a href='list.php?C=touch_bot' style=' color:red;'>【查看】</a><br/>";
          $num -=1;
		  }
		 }	 
		
   	$sqll = "select * from ".lc()."_touch where   touch_companyinfo like '%{$rows['name']}%' ";
	//echo $sqll;
	$rss = mysql_query($sqll);
	if($rss){
    while($rowss=mysql_fetch_assoc($rss)){
	$text.="手机设置公司简介&nbsp;中含有不正确信息【".$rows['name']."】&nbsp;&nbsp;<a href='list.php?C=touch_introduction' style=' color:red;'>【查看】</a><br/>";
          $num -=1;
		  }
		 }
     	  
		  
		  }
		  
		  //echo $text;
		  
	$res = array ();
	$res ['text'] = $text;
	$res ['num'] =  $num ;
	echo json_encode ( $res );
		  
		
		}
		
}
		

