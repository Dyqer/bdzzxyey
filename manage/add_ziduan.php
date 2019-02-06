<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证


$c_id = isset($_GET['id'])?(int)$_GET['id']:0;//分类编号
if(!$c_id){
	$c_id = isset($_POST['id'])?(int)$_POST['id']:0;
}
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
  $page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$paixu_num = isset($_GET['paixu_num'])?(int)$_GET['paixu_num']:0;//获取排序个数
if(!$paixu_num){
  $paixu_num = isset($_POST['paixu_num'])?(int)$_POST['paixu_num']:0;
}
$pagesize = $sortnum>0 ? $sortnum:10;
$sql_num = "select id from ".$lc."_zijian ";
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

$sql = "select * from ".$lc."_zijian ";
$sql = $sql.$wheresql." order by id desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<style>
.tijiao{width:123px; float:left; text-align:center;  height:38px; border:0; line-height:38px; font-size:14px; color:#333; margin-left:16px;color:#FFF;
background:#04B5AF; color:#fff; border-radius:3px; box-shadow:0 1px 1px #ddd;cursor:pointer;border:0px;border-bottom-style:none;border-top-style:none;border-left-style:none;border-right-style:none;
}
.mz{width:135px; height:35px; line-height:35px; float:left; margin:0 3px 0 15px; }
</style>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
function systemconfig_add(){
	var mingzi = $("#mingzi").val();
	//alert(mingzi);
	if(mingzi){
		//alert(mingzi);
			$.post("action/systemconfig_zdadd.php",{mingzi:mingzi},function(data){
					if(data){
						//alert(data);
						if(data == "yes"){
							//mx_msg("亲，添加成功！")
						   $("#msgBox span").text("亲，添加成功！").stop(true).show().delay(2000).hide("fast",function(){ location.href="list.php?C=add_ziduan&nav=8"});
						}
						else
						{
							mx_msg("亲，重复了！")
						}
							
								
					}else{
						mx_msg("亲，请求超时，请稍候重试！")
					}
				})
			}
		
	}

</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
		<div class="mx_right_top">
    <div class="operatearea" style="border:0">
      <ul class="operateul">
      	<?php require('systemconfig_top.php')?>
      	<li style="width:380px;"><input type="text" name="mingzi" id="mingzi" class="mz"> <input type="submit" class="tijiao" value="添加字段"  onClick="systemconfig_add()" ></li>
      </ul>
    </div>
  </div>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
        <form name="del" method="post" action="action/del_all.php">
        <input name="action" type="hidden" value="jian">
        <input name="lc_del" type="hidden" value="1">
        <input name="id" type="hidden" value="<?php echo $c_id?>">
        <div class="list">
          <ul class="list_head">
            <li>
            	<span>选择</span>
                <span>序号</span>
                <span class="list_title" style="font-size:14px; color:#666; font-family:微软雅黑">检测词语</span>
                <span></span>
                <span></span>
                <span class="spanr">删除</span>
                <span class="spanr"></span>
                <span class="spanr"></span>
            </li>
          </ul>
          <ul class="list_con Aline" id="Dragdrop_ranking">
            <?php 
			if($rs){
			  while($rows=mysql_fetch_assoc($rs)){
          ?>
            <li id="list_<?php echo $rows["id"]?>">
            <span><input type="checkbox" name="id[]" value="<?php echo $rows['id']?>"></span>
            <span class="m_sort"><?php echo $rows['id'] ?></span>
            <span class="list_title"><?php echo $rows['name']?></span>
            <span></span>
            <span></span>
            <span class="spanr mxicon del"><a title="删除" id="del_op<?php echo $rows['id']?>" onClick="del_op(this,'<?php echo $rows['id']?>',15,1)">&#xe9ac;</a></span>
            <span class="spanr mxicon"></span>
            <span class="spanr"></span>
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
          $page_url="list.php?C=add_ziduan&page={page}&c_id={$c_id}";
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
