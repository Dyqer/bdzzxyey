<?php
require_once (dirname(__FILE__).'/common/common.php');
admin_checklogin();//登录验证
get_qx('xitong');//系统权限验证
SetSysEvent('systemconfig');//添加日志功能


$c_id = isset($_GET['id'])?(int)$_GET['id']:0;//分类编号
if(!$c_id){
	$c_id = isset($_POST['id'])?(int)$_POST['id']:0;
}
$page = isset($_GET['page'])?(int)$_GET['page']:0;//获取分页
if(!$page){
  $page = isset($_POST['page'])?(int)$_POST['page']:1;
}
$paixu_num = isset($_GET['paixu_num'])?(int)$_GET['paixu_num']:0;//获取排序个数
if(!$paixu_num){
  $paixu_num = isset($_POST['paixu_num'])?(int)$_POST['paixu_num']:0;
}
$pagesize = $sortnum>0 ? $sortnum:10;
$sql_num = "select id from ".$lc."_admin ";
$rs_num = mysql_query($sql_num);
if($rs_num){
  $total_num = mysql_num_rows($rs_num);
}else{
  $total_num = 0;
}
$total_page = ceil($total_num/$pagesize);
$page = ($page<1)?1:$page;
$page = ($page>$total_page)?$total_page:$page;
$fromrow = ($page-1)*$pagesize;

$sql = "select * from ".$lc."_zijian ";
$sql = $sql.$wheresql." order by id desc limit {$fromrow},{$pagesize}";

$rs = mysql_query($sql);
?>
<script type="text/javascript">
function closetipwin(){}
/*全选*/
function SelectCheckBox(o) {
  for (i = 0; i < document.account.elements.length; i++) {
    if (o.checked == true) {
      document.account.elements[i].checked = true;
    }else{
      document.account.elements[i].checked = false;
    }
  }
}
var editAccount = function(id) {
	tipwindow("管理员修改", "iframe:account_edit.php?id="+id, "600", "300", "true", 0, "true");
}


/*检查创建帐号信息*/
function check_add(){
  var user = $("#user").val();//用户名
  var psw = $("#psw").val();//密码
  var rpsw = $("#rpsw").val();//确认密码
  if(user){
    if(psw){
      if(psw!==rpsw){
		  mx_msg("亲，两次输入的密码不相同！");
		  return false;
        }
      }else{
		  mx_msg("亲，密码不能为空！");
		  return false;
        }
    }else{
		mx_msg("亲，用户名不能为空！");
		return false;
      }
  }
</script>
<style>

.deltip_t_r {
	height:33px;
	line-height:33px;
	float: right;padding:0 10px 0 0;
}

.deltip_con {
	color: #333333;
	line-height: 20px;
	width: 180px;
	margin: 5px auto;
	font-size:16px;
}
.deltip_confirm {
	width: 1000px !important;
	height: 30px !important;
	line-height:30px !important;
	background:#48ac2e; color:#FFF; text-align:center
}

</style>

<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <?php require('systemconfig_top.php')?>
      </ul>
    </div>
  </div>
  <div class="mx_right_con" style="margin-top:20px">
    <div class="main_con">
      <?php if($_SESSION['lc_admin_user_id']==1){?>
      <form name="account" action="action/account_action.php" method="post" onSubmit="return check_add()">
        <table width="80%" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px">
          <tr class="trh">
            <td align="right" class="tdh" width="10%">管理员名称：</td>
            <td class="tdh"><input type="text" name="admin_username" id="user" class="input"></td>
          </tr>
          <tr class="trh">
            <td align="right" class="tdh">管理员密码：</td>
            <td><input type="password" name="admin_password" id="psw" class="input"></td>
          </tr>
          <tr class="trh">
            <td align="right" class="tdh">重复密码：</td>
            <td><input type="password" name="admin_rpassword" id="rpsw" class="input"></td>
          </tr>
          <tr class="trh">
            <td align="right" class="tdh">权限设置：</td>
            <td><input type="checkbox" value="1" name="xitong" class="dx">
              系统设置
              <input type="checkbox" value="1" name="lanmu" class="dx">
              全部栏目
              <input type="checkbox" value="1" name="danye" class="dx">
              单页系统
              <input type="checkbox" value="1" name="news" class="dx">
              文章系统
              <input type="checkbox" value="1" name="products" class="dx">
              图文系统
              <input type="checkbox" value="1" name="down" class="dx">
              下载系统
              <input type="checkbox" value="1" name="user" class="dx">
              会员系统
              <div style="height:10px"></div>
              <input type="checkbox" value="1" name="gbook" class="dx">
              留言系统
              <input type="checkbox" value="1" name="job" class="dx">
              招聘系统
              <input type="checkbox" value="1" name="dingdan" class="dx">
              订单系统
              <input type="checkbox" value="1" name="gaoji" class="dx">
              高级功能
              <input type="checkbox" value="1" name="weixin" class="dx">
              微信管理
              <input type="checkbox" value="1" name="touch" class="dx">
              touch系统
              <input type="checkbox" value="1" name="hsz" class="dx">
              回收站
              <div style="height:10px"></div>
              <input type="checkbox" value="1" class="dx" name="selectCheck" onclick="SelectCheckBox(this)">
              全选</td>
          </tr>
          <tr class="trh">
            <td></td>
            <td class="tdh"><input type="submit" class="checkall_sub" id="fu_right_top_moren" title="创建管理员" value="创建"></td>
          </tr>
        </table>
      </form>
      <?php }else{
      echo "<div style='height:25px'></div>";
    }?>
    <form name="del" method="post" action="action/del_all.php">
        <input name="action" type="hidden" value="del_vip">
        <input name="lc_del" type="hidden" value="1">
        <input name="id" type="hidden" value="<?php echo $c_id?>">
      <table width="99%" align="center" cellpadding="3" cellspacing="1">
        <tr class="trh">
          <td colspan="2"><table border="1" bordercolor="#d2d2d2" width="388" height="27" cellspacing="1" cellpadding="0" style="margin-left:3.6%; margin-top: 8px">
              <tr>
                <td height="13" align="center">账户</td>
                <td height="13" align="center">设置</td>
                <td height="13" align="center">删除</td>
              </tr>
              <?php
      $sql = "select * from ".$lc."_admin order by lc_admin_id desc";
      $rs = mysql_query($sql);
      if($rs){
        while($rows=mysql_fetch_assoc($rs)){?>
              <tr>
                <td align="center" width="128" class="aa"><?php echo $rows['lc_admin_name']?></td>
                <td align="center" width="130"><?php
                if($_SESSION['lc_admin_user_id']==1){
                ?>
                  <span class="spanr mxicon"><a onClick="editAccount(<?php echo $rows['lc_admin_id']?>)" alt="修改" valign="middle">&#xe905;</a></span>
                  <?php }else{
                  echo '--';
                }
          ?></td>
                <td align="center" width="130"><?php
			  if($_SESSION['lc_admin_user_id']==1){
			  	if($rows['lc_admin_id']!=1){
			  	?>
               <span class="spanr mxicon del"> <a class="mxicon" title="删除" id="del_op<?php echo $rows['lc_admin_id']?>" onClick="del_opp(this,'<?php echo $rows['lc_admin_id']?>',16,1)">&#xe9ac;</a></span>

                <?php }else{echo '--';}}else{echo '--';}?></td>
              </tr>
              <?php
        }
      }
      ?>
            </table></td>
        </tr>
      </table>
      </form>
    </div>
  </div>
</div>