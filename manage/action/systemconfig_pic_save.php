<?php
/*缩略图生成设置*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('ajax');//管理员验证

$pc_big_width = isset($_POST['pc_bw'])?(int)$_POST['pc_bw']:null;
$pc_big_height = $_POST['pc_bh'];
$pc_big_cut = $_POST['pc_bcut'];

$pc_small_width = $_POST['pc_sw'];
$pc_small_height = $_POST['pc_sh'];
$pc_small_cut = $_POST['pc_scut'];

$sj_big_width = $_POST['t_bw'];
$sj_big_height = $_POST['t_bh'];
$sj_big_cut = $_POST['t_bcut'];

$sj_small_width = $_POST['t_sw'];
$sj_small_height = $_POST['t_sh'];
$sj_small_cut = $_POST['t_scut'];
//存放到数据库lc_config表中

update_config("pc_big_width",$pc_big_width);
update_config("pc_big_height",$pc_big_height);
update_config("pc_big_cut",$pc_big_cut);

update_config("pc_small_width",$pc_small_width);
update_config("pc_small_height",$pc_small_height);
update_config("pc_small_cut",$pc_small_cut);

update_config("sj_big_width",$sj_big_width);
update_config("sj_big_height",$sj_big_height);
update_config("sj_big_cut",$sj_big_cut);

update_config("sj_small_width",$sj_small_width);
update_config("sj_small_height",$sj_small_height);
update_config("sj_small_cut",$sj_small_cut);

if(mysql_affected_rows()>0){
	echo "yes";//修改成功了
}else{
	echo "no";//修改失败了
}
?>