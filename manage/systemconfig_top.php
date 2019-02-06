<?php
$nav = isset($_GET['nav'])?(int)$_GET['nav']:1;//默认选中系统设置
?>
<style type="text/css">
.input {
	width: 300px;
	padding-left: 2px;
	height: 31px;
	line-height: 31px
}
</style>
<div class="fu_right_top">
	<li><a <?php if($nav==1){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >系统设置</a></li>
    <li><a <?php if($nav==2){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >账号管理</a></li>
    <li><a <?php if($nav==3){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >修改密码</a></li>
    <li><a <?php if($nav==4){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >邮件管理</a></li>
    <li><a <?php if($nav==5){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >短信管理</a></li>
    <li><a <?php if($nav==6){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >图片设置</a></li>
    <li><a <?php if($nav==7){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >自检功能</a></li>
    <li><a <?php if($nav==8){echo "class=\"typemanageh\"";}else{ echo "class=\"typemanage\"";}?> >检测字段</a></li>
</div>
<script type="text/javascript">
/*系统设置右侧 公用头部*/
	/*系统设置*/
	$(".fu_right_top a:eq(0)").click(function() {
        $.get("systemconfig.php",{nav:1},function(result){
			$(".mx_right").html(result);
			})
    });
	/*账号管理*/
	$(".fu_right_top li a:eq(1)").click(function() {
        $.get("account_list.php",{nav:2},function(result){
			$(".mx_right").html(result);
			})
    });
	/*修改密码*/
	$(".fu_right_top a:eq(2)").click(function() {
        $.get("accountpwd_edit.php",{nav:3},function(result){
			$(".mx_right").html(result);
			})
    });
	/*邮件管理*/
	$(".fu_right_top a:eq(3)").click(function() {
        $.get("systemconfig_email.php",{nav:4},function(result){
			$(".mx_right").html(result);
			})
    });
	/*短信管理*/
	$(".fu_right_top a:eq(4)").click(function() {
        $.get("systemconfig_sms.php",{nav:5},function(result){
			$(".mx_right").html(result);
			})
    });
	/*图片设置*/
	$(".fu_right_top a:eq(5)").click(function() {
        $.get("systemconfig_pic.php",{nav:6},function(result){
			$(".mx_right").html(result);
			})
    });
	
	/*自检功能*/
	$(".fu_right_top a:eq(6)").click(function() {
        $.get("systemconfig_zj.php",{nav:7},function(result){
			$(".mx_right").html(result);
			})
    });
	/*添加字段功能*/
	$(".fu_right_top a:eq(7)").click(function() {
        $.get("add_ziduan.php",{nav:8},function(result){
			$(".mx_right").html(result);
			})
    });
	/*系统设置右侧 公用头部End*/
</script> 
