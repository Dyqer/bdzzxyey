<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('danye');//单页管理权限验证
SetSysEvent('scan_rubbish');//添加日志功能
?>
<style type="text/css">
#scan {
	width:286px; height:287px; background:url(resource/images/scan_icon.png) no-repeat; position:absolute; left:0; top:0
}
.scanning {
	animation: rotate 2s linear infinite;
	-webkit-animation: rotate 2s linear infinite
}
.scanstop {
	animation-play-state: paused;
	-webkit-animation-play-state: paused
}
@-webkit-keyframes rotate {
from {
-webkit-transform:rotate(0deg);
transform:rotate(0deg)
}
to {
-webkit-transform:rotate(360deg);
transform:rotate(360deg)
}
}
@keyframes rotate {
from {
-moz-transform:rotate(0deg);
-webkit-transform:rotate(0deg);
-ms-transform:rotate(0deg);
transform:rotate(0deg)
}
to {
-moz-transform:rotate(360deg);
-webkit-transform:rotate(360deg);
-ms-transform:rotate(360deg);
transform:rotate(360deg)
}
}
.scan_b {
	color: #2197ff;
	width: 150px;
	height: 40px;
	line-height: 40px;
	display: inline-block;
	text-align: center;
	font-size:28px
}
.scan_b img{vertical-align:middle}
#star_scan {
	color:#1fceff; margin-right:40px
}
.scan_op {
	width:350px;
	margin: 0 auto; margin-top:40px
}
#res_list {
	padding:20px;
	display: none
}
#res_list p{ line-height:25px; width:60%}
#res_list p span{ float:right}
#web_ru_tip_bgline {
	border-bottom: #e9e9e9 solid 2px;
	position: relative;
	margin: 40px 1% 0 1%
}
#web_ru_tip {
	width: 300px;
	background: #FFF;
	text-align: center;
	color: #585858;
	font-size: 1em;
	position: absolute;
	top: -8px;
	left: 50%;
	margin-left: -150px; display:none
}
#web_ru_tip span {
	color: #ff6600;
	font-size: 0.875em;
	cursor: pointer
}
#scan_bg{ width:306px; height:306px; border-radius:153px; position:relative; margin:0 auto; margin-top:50px; background:url(resource/images/scan_bg.png) no-repeat}
#scan_bg span {width:300px; height:62px; display:inline-block; margin-top:80px; color:#1fd5ff; font-size:70px; text-align:center}
</style>
<script type="text/javascript">
var scan_t = null,
	startTime = 0,
	endTime =0,
	list = null;
function star_scan(){
	document.getElementById('scan').className='scanning';
	startTime = new Date().getTime();
	scanning();
	}
function scanning(){
	clearTimeout(scan_t);
	scan_t = setTimeout(function(){
		$("#scan").addClass('scanstop');
		$("#web_ru_tip").show();
	},5000);
	$.post("action/check_rubbish_action.php",{action:'scan'},function(data){
		if(data){
			$('#list_num').text(data.num);
			endTime = new Date().getTime();
			if(endTime - startTime>5000){
				clearTimeout(scan_t);
				$("#scan").addClass('scanstop');
				$("#web_ru_tip").show();
				}
			list = data.list,
			str = '';
			for(i=0;i<list.length;i++){
				str+="<p>图片名称："+list[i].name+'<span data-url="'+list[i].url+'">图片路径：'+list[i].url+'</span></p>'
				}
			$("#res_list").html(str);
		}else{
			mx_msg("请求超时，请稍候重试！");
		}
	},"json")
	}
function star_clear(){
	list = list==''?get_list():list;
	if(list==''){
		return
		}
	var files = '';
	for(i=0;i<list.length;i++){
		files+=list[i].url+",";
		}
	$.post("action/check_rubbish_action.php",{action:'clear',files:files},function(data){
		if(data){
			if(data=='yes'){
				mx_msg("恭喜您！清理完毕！");
				}else{
					mx_msg("亲，清理失败！");
					}
			}else{
				mx_msg("亲，请求超时，请稍候重试！");
				}
		})
	}
function get_list(){
	//获取要删除的文件
	return $("#res_list>span").attr("data-url");
	}
function show_de(){
	$('#res_list').show();
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="release">垃圾清理</a></li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
      <div id="scan_bg">
        <div id="scan"></div>
        <span>100%</span>
      </div>
      <div class="scan_op"><a onClick="star_scan()" id="star_scan" class="scan_b">开始扫描<img src="resource/images/scan_bicon1.jpg" width="32"/></a> <a onClick="star_clear()" class="scan_b">清理垃圾<img src="resource/images/scan_bicon2.jpg" width="33"/></a></div>
      <div id="web_ru_tip_bgline">
        <div id="web_ru_tip">网站中的垃圾文件 共<em id="list_num"></em>个，<span onClick="show_de()">查看详细</span></div>
      </div>
      <div id="res_list"></div>
    </div>
  </div>
</div>
