/*
 * JavaScript code For MXlogin
 * 
 * @author : LJay
 * @Email : ljay88@vip.qq.com
 * @date : 20150120
 *
 *  Copyright 2015 longcai.com
 */
var yzm_html = "<div class=\"yzm\"><span class=\"mxicon login_icon\">&#xe98f;</span><input type=\"text\" class=\"login_input\" id=\"yzm\" placeholder=\"验证码\" onkeydown=\"Enter_login(event)\"><img src=\"imgcode.php\" title=\"看不清楚，换一张\" onClick=\"yzm(this,'imgcode.php')\" align=\"absmiddle\"/></div>";
//更换验证码
function yzm(obj,url){
	obj.src = url+'?n='+new Date().getTime();
}
function getCookie(name){
	if(document.cookie.length > 0){
		begin = document.cookie.indexOf(name+"=");
		if(begin != -1){
			begin += name.length+1;
			end = document.cookie.indexOf(";", begin);
			if(end == -1) end = document.cookie.length;
			return unescape(document.cookie.substring(begin, end));
			}
	}
	return null;
}
function Enter_login(event){
	if(event.keyCode==13){
		login();
		}
	}
function login_tipsmsg(msg){
	$("#tips>span").text(msg).stop(true).show().delay(3000).hide("fast");
	}
function login(){
	var user = $("#user").val(),
		password = $("#password").val(),
		num = getCookie("login_err");
	if(!user){
		login_tipsmsg("亲，请填写用户名么！");
		}else if(!password){
			login_tipsmsg("亲，好调皮呀，密码都不填！");
		}else if(num>=3){
			var yzm=$("#yzm").val();
			if(!yzm){
				login_tipsmsg("亲，好调皮呀，验证码都不填！");
				}else{
					check_login();
					}
			}else{
				check_login();
				}
	function check_login(){
		var $psw = $("#psw"),
			ll = $psw.attr("data");
		$.post("action/login_check.php",{user:user,password:password,yzm:yzm},function(data){
			if(data){
				switch(data.err){
					case 1: window.location.href="main.php";//登录成功
					break;
					case -2: login_tipsmsg("亲，用户名或密码输入有误！");
					if(data.num>=3){
						if(ll!==1){
							$psw.after(yzm_html);
							$psw.attr("data",1);
							}
						};
					break;
					case -3: login_tipsmsg("亲，好调皮呀，验证码都不填！");
					break;
					case -1: login_tipsmsg("亲，验证码输入有误！");
					break;
					default: login_tipsmsg("亲，请稍候重试！");
					}
				}else{
					login_tipsmsg("亲，网络不给力，请稍候重试！");
					}
		},"json")
		}
	}
$(function(){
	var err_num = getCookie("login_err"),
		yzmjl = $("#psw").attr("data");
	if(err_num>=3 && yzmjl!==1){
		$("#psw").after(yzm_html).attr("data",1);
		}
	})
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
	document.getElementById('login_date').innerHTML = ShowDate();
	setInterval(function(){
		document.getElementById('login_date').innerHTML = ShowDate();
		},60000)
	}