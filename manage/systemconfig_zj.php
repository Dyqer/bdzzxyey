<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能
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
	margin: 0 auto; margin-top:40px; text-align:center;
}
#res_list { font-size:14px; line-height:20px;
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
#scan_bg{ width:306px; height:306px; border-radius:153px; position:relative; margin:0 auto; margin-top:50px; background:url(resource/images/scan_bg1.png) no-repeat}
#scan_bg span {width:300px; height:62px; display:inline-block; margin-top:80px; color:#1fd5ff; font-size:70px; text-align:center}
</style>
<script type="text/javascript">
var alldata = "1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100" //抽奖数据，以逗号分隔 
var alldataarr = alldata.split(",") 
var num = alldataarr.length-1 
var timer 
function change(){ document.getElementById("num").innerHTML = alldataarr[GetRnd(0,num)]; 
} 
function start(){ 
clearInterval(timer); 
timer = setInterval('change()',10); //随机数据变换速度，越小变换的越快 
} 
function ok(){ 
clearInterval(timer); 
} 
function GetRnd(min,max){ 
return parseInt(Math.random()*(max-min+1)); 
}


var scan_t = null,
	startTime = 0,
	endTime =0,
	list = null;
function star_scan(){
	start()
	document.getElementById('scan').className='scanning';
	startTime = new Date().getTime();
	scanning();
	}
function scanning(){
	clearTimeout(scan_t);
	scan_t = setTimeout(function(){
		$("#scan").addClass('scanstop');
		$("#web_ru_tip").show();
		
		$.post("action/inspection_ajax.php",{action:'scan'},function(data){
		if(data){
			ok()
			//$('#list_num').text(data.num);
			
			endTime = new Date().getTime();
			if(endTime - startTime>5000){
				clearTimeout(scan_t);
				$("#scan").addClass('scanstop');
				$("#web_ru_tip").show();
				}
			
			$('#num').text(data.num);
			$("#res_list").html(data.text);
		}else{
			mx_msg("请求超时，请稍候重试！");
		}
	},"json")
	},5000);
	
	}

function show_de(){
	$('#res_list').show();
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <?php require('systemconfig_top.php')?>
      </ul>
    </div>
  </div>
  
  
  <div class="mx_right_con" style="margin-top:20px">
    <div class="main_con">
      
      <div class="mx_right_con">
    <div class="main_con">
      <div id="scan_bg">
        <div id="scan"></div>
        <span id="num">100</span>
      </div>
      <div class="scan_op"><a onClick="star_scan()" id="star_scan" class="scan_b">开始扫描<img src="resource/images/scan_bicon1.jpg" width="32"/></a> </div>
      <div id="web_ru_tip_bgline">
        <div id="web_ru_tip">网站中检测结果，<span onClick="show_de()">查看详细</span></div>
      </div>
      <div id="res_list"></div>
    </div>
  </div>
      
   
      
      
    </div>
  </div>
</div>





