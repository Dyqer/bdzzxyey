<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('user');//会员管理权限验证
SetSysEvent('user_orderlist');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//会员编号
$key = isset($_POST['key'])?(string)$_POST['key']:null;
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$pagesize = 10;

$sql_num = "select lc_id from ".lc()."_dingdan ";
$wheresql = " where lc_user_id='{$id}' ";
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
$sql.= $wheresql." order by lc_id desc limit {$fromrow},{$pagesize}";
$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script type="text/javascript">
function closetipwin(){}
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
      	<li><a class="release">会员订单</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=user_orderlist&id=<?php echo $id?>" onSubmit="return check_search()"><span class="sort_t">会员订单查找：</span>
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
      <div class="list">
        <ul class="list_head">
          <li>
            <span>序号</span>
            <span>订单名</span>
            <span>日期</span>
            <span>状态</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
          while($rows=mysql_fetch_assoc($rs)){?>
          <li id="list_<?php echo $rows["lc_id"]?>">
            <span><?php echo $rows['lc_id']?></span>
            <span><?php echo $rows['lc_name']?></span>
            <span><?php echo $rows['lc_add_time']?></span>
            <span><?php switch ($rows["lc_zt"]){case 0:echo "未付款";break;case 1:echo "已付款";break;case 2:echo "已发货";break;case 3:echo "已到货";break;}?></span>
          </li>
          <?php
          }
        }?>
        </ul>
      </div>
      <div class="checkall_op">
        <?php
        if($pagesize<$total_num){
          include(LC_MX.'Lib/page.php');
          $page_url="list.php?C=user_orderlist&page={page}";
          $the_page = new PageClass($total_num,$pagesize,$page,$page_url);
          echo $the_page ->myde_write();
        }?>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>