<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('nav');//导航管理权限验证
SetSysEvent('nav_list');//添加日志功能
/*************************************************
 功能：判断nav是几级，用以在无限分类里子级类别空两格显示
 *************************************************/
function nav_ji($id){
	$i = 1;
	$sql = "select lc_parent_id from ".lc()."_navigation where lc_id='{$id}'";
	$rs = mysql_query($sql);
	if ($rs) {
		$row = mysql_fetch_assoc($rs);
		if($row["lc_parent_id"]<>0){
			$i = $i + nav_ji($row["lc_parent_id"]);
		}
	}
	return $i;
}
function get_navigation_menu_li($pid){
	$sql = "select * from ".lc()."_navigation where lc_parent_id='{$pid}' order by lc_sort_id asc";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			$edit_js = "";
			for($i=1;$i<nav_ji($rows['lc_id']);$i++){
				$gang.= "&nbsp;&nbsp;";
			}
			if($pid==0){
				//$gang.= '<img src="resource/images/list1.gif" align="absmiddle">';
				$edit_js = "edit_nav(".$rows['lc_id'].")";
			}else{
				//$gang.= '<img src="resource/images/list2.gif" align="absmiddle">';
				$edit_js = "edit_sub_nav(".$rows['lc_id'].")";
			}?>
			<li id="list_<?php echo $rows["lc_id"]?>" title="<?php echo $rows["lc_sort_id"]?>">
            	<span class="m_sort"><?php echo $rows['lc_id']?></span>
            	<span class="list_title"><?php echo $gang?><input class="title_input" jilu="<?php echo $rows['lc_title']?>" onBlur="Edit_nav(this,'<?php echo $rows['lc_id']?>')" value="<?php echo $rows['lc_title']?>" maxlength="30"></span>
              	<span style="width:30%"><input type="text" class="title_input" value="<?php echo $rows['lc_link_url']?>" jilu="<?php echo $rows['lc_link_url']?>" onBlur="Edit_nav_url(this,'<?php echo $rows['lc_id']?>')">
              </span> <span class="spanr mxicon del">
              <?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?>
              <a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',11,1)">&#xe9ac;</a>
              <?php }?>
              </span> <span class="spanr mxicon"><a class="icon iconPcel" onClick="edit_nav(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
              <span class="spanr mxicon"><a style="width:100px" onClick="nav_add_submenu(<?php echo $rows['lc_id']?>)">&#xea0a;</a></span>
              <span class="spanr mxicon"><a onClick="nav_show_hide(this,'<?php echo $rows['lc_id']?>')" jl="<?php echo $rows['lc_zt']?>">
              <?php if($rows['lc_zt']==1){echo '&#xe9ce;';}else{echo '&#xe9d1;';}?>
              </a></span> 
            </li>
            <?php
	        get_navigation_menu_li($rows['lc_id']);
		}
	}
}
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/nav_sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
//需要重载数据
function closetipwin(){
	var num = $("#Dragdrop_ranking>li").length;
	$.post("action/nav_ajax.php",{action:'num'},function(data){
		if(parseInt(data)!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("nav_list.php",function(){mx_loadremove()});
			}
		})
	}
/*点击关闭窗口*/
var add_nav = function() {
	tipwindow("导航添加", "iframe:nav_add.php", "500", "440", "true", 0, "true"); 
}
var edit_nav = function(id) {
	tipwindow("导航修改", "iframe:nav_edit.php?id="+id, "500", "440", "true", 0, "true");
}
var edit_sub_nav = function(id) {
	tipwindow("子导航修改", "iframe:nav_edit_submenu.php?id="+id, "500", "480", "true", 0, "true");
}
function nav_add_submenu(pid){
	tipwindow("添加子菜单", "iframe:nav_add.php?pid="+pid, "500", "440", "true", 0, "true");
	}
function Edit_nav(o,id){
	var title = o.value;
	var jilu = o.getAttribute("jilu");
	if(title==""){
		mx_msg("亲，标题不能为空！");
		}else{
			if(title!=jilu){
				$.post("action/nav_ajax.php",{title:title,id:id,action:"title"}, function(data){
					if(data){
						if(data=="yes"){
							o.value = title;
							o.setAttribute("jilu",title);
							mx_msg("亲，更新成功！");
							}else{
								mx_msg("亲，更新失败！");
								}
						}else{
							mx_msg("亲，请求超时！");
							}
				});
				}
	}
}
function Edit_nav_url(o,id){
	var url = o.value;
	var jilu = o.getAttribute("jilu");
	if(url){
		if(url!=jilu){
			$.post("action/nav_ajax.php",{url:url,id:id,action:"url"},function(data){
				if(data){
					if(data=="yes"){
						o.value = url;
						o.setAttribute("jilu",url);
						mx_msg("亲，更新成功！");
						}else{
							mx_msg("亲，更新失败！");
							}
					}else{
						mx_msg("亲，请求超时！");
						}
				})
			}
		}else{
			mx_msg("亲，跳转链接不能为空！");
			}
	}
function nav_show_hide(o,id){
	var jl = o.getAttribute("jl");
	if(id && jl){
		if(jl=="1"){
			//已开启(要关闭)
			var op="0";
			var b = "&#xe9d1;";
		}
		if(jl=="0"){
			//已关闭(要开启)
			var op="1";
			var b = "&#xe9ce;";
		}
		$.post("action/nav_ajax.php",{id:id,action:"zt",op:op},function(data){
			if(data){
				if(data=="yes"){
					o.setAttribute("jl",op);
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
</script>
<style>
input{ border:#dfdfdf 1px solid; padding-left:3px}
</style>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="add_nav()" class="release">发布导航菜单</a></li>
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
            <li><span>编号</span> <span style="width:30%">导航名称</span> <span style="width:30%">跳转链接</span> <span class="spanr">删除</span> <span class="spanr">修改</span> <span class="spanr">添加子菜单</span> <span class="spanr">显示</span> </li>
          </ul>
          <ul class="list_con Aline" id="Dragdrop_ranking">
          <?php get_navigation_menu_li(0)?>
          </ul>
        </div>
        <div class="checkall_op">
          <div class="clear"></div>
        </div>
      </form>
    </div>
  </div>
</div>
