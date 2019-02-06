<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('products');//图文管理权限验证
SetSysEvent('products_list');//添加日志功能

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;//分类编号
if(!$c_id){
	$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;
}
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;
if(!$lanmu){
	$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//获取栏目编号
	if(!$lanmu){
		$lanmu = get_lanmu_by_type(2);//获取图文的栏目
	}
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

$pagesize = $paixu_num>0 ? $paixu_num:12;

$sql_num = "select lc_id from ".$lc."_products ";
$where_sql = " where lc_del=0";
if($c_id<>0){
	$where_sql.= " and c_id in (".get_products_all_child_id($c_id)."{$c_id})";
}
if($lanmu<>0){
	$where_sql.= " and c_id in (select c_id from ".$lc."_products_type where lanmu = '{$lanmu}')";
}
if($key<>""){
	$where_sql.= " and lc_title like '%{$key}%'";
}

$sql_num = $sql_num.$where_sql;
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

$sql = "select * from ".$lc."_products ";
$sql = $sql.$where_sql." order by lc_sort_id desc,lc_datetime desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
//需要重载数据
function closetipwin(){
	
	var lanmu="<?php echo $lanmu?>",
		c_id="<?php echo $c_id?>",
		page="<?php echo $page?>",
		key = "<?php echo $key?>",
		num = $("#orderlist").attr('data-num');
	
	$.post("action/products_ajax.php",{action:'num',lanmu:lanmu,key:key,c_id:c_id},function(data){
		if(data!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("products_list.php",{lanmu:lanmu,page:page,c_id:c_id},function(){mx_loadremove()});
			}
		})
	
	}
/*点击关闭窗口*/

var addProducts = function() {
	tipwindow("图文添加", "iframe:products_add.php?lanmu=<?php echo $lanmu?>", "900", "557", "true", 0, "true");
}
var editProducts = function(id) {
	tipwindow("图文修改", "iframe:products_edit.php?lanmu=<?php echo $lanmu?>&id="+id, "900", "527", "true", 0, "true"); 
}
var addProducts_piliang = function() {
	tipwindow("图文批量上传", "iframe:products_piliang.php?lanmu=<?php echo $lanmu?>", "900", "557", "true", 0, "true");
}
var ProductsTypeManage = function() {
	tipwindow("分类管理", "iframe:products_type_list.php?lanmu=<?php echo $lanmu?>", "860", "460", "true", 0, "true");
}
function edit_pro_title(id){
	var title = $("#edit_pro_title_"+id).val();
		if(title!==""){
			$.post("action/products_ajax.php",{id:id,title:title,action:'title'},function(data){
			if(data=="yes"){
				mx_msg("亲，修改成功！");
				}
			if(data=='notlogin'){
				mx_msg("亲，登录已过期！");
				mx_nologin();
				}
			})
			}else{
				mx_msg("亲，标题不能为空！");
				}
	}
function check_search(){
	var key = document.getElementById("key").value,
		paixu = document.getElementById("sortnum").value;
	if(!key&&!paixu){
		mx_msg("亲，搜索值、排序值不能为空！");
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
				cid = $(this).children('span').attr('data-cid');
			mx_loadwait('正在加载中…');
			$("#mx_right").load("products_list.php",{lanmu:lanmu,c_id:cid},function(){mx_loadremove()});
			});
    });
})
function show_qrcode(o,id){
	/*显示二维码*/
	var zt = $(o).attr('data-qrcode'),
		h = '<div class="qrcode" style="position:absolute; left:-158px; top:-210px; width:150px; height:150px"><img style="width:100%" src="action/3g_qr_code.php?a=productshow&id='+id+'"/></div>';
	if(zt=='0'){
		$(o).attr('data-qrcode',1).append(h);
	}else{
		$(o).find('.qrcode').show();
	}
}
function hide_qrcode(o){
	$(o).find('.qrcode').hide();
	}
