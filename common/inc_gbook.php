<?php
function get_weidu(){
	$sql_select="select count('lc_id') as b from ".lc()."_gbook where lc_zt=-1";
	$rs_select = mysql_query($sql_select);
	$rows_select = mysql_fetch_assoc($rs_select);
	if($rows_select['b']>0){
		echo $rows_select['b'];
	}
}
?>