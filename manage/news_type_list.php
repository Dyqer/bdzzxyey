<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('news');//是否有管理文章分类权限
SetSysEvent('news_type_list');//添加日志功能
$lanmu = isset($_GET['lanmu'])?(int)$_GET['lanmu']:0;
?>
<!doctype html>
<html>
<head>
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<meta charset="utf-8">
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function edit_paixu(id){
	var paixu=$("#paixu_"+id).val();
	if(paixu){
		$.post("action/type_sort_ajax.php",{id:id,sort_id:paixu,type:1},function(data){
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
function edit_news_type_name(obj,id){
	var title = obj.value;
	if(id){
		$.post("action/news_type_ajax.php",{id:id,title:title,action:'title'},function(data){
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
			mx_tipmsg('亲，请求参数有误！');
			}
	}
function news_type_del(id){
	if(id){
		$.post("action/news_type_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，删除成功！');
					$("#news_type_list_"+id).remove();//移除已删除的数据
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
</script>
</head>
<body>
<table width="98%" align="center" cellpadding="3" cellspacing="1" style="margin:0 auto">
  <tr>
    <td><input type="button" class="button list_add" value="添加类别" onClick="location.href='news_type_add.php?lanmu=<?php echo $lanmu?>'"></td>
  </tr>
  <tr>
    <td><table border="0" width="99%" height="28" cellspacing="0" cellpadding="0" style="border: 0px solid #CCC">
        <tr>
          <td width="6%" align="center" class="typetop">编号</td>
          <td width="6%" align="center" class="typetop">排序</td>
          <td align="center" class="typetop">类别标题</td>
          <td width="12%" align="center" class="typetop">操作</td>
        </tr>
        <?php admin_get_news_type(0,$lanmu)?>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php
/*************************************************
 功能：获取文章系统后台所有类别
 参数：$pid：父类别编号
 *************************************************/
function admin_get_news_type($pid,$lanmu){
	$sql = "select * from ".lc()."_news_type where c_pid ='{$pid}' and c_del=0 and lanmu='{$lanmu}' ORDER BY c_sort_id DESC";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		while($rows=mysql_fetch_assoc($rs)){
			$i=$i+1;
				?>
<tr id="type_list_<?php echo $rows['c_id']?>" class="list_tr">
  <td width="6%" align="center" class="typecon"><?php echo $rows['c_id']?></td>
  <td width="6%" align="center" class="typecon"><input type="text" id="paixu_<?php echo $rows['c_id']?>" style="width:80%; height:28px; line-height:28px; text-align:center; border:1px solid #dfdfdf;" onChange="edit_paixu(<?php echo $rows['c_id']?>)" value="<?php echo $rows['c_sort_id']?>" title="修改排序值"></td>
  <td align="center" class="typecon"><?php
	for($j=0;$j<news_ji($rows["c_id"]);$j++){
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	if(get_news_type_child_count($rows['c_id'])>0){?>
    &nbsp;
    <?php }else{?>
    &nbsp;
    <?php }?>
    <input id="paixu_<?php echo $rows['c_id']?>" type="text"  style="width:80%; height:28px; line-height:28px; text-align:center; border:1px solid #dfdfdf;" onChange="edit_news_type_name(this,<?php echo $rows['c_id']?>)" value="<?php echo $rows['c_title']?>"></td>
  <td width="6%" align="center" class="typecon"><table width="100%" cellpadding="0" cellspacing="0">
      <tr align="center" class="type_op">
        <td><span class="mxicon"><a title="添加子分类" href="news_type_add.php?lanmu=<?php echo $lanmu?>&c_pid=<?php echo $rows['c_id']?>">&#xea0a;</a></span></td>
        <td><span class="mxicon"><a title="修改" href="news_type_edit.php?lanmu=<?php echo $lanmu?>&id=<?php echo $rows['c_id']?>">&#xe905;</a></span></td>
        <td style="position:relative"><span class="mxicon"><a onClick="type_del_op(this,'<?php echo $rows['c_id']?>',1,0)" title="删除">&#xe9ac;</a></span></td>
      </tr>
    </table></td>
</tr>
<?php
admin_get_news_type($rows['c_id'],$lanmu);
		}
	}
}
?>