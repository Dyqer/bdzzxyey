<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('user');//会员管理权限验证
SetSysEvent('user_shoppinglist');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//会员编号
$key = isset($_POST['key'])?(string)$_POST['key']:null;
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$pagesize = 10;

$sql_num = "select lc_id from ".$lc."_gwc ";
$wheresql = " where lc_user_id ='{$id}' and lc_zt=0";
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

$sql = "select * from ".$lc."_gwc ";
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
        <li><a class="release">会员购物车</a></li>
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
            <span>商品名称</span>
            <span>数量</span>
            <span>商品价格</span>
            <span class="spanr">查看商品</span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($rs){
          while($rows=mysql_fetch_assoc($rs)){?>
          <li id="list_<?php echo $rows["lc_id"]?>">
            <span><?php echo $rows['lc_id']?></span>
            <span><?php echo get_products_by_id($rows['lc_goods_id'])?></span>
            <span><?php echo $rows['lc_goods_num']?></span>
            <span><?php echo get_products_by_id($rows['lc_goods_id'],'lc_price')?></span>
            <span class="spanr mxicon"><a href="products_show.php?id=<?php echo $rows['lc_goods_id']?>" target="_blank" class="icon iconPcel">&#xe986;</a></span>
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
          $page_url="list.php?C=user_shoppinglist&id={$id}&page={page}";
          $the_page = new PageClass($total_num,$pagesize,$page,$page_url);
          echo $the_page ->myde_write();
        }?>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>