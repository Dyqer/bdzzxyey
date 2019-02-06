<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('job');//职位招聘管理权限验证
SetSysEvent('jianli_list');//添加日志功能

$key = isset($_POST['key'])?(string)$_POST['key']:null;
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
  $page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$paixu_num = isset($_GET['paixu_num'])?(int)$_GET['paixu_num']:0;//获取排序个数
if(!$paixu_num){
  $paixu_num = isset($_POST['paixu_num'])?(int)$_POST['paixu_num']:0;
}
$pagesize = $paixu_num>0 ? $paixu_num:10;

$sql_num = "select lc_id from ".$lc."_jianli ";
$wheresql = " where 1=1";
if($key<>""){
  $wheresql.= " and lc_title like '%{$key}%' ";
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

$sql = "select * from ".$lc."_jianli ";
$sql = $sql.$wheresql." order by lc_id desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script type="text/javascript">
function closetipwin(){}
var Seejianli = function(id){
	tipwindow("简历查看", "iframe:jianli_show.php?id="+id, "900", "527", "true", 0, "true");
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
      	<li><a>简历列表</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=jianli_list" onSubmit="return check_search()"><span class="sort_t">简历查找：</span>
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
    <input name="action" type="hidden" value="resume">
    <input name="lc_del" type="hidden" value="0">
      <div class="list">
        <ul class="list_head">
          <li>
            <span>选择</span>
            <span>性别</span>
            <span>姓名</span>
            <span class="spanr">删除</span>
            <span class="spanr">查看</span>
            <span class="spanr">状态</span>
            <span class="spanr">添加时间</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
          while($rows=mysql_fetch_assoc($rs)){?>
          <li id="list_<?php echo $rows["lc_id"]?>">
            <span><input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>"></span>
            <span><?php if($rows['lc_sex']){echo $rows['lc_sex'];}{ echo '&nbsp;';}?></span>
            <span><?php echo $rows['lc_title']?></span>
            <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',7,1)">&#xe9ac;</a><?php }?></span>
            <span class="spanr mxicon"><a class="icon iconPcel" onClick="Seejianli(<?php echo $rows['lc_id']?>)" >&#xe986;</a></span>
            <span class="spanr"><?php if($rows['lc_zt']==-1){echo '<font style="color:red">未读</font>';}else{ echo '已读';}?></span>
            <span class="spanr"><?php echo date('Y-m-d',strtotime($rows['lc_datetime']))?></span>
          </li>
          <?php
          }
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="resume">
      </div>
      <div class="checkall_op">
      <div class="checkall">
        <input type="checkbox" id="checkall" onClick="SelectCheckBox(this)" title="全选">
        <input type="submit" class="checkall_sub" value="删&nbsp;&nbsp;除">
        </div>
        <?php
        if($pagesize<$total_num){
          include(LC_MX.'Lib/page.php');
          $page_url="list.php?C=jianli_list&lanmu={$lanmu}&page={page}";
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