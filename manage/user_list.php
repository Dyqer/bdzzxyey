<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('user');//会员管理权限验证
SetSysEvent('user_list');//添加日志功能

$key = isset($_POST['key'])?(string)$_POST['key']:null;
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$pagesize = 10;

$sql_num = "select lc_id from ".lc()."_user ";
$wheresql = " where 1=1 ";
if($key<>""){
  $wheresql.= " and lc_title like '%{$key}%'";
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

$sql = "select * from ".$lc."_user ";
$sql.= $wheresql." order by lc_id desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
function closetipwin(){
	var key = "<?php echo $key?>",
  		num = $("#orderlist").attr('data-num');
	$.post("action/user_ajax.php",{action:'num',key:key},function(data){
		if(data!==num){
			mx_loadwait('正在加载中…');
			$("#mx_right").load("user_list.php",function(){mx_loadremove()});
		}
    })
}
/*点击关闭窗口*/
var RegUser = function() {
  tipwindow("会员注册", "iframe:user_add.php", "500", "430", "true", 0, "true");
} 
var editUser = function(id) {
  tipwindow("会员修改", "iframe:user_edit.php?id="+id, "500", "430", "true", 0, "true");
}
var UserTypeManage = function() {
  tipwindow("会员等级", "iframe:user_type_list.php", "860", "460", "true", 0, "true");
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
        <li><a onClick="RegUser()" class="release">会员注册</a></li>
        <li style="margin-left:5px"><a onClick="UserTypeManage()" class="typemanage">会员等级管理</a></li>
        <li class="searcharea">
        <form method="post" action="list.php?C=user_list" onSubmit="return check_search()"><span class="sort_t">会员查找：</span>
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
            <span>用户名</span>
            <span>姓名</span>
            <span>会员等级</span>
            <span class="spanr">删除</span>
            <span class="spanr">修改</span>
            <span class="spanr">订单</span>
            <span class="spanr">购物车</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
          while($rows=mysql_fetch_assoc($rs)){?>
          <li id="list_<?php echo $rows["lc_id"]?>">
            <span><?php echo $rows['lc_id']?></span>
            <span><?php echo $rows['lc_title']?></span>
            <span><?php if($rows['lc_name']){echo $rows['lc_name'];}else {echo "无";}?></span>
            <span><?php echo get_user_type('lc_title',$rows['lc_zt'])?></span>
            <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',9,1)">&#xe9ac;</a><?php }?></span>
            <span class="spanr mxicon"><a class="icon iconPcel" onClick="editUser(<?php echo $rows['lc_id']?>)">&#xe905;</a></span>
            <span class="spanr mxicon"><a href="list.php?C=user_orderlist&id=<?php echo $rows["lc_id"]?>" target="_blank" class="icon iconPcel">&#xe9b9;</a></span>
            <span class="spanr mxicon"><a href="list.php?C=user_shoppinglist&id=<?php echo $rows["lc_id"]?>" target="_blank" class="icon iconPcel">&#xe93a;</a></span>
          </li>
          <?php
          }
        }?>
        </ul>
        <input type="hidden" id="orderlist" data-num='<?php echo $total_num?>' title="user">
      </div>
      <div class="checkall_op">
        <?php
        if($pagesize<$total_num){
          include(LC_MX.'Lib/page.php');
          $page_url="list.php?C=user_list&page={page}";
          $the_page = new PageClass($total_num,$pagesize,$page,$page_url);
          echo $the_page ->myde_write();
        }?>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>