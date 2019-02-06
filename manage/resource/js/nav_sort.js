/*
 * 导航管理-拖拽排序
 * 
 * @author : LJay
 * @Email : ljay88@vip.qq.com
 * @date : 20150105
 *
 * Copyright 2015 longcai.com
 */
$(function(){
	var $handle = $(".m_sort");
	$handle.bind('mouseover',function(){
		$(this).css("cursor","move")
	});
	$handle.bind('mouseout',function(){
		$(this).css("cursor","default")
	});
	
	var $list = $("#Dragdrop_ranking"),
		$orderlist = [];
	$list.children("li").each(function(){
		$orderlist.push(this.title);
		});
	$list.sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.m_sort',
		update: function(){
			var old_id = [];
             $list.children("li").each(function(){
				var id_p=this.id.replace("list_","")
				old_id.push(id_p);
             });
			var oldids = old_id.join(','),
				oldid = $orderlist.join(',');
			 $.ajax({
                type: "post",
                url: "action/nav_sort_ajax.php",
                data: {order:oldid,ids:oldids},
                beforeSend: function() {
					$("#msgBox span").text("正在更新！").stop(true).show().delay(1000).hide("fast");
                },
                success: function(msg) {
					$("#msgBox span").text("排序成功！").stop(true).show().delay(3000).hide("fast");
                }
             });
		}
	});
});