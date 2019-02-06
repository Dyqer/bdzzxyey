<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('products');//是否有添加图文权限
SetSysEvent('products_edit');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//图文编号
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;//所属栏目

$sql = "select * from ".$lc."_products where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
	/*获取多图*/
	$sql_list="select * from ".$lc."_products_pics where product_id='{$rows['lc_id']}'";
	$rs_list = mysql_query($sql_list);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script src="resource/js/jquery-ui-1.11.2.custom.min.js"></script>
<style type="text/css">
/*遮层*/
#overdiv {
	display: none;
	background-color: #999;
	width: 100%;
	height: 100%;
	left: 0;
	top: 0; /*FF IE7*/
	filter: alpha(opacity = 60); /*IE*/
	opacity: 0.6; /*FF*/
	z-index: 999;
	position: fixed !important; /*FF IE7*/
	_position: absolute; /*IE6*/
 _top:expression(eval(document.compatMode && document.compatMode == 'CSS1Compat') ? documentElement.scrollTop +( document.documentElement.clientHeight-this.offsetHeight )/2;/*IE6*/
 document.body.scrollTop+(document.body.clientHeight-this.clientHeight)/2);/*IE5 IE5.5*/
}
#showdiv {
	display: none;
	width: 800px;
	position: fixed;
	_position: absolute;
	left: 50%;
	top: 50%;
	overflow:hidden;
	z-index: 9999999;
	background: #FFF;
	margin-top: -150px;
	margin-left: -400px
}
#closediv {
	height: 35px; line-height: 35px; border-bottom: 1px dotted #cccccc; cursor:move; background:#f9f9f9
}
#closediv span {
	margin-left: 10px;
	color: #333333;
	font-size: 18px;
	line-height: 36px
}
#closediv a {
	width: 17px;
	height: 17px;
	float: right;
	margin-right: 10px;
	font-size:30px
}
#closediv a:hover{}
#pic_tips {
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
#duotu_list{min-height:260px}
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
<script type="text/javascript">
function pic_tips(msg){
	$("#pic_tips").text(msg).stop(true).animate({top:0},800).delay(3000).animate({top:'-30px'},800,function(){$(this).text('');});
	}
/*提交判断*/
function products_check(){
	var title = document.getElementById("lc_title").value;
	if(title==""){
		mx_tipmsg('亲，标题不能为空！');
		return false;
		}
	}
/*编辑器组件调用*/
KindEditor.ready(function(K) {
	var editor = K.editor({allowFileManager : true});
	/*多图上传*/
	K('#duotu_upload').click(function() {
		editor.loadPlugin('multiimage', function() {
			editor.plugin.multiImageDialog({
				clickFn : function(urlList){
					var div = K('#duotu_view');
					div.html('');
					K.each(urlList, function(i, data) {
						div.append('<input name="duotu_url[]" type="hidden" value="' + data.url + '">');
					});
					editor.hideDialog();
				}
			});
		});
	});
	/*手机版编辑器*/
	var editor1 = K.create('textarea[name="lc_phone_content"]',{
		allowFileManager : true,
		afterBlur:function(){
			this.sync();
			}
		});
});
function closediv(){
	$("#overdiv").hide();
	$("#showdiv").hide();
	}
function del_pic(id){
	if(id==''){
		pic_tips('亲，请求参数有误，请刷新页面重试！');
		}else{
			$.post("action/products_ajax.php",{picid:id,type:"one",action:'picdel'},function(data){
				if(data){
				if(data=="yes"){
					pic_tips('亲，删除成功！');
					$("#pic_list_"+id).remove();//删除的图片移除掉
					}else{
						pic_tips('亲，删除失败！');
					}
				}else{
					pic_tips('亲，请求超时，请稍候重试！');
					}
				})
			}
	}
$(function(){
	//多图
	$("#duotu_del").click(function(){
		$("#overdiv").show();
		$("#showdiv").show().draggable({handle:'#closediv',cursor:'move'});
		})
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
					pic_tips('亲，删除成功！');
				}else{
					pic_tips('亲，删除失败！');
				}
			}else{
				pic_tips('亲，请求超时，请稍候重试！');
				}
			})
		})
	})
function edit_pic_title(o,id){
	var pic_title=$(o).val();//获取要更新的值
	if(pic_title){
	$.post("action/products_ajax.php",{id:id,title:pic_title,action:'pictitle'},function(data){
		if(data){
			if(data=="yes"){
				pic_tips('亲，修改成功！');
				}else{
					pic_tips('亲，修改失败！');
					}
		}else{
			pic_tips('亲，请求超时，请稍候重试！');
			}
		})
		}else{
			pic_tips('亲，标题不能为空！');
			}
	}
