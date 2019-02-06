
/*
 * JavaScript Function For MXpro
 * 
 * @author : LJay
 * @Email : ljay88@vip.qq.com
 * @date : 20150105
 *
 * Copyright 2015 longcai.com
 */
/*消息提示(顶部消息提示)
	参数:消息内容
*/
function mx_msg(msg){
	$("#msgBox>span").text(msg).stop(true,true).show('fast').delay(3000).hide("fast");
}
//消息提示(顶部消息提示<子窗口>)
function mx_tipmsg(e){var b=160;var d=30;var c=($(window).width()-b)/2;var a=($(window).height()-d)/2;$("body").append('<div id="tipmsg"><div id="tipmsg_con"></div></div>');$("#tipmsg").css({"left":c,"top":-d,"background":"#68af02","z-index":"2","width":b,"height":d,"position":"fixed"});$("#tipmsg_con").css({"line-height":d+"px","color":"#FFF","text-align":"center"}).text(e);$("#tipmsg").stop(true).animate({top:0},800).delay(3000).animate({top:-d},800,function(){$(this).remove()})};
/*弹窗消息提示
	参数1：消息内容
	参数2：1返回上一页；为空仅提示消息；为地址则跳转对应地址
*/
function mx_tips(h,d){
	var b=document.body.appendChild(document.createElement("div"));b.innerHTML='<div id="tips_title">&nbsp;&nbsp;提示</div><div id="tips_con">'+h+"</div>";var e=function(i){return typeof i=="string"?document.getElementById(i):i};var c=220;var f=b.style.height;var g=(document.documentElement.clientWidth-c)/2;var a=(document.documentElement.clientHeight-f)/2;b.style.cssText="left:"+g+"px;top:"+a+"px;background:#f5f5f5;z-index:2;width:"+c+"px;position:fixed;_position:absolute";e("tips_title").style.cssText="background:#e7e7e7;line-height:35px;height:35px;font-weight:bold";e("tips_con").style.cssText="line-height:50px;text-align:center";setTimeout(function(){b.parentNode.removeChild(b);if(d){if(d==1){history.go(-1)}else{location.href=d}}},2600);
}
/*数据加载提示(顶部提示)*/
function mx_loadwait(e){var b=120;var d=30;var c=($(window).width()-b)/2;var a=($(window).height()-d)/2;$("#tipmsg").remove();$("body").append('<div id="tipmsg"><div id="tipmsg_con"></div></div>');$("#tipmsg").css({"left":c,"top":-d,"background":"#68af02","z-index":"2","width":b,"height":d,"position":"fixed"});$("#tipmsg_con").css({"line-height":d+"px","color":"#FFF","text-align":"center"}).text(e);$("#tipmsg").stop(true).animate({top:0},800)};
function mx_loadremove(){$("#tipmsg").animate({top:'-30px'},800,function(){$(this).remove()})}
/*jQuery弹出窗口*/
/*参数：[可选参数在调用时可写或不写,其他为必写] (7个参数)
title:		窗口标题
content:  	内容(可选内容为){ text:文本 | img：图片 | url：加载地址 | iframe：框架地址 }
width:		窗口宽度
height:		窗口高度
drag:  		是否支持拖拽(ture为是,false为否)
time:		自动关闭等待的时间，为空或0则不自动关闭
showbg:		[可选]设置是否显示遮罩层(false为不显示,true为显示)
*/
function tipwindow(){
	var a=arguments[0]?arguments[0]:'提示',b=arguments[1]?arguments[1]:'提示',c=arguments[2]>=950?950:arguments[2],d=arguments[3]>=600?600:arguments[3],e=arguments[4]?arguments[4]:0,f=arguments[5]?parseInt(arguments[5]):0,g=arguments[6]?arguments[6]:false,h=(document.documentElement.clientWidth-c)/2,i=(document.documentElement.clientHeight-d-50)/2;$("#tipwindow").remove();$("body").append("<div id=\"Coverlayer\"></div><div id=\"tipwindow\"><div id=\"tipwindow_title\">"+a+"<span id=\"tipwindow_close\" title='关闭'>&Chi;</span></div><div id=\"tipwindow_con\"></div></div>");var j=$("#tipwindow"),k=$("#tipwindow_title"),l=$("#tipwindow_con"),m=$("#tipwindow_close");contentType=b.substring(0,b.indexOf(":"));b=b.substring(b.indexOf(":")+1,b.length);switch(contentType){case"text":l.html(b);break;case"iframe":l.html("<iframe src=\""+b+"\" width=\"100%\" height=\""+parseInt(d)+"px"+"\" scrolling=\"auto\" frameborder=\"0\" marginheight=\"0\" marginwidth=\"0\"></iframe>");break;case"img":l.html("<img src="+b+" />");break;case"url":var p=b.split("?");$.ajax({type:'GET',url:p[0],data:p[1],error:n(),success:function(q){l.html(q)}});break;default:l.html(b)};function n(){$("#tipwindow_con").html("<p>亲，数据加载出错了...</p>").css("text-align","center")};var o=function(){$("#Coverlayer").remove();$("#tipwindow").remove();closetipwin()};if(g){$("#Coverlayer").css({"background":"#999","width":"100%","height":"100%","opacity":0.6,"z-index":1,"left":0,"top":0,"position":"fixed"})};j.css({"left":h,"top":i,"background":"#ffffff","z-index":2,"width":c,"position":"fixed","_position":"absolute","border":"2px solid #ffffff"});k.css({"height":"46px","background":"#f9f9f9","position":"relative","overflow":"hidden","font-size":"18px","padding-left":"10px","line-height":"46px","color":"#333333","border-bottom":"#cccccc dotted 1px"});m.css({"width":"29px","height":"29px","cursor":"pointer","position":"absolute","top":"8px","right":"10px","font-size":"29px","line-height":"29px","font-weight":"bold","text-align":"center"}).click(o);l.css("height",d);if(e){k.hover(function(){$(this).css("cursor","move")},function(){$(this).css("cursor","default")});j.draggable({handle:"#tipwindow_title"})};if(f>0){setTimeout(o,f)};$(window).resize(function(){var h=(document.documentElement.clientWidth-c)/2,i=(document.documentElement.clientHeight-d-50)/2;$("#tipwindow").css({"left":h,"top":i})});
}
/*登录过期处理*/
function mx_nologin(){setTimeout(function(){location.href = 'login.php';},3000);}
//搜索框
function change_search(o,k){
	if(k==1){
		$(o).css({"width":'260px'});
	}else{
		$(o).css({"width":'100px'});
	}
}
//全选（删除）
function SelectCheckBox(o){
	for (i = 0; i < document.del.elements.length; i++){
		if(o.checked == true){
			document.del.elements[i].checked = true;
		}else{
			document.del.elements[i].checked = false;
		}
	}
}
/*公用(删除提示)*/
function del_op(o,id,type,del){
	var istip = $(o).attr('data-deltip'),
		html = "<div id=\"deltip"+id+"\" class=\"deltip\"><div class=\"deltip_title\"><samp class=\"deltip_t_l\">确认删除</samp><samp class=\"deltip_t_r\"><a class=\"deltip_close mxicon\" title=\"关闭\" onClick=\"deltip_cancel('"+id+"')\">&#xea0f</a></samp></div><div class=\"deltip_con\">确认将此放入回收站吗？(删除的可在回收站恢复)</div><a class=\"deltip_confirm\" onClick=\"deltip_confirm('"+id+"','"+type+"','"+del+"')\">确定</a><a class=\"deltip_cancel\" onClick=\"deltip_cancel('"+id+"')\">取消</a></div>";
	if(!istip){
		$(o).after(html).attr('data-deltip',1);
		}
	}
	
	

