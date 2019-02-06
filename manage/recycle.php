<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('hsz');//回收站管理权限验证
SetSysEvent('recycle');//添加日志功能


$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
	$page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$zt = isset($_GET['zt'])?(int)$_GET['zt']:-1;//0是栏目1文章2图文3单页
if($zt==-1){
	$zt = isset($_POST['zt'])?(int)$_POST['zt']:0;
}
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
//数据恢复
function Reduction(id,type){
	if(id&&type){
		$.post("action/recycle_regain_ajax.php",{id:id,action:type},function(data){
			if(data){
				if(data=="yes"){
					mx_msg("亲，恢复成功！");
					//移除
					$("#list_"+id).remove();
					//栏目恢复需更新左侧子栏目
					if(type=='lanmu'){
						var jilutype=$("#jilutype_"+id).attr("data-ctype");
						if(jilutype=="0"){
							var b="dygl";//单页子栏目
							}
						if(jilutype=="1"){
							var b="xwgl";//文章子栏目
							}
						if(jilutype=="2"){
							var b="twgl";//图文子栏目
							}
						$("#ul_"+b).load("sub_lanmu.php",{type:jilutype});
						}
					}else{
						mx_msg("亲，恢复失败！");
						}
				}else{
					mx_msg("亲，请求超时，请稍候重试！");
					}
			})
	}else{
		mx_msg("亲，请求参数有误！");
		}
	}
