<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('danye');//单页管理权限验证
SetSysEvent('job_list');//添加日志功能

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
$paixu_num = isset($_GET['paixu_num'])?(int)$_GET['paixu_num']:0;//获取排序个数
if(!$paixu_num){
  $paixu_num = isset($_POST['paixu_num'])?(int)$_POST['paixu_num']:0;
}
$pagesize = $paixu_num>0 ? $paixu_num:10;

$sql_num = "select lc_id from ".$lc."_job ";
$wheresql = " where 1=1";
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

$sql = "select * from ".$lc."_job ";
$sql = $sql.$wheresql." order by lc_sort_id desc,lc_datetime desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
//需要重载数据
function closetipwin(){
  var key="<?php echo $key?>";
  var num = $("#orderlist").attr('data-num');
  $.post("action/job_ajax.php",{action:'num',key:key},function(data){
    if(data!==num){
      mx_loadwait('正在加载中…');
      $("#mx_right").load("job_list.php",function(){mx_loadremove()});
      }
    })
  }
/*点击关闭窗口*/
var addjob = function() {
  tipwindow("职位添加", "iframe:job_add.php", "860", "460", "true", 0, "true");
}
var editjob = function(id) {
  tipwindow("职位修改", "iframe:job_edit.php?id="+id, "860", "460", "true", 0, "true");
}
function check_search(){
  var key = document.getElementById("key").value;
  if(!key){
    mx_msg("亲，搜索值不能为空！");
    return false;
    }
  }
function Edit_Title(id){
  var title=$('#lc_title'+id).val();
  var jilu =$('#lc_title'+id).attr("jilu");
  if(title==""){
    mx_msg("亲，标题不能为空！");
    }else{
  if(title!=jilu){
    $.post("action/job_ajax.php",{title:title,id:id,action:'title'},function(data){
      if(data){
        if(data=='yes'){
          $('#lc_title'+id).val(title);
          $('#lc_title'+id).attr("jilu",title);
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
}
<!--职位删除提示-->
function job_delete_queding(id){
  $.post("action/job_ajax.php",{id:id,action:'del'},function(data){
    if(data=="yes"){
      mx_msg("亲，删除成功！");
      $("#list"+id).remove();
      }else{
        mx_msg("亲，删除失败！");
        }
    })
  }
<!--职位删除提示End-->
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a onClick="addjob()" class="release">发布职位</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=job_list" onSubmit="return check_search()"><span class="sort_t">职位查找：</span>
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
    <input name="action" type="hidden" value="job">
    <input name="lc_del" type="hidden" value="1">
      <div class="list">
        <ul class="list_head">
          <li>
            <span>选择</span>
            <span>序号</span>
            <span class="list_title">职位标题</span>
            <span class="spanr">删除</span>
            <span class="spanr">修改</span>
            <span class="spanr">添加时间</span>
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
            <span class="list_title"><input type="text" value="<?php echo $rows['lc_title']?>" id="lc_title<?php echo $rows['lc_id']?>" onBlur="Edit_Title(<?php echo $rows['lc_id']?>)" class="title_input"></span>
            <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',6,1)">&#xe9ac;</a><?php }?></span>
            <span class="spanr mxicon"><a class="icon iconPcel" onClick="editjob(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
             <span class="spanr"><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></span>
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
          $page_url="list.php?C=job_list&lanmu={$lanmu}&page={page}";
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