function del_opp(o,id,type,del){
	var istip = $(o).attr('data-deltip'),
		html = "<div id=\"deltip"+id+"\" class=\"deltip\"><div class=\"deltip_title\"><samp class=\"deltip_t_l\">确认删除</samp><samp class=\"deltip_t_r\"><a class=\"deltip_close mxicon\" title=\"关闭\" onClick=\"deltip_cancel('"+id+"')\">&#xea0f</a></samp></div><div class=\"deltip_con\">确认删除管理员帐号吗？</div><a class=\"deltip_confirm1\" onClick=\"deltip_confirm('"+id+"','"+type+"','"+del+"')\">确定</a><a class=\"deltip_cancel1\" onClick=\"deltip_cancel('"+id+"')\">取消</a></div>";
	if(!istip){
		$(o).after(html).attr('data-deltip',1);
		}
	}
	
	
/*删除取消*/
function deltip_cancel(id){
	$('#deltip'+id).remove();
	$('#del_op'+id).attr('data-deltip','');
	}
/*删除确定*/
function deltip_confirm(id,type,del){
	switch(parseInt(type)){
		case 0:column_del(id,del);
		break;
		case 1:confirmdel_op(id,del,'danye');
		break;
		case 2:confirmdel_op(id,del,'news');
		break;
		case 3:confirmdel_op(id,del,'products');
		break;
		case 4:confirmdel_op(id,del,'down');
		break;
		case 5:confirmdel_op(id,del,'gbook');
		break;
		case 6:confirmdel_op(id,del,'job');
		break;
		case 7:confirmdel_op(id,del,'jianli');
		break;
		case 8:confirmdel_op(id,del,'orderform');
		break;
		case 9:confirmdel_op(id,del,'user');
		break;
		case 10:confirmdel_op(id,del,'touch_banner');
		break;
		case 11:confirmdel_op(id,del,'nav');
		break;
		case 12:confirmdel_op(id,del,'friendlink');
		break;
		case 13:confirmdel_op(id,del,'field');
		break;
		case 14:confirmdel_op(id,del,'banner');
		break;
		case 15:confirmdel_op(id,del,'jian');
		break;
		case 16:confirmdel_opp(id,del,'del_vip');
		break;
		default:mx_msg("亲，请求参数错误！");;
		}
	}
