<?php
/**************************************************
 功能：获取banner并展示效果
 参数：$cid：类别$num：调用数量$width：宽度$height：高度$fontheight：字体高度$effect:展示效果
 '**************************************************/
function get_banner($num,$cid,$width,$height,$fontheight,$effect){
	$sql = "select * from ".lc()."_banner where lc_zt=1 and lc_type=1 ";
	if($cid<>0){
		$sql.=" and c_id ='{$cid}'";
	}
	$sql.=" order by lc_sort_id desc limit 0,{$num}";
	$rs = mysql_query($sql);
	$pics="";
	$links="";
	$texts="";
	$str="";
	if($rs && mysql_num_rows($rs)>0){
		switch ($effect){
			case 1:
				$str.="<style type='text/css'>.banner{$cid}{width:{$width}px;height:{$height}px;position:relative;vertical-align:middle;margin:0 auto;overflow:hidden}.slider{$cid}{width:{$width}px;height:{$height}px;position:absolute;left:0px}.slider{$cid} img{width:{$width}px;height:{$height}px;display:block;float:left}
.uu{$cid}{position:absolute;bottom:0;width:{$width}px;height:{$fontheight}px;background:#000;filter:alpha(opacity=45);opacity:0.45;text-align:right}
.uu{$cid} span{width:20px;height:{$fontheight}px;line-height:{$fontheight}px;color:#000;background:#666;margin-right:1px;display:inline-block;text-align:center;cursor:pointer;}.titel{$cid}{background:#FFF !important;}</style>";
				$str.="<script>
$(function(){
     var len=$(\".slider{$cid}>li\").length;
	 var img_w=$(\".slider{$cid}>li>img\").width();
	 var index=0;
	 var repeat=null;
	 var auto=function(){
		 moveimg(index);
		 index++;
		 if(index==len){index=0}
		 }
	 $(\".banner{$cid}>ul\").css(\"width\",len*img_w+\"px\")
	 $(\"<div class='uu{$cid}'></div>\").appendTo(\".banner{$cid}\");
	 for(i=1;i<=len;i++){
		 $(\".uu{$cid}\").append($(\"<span>\"+i+\"</span>\"))
	 }
	$(\".uu{$cid} span\").hover(function(){
		moveimg($(this).index());
		clearInterval(repeat);
		},function(){
			repeat=setInterval(auto,3000);
			})
	function moveimg(index){
		$('.uu{$cid} span').eq(index).addClass('titel{$cid}').siblings().removeClass('titel{$cid}')
		$(\".slider{$cid}\").stop(true).animate({'left':-img_w*index},500)
	}
	repeat=setInterval(auto,3000);
	})
</script>";
				$str.="<div class=\"banner{$cid}\"><ul class=\"slider{$cid}\">";
				while($rows = mysql_fetch_assoc($rs)){
					$pic_url=str_replace("../","",$rows['lc_pic']);
					$link = "";//地址跳转代码
					if($rows['lc_url']){
						$link = " onClick=\"location.href='{$rows['lc_url']}'\" ";
					}
					$str.="<li><img src=\"{$pic_url}\" {$link}/></li>";
				}
				$str.="</ul></div>";
				break;
			case 2:
				while($rows_list=mysql_fetch_assoc($rs)){
					$pic_url=str_replace("../","",$rows_list['lc_pic']);
					if($i==0){
						$pics =$pic_url;
						$links =$rows_list['lc_url'];
						$texts =$rows_list['lc_title'];
					}else{
						$pics.="|".$pic_url;
						$links.="|".$rows_list['lc_url'];
						$texts.="|".$rows_list['lc_title'];
					}
					$i++;
				}
				$str.="<script type=\"text/javascript\">";
				$str.="var focus_width={$width};";
				$str.="var focus_height={$height};";
				$str.="var text_height={$fontheight};";
				$str.="var swf_height = focus_height+text_height;";
				$str.="var pics='".$pics."';";
				$str.="var links='".$links."';";
				$str.="var texts='".$texts."';";
				$str.="document.write('<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\" align=\"left\"  hspace=\"0\">');document.write('<param name=\"allowScriptAccess\" value=\"sameDomain\"><param name=\"movie\" value=\"resource/media/pixviewer.swf\"><param name=\"quality\" value=\"high\"><param name=\"bgcolor\" value=\"#F0F0F0\">');document.write('<param name=\"menu\" value=\"false\"><param name=wmode value=\"opaque\">');document.write('<param name=\"FlashVars\" value=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\">');document.write('<embed src=\"resource/media/pixviewer.swf\" wmode=\"opaque\" FlashVars=\"pics='+pics+'&links='+links+'&texts='+texts+'&borderwidth='+focus_width+'&borderheight='+focus_height+'&textheight='+text_height+'\" menu=\"false\" bgcolor=\"#F0F0F0\" quality=\"high\" width=\"'+ focus_width +'\" height=\"'+ swf_height +'\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />');document.write('</object>');";
				$str.="</script>";
				break;
			default:
				$str.="<div class=\"banner\"><ul class=\"slider\">";
				while($rows = mysql_fetch_assoc($rs)){
					$pic_url=str_replace("../","",$rows['lc_pic']);
					$str.="<li><img src=\"".$pic_url."\"/></li>";
				}
				$str.="</ul></div>";
		}
	}
	return $str;
}
/**************************************************
 功能：获取广告图并展示效果
 参数：$c_id分类id
 '**************************************************/
function get_advert($c_id){
	$str="";
	$sql = "select * from ".lc()."_banner where where lc_zt=1 and lc_type=2 ";
	if($c_id<>0){
		$sql.=" and c_id ='{$c_id}'";
	}
	$sql.=" order by lc_sort_id desc limit 1";
	$rs = mysql_query($sql);
	if($rs){
		$rows = mysql_fetch_assoc($rs);
		$str='<img src="'.str_replace("../","",$rows['lc_pic']).'">';
	}
	return $str;
}