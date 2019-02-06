<?php
require (dirname(__FILE__)."/common/common.php");

wap_admin_check_login();//登录验证
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo constant("web_name")?>- 后台管理系统 - Powered by 龙采MX</title>
<?php require ('link_files.php')?>
</head>
<body>
<?php require ('head.php')?>
<div id="top">
  <div class="top_left"><?php echo wap_admin_top()?></span></div>
  <div class="clear"></div>
</div>
<div id="subNav">
  <div id="con_touch_1">
    <ul>
      <?php
		$sql = "select c_id,c_phone_name from ".lc()."_lanmu where c_type=5 and c_zt!=0";
		$rs = mysql_query($sql);
		if($rs){
			while($rows = mysql_fetch_assoc($rs)){?>
			  <li>
				<div>
				  <input type="text" value="<?php echo $rows["c_phone_name"]?>" id="touch_lanmu_<?php echo $rows["c_id"]?>" onChange="edit_lanmuname(<?php echo $rows["c_id"]?>,1)">
				  <a href="gbook_list.php?lanmu=<?php echo $rows["c_id"]?>">管理</a></div>
			  </li>
			  <?php
			}
		}
		?>
    </ul>
  </div>
</div>
</body>
</html>
