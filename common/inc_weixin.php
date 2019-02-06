<?php
/************************************************
 功能：关注时的回复
 *************************************************/
function get_reply_gz_text(){
	$sql = "select * from ".lc()."_wxreply where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$con = $rows['lc_content'];
	}else{
		$con = "";
	}
	return $con;
}

/************************************************
 功能：判断关注时的默认回复
 *************************************************/
function get_reply_gz_default(){
	$sql = "select * from ".lc()."_wxreply where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$con = $rows['lc_isdefault'];
	}else{
		$con = "";
	}
	return $con;
}

function get_reply_gz_s_title(){
	$sql = "select * from ".lc()."_wxsreply where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$title = $rows['lc_title'];
	}else{
		$title = "";
	}
	return $title;
}
function get_reply_gz_s_con(){
	$sql = "select * from ".lc()."_wxsreply where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$con = $rows['lc_content'];
	}else{
		$con = "";
	}
	return $con;
}
function get_reply_gz_s_pic(){
	$sql = "select * from ".lc()."_wxsreply where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$pic = $rowsnews['lc_pic'];
	}else{
		$pic = "";
	}
	return $pic;
}
function get_reply_gz_s_url(){
	$sql = "select * from ".lc()."_wxsreply where lc_id=1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$url = $rowsnews['lc_url'];
	}else{
		$url = "";
	}
	return $url;
}

/*************************************************
 功能：获取某大类别的所有子类别
 参数：$c_id：当前类别的编号
 *************************************************/
function get_wxdiymenu_all_child_id($c_id){
	$sql = "select c_id from ".lc()."_wxdiymenu where c_pid={$c_id}";
	$rs = mysql_query($sql);
	$str = "";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str = $str.$rows["c_id"].",";
			$str = $str.get_wxdiymenu_all_child_id($rows["c_id"]);
		}
	}
	return $str;
}

/*************************************************
 功能：获取微信菜单
 *************************************************/
function diymenu(){
	    $sql = "select * from ".lc()."_wxdiymenu where c_pid=0";
		$rs = mysql_query($sql);
		$str="";
		$i=0;
		if($rs){
		   $str.="{\"button\": [";
		   while($rows = mysql_fetch_assoc($rs)){
		   $i++;
		    $str.="{
            \"name\": \"".$rows['c_title']."\", 
            \"sub_button\": [";
               
			     $str.="".diymenuerji($rows['c_id']).""; 
			  
           $str.="]}";
		   if($i<mysql_num_rows($rs)){
		   $str.=","; 
           }
		
		}
		 $str.="]}";	 
	}
	return $str;
}
function diymenuerji($c_pid){
	    $sql = "select * from ".lc()."_wxdiymenu where c_pid={$c_pid}";
		$rs = mysql_query($sql);
		$i=0;
		$str="";
		if($rs){
		   while($rows = mysql_fetch_assoc($rs)){
		   $i++;
		    if($rows['c_type']==0){
				$str.="
                {
                    \"type\": \"click\", 
                    \"name\": \"".$rows['c_title']."\", 
                    \"key\": \"".$rows['c_key']."\"
                }";
				if($i<mysql_num_rows($rs)){
				   $str.=","; 
				}  
				}else{
			$str.="
                {
                    \"type\": \"view\", 
                    \"name\": \"".$rows['c_title']."\", 
                    \"url\": \"".$rows['c_url']."\"
                }";
				if($i<mysql_num_rows($rs)){
				   $str.=","; 
				}  
                
				}
		}	 
	}
	return $str;
}

/*************************************************
 功能：获取微信菜单自定义回复点击事件
 *************************************************/
function EventKey($EventKey){
	    $sql = "select * from ".lc()."_wxdiymenu where 1=1 and c_type=0";
		$rs = mysql_query($sql);
		$str="";
		if($rs){
			while($rows = mysql_fetch_assoc($rs)){
				$str.="if(".$EventKey."==".$rows["c_key"]."){";
				$str.='$contentStr = "'.$rows['c_content'].'";'; 
				$str.='$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, "text", $contentStr);';
				$str.="}";
			}
		    
		}
	return $str; 
}

function reply_key(){
	    $sql = "select * from ".lc()."_wxreplykey where 1=1";
		$rs = mysql_query($sql);
		$str="";
		if($rs){
		    while($rows = mysql_fetch_assoc($rs)){
				$str.='if(trim($keyword)=="'.$rows['lc_key'].'" || strpos($keyword,"'.$rows['lc_key'].'")>0){';
				$str.='$contentStr = "'.$rows['lc_content'].'";';
				$str.='$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, "text", $contentStr);';
				$str.='}';
		   	}
		}
		return $str;
}

function makeNews($newsData=array(),$fromUsername,$toUsername){        
		$CreateTime = time();        
		$newTplHeader = "<xml>            
		<ToUserName><![CDATA[".$fromUsername."]]></ToUserName>            
		<FromUserName><![CDATA[".$toUsername."]]></FromUserName>            
		<CreateTime>{$CreateTime}</CreateTime>            
		<MsgType><![CDATA[news]]></MsgType>           
		 <ArticleCount>%s</ArticleCount><Articles>";        
		 $newTplItem = "<item>            
		 <Title><![CDATA[%s]]></Title>            
		 <Description><![CDATA[%s]]></Description>            
		 <PicUrl><![CDATA[%s]]></PicUrl>            
		 <Url><![CDATA[%s]]></Url>            
		 </item>";        
		 $newTplFoot = "</Articles>            
		 <FuncFlag>0</FuncFlag>            
		 </xml>";        
		 $Content = '';        
		 $itemsCount = count($newsData);
		        
		 $itemsCount = $itemsCount < 10 ? $itemsCount : 10;
		 //微信公众平台图文回复的消息一次最多10条 
		 if ($itemsCount) {            
			 foreach ($newsData as $key => $item) {                
				 if ($key<=9) {                   
				  $Content .= sprintf($newTplItem,$item['Title'],$item['Description'],$item['PicUrl'],$item['Url']);               
				   }           
			 }       
		  }        
		  $header = sprintf($newTplHeader,$itemsCount);        
		  $footer = sprintf($newTplFoot); 
		  $abvs= $header.$Content.$footer;      
		  return $abvs;    
}
                 

?>