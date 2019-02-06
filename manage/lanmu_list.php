<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('lanmu');//栏目管理权限验证
SetSysEvent('lanmu_list');//添加日志功能

$key = isset($_POST['key'])?(string)$_POST['key']:null;
function qiehuan_link($type,$lanmu){
	$link="";
	if($type=="0"){
		if(check_quanxian('danye')){
			$link="href=\"list.php?C=danye_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
	}
	if($type=="1"){
		if(check_quanxian('news')){
			$link="href=\"list.php?C=news_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
		}
	if($type=="2"){
		if(check_quanxian('products')){
			$link="href=\"list.php?C=products_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
		}
	if($type=="3"){
		if(check_quanxian('down')){
			$link="href=\"list.php?C=down_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
		}
	if($type=="4"){
		if(check_quanxian('job')){
			$link="href=\"list.php?C=jianli_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
		}
	if($type=="5"){
		if(check_quanxian('gbook')){
			$link="href=\"list.php?C=gbook_list&lanmu={$lanmu}\" target=\"_blank\"";
		}else{
			$link="onClick=\"mx_msg('抱歉！您的权限不足！')\"";
		}
		}
	return $link;
}
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;
if(!$lanmu){
	$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//获取栏目编号
	if(!$lanmu){
		$lanmu = get_lanmu_by_type(0);//获取单页的栏目
	}
}
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$sortnum = isset($_GET['sortnum'])?(int)$_GET['sortnum']:0;//获取排序个数
if(!$sortnum){
	$sortnum = isset($_POST['sortnum'])?(int)$_POST['sortnum']:0;
}
$pagesize = $sortnum>0 ? $sortnum:10;
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*添加栏目后点击关闭窗口*/
//需要重载数据
function closetipwin(){
	
	var key="<?php echo $key?>",
		num = $("#orderlist").attr('data-num');
	
	$.post("action/lanmu_ajax.php",{action:'num',key:key},function(data){
		if(data!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("lanmu_list.php",function(){mx_loadremove()});
			//刷新左侧子菜单
			$("#ul_singlepage").load("sub_lanmu.php",{type:0});//单页
			$("#ul_news").load("sub_lanmu.php",{type:1});//文章
			$("#ul_products").load("sub_lanmu.php",{type:2});//图文
			$("#ul_down").load("sub_lanmu.php",{type:3});//下载
			$("#ul_gbook").load("sub_lanmu.php",{type:5});//下载
			}
		})
	}
/*添加栏目后点击关闭窗口*/
var addlanmu = function() {
	tipwindow("栏目添加", "iframe:lanmu_add.php", "950", "500", "true", 0, "true");
}
var editlanmu = function(id) {
	tipwindow("栏目修改", "iframe:lanmu_edit.php?c_id="+id, "900", "500", "true", 0, "true");
}
/*修改栏目标题*/
function Edit_lanmu_title(id){
	var title=$('#c_title'+id).val();
	if(title==""){
		mx_msg("亲，标题不能为空！");
		}else{
		  $.post("action/lanmu_ajax.php",{title:title,id:id,action:'title'},function(data){
			  if(data){
				  if(data=='yes'){
					  $('#c_title'+id).val(title);
					  $('#c_title'+id).attr("jilu",data);
					  mx_msg("亲，更新成功！");
					  }else{
						  mx_msg("亲，更新失败！");
						  }
				  }else{
					  mx_msg("亲，请求超时，请稍候重试！");
					  }
			  })
	}
}
function check_search(){
	var key = document.getElementById("key").value;
	if(!key){
		mx_msg("亲，搜索值不能为空！");
		return false;
		}
	}
function edit_showhide(id,o,t){
	if(id && t){
		var jl = o.getAttribute("data-zt");
		if(jl=="1"){
			//已开启(要关闭)
			var op="0";
			var b = t == 'pc' ? '&#xe9d1;' : '&#xe959;';
			var a = '否';
			var c = t == 'phone' ? 'icon_hide' : '';
		}
		if(jl=="0"){
			//已关闭(要开启)
			var op="1";
			var b = t == 'pc' ? '&#xe9ce;' : '&#xe959;';
			var a = '是';
			var c = t == 'phone' ? 'icon_show' : '';
		}
		$.post("action/lanmu_ajax.php",{id:id,action:"zt",op:op,op_t:t},function(data){
			if(data){
				if(data=="yes"){
					o.setAttribute("data-zt",op);
					o.setAttribute("title",a);
					o.innerHTML = b;
					if(t == 'phone'){
						$(o).removeClass().addClass(c);
						}
					mx_msg("亲，更新成功！");
					}else{
						mx_msg("亲，更新失败！");
						}
				}else{
					mx_msg("亲，请求超时！");
					}
			})
	}else{
		mx_msg("亲，请求参数错误！");
		}
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="addlanmu()" class="release">发布栏目</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=lanmu_list" onSubmit="return check_search()">
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
	<input name="action" type="hidden" value="lanmu">
	<input name="lc_del" type="hidden" value="0">
      <div class="list">
        <ul class="list_head">
          <li>
          	<span>选择</span>
          	<span>编号</span>
          	<span class="list_title">栏目名称</span>
          	<span class="spanr">删除</span>
          	<span class="spanr">修改</span>
          	<span class="spanr">管理</span>
          	<span class="spanr">显示</span>
          	<span class="spanr">手机</span>
          	<span class="spanr">所属类别</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php
		$sql = "select * from ".$lc."_lanmu where c_zt!=0 ";
		if($key){
			$sql=$sql." and c_title like '%{$key}%'";
		}
		$sql = $sql." order by c_sort_id desc";
		$rs = mysql_query($sql);
		if($rs){
			$i=0;
			while($rows=mysql_fetch_assoc($rs)){
				$i++;
        		$a = $i==1?'':',';//拖拽排序作用
			?>
          <li id="list_<?php echo $rows["c_id"]?>" data-type="<?php echo $rows["c_type"]?>">
	          <span><input type="checkbox" value="<?php echo $rows["c_id"]?>" name="id[]"></span>
	          <span class="m_sort"><?php echo $rows['c_id']?></span>
	          <span class="list_title"><input type="text" id="c_title<?php echo $rows['c_id']?>" onChange="Edit_lanmu_title(<?php echo $rows['c_id']?>)" value="<?php echo $rows['c_title']?>" class="title_input"></span>
	          <span class="spanr mxicon del">
                <?php if($rows['c_delete']==1){?>
                --
                <?php }else{?>
                <a title="删除" id="del_op<?php echo $rows['c_id']?>" onClick="del_op(this,'<?php echo $rows['c_id']?>',0,0)">&#xe9ac;</a><?php }?></span>
	          <span class="spanr mxicon"><a title="修改" onClick="editlanmu(<?php echo $rows['c_id']?>)">&#xe905;</a></span>
	          <span class="spanr"><a <?php echo qiehuan_link($rows["c_type"],$rows["c_id"])?> title="管理此栏目" target="_blank" style="color:#333">管理</a></span>
	          <span class="spanr mxicon"><a onClick="edit_showhide(<?php echo $rows["c_id"]?>,this,'pc')" data-zt="<?php echo $rows["c_pc"]?>" title="<?php if($rows['c_pc']==1){echo "是";}else{echo "否";}?>"><?php if($rows['c_pc']==1){echo "&#xe9ce;";}else{echo "&#xe9d1;";}?></a></span>
	          <span class="spanr mxicon"><a onClick="edit_showhide(<?php echo $rows["c_id"]?>,this,'phone')" data-zt="<?php echo $rows["c_phone"]?>" class="<?php if($rows['c_phone']==1){echo "icon_show";}else{echo "icon_hide";}?>" title="<?php if($rows['c_phone']==1){echo "是";}else{echo "否";}?>">&#xe959;</a></span>
	          <span class="spanr"><?php echo get_lanmu_type($rows['c_type'])?></span>
          </li>
          <?php $sort.=$a.$rows['c_sort_id'];
        	}
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="lanmu" value="<?php echo $sort?>">
      </div>
      <div class="checkall_op">
      <div class="checkall">
        <input type="checkbox" id="checkall" onClick="SelectCheckBox(this)" title="全选">
        <input type="submit" class="checkall_sub" value="删&nbsp;&nbsp;除">
      </div>
    </div>
    </form>
  </div>
</div>