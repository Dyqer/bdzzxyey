<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('touch');//是否有权限管理手机
SetSysEvent('touch_banner_list');//添加日志功能

$sql="SELECT * FROM ".$lc."_touch_banner";
$rs = mysql_query($sql);
?>
<script src="resource/js/mxui.js"></script>
<script src="resource/js/sort.js"></script>
<script type="text/javascript">
var addBanner = function() {
	tipwindow("Banner添加", "iframe:touch_banner_add.php", "600", "200", "true", 0, "true");
}

var editBanner = function(id) {
	tipwindow("Banner修改", "iframe:touch_banner_edit.php?id="+id, "600", "200", "true", 0, "true"); 
}
function touchbanner_delete_queding(id){
	if(id){
		$.post("action/touch_banner_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，删除成功！');
					$("#touch_banner_list"+id).remove();//移除已删除的数据
					}else{
						mx_tipmsg('亲，删除失败！');
						}
				}else{
					mx_tipmsg('亲，请求超时，请稍候重试！');
					}
			})
		}else{
			mx_tipmsg('亲，请求参数有误！');
			}
	}
/*Banner修改标题*/
function Edit_title(o,id){
	var title = $(o).val();
		if(title!==""){
			$.post("action/touch_banner_ajax.php",{id:id,title:title,action:'title'},function(data){
			if(data=="yes"){
				mx_msg("亲，修改成功！");
				}else{
					mx_msg("亲，修改失败！");
					}
			})
			}else{
				mx_msg("亲，标题不能为空！");
				}
	}
function Edit_paixu(o,id){
	var paixu=$(o).val();
	if(paixu){
		$.post("action/touch_banner_ajax.php",{id:id,sortid:paixu,action:'sort'},function(data){
			if(data=="yes"){
				mx_msg("亲，排序成功！");
				}else{
					mx_msg("亲，排序失败！");
					}
			})
		}else{
			mx_msg("亲，排序值不能为空！");
			}
	}
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="typemanage" href="list.php?C=touchconfig">系统设置</a></li>
        <li><a class="typemanageh"  href="list.php?C=touch_banner_list">Banner管理</a></li>
        <li><a class="typemanage" href="list.php?C=touch_bot">底部信息</a></li>
        <li><a class="typemanage" href="list.php?C=touch_introduction">公司简介</a></li>
      </ul>
    </div>
    <div style=" min-height:30px; border-top:#e1e1e1 solid 1px;">
      	<ul style="padding-top:12px; padding-bottom:10px; padding-left:20px;">      
        	<li style="float:left"><a class="typemanageh" style=" height:38px; line-height:38px; display:block; text-align:center; font-size:1.125em; padding-left:1.5em; padding-right:1.5em;" onClick="addBanner()">Banner添加</a></li>
      	</ul>
	</div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
    <form name="del" method="post" action="action/del_all.php">
      <div class="list"> 	
        <ul class="pro" id="list">
        <?php
	      if($rs){
			while($rows=mysql_fetch_assoc($rs)){?>
          <li id="touch_banner_list<?php echo $rows["lc_id"]?>">
            <div>
            	<a onclick="editBanner(<?php echo $rows['lc_id']?>)">
            		<img src="<?php echo $rows['lc_pic']?>" onerror="this.src='resource/images/loading.gif'" width="211" height="146"/>
            	</a>
            </div>
            <div>
              <input type="text" class="pro_title" onChange="Edit_title(this,<?php echo $rows['lc_id'] ?>)" value="<?php echo mb_substr($rows['lc_title'],0,30,"utf-8")?>"><input type="text" class="pro_sort" id="paixu_input_<?php echo $rows['lc_id']?>" onChange="Edit_paixu(this,<?php echo $rows['lc_id']?>)" value="<?php echo $rows['lc_sort_id']?>">
            </div>
            <dl class="pro_list_op">
              <dt><?php echo $rows['lc_id']?></dt>
              <dl>
                <dt class="mxicon"><a title="修改" onclick="editBanner(<?php echo $rows['lc_id']?>)">&#xe905;</a></dt>
                <dt class="mxicon del"><?php if($rows['lc_cant_del']==1){ echo '<a title="不可删">不可删</a>';}else{?><a title="删除" id="del_op<?php echo $rows['lc_id']?>" onClick="del_op(this,'<?php echo $rows['lc_id']?>',10,1)">&#xe9ac;</a><?php }?></dt>
        
              </dl>
              <div class="clear"></div>
            </dl>
          </li>
	        <?php
	        $sort.=$a.$rows['lc_sort_id'];
			} }?>
          <div class="clear"></div>
        </ul>
      </div>     
      	<div class="clear"></div>
      </form>
    </div>
  </div>
</div>
