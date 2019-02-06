<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('dingdan');//单页管理权限验证
SetSysEvent('orderform_list');//添加日志功能

$zt = isset($_GET['zt'])?(int)$_GET['zt']:0;
if(!$zt){
	$zt = isset($_POST['zt'])?(int)$_POST['zt']:0;
}

$key = isset($_POST['key'])?(string)$_POST['key']:null;

$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
  $page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$pagesize = 10;

$sql_num = "select lc_id from ".$lc."_dingdan ";
$wheresql = " where lc_zt='{$zt}'";
if($key<>""){
  $wheresql.= " and lc_name like '%{$key}%'";
}
$sql_num = $sql_num.$wheresql;
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
$sql = "select * from ".$lc."_dingdan ";
$sql = $sql.$wheresql." limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script type="text/javascript">
function closetipwin(){}
var seeOrderform = function(id) {
	tipwindow("订单修改", "iframe:orderform_show.php?id="+id, "900", "527", "true", 0, "true"); 
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
        <li><a>订单列表</a></li>
        <li class="searcharea">
          <form method="post" action="list.php?C=orderform_list" onSubmit="return check_search()">
            <span class="sort_t">订单查找：</span>
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
        <input name="action" type="hidden" value="orderform">
        <input name="lc_del" type="hidden" value="1">
        <input name="zt" type="hidden" value="<?php echo $zt?>">
        <div class="list">
          <ul class="list_head">
            <li> <span>选择</span> <span>订单姓名</span> <span>账号</span> <span class="spanr">删除</span> <span class="spanr">查看</span> <span class="spanr">状态</span> <span class="spanr">等级</span> </li>
          </ul>
          <ul class="list_con Aline" id="Dragdrop_ranking">
            <?php 
			if($rs){
				while($rows=mysql_fetch_assoc($rs)){?>
            <li id="list_<?php echo $rows["lc_id"]?>"> <span>
              <input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>">
              </span> <span><?php echo $rows['lc_name']?></span> <span>
              <?php $user_name = get_user_by_id('lc_title',$rows['lc_user_id']);if($user_name){echo $user_name;}else{echo "无";}?>
              </span> <span class="spanr mxicon del">
              <a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',8,1)">&#xe9ac;</a>
              </span> <span class="spanr mxicon"><a title="查看" onClick="seeOrderform(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
              <span class="spanr"><?php echo order_zt_name($rows['lc_zt'])?></span>
              <span class="spanr"><?php echo get_user_type('lc_title',get_user_by_id('lc_zt',$rows['lc_user_id']))?></span>
           </li>
            <?php
          }
        }?>
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
          $page_url="list.php?C=orderform_list&page={page}&zt={$zt}";
          $the_page = new PageClass($total_num,$pagesize,$page,$page_url);
          echo $the_page ->myde_write();
        }?>
          <div class="clear"></div>
        </div>
      </form>
    </div>
  </div>
</div>
