<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('danye');//单页管理权限验证
//SetSysEvent('rizhi');//添加日志功能

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
$pagesize = $sortnum>0 ? $sortnum:15;

$sql_num = "select lc_id from ".$lc."_sysevent";
//$wheresql = " where lc_del=0 ";
$rs_num = mysql_query($sql_num);
if($rs_num){
  $total_num = mysql_num_rows($rs_num);
}else{
  $total_num = 0;
}
$total_page = ceil($total_num/$pagesize);//总共的条数 比上 每页的条数
$page = ($page<1)?1:$page;
$page = ($page>$total_page)?$total_page:$page;
$fromrow = ($page-1)*$pagesize;
/*分页*/

$sql = "SELECT * FROM ".$lc."_sysevent ORDER BY lc_id DESC limit {$fromrow},{$pagesize}"; 

$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
/*点击关闭窗口*/
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
        <li><a class="release">操&nbsp;作&nbsp;日&nbsp;志</a></li>
        <!-- <li class="searcharea">
        <form method="post" action="list.php?C=danye_list" onSubmit="return check_search()"><span class="sort_t">排序个数：</span><input name="sortnum" id="sortnum" type="text" class="sortnum">
          <input type="text" name="key" class="searchinput mxicon" placeholder="搜索从这里开始" id="key" onBlur="change_search(this,2)" onClick="change_search(this,1)"><input type="submit" class="searchsub mxicon" value="&#xe986;"></form>
        </li> -->
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
    <input name="action" type="hidden" value="rizhi">
    <input name="lc_del" type="hidden" value="0">
    <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
      <div class="list">
        <ul class="list_head">
          <li>
            <span style="width:200px;">操作时间</span>
            <span style="width:200px;">操作者</span>
            <span style="width:200px;">操作栏目</span>
            <span style="width:200px;">操作IP</span>
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
          <li id="list_<?php echo $rows["lc_id"]?>" style="height:40px; line-height:30px;">
            <span style="width:200px; height:40px; line-height:40px;"><?php echo (isset($rows["lc_posttime"]) && !empty($rows["lc_posttime"]))?date("Y-m-d H:i:s",$rows["lc_posttime"]):"UnKnow" ;?></span>
            <span style="width:200px; height:40px; line-height:40px;"><?php echo (isset($rows["lc_uname"]) && !empty($rows["lc_uname"]))?$rows["lc_uname"]:"UnKnow" ?></span>
            <span style="width:200px; height:40px; line-height:40px;"><?php echo (isset($rows["lc_model"]) && !empty($rows["lc_model"]))?$rows["lc_model"]:"UnKnow" ?></span>            
            <span style="width:200px; height:40px; line-height:40px;"><?php echo (isset($rows["lc_ip"]) && !empty($rows["lc_ip"]))?$rows["lc_ip"]:"UnKnow" ?></span>            
          </li>
          <?php $sort.=$a.$rows['lc_sort_id'];
          }
        }?>
        </ul>
      </div>
      <div class="checkall_op">
        <?php
        if($pagesize<$total_num){
          include(LC_MX.'Lib/page.php');
          $page_url="list.php?C=rizhi&lanmu={$lanmu}&page={page}";
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