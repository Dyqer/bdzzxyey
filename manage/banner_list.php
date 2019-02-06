<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('gaoji');//高级管理权限验证
SetSysEvent('banner_list');//添加日志功能

$type = isset($_GET['type'])?(int)$_GET['type']:0;
if(!$type){
	$type = isset($_POST['type'])?(int)$_POST['type']:0;//获取所属类型
	if(!$type){
		$type = 1;//初始默认值(banner管理)
	}
}

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;//获取分类
if(!$c_id){
	$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;
}
if($c_id==0){
	$c_id = get_banner_type_cid($type);//从分类中获取一个分类id
}
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}

$key = isset($_POST['key'])?(string)$_POST['key']:null;
$paixu_num = isset($_GET['paixu_num'])?(int)$_GET['paixu_num']:0;//获取排序个数
if(!$paixu_num){
	$paixu_num = isset($_POST['paixu_num'])?(int)$_POST['paixu_num']:0;
}

$pagesize = $paixu_num>0 ? $paixu_num:10;

$sql_num = "select lc_id from ".$lc."_banner";
$wheresql=" where lc_zt=1 and lc_type='{$type}'";
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

$sql = "select * from ".$lc."_banner";
$sql.=$wheresql.$ordersql." limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
function closetipwin(){
	var page="<?php echo $page?>",
		c_id="<?php echo $c_id?>",
		type="<?php echo $type?>",
		num = $("#orderlist").attr('data-num');
	$.post("action/banner_ajax.php",{action:'bannernum',ctype:type,c_id:c_id},function(data){
		if(data!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("banner_list.php",{"c_id":c_id,"page":page,"type":type},function(){mx_loadremove()});
			}
		})
	}
/*点击关闭窗口*/
/*发布Banner*/
function addbanner(c_id){
	if(c_id){
		tipwindow("<?php if($type==1){echo "Banner";}elseif($type==2){echo "广告";}?>添加","iframe:banner_add.php?type=<?php echo $type?>","650","230","true",0,"true");
	}else{
		mx_msg("亲，请先添加分类,再发布<?php if($type==1){echo "Banner";}elseif($type==2){echo "广告";}?>图！");
		}
	}
/*修改Banner*/
function editbanner(id){
	if(id){
		tipwindow("<?php if($type==1){echo "Banner";}elseif($type==2){echo "广告";}?>修改","iframe:banner_edit.php?id="+id,"650","230","true",0,"true");
	}else{
		mx_msg("亲，请求参数不正确！");
		}
}
/*Banner分类管理*/
function bannermanage(){
	tipwindow("分类管理","iframe:banner_type_list.php?type=<?php echo $type?>","900","450","true",0,"true");
	}
/*Banner修改标题*/
function edit_ban_title(o,id){
	var title = $(o).val();
	if(title!==""){
		$.post("action/banner_ajax.php",{id:id,title:title,action:1},function(data){
			if(data=="yes"){
				mx_msg("修改成功！");
				}else{
					mx_msg("修改失败！");
					}
			})
			}
	}
function edit_ban_paixu(o,id){
	var paixu = $(o).val();
	if(paixu){
		$.post("action/banner_ajax.php",{id:id,sort_id:paixu,action:2},function(data){
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
$(function(){
	//分类选择
	$(".sort_select").find(".down").click(function(){
		$(this).parent().children('ul').toggle();
		});
	$('.sort_select>ul>li').each(function(index, element) {
        $(this).click(function(){
			var lanmu = "<?php echo $lanmu?>",
				type = "<?php echo $type?>",
				cid = $(this).children('span').attr('data-cid');
			mx_loadwait('正在加载中…');
			$("#mx_right").load("banner_list.php",{lanmu:lanmu,c_id:cid,type:type},function(){mx_loadremove()});
			});
    });
})
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="release" onClick="addbanner(<?php echo $c_id?>)" id="fu_right_top_moren">发布
          <?php if($type==1){echo "Banner";}elseif($type==2){echo "广告";}?>
          </a></li>
        <li><a onClick="bannermanage()" class="typemanage">分类管理</a></li>
        <li class="searcharea">
          <form method="post" action="list.php?C=banner_list" onSubmit="return check_search()">
            <input name="type" type="hidden" value="<?php echo $type?>">
            <div class="sort_select"><span>
              <?php $type_title=get_bannertype_by_id($c_id);if($type_title!==''){echo $type_title;}else{echo '点击选择分类';}?>
              </span><em class="down mxicon">&#xe42d;</em>
              <input name="c_id" type="hidden" value="<?php echo $c_id?>">
              <ul style="width:98%">
                <?php 
				$sql2 = "select c_id,c_title from ".lc()."_banner_type where c_type='{$type}' order by c_sort_id desc";
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
        <input name="action" type="hidden" value="banner">
        <input name="lc_del" type="hidden" value="1">
        <input name="type" type="hidden" value="<?php echo $type?>">
        <div class="list">
          <ul class="pro" id="Dragdrop_ranking">
            <?php
			$rs = mysql_query($sql);
			if($rs){
				$i=0;
				while($rows=mysql_fetch_assoc($rs)){
					$i++;
		        	$a = $i==1?'':',';//拖拽排序作用
			?>
            <li id="list_<?php echo $rows["lc_id"]?>">
              <div class="m_sort"><img src="<?php echo $rows['lc_pic']?>" onerror="this.src='resource/images/loading.gif'" width="211" height="146"/></div>
              <div>
                <input type="text" class="pro_title" onChange="edit_ban_title(this,<?php echo $rows['lc_id'] ?>)" value="<?php echo mb_substr($rows['lc_title'],0,10,"utf-8")?>"><input type="text" onChange="edit_ban_paixu(this,<?php echo $rows['lc_id'] ?>)" class="pro_sort" value="<?php echo $rows['lc_sort_id']?>">
              </div>
              <dl class="pro_list_op">
                <dt>
                  <input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>">
                </dt>
                <dt><?php echo $rows['lc_id']?></dt>
                <dl>
                  <dt class="mxicon"><a title="修改" onClick="editbanner(<?php echo $rows['lc_id']?>)">&#xe905;</a></dt>
                  <dt class="mxicon del">
                    <?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?>
                    <a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',14,1)">&#xe9ac;</a>
                    <?php }?>
                  </dt>
                </dl>
                <div class="clear"></div>
              </dl>
            </li>
            <?php
	        $sort.=$a.$rows['lc_sort_id'];
			}}?>
            <div class="clear"></div>
            <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="banner" value="<?php echo $sort?>">
          </ul>
        </div>
        <div class="checkall_op">
          <div class="checkall">
            <input type="checkbox" id="checkall" onClick="SelectCheckBox(this)" title="全选">
            <input type="submit" class="checkall_sub" value="删&nbsp;&nbsp;除">
          </div>
          <?php
		if($pagesize<$total_num){
			include(LC_MX.'Lib/page.php');
			$page_url="list.php?C=banner_list&lanmu={$lanmu}&page={page}";
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
