(function(){
	if(/(iPhone|iPad)\sOS\s7_/.test(window.navigator.userAgent)){
		var t=document.head.querySelector('meta[name="apple-mobile-web-app-capable"]');
		if(t)t.remove();
	}
})()

$(function(){
	$("#Banner").touchSlider({mouseTouch:true,autoplay:true});
	var b_width=$(window).width();
	if(b_width>640){
		b_width=640;
		}
	$("#Banner>ul>li>img").width(b_width);
	var b_height=(351*b_width)/640;
	$(".touchslider-viewport").height(b_height);
	$(".touchslider-item").height(b_height);
	$(".touchslider-item>img").height(b_height);
	})
	function connectWebViewJavascriptBridge(callback) {
		if (window.WebViewJavascriptBridge) {
			callback(WebViewJavascriptBridge)
		} else {
			document.addEventListener('WebViewJavascriptBridgeReady', function() {
				callback(WebViewJavascriptBridge)
			}, false)
		}
	}
	
	connectWebViewJavascriptBridge(function(bridge) {
		bridge.init(function(message, responseCallback) {
			responseCallback(data)
		})
        var button = document.getElementById('button');
		button.onclick = function(e) {
			e.preventDefault()
			var data = 'Hello from JS button'
            bridge.callHandler('testObjcCallback', {'tel': '15110795155'}, function(response) {
				alert(response);
				})                  
			bridge.send(data, function(responseData) {
			})
		}

	})
	
	$(document).ready(function(e) {
	$("#tubiao").bind("click",function (){
		$("#ceng").toggle(500);
		var height=$(window).height();
		$("#ceng").css(document.body.scrollHeight);
		})
		$("#close").bind("click",function (){
			$("#ceng").toggle(500);
		})
	//$("#ceng ul li:last").css("border-bottom","0");	
    });