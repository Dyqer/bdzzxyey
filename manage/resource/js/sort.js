/*
 * init Drag and drop ranking For MXpro
 * 
 * @author : LJay
 * @Email : ljay88@vip.qq.com
 * @date : 20150105
 *
 * Copyright 2015 longcai.com
 */
$(function(){
	var $m_sort = $(".m_sort"),
		$orderlist = $("#orderlist"),//排序号(隐藏域)
		$list = $("#Dragdrop_ranking");//排序列表
	$m_sort.hover(function(){
		$(this).css("cursor","move");
		},function(){
			$(this).css("cursor","default")
			})
	//排序消息提示
	function sort_msg(a){
		$("#msgBox>span").text(a).stop(true).show().delay(1000).hide("fast");
		}
	//列表排序
	$list.sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.m_sort',
		update: function(){
			var id = [];
			$list.children("li").each(function(){
				id.push(this.id.replace("list_",""));
			});
			var oldids = id.join(','),//获取排序的编号
				oldorder = $orderlist.val(),//获取旧排序顺序
				type = $orderlist.attr("title");//获取排序的类型
			$.ajax({
				type:"post",
				url:"action/sort_ajax.php",
				data:{order: oldorder, ids: oldids ,'type':type},//id:新的排列对应的ID,order：原排列顺序
				beforeSend: function(){
					sort_msg("正在更新！");
					},
				success: function(data){
					if(data == "yes"){
						sort_msg("排序成功！");
					}else{
						sort_msg("排序失败！");
					}
                }
             });
		}
	});
});