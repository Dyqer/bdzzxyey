<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('user');//会员管理权限验证
SetSysEvent('user_type_list');//添加日志功能
?>
<!doctype html>
<html>
<head>
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<meta charset="utf-8">
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function edit_user_type_name(obj,id){
	var title = obj.value;
	if(id){
		$.post("action/user_type_ajax.php",{id:id,title:title,action:'title'},function(data){
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
function user_type_del(id){
	if(id){
		$.post("action/user_type_ajax.php",{id:id,action:'del'},function(data){
			if(data){
				if(data=="yes"){
					mx_tipmsg('亲，删除成功！');
					$("#user_type_list_"+id).remove();//移除已删除的数据
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
    <td><input type="button" class="button list_add" value="添加类别" onClick="location.href='user_type_add.php'"></td>
  </tr>
  <tr>
    <td><table border="0" width="99%" height="28" cellspacing="0" cellpadding="0" style="border: 0px solid #CCC">
        <tr>
          <td width="6%" align="center" class="typetop">编号</td>
          <td align="center" class="typetop">类别标题</td>
          <td width="12%" align="center" class="typetop">操作</td>
        </tr>
        <?php admin_get_user_type(0,$lanmu)?>
      </table></td>
  </tr>
</table>
</body>
</html>
<?php
function admin_get_user_type($pid,$lanmu){
	$sql = "select * from ".lc()."_user_type";
	$rs = mysql_query($sql);
	if($rs){
		while($rows=mysql_fetch_assoc($rs)){ 	?>
<tr id="type_list_<?php echo $rows['lc_id']?>" class="list_tr">
  <td width="6%" align="center" class="typecon"><?php echo $rows['lc_id']?></td>
  <td align="center" class="typecon"><input type="text" class="input_title" onChange="edit_user_type_name(this,<?php echo $rows['lc_id']?>)" value="<?php echo $rows['lc_title']?>"></td>
  <td width="6%" align="center" class="typecon"><table width="100%" cellpadding="0" cellspacing="0">
      <tr align="center" class="type_op">
        <td><span class="mxicon"><a title="修改" href="user_type_edit.php?id=<?php echo $rows['lc_id']?>">&#xe905;</a></span></td>
        <td style="position:relative"><span class="mxicon"><a onClick="type_del_op(this,'<?php echo $rows['lc_id']?>',4,0)" title="删除">&#xe9ac;</a></span></td>
      </tr>
    </table></td>
</tr>
<?php
		}
	}
}
?>