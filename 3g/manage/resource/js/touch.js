/*
 * LCMX For Touch后台javascript
 * @author LJay <ljay88@vip.qq.com>
 */
$(function(){
	//列表隔行变色显示
	$('.danye_show li:odd').css('background','#f7f7f7');
	$('.danye_show li:odd .title_li').css('background','#f7f7f7');
	$('#subNav li:odd').css('background','#f7f7f7');
	$('#subNav li:odd .title_li').css('background','#f7f7f7');
	/*显示和关闭 管理*/
	$("#tubiao").bind("click",function (){
		$("#ceng").toggle(500);
		var height=$(window).height();
		$("#ceng").css(document.body.scrollHeight);
	})
	$("#close").bind("click",function (){
		$("#ceng").toggle(500);
	})
	/*显示和关闭 管理end*/
	})
//提示消息
function touchmsg(msg){
	var tipswindows_width=160;//提示的宽
	var tipswindows_height=30;//提示的高
	var now_left=($(window).width()/2)-(tipswindows_width/2);
	var now_top=($(window).height()/2)-(tipswindows_height/2);
	
	$("body").append("<div id=\"tipswindows\"><div id=\"tipswindows_title\"></div><div id=\"tipswindows_con\"></div><div id=\"tipswindows_foot\"></div></div>");
	$("#tipswindows").css({"left":now_left,"top":-tipswindows_height,"background":"#74b516","z-index":"2","width":tipswindows_width,"height":tipswindows_height,"position":"fixed"});
	$("#tipswindows_con").css({"line-height":tipswindows_height+'px',"color":"#FFF","text-align":"center"});
	$("#tipswindows_con").text(msg);
	$("#tipswindows").stop(true).animate({top:20},800).delay(3000).animate({top:-tipswindows_height},800);
	}
//弹出提示框
function tips_window(type,id,msg){
	var tips_width=$(window).width()/2;//弹窗的宽
	var tips_height=118;//弹窗的高
	var now_left=($(window).width()/2)-(tips_width/2);
	var now_top=($(window).height()/2)-(tips_height/2);
	
	$("body").append("<div id=\"tips_window\"><div id=\"tips_window_title\"></div><div id=\"tips_window_con\"></div><div id=\"tips_window_foot\"></div></div>");
	$("#tips_window").css({"left":now_left,"top":now_top,"background":"#e9e9e9","z-index":"2","width":tips_width,"height":tips_height,"position":"fixed"});
	$("#tips_window_title").css({"background":"#0370ea","color":"#FFF","height":"30px","line-height":"30px","text-align":"center"}).text("重要提示");
	$("#tips_window_con").css({"text-align":"center","height":"45px","line-height":"45px"}).text(msg);
	$("#tips_window_foot").css({"text-align":"center"}).html("<input class=\"tips_del_button\" type=\"button\" onClick=\"del_"+type+"("+id+");tips_window_close()\" value=\"删除\"><input class=\"tips_edit_button\" onClick=\"tips_window_close()\" type=\"button\" value=\"取消\">");
	}
//提示框关闭
function tips_window_close(){
	$("#tips_window").remove();
	}
//切换选项卡
function Tab_to_switch(name,cursel,n){
	for(i=1;i<=n;i++){
		document.getElementById(name+i).className=i==cursel?"tubiao_hover":"";//标题
		document.getElementById("con_"+name+"_"+i).style.display=i==cursel?"block":"none";//内容
	}
}
//ajax 修改栏目的名称
function edit_lanmuname(id,type){
	if(type==1){
		var title=$("#touch_lanmu_"+id).val();
		}
	if(type==2){
		var title=$("#pc_lanmu_"+id).val();
		}
	if(title){
		$.post("action/lanmu_ajax.php",{id:id,title:title,type:type,action:'title'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，修改成功！");
					}else{
						touchmsg("亲，修改失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，栏目名称不能为空！");
			}
	}
//ajax 修改单页的标题
function edit_danyename(id){
	var title=$("#danye_"+id).val();
	if(title){
		$.post("action/danye_ajax.php",{id:id,title:title,action:'title'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，修改成功！");
					}else{
						touchmsg("亲，修改失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，标题不能为空！");
			}
	}
//ajax 修改新闻的标题
function edit_newsname(id){
	var title=$("#news_"+id).val();
	if(title){
		$.post("action/news_ajax.php",{id:id,title:title,action:'title'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，修改成功！");
					}else{
						touchmsg("亲，修改失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，标题不能为空！");
			}
	}
//ajax 修改图文的标题
function edit_productsname(id){
	var title=$("#products_"+id).val();
	if(title){
		$.post("action/products_ajax.php",{id:id,title:title,action:'title'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，修改成功！");
					}else{
						touchmsg("亲，修改失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，标题不能为空！");
			}
	}
//ajax 修改图文的图片的标题
function edit_products_picname(id){
	var title=$("#products_pic_"+id).val();
	if(title){
		$.post("action/products_ajax.php",{id:id,title:title,action:'pictitle'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，修改成功！");
					}else{
						touchmsg("亲，修改失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，标题不能为空！");
			}
	}
function xuan_fengmian(id,product_id){
	if(id&&product_id){
		$.post("action/products_ajax.php",{id:id,product_id:product_id,action:'picfengmian'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("设定封面成功！");
					}else{
						touchmsg("设定封面失败！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
		})
		}else{
			touchmsg("请求参数不正确！");
			}
	}
//点击显示管理条
function show_guanli_bar(o){
	var ob=$(o);
	ob.parent().find(".guanli_bar").stop(true).toggle(100);
	var pic=ob.find("img").attr("src");
	if(pic=="resource/image/new_list_open.png"){
		ob.find("img").attr("src","resource/image/new_list_no.png");
		}else{
			ob.find("img").attr("src","resource/image/new_list_open.png");
			}
	}
//删除单页
function del_danye(id){
	if(id){
		$.post("action/danye_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，删除成功！");
					$("#danye_list_li_"+id).remove();
					}else{
						touchmsg("亲，删除失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，请求参数不正确，请刷新重试！");
			}
	}
//删除新闻
function del_news(id){
	if(id){
		$.post("action/news_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，删除成功！");
					$("#news_list_li_"+id).remove();
					}else{
						touchmsg("亲，删除失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，请求参数不正确，请刷新重试！");
			}
	}
//删除图文
function del_products(id){
	if(id){
		$.post("action/products_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，删除成功！");
					$("#products_list_li_"+id).remove();
					}else{
						touchmsg("亲，删除失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，请求参数不正确，请刷新重试！");
			}
	}
//删除图文的图片
function del_products_pic(id){
	if(id){
		$.post("action/products_ajax.php",{id:id,action:'picdel'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，删除成功！");
					$("#products_pic_list_li_"+id).remove();
					}else{
						touchmsg("亲，删除失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，请求参数不正确，请刷新重试！");
			}
	}
//删除留言
function del_gbook(id){
	if(id){
		$.post("action/gbook_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，删除成功！");
					$("#gbook_list_li_"+id).remove();
					}else{
						touchmsg("亲，删除失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，请求参数不正确，请刷新重试！");
			}
	}
//删除职位
function del_job(id){
	if(id){
		$.post("action/job_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					touchmsg("亲，删除成功！");
					$("#job_list_li_"+id).remove();
					}else{
						touchmsg("亲，删除失败，请重试！");
						}
				}else{
					touchmsg("亲，请求超时，请稍候重试！");
					}
			})
		}else{
			touchmsg("亲，请求参数不正确，请刷新重试！");
			}
	}