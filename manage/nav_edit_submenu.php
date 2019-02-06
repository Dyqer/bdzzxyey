<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('nav');//是否有管理导航权限
SetSysEvent('nav_edit_submenu');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;

$sql = "select * from ".$lc."_navigation where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$row = mysql_fetch_assoc($rs);
}

function get_navigation_menu_option($pid,$tid,$id){
	$sql = "select * from ".lc()."_navigation where lc_parent_id='{$pid}' order by lc_sort_id asc";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$gang = "";
			$sel = "";
			for($i=0;$i<$pid;$i++){
				$gang.= "&nbsp;";
			}
			if($tid==$rows['lc_id']){
				$sel = 'selected="selected"';
			}
			$child_id = get_navigation_all_child_id($id);
			if($id!=$rows['lc_id'] && strpos($child_id,$rows['lc_id'])===false){
				echo "<option value='2' {$sel}>".$gang.$rows['lc_title']."</option>";
			}
			echo get_navigation_menu_option($rows['lc_id'],$tid,$id);
		}
	}
}
function get_navigation_all_child_id($pid){
	$sql = "select lc_id from ".lc()."_navigation where lc_parent_id='{$pid}'";
	$rs = mysql_query($sql);
	$str = "";
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			$str.= $rows["lc_id"].",";
			$str.= get_navigation_all_child_id($rows["lc_id"]);
		}
	}
	return $str;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<link rel="stylesheet" type="text/css" href="resource/css/css.css">
<script src="resource/js/jquery-1.7.1.min.js"></script>
<script src="resource/js/mx.js"></script>
<style type="text/css">
.ti_s {
	color: #F00
}
#sel_lanmu_list {
	width: 90px;
	height: 26px;
	line-height: 26px
}
#lc_target {
	width: 100px;
	height: 24px;
	line-height: 24px;
	padding-left: 2px
}
#sel_target_list {
	width: 90px;
	height: 26px;
	line-height: 26px
}
</style>
<script type="text/javascript">
function check_nav(){
	var title = document.getElementById("lc_title").value;
	var link_url = document.getElementById("lc_link_url").value;
	if(!title){
		mx_tipmsg("亲，导航名称不能为空！");
		return false;
		}
	if(!link_url){
		mx_tipmsg("亲，导航链接不能为空！");
		return false;
		}
	}
function select_lanmu(o){
	var link_url = o.value;
	if(link_url!=0){
		document.getElementById("lc_link_url").value=link_url;
		}else{
			mx_tipmsg("亲，不能选择非栏目！");
			}
	}
function select_target(o){
	document.getElementById("lc_target").value=o.value;
	}
</script>
</head>
<body>
<form action="action/nav_submenu_action.php" method="post" enctype="multipart/form-data" onSubmit="return check_nav()">
  <input name="id" type="hidden" value="<?php echo $row['lc_id']?>">
  <table width="480" border="0" cellspacing="5" cellpadding="1" style="margin:0 auto">
    <tr>
      <td width="80"><h2 align="right">所属导航：</h2></td>
      <td width="380"><select name="lc_parent_id">
          <?php get_navigation_menu_option(0,$row['lc_parent_id'],$id)?>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td width="80"><h2 align="right">导航名称：</h2></td>
      <td width="380"><input name="lc_title" id="lc_title" type="text" class="input" style="width: 350px" value="<?php echo $row['lc_title']?>" >
        <span class="ti_s">&nbsp;*</span></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td><h2 align="right">导航链接：</h2></td>
      <td><input type="text" name="lc_link_url" id="lc_link_url" style="width: 180px" class="input" value="<?php echo $row['lc_link_url']?>" >
        <strong>对应栏目：</strong>
        <select onChange="select_lanmu(this)" id="sel_lanmu_list">
          <?php
          $sql="select * from ".lc()."_lanmu where c_zt=1 order by c_sort_id desc";
		  $rs = mysql_query($sql);
		  if($rs){
			  $danye = "<option value=\"0\">|- 单 页</option>";
			  $new = "<option value=\"0\">|- 文章</option>";
			  $product = "<option value=\"0\">|- 图文</option>";
			  $down = "<option value=\"0\">|- 下载</option>";
			  $job = "<option value=\"0\">|- 招聘</option>";
			  $gbook ="<option value=\"0\">|- 留言</option>";
			  while($rows = mysql_fetch_assoc($rs)){
				  if($rows['c_link']==$row['lc_link_url']){
					  $sel = 'selected="selected"';
					  }else{$sel = "";}
				  //单页
				  if($rows['c_type']==0){
					  $danye.="<option value=\"".$rows['c_link']."\" ".$sel.">&nbsp;&nbsp;".$rows['c_title']."</option>";
					  }
					//文章
				  if($rows['c_type']==1){
					  $new.="<option value=\"".$rows['c_link']."\" ".$sel.">&nbsp;&nbsp;".$rows['c_title']."</option>";
					  }
					//图文
				  if($rows['c_type']==2){
					  $product.="<option value=\"".$rows['c_link']."\" ".$sel.">&nbsp;&nbsp;".$rows['c_title']."</option>";
					  }
					//下载
				  if($rows['c_type']==3){
					  $down.="<option value=\"".$rows['c_link']."\" ".$sel.">&nbsp;&nbsp;".$rows['c_title']."</option>";
					  }
					//招聘
				  if($rows['c_type']==4){
					  $job.="<option value=\"".$rows['c_link']."\" ".$sel.">&nbsp;&nbsp;".$rows['c_title']."</option>";
					  }
					//留言
				  if($rows['c_type']==5){
					  $gbook.="<option value=\"".$rows['c_link']."\" ".$sel.">&nbsp;&nbsp;".$rows['c_title']."</option>";
					  }
				  }
				  echo $danye.$new.$product.$down.$job.$gbook;
			  }
		  ?>
        </select>
        <span class="ti_s">&nbsp;*</span></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td><h2 align="right">链接重写：</h2></td>
      <td><input type="text" name="lc_rwlink_url" style="width: 350px" class="input" value="<?php echo $row['lc_rwlink_url']?>"></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td><h2 align="right">导航图片：</h2></td>
      <td><input name="lc_pic" type="file" id="lc_pic" ></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td><h2 align="right">打开方式：</h2></td>
      <td><input name="lc_target" id="lc_target" type="text" readonly value="<?php echo $row['lc_target']?>">
        <select onChange="select_target(this)" id="sel_target_list">
          <option selected="selected" value="">无</option>
          <option value="_blank">新窗口</option>
          <option value="_self">本窗口</option>
          <option value="_parent">父窗口</option>
          <option value="_top">整个窗口</option>
        </select></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td><h2 align="right">导航说明：</h2></td>
      <td><textarea name="lc_content" rows="5" id="lc_content" style="width: 350px; line-height:20px"><?php echo $row['lc_content']?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td><h2 align="right">显示导航：</h2></td>
      <td><label>
          <input name="lc_zt" type="radio" id="lc_zt_0" value="1" <?php if($row['lc_zt']==1){echo 'checked="checked"';}?>>
          显示</label>
        <label>
          <input type="radio" name="lc_zt" value="0" id="lc_zt_1" <?php if($row['lc_zt']==0){echo 'checked="checked"';}?>>
          隐藏</label></td>
    </tr>
    <tr>
      <td colspan="2" height="6"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" value="提交" class="fu_right_lan_btn">
        &nbsp;
        <input type="reset" value="重置" class="fu_right_lan_btn"></td>
    </tr>
  </table>
</form>
</body>
</html>