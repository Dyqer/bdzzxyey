<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('danye');//单页管理权限验证
SetSysEvent('danye_list');//添加日志功能

$key = isset($_POST['key'])?(string)$_POST['key']:null;
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

$sql_num = "select lc_id from ".$lc."_danye ";
$wheresql = ' where lc_del = 0 ';
if($lanmu<>0){
	$wheresql.= " and lanmu = '{$lanmu}'";
}
if($key<>""){
	$wheresql.= " and lc_title like '%{$key}%'";
}
$sql_num = $sql_num.$wheresql." order by lc_sort_id desc";

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

$sql = "select * from ".$lc."_danye ";
$sql = $sql.$wheresql." order by lc_sort_id desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
function closetipwin(){
	var lanmu="<?php echo $lanmu?>",
		page="<?php echo $page?>",
		num = $("#orderlist").attr('data-num'),
		key = "<?php echo $key?>";
	//需要重载数据
	$.post("action/danye_ajax.php",{action:'num',lanmu:lanmu,key:key},function(data){
		if(data!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("danye_list.php",{lanmu:lanmu,page:page,key:key},function(){mx_loadremove()});
			}
		})
	}
/*单页修改*/
function edit_singlepage(id) {
	tipwindow("单页修改", "iframe:danye_edit.php?id="+id, "950", "550", "true", 0, "true");
}
function check_search(){
	var key = document.getElementById("key").value,
		paixu = document.getElementById("sortnum").value;
	if(!key&&!paixu){
		mx_msg("亲，搜索值或者排序值不能为空！");
		return false;
		}
	}
function edit_title(o,id){
	var title = o.value;
	if(title==""){
		mx_msg("亲，标题不能为空！");
		}else{
		$.post("action/danye_ajax.php",{title:title,id:id,action:'title'}, function(data){
			if(data){
				if(data=='yes'){
					mx_msg("亲，更新成功！");
					}else{
						mx_msg("亲，更新失败！");
						}
				}else{
					mx_msg("亲，请求超时，请稍候重试！");
				}
		});
	}
}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="tipwindow('单页添加','iframe:danye_add.php?lanmu=<?php echo $lanmu?>','900','557','true',0,'true')" class="release">发布单页</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=danye_list" onSubmit="return check_search()"><span class="sort_t">排序个数：</span><input name="sortnum" id="sortnum" type="text" class="sortnum">
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
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
          	<span>选择</span>
          	<span>序号</span>
          	<span>编号</span>
          	<span class="list_title">标题</span>
          	<span class="spanr">删除</span>
          	<span class="spanr">修改</span>
          	<span class="spanr">审核</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
        	$i=0;$sort='';
        	while($rows=mysql_fetch_assoc($rs)){
        		$i++;
        		$a = $i==1?'':',';//拖拽排序作用
        	?>
          <li id="list_<?php echo $rows["lc_id"]?>">
	          <span><input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>"></span>
	          <span class="m_sort"><?php echo $rows['lc_sort_id']?></span>
	          <span><?php echo $rows['lc_id']?></span>
	          <span class="list_title"><input type="text" value="<?php echo $rows['lc_title']?>" onChange="edit_title(this,<?php echo $rows['lc_id']?>)" class="title_input"></span>
	          <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',1,0)">&#xe9ac;</a><?php }?></span>
	          <span class="spanr mxicon"><a title="修改" onClick="edit_singlepage(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
	          <span class="spanr"><?php if($rows['lc_zt']==1){ echo '通过';}else{ echo '未通过';}?></span>
          </li>
          <?php $sort.=$a.$rows['lc_sort_id'];
        	}
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="danye" value="<?php echo $sort?>">
      </div>
      <div class="checkall_op">
      <div class="checkall">
        <input type="checkbox" id="checkall" onClick="SelectCheckBox(this)" title="全选">
        <input type="submit" class="checkall_sub" value="删&nbsp;&nbsp;除">
        </div>
        <?php
		if($pagesize<$total_num){
			include(LC_MX.'Lib/page.php');
			$page_url="list.php?C=danye_list&lanmu={$lanmu}&page={page}";
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