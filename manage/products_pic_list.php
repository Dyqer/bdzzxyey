<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('products');//是否有添加图文权限
SetSysEvent('products_pic_list');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//图文编号
if(!$id){
	mx_msg("亲，请求参数有误！",'');
	exit;
}
/*获取多图*/
$sql_list="select * from ".$lc."_products_pics where product_id='{$id}'";
$rs_list = mysql_query($sql_list);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function del_pic(id){
	if(id==''){
		mx_tipmsg('亲，请求参数有误，请刷新页面重试！');
		}else{
			$.post("action/products_ajax.php",{picid:id,type:"one",action:'picdel'},function(data){
				if(data){
				if(data=="yes"){
					mx_tipmsg('亲，删除成功！');
					$("#pic_list_"+id).remove();//删除的图片移除掉
					}else{
						mx_tipmsg('亲，删除失败！');
					}
				}else{
					mx_tipmsg('亲，请求超时，请稍候重试！');
					}
				})
			}
	}
function edit_pic_title(o,id){
	var pic_title=$(o).val();//获取要更新的值
	if(pic_title){
		$.post("action/products_ajax.php",{id:id,title:pic_title,action:'pictitle'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，修改成功！');
					}else{
						mx_tipmsg('亲，修改失败！');
						}
			}else{
				mx_tipmsg('亲，请求超时，请稍候重试！');
				}
		})
	}else{
		mx_tipmsg('亲，标题不能为空！');
	}
}
function edit_pic_paixu(o,id){
	var pic_pai = $(o).val();//获取要更新的值
	if(pic_pai){
		$.post("action/products_ajax.php",{id:id,paixu:pic_pai,action:'picsort'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，修改成功！');
					}else{
						mx_tipmsg('亲，修改失败！');
						}
			}else{
				mx_tipmsg('亲，请求超时，请稍候重试！');
				}
			})
		}else{
			mx_tipmsg('亲，排序值不能为空！');
			}
	}
function choose_cover(id,product_id){
	if(id&&product_id){
		$.post("action/products_ajax.php",{id:id,pro_id:product_id,action:'picfm'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，选择封面成功！');
				}else{
					mx_tipmsg('亲，选择封面失败！');
					}
			}else{
				mx_tipmsg('亲，请求超时，请稍候重试！');
			}
		})
		}else{
			mx_tipmsg('亲，请求参数不正确！');
			}
	}
$(function(){
	//全选
	$("#select_all").click(function(){
		$('input[name="pic_list"]').attr("checked",this.checked);
		})
	$("#duotu_del_all").click(function(){
		var aa="";
		var i=1;
		$("input[name='pic_list']:checkbox:checked").each(function(){
			if(i==1){
			aa+=$(this).val();
			}else{
				aa+=","+$(this).val();
				}
			i++;
			})
		$.post("action/products_ajax.php",{picid:aa,type:"all",action:'picdel'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，删除成功！');
				}else{
					mx_tipmsg('亲，删除失败！');
				}
			}else{
				mx_tipmsg('亲，请求超时，请稍候重试！');
				}
			})
		})
	})
</script>
<style type="text/css">
#mx_tipmsg {
	width:160px;
	height:30px; line-height:30px;
	position:absolute;
	top:-30px;
	left:320px;
	background:#68af02;
	color:#FFF;
	text-align:center
}
/*多图列表*/
#duotu_list{min-height:260px; margin:6px 0;}
#duotu_list li {
	float: left;
	width: 214px;
	margin: 8px 15px 8px 15px;
}
#duotu_del_all {
	height: 26px;
	text-align: center;
	line-height: 26px;
	color: #ffffff;
	background: #48ac2e;
	padding-left: 10px;
	padding-right: 10px;
	border: 0px;
	cursor: pointer
}
.pic_title {
	width:150px;
	height:27px;
	line-height:27px;
	border:solid 1px #dfdfdf;
	padding-left:2px
}
#pic_del {
	cursor: pointer;
	width: 20px;
	height: 20px;
	float: right;
	margin:0 2px 0 6px;
	font-size:25px
}
#pic_del:hover {
	cursor: pointer
}
.paixu_input {
	width: 53px;
	height: 27px;
	line-height: 27px;
	border: solid 1px #dfdfdf;
	text-align: center
}
</style>
</head>
<body>
<div id="mx_tipmsg"></div>
<div style="width:860px; margin:0 auto">
  <ul id="duotu_list">
    <?php
      if($rs_list && mysql_num_rows($rs_list)>0){
		  while($rows_list=mysql_fetch_assoc($rs_list)){
			  $pic_id = $rows_list['lc_id'];
			  ?>
    <li id="pic_list_<?php echo $pic_id?>"><img src="<?php echo $rows_list['lc_pic']?>" width="214" height="138">
      <p>
        <input type="text" title="编辑可以修改标题！" class="pic_title" onChange="edit_pic_title(this,'<?php echo $pic_id?>')" value="<?php if(!$rows_list['lc_title']){echo "无标题";}else{echo $rows_list['lc_title'];}?>">
        <input type="text" title="编辑可以修改排序！" class="paixu_input" onChange="edit_pic_paixu(this,'<?php echo $pic_id?>')" value="<?php echo $rows_list['lc_sort_id']?>">
      </p>
      <p align="right">
        <input name="fengmian" <?php if($rows_list['lc_fengmian']==1){echo "checked";}?> id="fengmian_<?php echo $pic_id?>" onClick="choose_cover('<?php echo $pic_id?>','<?php echo $id?>')" type="radio">
        封面
        <input type="checkbox" style="margin-top: 10px; margin-left:10px" name="pic_list" value="<?php echo $pic_id?>" title="删除">
        <a id="pic_del" title="删除此图" onClick="del_pic('<?php echo $pic_id?>')">&times;</a></p>
    </li>
    <?php
	}
}else{
	echo "暂无图片";
}
?>
    <div class="clear"></div>
  </ul>
  <div>
    <input type="checkbox" id="select_all" title="全选">
    <input type="submit" id="duotu_del_all" value="删除" style="margin-left:6px">
  </div>
</div>
</body>
</html>