function products_delete_queding(id){
	$.post("action/products_ajax.php",{del:1,id:id,action:'del'},function(data){
		if(data){
			if(data=="yes"){
				mx_msg("亲，删除成功！");
				$("#list_"+id).remove();
			}else{
				mx_msg("亲，删除失败！");
				}
		}else{
			mx_msg("亲，请求超时，请稍候重试！");
		}
		})
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a <?php if($zt==0){echo "class='typemanageh'";}else{echo "class='typemanage'";}?> onClick="recycle(0)">栏目</a></li>
        <li><a <?php if($zt==3){echo "class='typemanageh'";}else{echo "class='typemanage'";}?> onClick="recycle(1)">单页</a></li>
        <li><a <?php if($zt==1){echo "class='typemanageh'";}else{echo "class='typemanage'";}?> onClick="recycle(2)">文章</a></li>
        <li><a <?php if($zt==2){echo "class='typemanageh'";}else{echo "class='typemanage'";}?> onClick="recycle(3)">图文</a></li>
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
    <input name="action" type="hidden" value="<?php if($zt==0){echo 'lanmu';}if($zt==1){echo 'news';}if($zt==2){echo 'product';}if($zt==3){echo 'danye';}?>">
      <input name="lc_del" type="hidden" value="1">
      <div class="list">
        <ul class="list_head">
          <li>
          	<span>选择</span>
          	<span style="width:400px;"><?php if($zt==0){ echo '&nbsp;栏目名称';}else{ echo '&nbsp;标题';}?></span> 	
          	<span class="spanr">删除</span>
          	<span class="spanr">恢复</span>
          	<span class="spanr">栏目</span>
          	<span class="spanr"><?php if($zt==3){ echo '&nbsp;';}else{if($zt==0){echo "栏目类别";}else{echo '&nbsp;分类';}}?></span>         	
            <span class="spanr"><?php if($zt==0){ echo '&nbsp;';}else{ echo '删除时间';}?></span>
          </li>
        </ul>
        <ul class="list_con Aline" id="Dragdrop_ranking">
        <?php 
        if($zt==0){
			  //栏目
			  $pagesize = 8;
			  $sql_num = "select c_id from ".$lc."_lanmu where c_zt=0 and c_delete=0";
			  $sql_num.=" order by c_sort_id desc";
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
			  $sql = "select * from ".$lc."_lanmu where c_zt=0 and c_delete=0";
			  $sql = $sql." order by c_sort_id desc limit {$fromrow},{$pagesize}";
			  $rs = mysql_query($sql);
			  if($rs){
				$i=0;$sort='';
	        	while($rows=mysql_fetch_assoc($rs)){
	        		$i++;
	        		$a = $i==1?'':',';//拖拽排序作用{?>
          <li id="list_<?php echo $rows["c_id"]?>">
	          <span><input type="checkbox" name="id[]" value="<?php echo $rows['c_id']?>"></span>
	          <span style="width:400px;"><?php echo $rows['c_title']?></span>
	          <span class="spanr mxicon del"><a title="删除" id="del_op<?php echo $rows['c_id']?>" onClick="del_op(this,'<?php echo $rows['c_id']?>',0,1)">&#xe9ac;</a></span>
	          <span class="spanr mxicon" id="jilutype_<?php echo $rows["c_id"]?>" data-ctype="<?php echo $rows['c_type']?>"><a title="恢复" onClick="Reduction(<?php echo $rows['c_id']?>,'lanmu')">&#xe984;</a></span>	  
	          <span class="spanr"><?php echo $rows['c_id']?></span>
	          <span class="spanr"><?php echo get_lanmu_type($rows['c_type'])?></span>
	          <span class="spanr">&nbsp;&nbsp;</span> 
          </li>
          <?php
					}
				}
			}elseif ($zt==3){
				//单页
				$pagesize = 8;
				$sql_num = "select lc_id from ".$lc."_danye where lc_del=1";
				$sql_num.=" order by lc_sort_id desc";
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
				$sql = "select * from ".$lc."_danye where lc_del=1";
				$sql = $sql." order by lc_del_time desc,lc_sort_id desc limit {$fromrow},{$pagesize}";
				$rs = mysql_query($sql);
				if($rs){
				$i=0;$sort='';
	        	while($rows=mysql_fetch_assoc($rs)){
	        		$i++;
	        		$a = $i==1?'':',';//拖拽排序作用{?>
			<li id="list_<?php echo $rows["lc_id"]?>">
	          <span><input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>"></span>
	          <span style="width:400px;"><?php echo $rows['lc_title']?></span>
	          <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',1,1)">&#xe9ac;</a><?php }?></span>
	          <span class="spanr mxicon"><a title="恢复" onClick="Reduction(<?php echo $rows['lc_id']?>,'danye')">&#xe984;</a></span>
	          <span class="spanr"><?php $lanmu = get_danye_lanmu_by_id($rows['lc_id']); echo get_lanmu_title($lanmu)?></span>
	          <span class="spanr">&nbsp;&nbsp;</span>
	          <span class="spanr"><?php echo date('Y-m-d',strtotime($rows['lc_del_time']))?></span>
            </li>
          <?php
						}
					}
				}elseif ($zt==1){
					//文章
					$pagesize = 8;
					$sql_num = "select lc_id from ".$lc."_news where lc_del=1";
					if($c_id<>0){
						$sql_num = $sql_num." and c_id in (".get_news_all_child_id($c_id)."{$c_id})";
					}
					$sql_num = $sql_num." order by lc_sort_id desc";
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
					
					$sql = "select * from ".$lc."_news where lc_del=1";
					if($c_id<>0){
						$sql = $sql." and c_id in (".get_news_all_child_id($c_id)."{$c_id})";
					}
					$sql = $sql." order by lc_del_time desc,lc_sort_id desc limit {$fromrow},{$pagesize}";
					$rs = mysql_query($sql);
					if($rs){
					$i=0;$sort='';
		        	while($rows=mysql_fetch_assoc($rs)){
		        		$i++;
		        		$a = $i==1?'':',';//拖拽排序作用{?>
			<li id="list_<?php echo $rows["lc_id"]?>">
	          <span><input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>"></span>
	          <span style="width:400px;"><?php echo $rows['lc_title']?></span>
	          <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',2,1)">&#xe9ac;</a><?php }?></span>
	          <span class="spanr mxicon"><a title="恢复" onClick="Reduction(<?php echo $rows['lc_id']?>,'news')">&#xe984;</a></span>	  
	          <span class="spanr"><?php $lanmu = get_newstype_by_id($rows['c_id'],'lanmu'); echo get_lanmu_by_id($lanmu,'c_title')?></span>
	          <span class="spanr"><?php echo get_newstype_by_id($rows['c_id'],'c_title')?></span>
	          <span class="spanr"><?php echo date('Y-m-d',strtotime($rows['lc_del_time']))?></span> 
          	</li>
            <?php
						}
					}
				}elseif ($zt==2){
					//图文
					$pagesize = 8;
					$sql_num = "select lc_id from ".$lc."_products where lc_del=1";
					if($c_id<>0){
						$sql_num = $sql_num." and c_id in (".get_products_all_child_id($c_id)."{$c_id})";
					}
					$sql_num = $sql_num." order by lc_sort_id desc";
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
					$sql = "select * from ".$lc."_products where lc_del=1";
					if($c_id<>0){
						$sql = $sql." and c_id in (".get_products_all_child_id($c_id)."{$c_id})";
					}
					$sql = $sql." order by lc_del_time desc,lc_sort_id desc limit {$fromrow},{$pagesize}";
					$rs = mysql_query($sql);
					if($rs){
					$i=0;$sort='';
		        	while($rows=mysql_fetch_assoc($rs)){
		        		$i++;
		        		$a = $i==1?'':',';//拖拽排序作用{?>
				<li id="list_<?php echo $rows["lc_id"]?>">
		          <span><input type="checkbox" name="id[]" value="<?php echo $rows['lc_id']?>"></span>
		          <span style="width:400px;"><?php echo $rows['lc_title']?></span>
		          <span class="spanr mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',3,1)">&#xe9ac;</a><?php }?></span>
		          <span class="spanr mxicon"><a title="恢复" onClick="Reduction(<?php echo $rows['lc_id']?>,'products')">&#xe984;</a></span>	  
		          <span class="spanr"><?php $lanmu = get_producttype_by_id($rows['c_id'],'lanmu'); echo get_lanmu_by_id($lanmu,'c_title')?></span>
		          <span class="spanr"><?php echo get_producttype_by_id($rows['c_id'],'c_title')?></span>
		          <span class="spanr"><?php echo date('Y-m-d',strtotime($rows['lc_del_time']))?></span> 
	            </li>
			<?php 
		$sort.=$a.$rows['lc_sort_id'];}
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
			$url = "list.php?C=recycle&page={page}&zt={$zt}";
			$the_page = new PageClass($total_num,$pagesize,$page,$url);
			echo $the_page -> myde_write();
		}?>
        <div class="clear"></div>
      </div>
      </form>
    </div>
  </div>
</div>