/*栏目删除*/
function column_del(id,del){
	var $mx_right = $("#mx_right");
	var str = '';
	if(del=="0"){str = '放入回收站';}
	if(del=="1"){str = '删除';}
	$.post("action/lanmu_ajax.php",{id:id,del:del,action:'del'},function(data){
		if(data=="yes"){
			mx_msg("亲，"+str+"成功！");
			//刷新左侧子菜单
			if(del=="0"){
				var type = $("#list_"+id).attr('data-type'),
					a = '';
				if(type=="0"){
					a="singlepage";//单页子栏目
					}
				if(type=="1"){
					a="news";//文章子栏目
					}
				if(type=="2"){
					a="products";//图文子栏目
					}
				if(type=="3"){
					a="down";//下载子栏目
					}
				if(type=="5"){
					a="gbook";//留言子栏目
					}
				$("#ul_"+a).load("sub_lanmu.php",{type:type});
			}
			/*刷新页面End*/
			$("#list_"+id).remove();
		}else{
			mx_msg("亲，"+str+"失败！");
		}
	})
}
/*确定删除操作*/
function confirmdel_op(id,del,action){
	var str = '';
	/*if(del=="0"){str = '放入回收站';}
	if(del=="1"){str = '删除';}*/
	str = '删除';
	$.post("action/"+action+"_ajax.php",{del:del,id:id,action:'del'},function(data){
		
		if(data){
			if(data=="yes"){
				mx_msg("亲，"+str+"成功！");
				$("#list_"+id).remove();
			}else{
				mx_msg("亲，"+str+"失败！");
				}
		}else{
			mx_msg("亲，请求超时，请稍候重试！");
		}
		})
	}
	
	function confirmdel_opp(id,del,action){
	var str = '';
	/*if(del=="0"){str = '放入回收站';}
	if(del=="1"){str = '删除';}*/
	str = '删除';
	$.post("action/"+action+"_ajax.php",{del:del,id:id,action:'del'},function(data){
		
		if(data){
			if(data=="yes"){
				$("#list_"+id).remove();
				$("#msgBox span").text("删除成功！").stop(true).show().delay(2000).hide("fast",function(){ location.href="list.php?C=account_list&nav=2"});
			}else{
				mx_msg("亲，"+str+"失败！");
				}
		}else{
			mx_msg("亲，请求超时，请稍候重试！");
		}
		})
	}
