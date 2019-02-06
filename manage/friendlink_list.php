<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('gaoji');//高级管理权限验证
SetSysEvent('friendlink_list');//添加日志功能

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;//获取分类
if(!$c_id){
	$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;
}
if($c_id==0){
	$c_id = get_friendlink_type_cid();//从分类中获取一个分类id
}

$key = isset($_POST['key'])?(string)$_POST['key']:null;
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$pagesize = 10;

$sql_num = "select lc_id from ".$lc."_friendlink";
$wheresql=" where 1=1 ";
if($c_id<>0){
	$wheresql.=" and c_id='{$c_id}' ";
}
$ordersql=" order by lc_sort_id desc";
$sql_num.=$wheresql.$ordersql;
$rs_num = mysql_query($sql_num);
if($rs_num){
	$total_num = mysql_num_rows($rs_num);
}else{
	$total_num = 0;
}
$total_page = ceil($total_num/$pagesize);
$page = ($page<1)?1:$page;
$page = ($page>$total_page)?$total_page:$page;
$fromrow = ($page-1)*$pagesize;

$sql = "select * from ".$lc."_friendlink";
$sql.=$wheresql.$ordersql." limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
//需要重载数据
function closetipwin(){
	var page="<?php echo $page?>",
		c_id="<?php echo $c_id?>",
		num = $("#orderlist").attr('data-num');
	$.post("action/friendlink_ajax.php",{action:'num',c_id:c_id},function(data){
		if(data!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("friendlink_list.php",{c_id:c_id,page:page},function(){mx_loadremove()});
			}
		})
	}
/*点击关闭窗口*/
/*发布友情链接*/
function addfriendlink(c_id){
	if(c_id){
		tipwindow("友情链接添加","iframe:friendlink_add.php","650","260","true",0,"true");
	}else{
		mx_msg("亲，请先添加分类,再发布友情链接！");
		}
	}
/*修改友情链接*/
function editfriendlink(id){
	if(id){
		tipwindow("友情链接修改","iframe:friendlink_edit.php?id="+id,"650","260","true",0,"true");
	}else{
		mx_msg("亲，请求参数不正确！");
		}
}
/*友情链接分类管理*/
function friendlinkmanage(){
	tipwindow("分类管理","iframe:friendlink_type_list.php","900","450","true",0,"true");
	}
/*友情链接修改标题*/
function edit_title(id){
	var title2=$("#lc_title"+id).val();
		if(title2!==""){
			$.post("action/friendlink_ajax.php",{id:id,title:title2,action:'title'},function(data){
			if(data=="yes"){
				mx_msg("修改成功！");
				}else{
					mx_msg("修改失败！");
					}
			})
			}
	}
function edit_paixu(id){
	var paixu=$("#paixu_input_"+id).val();
	if(paixu){
		$.post("action/friendlink_ajax.php",{id:id,sort_id:paixu,action:'sort'},function(data){
			if(data=="yes"){
				mx_msg("排序成功！");
				}else{
					mx_msg("排序失败！");
					}
			})
		}
	}
function check_search(){
	var c_id = document.getElementById("c_id").value;
	if(c_id==0){
		mx_msg("亲，请选择相应分类！");
		return false;
		}
	}
function friendlink_showhide(o,id){
	var zt = parseInt(o.getAttribute('data-zt'));//状态
	if(zt==-1){
		zt=0;//显示
		}else{
			zt=-1;//隐藏
		}
	$.post("action/friendlink_ajax.php",{id:id,zt:zt,action:'zt'},function(data){
		if(data=='yes'){
			mx_msg("更新成功！");
			o.setAttribute('data-zt',zt);
			if(zt==-1){
				o.innerHTML='&#xe9d1;';
				}else{
					o.innerHTML='&#xe9ce;';
					}
			}else{
				mx_msg("更新失败！");
				}
		})
	}