function edit_pic_paixu(o,id){
	var pic_pai = $(o).val();//获取要更新的值
	if(pic_pai){
		$.post("action/products_ajax.php",{id:id,paixu:pic_pai,action:'picsort'},function(data){
			if(data){
				if(data=="yes"){
					pic_tips('亲，修改成功！');
					}else{
						pic_tips('亲，修改失败！');
						}
			}else{
				pic_tips('亲，请求超时，请稍候重试！');
				}
			})
		}else{
			pic_tips('亲，排序值不能为空！');
			}
	}
function choose_cover(id,product_id){
	if(id&&product_id){
		$.post("action/products_ajax.php",{id:id,pro_id:product_id,action:'picfm'},function(data){
			if(data){
				if(data=="yes"){
					pic_tips('亲，选择封面成功！');
				}else{
					pic_tips('亲，选择封面失败！');
					}
			}else{
				pic_tips('亲，请求超时，请稍候重试！');
			}
		})
		}else{
			pic_tips('亲，请求参数不正确！');
			}
	}
</script>
</head>

<body>
<form action="action/products_action.php" method="post" enctype="multipart/form-data" onSubmit="return products_check()">
  <input name="id" type="hidden" value="<?php echo $rows['lc_id']?>">
  <input name="lanmu" type="hidden" value="<?php echo $lanmu?>">
  <input name="action" type="hidden" value="edit">
  <div id="duotu_view"></div>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;标&nbsp;题：</span></td>
      <td><input type="text" name="lc_title" class="edit_input" id="lc_title" style="width: 480px" value="<?php echo $rows['lc_title']?>">
        &nbsp;&nbsp;图&nbsp;片&nbsp;上&nbsp;传：
      <input type="button" id="duotu_upload" class="button" value="选择图片">
      <input type="button" id="duotu_del" class="button" value="多图管理">
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;类&nbsp;别：</span></td>
      <td><select name="c_id" size="1" class="input" style="background-color: #ECF3FF;width:150px;height:30px">
          <?php get_products_type(0,$rows['c_id'],$lanmu)?>
        </select>
        <span style="margin-left:50px">来&nbsp;&nbsp;&nbsp;源：&nbsp;&nbsp;</span>
        <input type="text" name="lc_from" class="edit_input" id="lc_from" style="width:200px" value="<?php echo $rows['lc_from']?>">
        &nbsp;&nbsp;
        <input type="checkbox" value="1" name="lc_tj" <?php if($rows['lc_tj']==1){echo "checked";}?>>
        推荐
        <input type="checkbox" value="1" name="lc_zt" <?php if($rows['lc_zt']==1){echo "checked";}?>>
        审核
        <?php if($have_phone){?>
        <input type="checkbox" value="1" name="lc_phone" <?php if($rows['lc_phone']==1){echo "checked";}?>>
        手机版
        <?php }
    if($program_schema==1){?>
        <input type="checkbox" value="1" name="lc_cant_del">
        不可删
        <?php }else{?>
        <input name="lc_cant_del" type="hidden" value="0">
        <?php } ?>
        <input type="checkbox" name="lc_yc" value="1">
        是否远程图片</td>
    </tr>
    <tr class="edit_tr">
      <td></td>
      <td>
        <a class="edit_but select" onClick="qiehuanPCandTouch(1)" id="pc_touch1">PC版</a>
        <a id="pc_touch2" onClick="qiehuanPCandTouch(2)" class="edit_but unselect">手机版</a>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;内&nbsp;容：</span></td>
      <td><div id="lc_content">
          <textarea name="lc_content" style="height:220px; width: 750px"><?php echo $rows['lc_content']?></textarea>
        </div>
        <div id="lc_phone_content" style="display: none">
          <textarea name="lc_phone_content" style="height:220px; width:750px"><?php echo $rows['lc_phone_content']?></textarea>
        </div></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">关&nbsp;键&nbsp;词：</span></td>
      <td><input type="text" name="lc_keywords" class="edit_input keywords" value="<?php echo $rows['lc_keywords']?>">
        <span class="edit_title">描&nbsp;述：</span>
        <input type="text" name="lc_description" class="edit_input description" value="<?php echo $rows['lc_description']?>"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">图&nbsp;文&nbsp;简&nbsp;介：</span></td>
      <td><input type="text" name="lc_jianjie" class="edit_input" value="<?php echo $rows['lc_jianjie']?>" style="width:67%">
        <span class="edit_title">金&nbsp;额：</span>
        <input type="text" name="lc_price" class="edit_input" value="<?php echo $rows['lc_price']?>"></td>
    </tr>
    <?php echo get_customfields('products',$rows)?>
    <tr class="sub_tr">
      <td colspan="2"><input type="submit" value="提交" class="button"></td>
    </tr>
  </table>
</form>
<!--多图管理-->
<div id="overdiv"></div>
<div id="showdiv">
  <div id="pic_tips"></div>
  <div id="closediv"> <span>多图管理</span><a onClick="closediv()" title="关闭">&times;</a></div>
  <div style="width:735px; margin:0 auto">
    <div style="height: 6px"></div>
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
    <div style="height:6px"></div>
  </div>
</div>
<!--多图管理End-->
</body>
</html>