<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('db');//单页管理权限验证
SetSysEvent('field_list');//添加日志功能

$sql = "select * from ".$lc."_customfields";
$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
//需要重载数据
function closetipwin(){
	var num = $("#Dragdrop_ranking>li").length;
	$.post("action/field_ajax.php",{action:'num'},function(data){
		if(parseInt(data)!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("fields_list.php",function(){mx_loadremove()});
			}
		})
	}
/*点击关闭窗口*/
var add_field = function() {
	tipwindow("添加字段", "iframe:field_add.php", "560", "320", "true", 0, "true");
}
var edit_field = function(id) {
	tipwindow("修改字段", "iframe:field_edit.php?id="+id, "560", "320", "true", 0, "true");
}
/*显示隐藏切换*/
function field_show_hide(o){
	var id = o.getAttribute("data-id"),
		zt = o.getAttribute("data-zt");
	if(id && zt){
		if(zt=="1"){
			//已开启(要关闭)
			var op="0";
			var a = "关闭";
			var b = "&#xea10;";
		}
		if(zt=="0"){
			//已关闭(要开启)
			var op="1";
			var a = "启用";
			var b = "&#xea0e;";
		}
		$.post("action/field_ajax.php",{id:id,action:"zt",op:op},function(data){
			if(data){
				if(data=="yes"){
					o.setAttribute("data-zt",op);
					o.setAttribute("title",a);
					o.innerHTML = b;
					mx_msg("亲，更新成功！");
					}else{
						mx_msg("亲，更新失败！");
						}
				}else{
					mx_msg("亲，请求超时！");
					}
			})
		}else{
			mx_msg("亲，请求参数不正确！");
			}
	}
function edit_title(o,id){
	var title = o.value;
	if(id && title){
		$.post("action/field_ajax.php",{id:id,action:"title",title:title},function(data){
			if(data=="yes"){
				mx_msg("亲，修改成功！");
				}else{
					mx_msg("亲，修改失败！");
					}
			})
		}else{
			mx_msg("亲，请求参数有误！");
			}
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="add_field()" class="release">添加新字段</a></li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
    <input name="action" type="hidden" value="danye">
    <input name="lc_del" type="hidden" value="0">
    <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
      <div class="list">
        <ul class="list_head">
          <li>
          	<span>编号</span>
          	<span class="list_title">字段名称</span>
          	<span class="spanr">删除</span>
          	<span class="spanr">修改</span>
          	<span class="spanr">审核</span>
          	<span class="spanr">所属表</span>
          	<span class="spanr">备注</span>
          	<span class="spanr">类型</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
        	while($rows=mysql_fetch_assoc($rs)){?>
          <li id="list_<?php echo $rows["lc_id"]?>">
	          <span><?php echo $rows['lc_id']?></span>
	          <span class="list_title"><input  class="title_input" value="<?php echo val_isset($rows['lc_fieldname'])?>" maxlength="30" onChange="edit_title(this,<?php echo $rows['lc_id']?>)"></span>
	          <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',13,1)">&#xe9ac;</a><?php }?></span>
	          <span class="spanr mxicon"><a class="icon iconPcel" title="修改" onClick="edit_field(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
	          <span class="spanr mxicon"><a onClick="field_show_hide(this)" data-id="<?php echo $rows['lc_id']?>" data-zt="<?php echo $rows['lc_zt']?>" title="<?php if($rows['lc_zt']==1){echo '启用';}else{echo '关闭';}?>"><?php if($rows['lc_zt']==1){echo '&#xea0e;';}else{echo '&#xea10;';}?></a></span>
	          <span class="spanr"><?php echo val_isset($rows['lc_table'])?></span>
	          <span class="spanr"><?php echo val_isset($rows['lc_fieldnotes'])?></span>
	          <span class="spanr"><?php echo val_isset($rows['lc_fieldtype'])?></span>
          </li>
          <?php
        	}
        }?>
        </ul>
      </div>
      </form>
    </div>
  </div>
</div>