$(function(){
	//分类选择
	$(".sort_select").find(".down").click(function(){
		$(this).parent().children('ul').toggle();
		});
	$('.sort_select>ul>li').each(function(index, element) {
        $(this).click(function(){
			var lanmu = "<?php echo $lanmu?>",
				cid = $(this).children('span').attr('data-cid');
			mx_loadwait('正在加载中…');
			$("#mx_right").load("friendlink_list.php",{lanmu:lanmu,c_id:cid},function(){mx_loadremove()});
			});
    });
})
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="release" onClick="addfriendlink(<?php echo $c_id?>)">发布友情链接</a></li>  
        <li><a onClick="friendlinkmanage()" class="typemanage">分类管理</a></li>
        <li class="searcharea">
          <form method="post" action="list.php?C=banner_list" onSubmit="return check_search()">
            <input name="type" type="hidden" value="<?php echo $type?>">
            <div class="sort_select"><span>
              <?php $type_title=get_friendlinktype_by_id($c_id);if($type_title!==''){echo $type_title;}else{echo '点击选择分类';}?>
              </span><em class="down mxicon">&#xe42d;</em>
              <input name="c_id" type="hidden" value="<?php echo $c_id?>">
              <ul style="width:98%">
                <?php 
				$sql2 = "select c_id,c_title from ".lc()."_friendlink_type order by c_sort_id desc";
				$rs2 = mysql_query($sql2);
				if($rs2)
				while($rows2 = mysql_fetch_assoc($rs2)){?>
                <li><span data-cid="<?php echo $rows2["c_id"]?>" title="<?php echo $rows2["c_title"]?>"><?php echo $rows2["c_title"]?></span></li>
                <?php }?>
                <div class="clear"></div>
              </ul>
            </div>
            <input type="text" class="searchinput mxicon" placeholder="搜索从这里开始" onBlur="change_search(this,2)" onClick="change_search(this,1)">
            <input type="submit" class="searchsub mxicon" value="&#xe986;">
          </form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
      <input name="action" type="hidden" value="friendlink">
      <input name="lc_del" type="hidden" value="1">
      <input name="c_id" type="hidden" value="<?php echo $c_id?>">
      <div class="list">
        <ul class="list_head">
          <li>
          	<span>选择</span>
          	<span>序号</span>
          	<span style="width:300px">标题</span>
          	<span class="spanr">删除</span>
          	<span class="spanr">修改</span>
          	<span class="spanr">是否显示</span>
          	<span class="spanr">配图</span>
          	<span class="spanr">发布时间</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
        	$i=0;$sort='';
        	while($rows=mysql_fetch_assoc($rs)){
			$i++;
			if($i==1){
				$a="";
			}else{
				$a=",";
			}?>
          <li id="list_<?php echo $rows["lc_id"]?>">
	          <span><input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>"></span>
	          <span class="m_sort"><input style="width:40px; text-align:center" type="text" id="paixu_input_<?php echo $rows['lc_id']?>" onChange="edit_paixu(<?php echo $rows['lc_id']?>)" value="<?php echo $rows['lc_sort_id']?>" class="sort_input"></span>
	          <span class="list_title"><input style="width:400px" value="<?php echo $rows['lc_title']?>" id="lc_title<?php echo $rows['lc_id']?>" onChange="edit_title(<?php echo $rows['lc_id']?>)" class="title_input"></span>
	          <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',12,1)">&#xe9ac;</a><?php }?></span>
	          <span class="spanr mxicon"><a class="icon iconPcel" onClick="editfriendlink(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
	          <span class="spanr mxicon"><a onClick="friendlink_showhide(this,<?php echo $rows['lc_id']?>)" data-zt='<?php echo $rows['lc_zt']?>'><?php if($rows['lc_zt']==0){echo '&#xe9ce;';}else{echo '&#xe9d1;';}?></a></span>
	          <span class="spanr mxicon"><?php if($rows['lc_pic']!=''){ echo '<a class="icon iconPic" title="是">是</a>';}else{ echo '<a class="icon iconPic_hui" title="否">否</a>';}?></span>
	          <span class="spanr"><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></span>
          </li>
          <?php $sort.=$a.$rows['lc_sort_id'];
        	}
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="friendlink" value="<?php echo $sort?>">     
      </div>
      <div class="checkall_op">
        <?php
		if($pagesize<$total_num){
			include(LC_MX.'Lib/page.php');
			$page_url="list.php?C=friendlink_list&lanmu={$lanmu}&page={page}";
			if($sortnum>0){
				$page_url.="&sortnum={$sortnum}";
			}
			$the_page = new PageClass($total_num,$pagesize,$page,$page_url);
			echo $the_page ->myde_write();
		}?>
        <div class="clear"></div>
      </div>
      </form>
    </div>
  </div>
</div>