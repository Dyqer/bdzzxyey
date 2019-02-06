<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
//SetSysEvent('main');//添加日志功能
function qiehuan_link($type,$lanmu){
	$link="";
	if($type=="0"){
		if(check_quanxian('danye')){
			$link="href=\"list.php?C=danye_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	if($type=="1"){
		if(check_quanxian('news')){
			$link="href=\"list.php?C=news_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	if($type=="2"){
		if(check_quanxian('products')){
			$link="href=\"list.php?C=products_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	if($type=="3"){
		if(check_quanxian('down')){
			$link="href=\"list.php?C=down_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	if($type=="4"){
		if(check_quanxian('job')){
			$link="href=\"list.php?C=jianli_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	if($type=="5"){
		if(check_quanxian('gbook')){
			$link="href=\"list.php?C=gbook_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	return $link;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<?php require('link_file.php')?>
<title><?php echo constant("web_name")?> - 后台管理系统</title>
<script type="text/javascript">
function ShowDate(){
	var date = new Date(),
		sWeek = new Array("日","一","二","三","四","五","六"),
		month = date.getMonth()+1,
		day = date.getDate(),
		hours = date.getHours(),
		minutes = date.getMinutes(),
		time = null,
		date_str = null;
	minutes = (minutes < 10) ? '0'+minutes : minutes;
	time = hours+"<samp id='d_point'>:</samp>"+minutes;
	date_str = "<span>"+time+"</span>&nbsp;星期"+sWeek[date.getDay()]+"&nbsp;&nbsp;"+month+" - "+day;
	return date_str;
	}
window.onload= function(){
	var dateObj = document.getElementById('main_datetime');
	if(!!dateObj){
		dateObj.innerHTML = ShowDate();
		setInterval(function(){
			dateObj.innerHTML = ShowDate();
		},1000)
		}
	}
</script>
</head>
<body>
<?php require('head.php');?>
<div class="main">
  <?php require('left.php');?>
  <div class="mx_right" id="mx_right">
    <div class="main_c">
      <div class="mx_right_top">
        <div class="main_top">
          <div class="main_top_c">
            <p class="main_top_t">MX营销平台</p>
            <p class="main_top_ab">Dragon Mining Technology Group official backstage MX Pro</p>
          </div>
          <div class="main_datetime" id="main_datetime"><span></span></div>
          <div class="clearR"></div>
        </div>
      </div>
      <div class="mx_right_con main_top">
        <div class="main_con">
          <div class="metro">
          	<ul>
          <?php
          $icon = array(1=>'&#xe923;',2=>'&#xe904;',3=>'&#xe94b;',4=>'&#xe9c1;',5=>'&#xe923;',6=>'&#xe923;',7=>'&#xe926;',8=>'&#xe933;',9=>'&#xe948;',
          		10=>'&#xe99e;',11=>'&#xe96b;',12=>'&#xe973;',13=>'&#xe905;',14=>'&#xe971;',15=>'&#xe9b2;',16=>'&#xe9a9;');
          $sql="select * from ".lc()."_lanmu where c_zt=1 order by c_sort_id desc";
          $rs = mysql_query($sql);
          if($rs){
          	$k=1;
          	while($rows = mysql_fetch_assoc($rs)){
          		?><li class="li_<?php echo $k?>"><a <?php echo qiehuan_link($rows["c_type"],$rows["c_id"])?>><p class="mxicon"><?php echo $icon[$k]?></p><?php echo mb_substr($rows["c_title"],0,4,"utf-8")?></a></li><?php
          		$k++;
          	}
          }?>
               <div class="clearR"></div>
            </ul>
          </div>
        </div>
      </div>
      <div class="mx_right_foot"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<?php require('foot.php');?>
</body>
</html>