/*多图管理*/
function multigraph_m(id){
	tipwindow("多图管理", "iframe:products_pic_list.php?id="+id, "900", "557", "true", 0, "true");
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="addProducts()" class="release">发布图文</a></li>
        <li><a onClick="ProductsTypeManage()" class="typemanage">分类管理</a></li>
        <li><a onClick="addProducts_piliang()" class="batchupload">批量上传</a></li>
        <li class="searcharea">
          <form method="post" action="list.php?C=products_list" onSubmit="return check_search()">
            <span class="sort_t">排序个数：</span>
            <input type="text" name="paixu_num" id="sortnum" class="sortnum">
            <div class="sort_select"><span><?php $type_title=get_producttype_by_id($c_id);if($type_title){echo $type_title;}else{echo '点击选择分类';}?></span><em class="down mxicon">&#xe42d;</em>
              <input name="c_id" type="hidden" value="<?php echo $c_id?>">
              <ul>
                <?php echo get_products_type_m(0,$c_id,$lanmu)?>
                <div class="clear"></div>
              </ul>
            </div>
            <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)">
            <input type="submit" class="searchsub mxicon" value="&#xe986;">
          </form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
      <form name="del" method="post" action="action/del_all.php">
        <input name="action" type="hidden" value="product">
        <input name="lc_del" type="hidden" value="0">
        <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
        <input name="c_id" type="hidden" value="<?php echo $c_id?>">
        <div class="list">
          <ul class="pro" id="Dragdrop_ranking">
            <?php
        if($rs){
		$i=0;
		while($rows=mysql_fetch_assoc($rs)){
			$i++;
        	$a = $i==1?'':',';//拖拽排序作用
		?>
            <li id="list_<?php echo $rows["lc_id"]?>">
              <div class="m_sort"><img src="<?php echo get_thumb_pic('',get_products_pic_by_proid($rows['lc_id']),small)?>" onerror="this.src='resource/images/loading.gif'" width="211" height="146"/></div>
              <div>
                <input type="text" class="pro_title" id="edit_pro_title_<?php echo $rows['lc_id']?>" onChange="edit_pro_title(<?php echo $rows['lc_id']?>)" value="<?php echo mb_substr($rows['lc_title'],0,36,"utf-8")?>"><input type="text" class="pro_sort" id="paixu_input_<?php echo $rows['lc_id']?>" onChange="Edit_paixu(<?php echo $rows['lc_id']?>,2)" value="<?php echo $rows['lc_sort_id']?>">
              </div>
              <dl class="pro_list_op">
                <dt>
                  <input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>">
                </dt>
                <dt><?php echo $rows['lc_id']?></dt>
                <dl>
                  <dt class="mxicon"><a title="修改" onClick="editProducts('<?php echo $rows['lc_id']?>')">&#xe905;</a></dt>
                  <dt class="mxicon"><a onclick="recommend_op(this,'<?php echo $rows['lc_id']?>',2)" <?php if($rows['lc_tj']==1){echo 'data-jl="1" class="icon_show" title="是"';}else{echo 'data-jl="0" class="icon_hide" title="否"';}?>>&#xe9d9;</a></dt>
                  <dt class="mxicon"><a title="多图管理" onClick="multigraph_m('<?php echo $rows['lc_id']?>')">&#xe927;</a></dt>
                  <dt class="mxicon"><a href="products_show.php?id=<?php echo $rows['lc_id']?>" title="预览" target="_blank" style="color:#333">&#xe986;</a></dt>
                  <dt class="mxicon del">
                    <?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?>
                    <a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',3,0)">&#xe9ac;</a>
                    <?php }?>
                  </dt>
                  <dt class="mxicon"><a class="<?php if($rows['lc_phone']==1){ echo 'icon_show';}else{echo 'icon_hide';}?>">&#xe958;</a></dt>
                  <dt class="mxicon" style="position:relative"><a title="二维码" onMouseOver="show_qrcode(this,'<?php echo $rows['lc_id']?>')" onMouseOut="hide_qrcode(this)" data-qrcode='0'>&#xe938;</a></dt>
                </dl>
                <div class="clear"></div>
              </dl>
            </li>
            <?php
	        $sort.=$a.$rows['lc_sort_id'];
			}}?>
            <div class="clear"></div>
            <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="products" value="<?php echo $sort?>">
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
			$page_url="list.php?C=products_list&lanmu={$lanmu}&page={page}&c_id={$c_id}";
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