/*客户热线添加*/
function kehurexian(){
	tipwindow("服务热线", "iframe:servicehotline.html", "600", "160", "true", 0, "true");
	}
/*bug反馈*/
function fankuibug(){
	tipwindow("反馈BUG", "iframe:http://ku.longcai.com/fankui/fankui.php", "800", "400", "true", 0, "true");
	}
/*意见反馈*/
var khfk = function(){tipwindow("意见反馈", "iframe:fankui.htm", "500", "350", "true", 0, "true")}
/*推荐开关*/
function recommend_op(o,id,type){
	var $obj = $(o),
		jl=$obj.attr("data-jl");//开启状态
	if(id&&type&&jl!=""){
		if(jl=="1"){
			//已开启(要关闭)
			var op=0,
				a="关闭",
				b="icon_hide",//不显示
				c="icon_show",//显示
				d="否";
		}
		if(jl=="0"){
			//已关闭(要开启)
			var op=1,
				a="开启",
				b="icon_show",//显示
				c="icon_hide",//不显示
				d="是";
		}
		$.post("action/recommend_ajax.php",{id:id,operation:op,type:type},function(data){
			if(data=="yes"){
				mx_msg(a+"成功！");
				$obj.removeClass(c).addClass(b).attr("title",d).attr("data-jl",op);
				}
			if(data=="no"){
				mx_msg(a+"失败！");
				}
			})
		}else{
			mx_msg("亲，请求参数错误！");
			}
	}
/*排序修改*/
function Edit_paixu(id,type){
	var paixuv=$("#paixu_input_"+id).val();
	if(id&&type){
		$.post("action/sort_edit_ajax.php",{id:id,type:type,paixu:paixuv},function(data){
			if(data){
				if(data=="yes"){
					mx_msg("亲，排序修改成功！");
				}else{
					mx_msg("亲，排序修改失败！");
				}
			}else{
				mx_msg("亲，请求超时，请稍候重试！");
			}
		})
		}
	}
/*排序修改End*/
/*单页管理(栏目)*/
function singlepagecolumn(k){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("danye_list.php",{"lanmu":k},function(){mx_loadremove()});
	}
/*文章管理(栏目)*/
function articlecolumn(k){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("news_list.php",{"lanmu":k},function(){mx_loadremove()});
	}
/*图文管理(栏目)*/
function productcolumn(k){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("products_list.php",{"lanmu":k},function(){mx_loadremove()});
	}
/*下载管理(栏目)*/
function downcolumn(k){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("down_list.php",{"lanmu":k},function(){mx_loadremove()});
	}
/*留言管理(栏目)*/
function gbookcolumn(k){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("gbook_list.php",{"lanmu":k},function(){mx_loadremove()});
	}
/*职位管理*/
function job(){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("job_list.php",function(){mx_loadremove()});
	}
/*简历列表*/
function resume(){
	mx_loadwait('正在加载中…');
	$("#mx_right").load("jianli_list.php",function(){mx_loadremove()});
	}
