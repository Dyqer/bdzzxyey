<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('dingdan');//是否有订单管理权限
SetSysEvent('orderform_show');//添加日志功能

$id = isset($_GET['id'])?(int)$_GET['id']:0;//编号

$sql = "select * from ".$lc."_dingdan where lc_id = '{$id}'";
$rs = mysql_query($sql);
if($rs){
	$rows=mysql_fetch_assoc($rs);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<script type="text/javascript">
function send_goods(o,i){
	var id = '<?php echo $id?>';
	if(i){
		$.post("action/orderform_ajax.php",{zt:i,id:id,action:'zt'}, function(data){
			if(data){
				if(data=='yes'){
					mx_tipmsg("亲，更新成功！");
				}else{
					mx_tipmsg("亲，更新失败！");
				}
			}else{
				mx_tipmsg("亲，请求超时，请稍候重试！");
			}
		});
	}
}
</script>
<style type="text/css">
#dingdan {
	border-top: 1px solid #999;
	width: 845px
}
#dingdan li {
	width: 844px;
	overflow: hidden;
	float: left;
	border: 1px solid #999;
}
#dingdan li h1 {
	width: 150px;
	height: 30px;
	float: left;
	text-align: center;
	font-size: 12px;
	line-height: 35px;
	font-weight: 100;
	overflow: hidden;
	border-right: 1px solid #999
}
#dingdan li h1:last-child {
	border: none
}
#lg {
	border-collapse: collapse;
	margin-top: 10px
}
#lg td {
	font-size: 14px;
	border: 1px solid #000;
	width: 200px;
	padding: 3px 0;
	padding-left: 15px
}
.middle a:hover {
	color: #C00
}
</style>
</head>

<body>
<table width="95%" cellpadding="5" cellspacing="1" style="margin:0 auto">
  <tr>
    <td><center>
        <h1 style="margin-top:10px; margin-bottom:10px">商品订单</h1>
      </center>
      <ul id="dingdan">
        <li style="background:#ddd">
          <h1 style="width: 390px">商品名</h1>
          <h1>价格</h1>
          <h1>数量</h1>
          <h1>金额</h1>
        </li>
        <?php
			$sql1 = "select * from ".$lc."_gwc where lc_zt = '{$id}'";
			$rs1 = mysql_query($sql1);
			if($rs1){
				while($rows1 = mysql_fetch_assoc($rs1)){
					$num=$num+$rows1['lc_price']*$rows1['lc_goods_num'];?>
        <li>
          <h1 style="width:390px"> <?php echo get_products_by_id($rows1['lc_goods_id'])?></h1>
          <h1>￥<?php echo $rows1['lc_price']?></h1>
          <h1><?php echo $rows1['lc_goods_num']?></h1>
          <h1>￥<?php echo $rows1['lc_price']*$rows1['lc_goods_num']?></h1>
        </li>
        <?php }
			}else{echo "暂无此类信息！";}
			$dis_price = get_express_way($rows["lc_express_way"],'lc_price');
			?>
        <li style="background: #ddd">
          <h1 style="width: 390px"></h1>
          <h1></h1>
          <h1><?php echo '邮费：'.$dis_price.'元'?> </h1>
          <h1>共计：￥<?php echo $num+$dis_price?></h1>
        </li>
        <div style="clear: both"></div>
      </ul>
      <table align="center" cellpadding="5" cellspacing="5" id="lg">
        <tr>
          <td>真实姓名：</td>
          <td><?php echo $rows["lc_name"]?></td>
        </tr>
        <tr>
          <td>地址：</td>
          <td><?php echo val_isset($rows["lc_place"])?></td>
        </tr>
        <tr>
          <td>手机号：</td>
          <td><?php echo val_isset($rows["lc_phone"])?></td>
        </tr>
        <tr>
          <td>邮编：</td>
          <td><?php echo val_isset($rows["lc_yb"])?></td>
        </tr>
        <tr>
          <td>最佳接收时间：</td>
          <td><?php echo val_isset($rows["lc_time"])?></td>
        </tr>
        <tr>
          <td>配货方式：</td>
          <td><?php echo get_express_way($rows["lc_express_way"]); echo ' 价格：'.$dis_price.'元'?></td>
        </tr>
        <tr>
          <td colspan="2"><div class="middle"><?php echo order_zt_name($rows["lc_zt"])?></div></td>
        </tr>
        <?php if($rows["lc_zt"]==1){?>
        <tr>
          <td colspan="2"><div class="middle"><a onClick="send_goods(this,2)"> --> 发货 <-- </a></div></td>
        </tr>
        <?php }?>
        <?php if($rows["lc_zt"]==2){?>
        <tr>
          <td colspan="2"><div class="middle"><a onClick="send_goods(this,3)"> --> 到货 <-- </a></div></td>
        </tr>
        <?php }?>
      </table></td>
  </tr>
</table>
</body>
</html>