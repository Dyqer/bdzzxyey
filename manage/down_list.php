<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('down');//下载管理权限验证
SetSysEvent('down_list');//添加日志功能

$c_id = isset($_GET['c_id'])?(int)$_GET['c_id']:0;//获取分类
if(!$c_id){
  $c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;
}
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;
if(!$lanmu){
  $lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//获取栏目编号
  if(!$lanmu){
    $lanmu = get_lanmu_by_type(3);//获取下载的栏目
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
$pagesize = $sortnum>0 ? $sortnum:10;

$wheresql = " where 1=1 ";
$sql_num = "select lc_id from ".$lc."_down ";
if($c_id<>0){
  $wheresql.= " and c_id in (".get_down_all_child_id($c_id)."{$c_id})";
}
if($lanmu<>0){
  $wheresql.= " and c_id in (select c_id from ".$lc."_down_type where lanmu = {$lanmu})";
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

$sql = "select * from ".$lc."_down ";
$sql = $sql.$wheresql." order by lc_sort_id desc,lc_datetime desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
//需要重载数据
function closetipwin(){
	var lanmu="<?php echo $lanmu;?>",
		page="<?php echo $page;?>",
		c_id="<?php echo $c_id?>",
		num = $("#orderlist").attr('data-num'),
		key = "<?php echo $key?>";
  $.post("action/down_ajax.php",{action:'num',lanmu:lanmu,c_id:c_id,key:key},function(data){
    if(data!==num){
      mx_loadwait('正在加载中…');
      $("#mx_right").load("down_list.php",{lanmu:lanmu,page:page},function(){mx_loadremove()});
      }
    })
  }
/*点击关闭窗口*/

var addDown = function() {
  tipwindow("下载添加", "iframe:down_add.php?lanmu=<?php echo $lanmu?>","900","527","true",0,"true");
}
var editDown = function(id) {
  tipwindow("下载修改", "iframe:down_edit.php?lanmu=<?php echo $lanmu?>&id="+id,"900","527","true",0,"true");
}
var DownTypeManage = function() {
  tipwindow("分类管理", "iframe:down_type_list.php?lanmu=<?php echo $lanmu?>","860","460","true",0,"true");
}
function Edit_Title(o,id){
  var title=$(o).val();
  if(title==""){
    mx_msg("亲，标题不能为空！");
    }else{
    $.post("action/down_ajax.php",{title:title,id:id,action:'title'}, function(data){
      if(data){
        if(data=='yes'){
          mx_msg("亲，修改成功！");
        }else{
          mx_msg("亲，修改失败！");
          }
        }else{
          mx_msg("亲，请求超时，请稍候重试！");
          }
    });
  }
}
function check_search(){
	var key = document.getElementById("key").value,
		paixu = document.getElementById("sortnum").value,
		c_id = document.getElementById("c_id").value;
  if(!key&&!paixu&&c_id==0){
    mx_msg("亲，搜索值、排序值或者分类不能为空！");
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
			$("#mx_right").load("down_list.php",{lanmu:lanmu,c_id:cid},function(){mx_loadremove()});
			});
    });
})
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="addDown()" class="release">发布下载</a></li>
        <li><a onClick="DownTypeManage()" class="typemanage">分类管理</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=down_list" onSubmit="return check_search()">
        	<div class="sort_select"><span><?php $type_title=get_downtype_by_id($c_id);if($type_title!==''){echo $type_title;}else{echo '点击选择分类';}?></span><em class="down mxicon">&#xe42d;</em>
              <input name="c_id" type="hidden" value="<?php echo $c_id?>">
              <ul style="width:98%">
                <?php echo get_down_type_m(0,$c_id,$lanmu)?>
                <div class="clear"></div>
              </ul>
            </div>
        	<span class="sort_t">排序个数：</span><input name="sortnum" id="sortnum" type="text" class="sortnum">
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
      <input name="action" type="hidden" value="down">
      <input name="lc_del" type="hidden" value="1">
      <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
      <input name="c_id" type="hidden" value="<?php echo $c_id?>">
      <div class="list">
        <ul class="list_head">
          <li><span>选择</span>
            <span>序号</span>
            <span class="list_title">标题</span>
            <span>所属类别</span>
            <span>发布时间</span>
            <span class="spanr">删除</span>
            <span class="spanr">修改</span>
            <span class="spanr">推荐</span>
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
            <span class="list_title"><input type="text" value="<?php echo $rows['lc_title']?>" onChange="Edit_Title(this,<?php echo $rows['lc_id']?>)" class="title_input"></span>
            <span><?php echo get_downtype_by_id($rows['c_id'])?></span>
            <span><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></span>    
            <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',4,1)">&#xe9ac;</a><?php }?></span>
            <span class="spanr mxicon"><a class="icon iconPcel" title="修改" onClick="editDown(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
            <span class="spanr">
            <a onclick="recommend_op(this,'<?php echo $rows['lc_id']?>',3)" <?php if($rows['lc_tj']==1){echo 'data-jl="1" class="mxicon icon_show" title="是"';}else{echo 'data-jl="0" class="mxicon icon_hide" title="否"';}?>>&#xe9d9;</a>
            </span>
          </li>
          <?php $sort.=$a.$rows['lc_sort_id'];
          }
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="down" value="<?php echo $sort?>">
      </div>
      <div class="checkall_op">
        <div class="checkall">
        <input type="checkbox" id="checkall" onClick="SelectCheckBox(this)" title="全选">
        <input type="submit" class="checkall_sub" value="删&nbsp;&nbsp;除">
        </div>
        <?php
    if($pagesize<$total_num){
      include(LC_MX.'Lib/page.php');
      $page_url="list.php?C=down_list&lanmu={$lanmu}&page={page}";
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