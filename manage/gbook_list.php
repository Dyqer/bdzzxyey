<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('gbook');//留言管理权限验证
SetSysEvent('gbook_list');//添加日志功能

$key = isset($_POST['key'])?(string)$_POST['key']:null;
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;
if(!$lanmu){
  $lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//获取栏目编号
  if(!$lanmu){
    $lanmu = get_lanmu_by_type(5);//获取留言的栏目
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

$sql_num = "select lc_id from ".$lc."_gbook ";
$wheresql = " where lanmu='{$lanmu}'";
if($key<>""){
  $wheresql.= " and lc_title like '%{$key}%'";
}
$sql_num = $sql_num.$wheresql." order by lc_id desc";
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

$sql = "select * from ".$lc."_gbook ";
$sql = $sql.$wheresql." order by lc_zt ,lc_id desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
function closetipwin(){}
var editGbook = function(id) {
  tipwindow("留言修改", "iframe:gbook_edit.php?id="+id, "900", "527", "true", 0, "true");
}
function gbook_replay(id){
  var reply=$("#lc_reply"+id).val();
  if(reply&&id){
    $.post("action/gbook_ajax.php",{id:id,reply:reply,action:'reply'},function(data){
      if(data){
        if(data=="yes"){
          mx_msg("亲，回复成功！");
          }else{
            mx_msg("亲，回复失败！");
            }
        }else{
          mx_msg("亲，请求超时，请稍候重试！");
          }
      })
    }else{
      mx_msg("亲，回复内容不能为空！");
      }
  }
function check_search(){
  var key = document.getElementById("key").value;
  if(!key){
    mx_msg("亲，搜索值不能为空！");
    return false;
    }
  }
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
      	<li><a>留言列表</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=gbook_list" onSubmit="return check_search()">
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
    <input name="action" type="hidden" value="gbook">
    <input name="lc_del" type="hidden" value="1">
    <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
      <div class="list">
        <ul class="list_head">
          <li>
            <span>选择</span>
            <span>姓名</span>
            <span style="width:400px">标题</span>
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
            <span><?php if($rows['lc_name']){echo $rows['lc_name'];} else{ echo '&nbsp;';}?></span>
            <span style="width:400px"><?php echo $rows['lc_title']?></span>
            <span><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></span>    
            <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',5,1)">&#xe9ac;</a><?php }?></span>
            <span class="spanr mxicon"><a class="icon iconPcel" onClick="editGbook(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
            <span class="spanr">
              <?php
				switch($rows['lc_zt']){
				  case -1:
					echo '<samp style="color:red">未读</samp>';
					break;
				  case 0:
					echo '未通过';
					break;
				  case 1:
					echo '通过';
					break;
				}?>
            </span>
          </li>
          <?php $sort.=$a.$rows['lc_sort_id'];
          }
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="gbook" value="<?php echo $sort?>">
      </div>
      <div class="checkall_op">
      <div class="checkall">
        <input type="checkbox" id="checkall" onClick="SelectCheckBox(this)" title="全选">
        <input type="submit" class="checkall_sub" value="删&nbsp;&nbsp;除">
        </div>
        <?php
        if($pagesize<$total_num){
          include(LC_MX.'Lib/page.php');
          $page_url="list.php?C=gbook_list&lanmu={$lanmu}&page={page}";
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