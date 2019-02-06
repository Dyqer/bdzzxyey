<?php
require (dirname(__FILE__).'/common/common.php');
admin_checklogin_sub();//登录验证
get_qx('nav');//是否有管理导航权限
SetSysEvent('nav_add');//添加日志功能
$pid = isset($_GET['pid'])?(int)$_GET['pid']:0;//默认为主导航(pid=0)
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo constant("web_name")?>- 后台管理系统</title>
<?php require('sub_linkfile.php')?>
<style type="text/css">
.ti_s {
  color: #F00
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
<form action="action/nav_action.php" method="post" onSubmit="return check_nav()">
  <input name="pid" type="hidden" value="<?php echo $pid?>"><input name="action" type="hidden" value="add">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">导&nbsp;航&nbsp;名&nbsp;称：</span></td>
      <td><input type="text" name="lc_title" class="edit_input" id="lc_title" style="width: 300px"><span class="ti_s">&nbsp;&nbsp;&nbsp;*</span></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">导&nbsp;航&nbsp;链&nbsp;接：</span></td>
      <td><input type="text" name="lc_link_url" class="edit_input" id="lc_link_url" style="width: 200px">
      &nbsp;对&nbsp;应&nbsp;栏&nbsp;目：
      <select onChange="select_lanmu(this)" id="sel_lanmu_list">
          <option value="0" selected="selected">|- 无</option>
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
              //单页
              if($rows['c_type']==0){
                $danye.="<option value=\"".$rows['c_link']."\">&nbsp;&nbsp;".$rows['c_title']."</option>";
                }
              //文章
              if($rows['c_type']==1){
                $new.="<option value=\"".$rows['c_link']."\">&nbsp;&nbsp;".$rows['c_title']."</option>";
                }
              //图文
              if($rows['c_type']==2){
                $product.="<option value=\"".$rows['c_link']."\">&nbsp;&nbsp;".$rows['c_title']."</option>";
                }
              //下载
              if($rows['c_type']==3){
                $down.="<option value=\"".$rows['c_link']."\">&nbsp;&nbsp;".$rows['c_title']."</option>";
                }
              //招聘
              if($rows['c_type']==4){
                $job.="<option value=\"".$rows['c_link']."\">&nbsp;&nbsp;".$rows['c_title']."</option>";
                }
              //留言
              if($rows['c_type']==5){
                $gbook.="<option value=\"".$rows['c_link']."\">&nbsp;&nbsp;".$rows['c_title']."</option>";
                }
              }
              echo $danye.$new.$product.$down.$job.$gbook;
            }
          ?>
      </select>
      <span class="ti_s">&nbsp;&nbsp;&nbsp;*</span>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">连&nbsp;接&nbsp;重&nbsp;写：</span></td>
      <td><input type="text" name="lc_rwlink_url" class="edit_input" id="lc_rwlink_url" style="width: 300px"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">导&nbsp;航&nbsp;图&nbsp;片：</span></td>
      <td><input name="lc_pic" type="file" id="lc_pic"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">打&nbsp;开&nbsp;方&nbsp;式：</span></td>
      <td><input type="text" name="lc_target" id="lc_target" class="edit_input" style="width: 200px" readonly>
      
      <select onChange="select_target(this)" id="sel_target_list">
        <option selected="selected" value="">无</option>
        <option value="_blank">新窗口</option>
        <option value="_self">本窗口</option>
        <option value="_parent">父窗口</option>
        <option value="_top">整个窗口</option>
      </select>
      </td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">导&nbsp;航&nbsp;说&nbsp;明：</span></td>
      <td><input type="text" name="lc_content" class="edit_input" id="lc_content" style="width:300px;"></td>
    </tr>
    <tr class="edit_tr">
      <td class="edit_t"><span class="edit_title">导&nbsp;航&nbsp;显&nbsp;示：</span></td>
      <td><label>
          <input name="lc_zt" type="radio" id="lc_zt_0" value="1" checked="checked">
          显示</label>
        <label>
          <input type="radio" name="lc_zt" value="0" id="lc_zt_1">
          隐藏</label></td>
    </tr>
    <tr class="edit_tr">
      <td></td>
      <td><input type="submit" value="提交" class="edit_but select">
        &nbsp;
        <input type="reset" value="重置" class="edit_but unselect">
      </td>
    </tr>
  </table>
</form>
</body>
</html>