/*订单管理*/
function orderform(a){
	var $mx_right = $("#mx_right");
	mx_loadwait('正在加载中…');
	if(a==4){
		$mx_right.load("payment.php",function(){mx_loadremove()});
	}else{
		$mx_right.load("orderform_list.php?zt="+a,function(){mx_loadremove()});
		}
	}
/*高级功能*/
function Advancedfeatures(i){
	var $mx_right = $("#mx_right");
	mx_loadwait('正在加载中…');
	switch(parseInt(i)){
		case 1:$mx_right.load("banner_list.php?type=1",function(){mx_loadremove()});//banner管理
		break;
		case 2:$mx_right.load("friendlink_list.php",function(){mx_loadremove()});//友情链接
		break;
		case 3:$mx_right.load("products_list.php",function(){mx_loadremove()});//底部修改
		break;
		case 4:$mx_right.load("products_list.php",function(){mx_loadremove()});//图文批量上传
		break;
		case 5:$mx_right.load("banner_list.php?type=2",function(){mx_loadremove()});//广告管理
		break;
		case 6:$mx_right.load("bot_edit.php?id=3",function(){mx_loadremove()});//企业QQ
		break;
		case 7:$mx_right.load("bot_edit.php?id=4",function(){mx_loadremove()});//嵌入代码
		break;
		case 8:$mx_right.load("logo_edit.php",function(){mx_loadremove()});//LOGO管理
		break;
		case 9:$mx_right.load("check_bom.php",function(){mx_loadremove()});//BOM检查
		break;
		case 10:$mx_right.load("nav_list.php",function(){mx_loadremove()});//导航管理
		break;
		case 11:$mx_right.load("fields_list.php",function(){mx_loadremove()});//数据库管理
		break;
		case 12:$mx_right.load("scan_rubbish.php",function(){mx_loadremove()});//垃圾扫描清理
		break;
		default:mx_msg("亲，请参数错误！");;
	}
}
/*客户关怀*/
function kehuguanghuai(i){
	var $mx_right = $("#mx_right");
	mx_loadwait('正在加载中…');
	switch(i){
		case 1:$mx_right.load("frequently_asked_questions.php",function(){mx_loadremove()});
		break;
		case 2:$mx_right.load("operating_video.php",function(){mx_loadremove()});
		break;
		case 3:$mx_right.load("online_modification.php",function(){mx_loadremove()});
		break;
		}
	}
/*微信管理*/
function wechat(i){
	switch(i){
		case 6:$.post("action/weixin_ajax.php",{action:'mi'},function(data){
			if(data){
				if(data==-1){
					mx_msg("请先绑定密钥值！")
				}else{
					location.href='list.php?C=weixin_manage';
				}
			}else{
				mx_msg("亲，请求超时，请稍候重试！");
			}
			})
			break;
		}
	}
/*回收站管理*/
function recycle(i){
	var $mx_right = $("#mx_right");
	mx_loadwait('正在加载中…');
	switch(i){
		case 0:$mx_right.load("recycle.php?zt=0",function(){mx_loadremove()});
		break;
		case 1:$mx_right.load("recycle.php?zt=3",function(){mx_loadremove()});
		break;
		case 2:$mx_right.load("recycle.php?zt=1",function(){mx_loadremove()});
		break;
		case 3:$mx_right.load("recycle.php?zt=2",function(){mx_loadremove()});
		break;
		}
	}
/*图文滚动延时加载*/
function listimg_load(){
	var winHeight = $(window).height(),
		docTop = $(document).scrollTop();
	$(".pro>li").each(function(index, element){
		var $li = $(this),
			li_top = $li.offset().top,
			$this_img = $li.find('img'),
			img_isload = $this_img.attr("data-l");
		if(img_isload!==''){
			if(docTop >= li_top - winHeight*2/3){
				$this_img.attr("src",$this_img.attr("data-src")).attr("data-l",'load');
				}
			}
		})
	}