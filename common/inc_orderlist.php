<?php
/**************************************************
 通过会员id获取  该用户下的订单
 '**************************************************/
function li_show_dingdan($lc_user_id,$lc_zt){
	$sql = "select * from ".lc()."_dingdan where lc_user_id={$lc_user_id} and lc_zt={$lc_zt}";
	$sql = $sql." order by lc_id desc";
	$rs = mysql_query($sql);
	if($rs){
		while($rows = mysql_fetch_assoc($rs)){
			?>
<li><a href="dingdan_show.php?lc_id=<?php echo $rows["lc_id"]?>" title="<?php echo $rows["lc_add_time"]?>"><?php echo $rows['lc_name']?></a>
	<?php echo $rows['lc_add_time'];?> <?php switch ($rows["lc_zt"]) {
		case 0:echo "状态：未付款";break;
		case 1:echo "状态：已付款";break;
		case 2:echo "状态：已发货";break;
		case 3:echo "状态：已到货";break;
	}?></li>
	<?php
		}
	}
	else{
		echo "未有订单";
	}
}

/*
 根据用户id,获取用户购物车列表
 */
function li_get_gwc_list($lc_user_id){
	$sql1 = "select * from ".lc()."_gwc where lc_user_id =".$lc_user_id." and lc_zt=0 order by lc_id desc";
	$rs1 = mysql_query($sql1);
	if($rs1){
		while($rows1 = mysql_fetch_assoc($rs1)){
			$rows1['lc_goods_id'];//商品id
			$rows1['lc_goods_num'];//数量
			$sql = "select * from ".lc()."_products where lc_id={$rows1['lc_goods_id']} limit 0,1";
			$rs = mysql_query($sql);
			$htm="";
			if($rs){
				while($rows = mysql_fetch_assoc($rs)){?>
<li name="<?php echo $rows1["lc_id"]?>">
<div id="g1"><img src="<?php echo $rows['lc_pic']?>" border="0" onerror='this.src="../resource/images/nopic.gif"' /></div>
<div id="g2">
<h1><?php echo $rows["lc_title"]?></h1>
<h3><?php echo $rows["lc_jianjie"]?></h3>
</div>
<div id="g3">
<div class="num"><input type="text" name="num" value="<?php echo $rows1['lc_goods_num']?>" />
<div>
<h1></h1>
<h2></h2>
</div>
</div>
</div>
<div id="g4"><a href="../products_show.php?lc_id=<?php echo $rows['lc_id']?>" target="_blank">查看商品</a></div>
</li>
					<?php
				}
			}else{echo "暂无此类信息！";}
		}
	}
}
/*
 根据用户id,获取用户购物车列表
 */
function li_get_gwc_list_ht($lc_user_id){
	$sql1 = "select * from ".lc()."_gwc where lc_user_id =".$lc_user_id." and lc_zt=0 order by lc_id desc";
	$rs1 = mysql_query($sql1);
	if($rs1){
		while($rows1 = mysql_fetch_assoc($rs1)){
			$rows1['lc_goods_id'];//商品id
			$rows1['lc_goods_num'];//数量
			$sql = "select * from ".lc()."_products where lc_id={$rows1['lc_goods_id']} limit 0,1";
			$rs = mysql_query($sql);
			if($rs){
				while($rows = mysql_fetch_assoc($rs)){
					?>
<tr>
	<td align="left" style="width: 87px; height: 36px;"><img
		src="<?php echo $rows['lc_pic'];?>" alt=""
		style="width: 57px; height: 57px; padding: 5px; border: 1px solid #cecece; background: #ffffff;" /></td>
	<td align="left" style="width: 200px;"><?php echo $rows["lc_title"] ?></td>
	<td style="width: 40px;">&nbsp;</td>
	<td align="center" style="width: 80px;"><?php echo $rows1['lc_goods_num']; ?></td>
	<td style="width: 40px;">&nbsp;</td>
	<td align="center" style="width: 80px;"><span><?php echo $rows["lc_price"]; ?>元</span></td>
	<td style="width: 60px;">&nbsp;</td>
</tr>
<tr>
	<td style="height: 10px;" colspan="7"></td>
</tr>
					<?php
				}
			}else{echo "暂无此类信息！";}
		}
	}
}
function get_express_way_title($lc_id){
	$sql = "select * from ".lc()."_express_way where lc_id=".$lc_id;
	$rs = mysql_query($sql);
	while($rows=mysql_fetch_assoc($rs)){
		return $rows['lc_title'];
	}
}
function get_express_way_price($lc_id){
	$sql = "select * from ".lc()."_express_way where lc_id=".$lc_id;
	$rs = mysql_query($sql);
	$rows=mysql_fetch_assoc($rs);
	return $rows['lc_price'];
}
function get_express_way_list(){
	$li = '';
	$sql = "select * from ".lc()."_express_way";
	$rs = mysql_query($sql);
	if($rs){
		$i=0;
		$str="";
		while($rows = mysql_fetch_array($rs)){
			if ($i==0){
				$str="checked=\"checked\"";
			}else{
				$str=" ";
			}
			$i++;
			$li.='<input name="lc_express_way" type="radio" class="danxuan" value="{$rows["lc_id"]}" '.$str.' /> '.$rows["lc_title"].'价格：'.$rows["lc_price"].'<br /> ';
		}
	}
	return $li;
}
?>