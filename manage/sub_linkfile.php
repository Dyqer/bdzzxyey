<link rel="stylesheet" type="text/css" href="resource/css/edit.css">
<script src="resource/js/jquery-1.7.2.min.js"></script>
<script src="resource/js/mx.js"></script>
<link rel="stylesheet" href="../resource/kindeditor/themes/default/default.css" />
<script src="../resource/kindeditor/kindeditor-min.js"></script>
<script src="../resource/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
function qiehuanPCandTouch(i){
	var $pc_touch1 = $("#pc_touch1"),
		$pc_touch2 = $("#pc_touch2"),
		$phone_con = $("#lc_phone_content"),
		$pc_con = $("#lc_content");
	if(i==1){
		$pc_touch1.removeClass("unselect").addClass("select");
		$pc_touch2.removeClass("select").addClass("unselect");
		$phone_con.hide();
		$pc_con.show();
		}
	if(i==2){
		$pc_touch1.removeClass("select").addClass("unselect");
		$pc_touch2.removeClass("unselect").addClass("select");
		$pc_con.hide();
		$phone_con.show();
		}
	}
KindEditor.ready(function(K) {
	var editor1 = K.create('textarea[name="lc_content"]', {
		allowFileManager : true,
		afterBlur:function(){ 
			this.sync(); 
		}
	});
});
function type_del_op(o,id,type,del){
	var deltip = document.getElementById('deltip'+id),
		html = "<div id=\"deltip"+id+"\" class=\"deltip\"><div class=\"deltip_title\"><samp class=\"deltip_t_l\">确认删除</samp><samp class=\"deltip_t_r\"><a class=\"deltip_close mxicon\" title=\"关闭\" onClick=\"type_deltip_cancel('"+id+"')\">&#xea0f</a></samp></div><div class=\"deltip_con\">确定删除此分类吗？（删除后，该类别子类别以及类别所属的数据均被删除）</div><a class=\"deltip_confirm\" onClick=\"type_deltip_confirm('"+id+"','"+type+"','"+del+"')\">确定</a><a class=\"deltip_cancel\" onClick=\"type_deltip_cancel('"+id+"')\">取消</a></div>";
	if(!deltip){
		$(o).after(html);
	}
	}
function type_deltip_cancel(id){
	$('#deltip'+id).remove();
	}
function type_deltip_confirm(id,type,del){
	switch(parseInt(type)){
		case 1:type_confirmdel_op(id,'news');
		break;
		case 2:type_confirmdel_op(id,'products');
		break;
		case 3:type_confirmdel_op(id,'down');
		break;
		case 4:type_confirmdel_op(id,'user');
		break;
		case 5:type_confirmdel_op(id,'banner');
		break;
		case 6:type_confirmdel_op(id,'friendlink');
		break;
		default:mx_msg("亲，请求参数错误！");
		}
	}
function type_confirmdel_op(id,action){
	if(id){
		$.post("action/"+action+"_type_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，删除成功！');
					$("#type_list_"+id).remove();//移除已删除的数据
				}else{
					mx_tipmsg('亲，删除失败！');
					}
			}else{
				mx_tipmsg('亲，请求超时，请稍候重试！');
				}
			})
		}else{
			mx_tipmsg('亲，请求参数有误！');
			}
	}
</script>