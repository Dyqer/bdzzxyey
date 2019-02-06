<?php 
require_once (dirname(__FILE__).'/common/common.php');
SetSysEvent('check_bom');//添加日志功能
?>
<script type="text/javascript">
function check_bom(){
	var check_dir=$("#check_dir").val(),
  		auto_cl=$("#auto_cl").val();
	$.post("action/check_bom_ajax.php",{check_dir:check_dir,auto_cl:auto_cl},function(data){
    if(data){
		$("#res").html(data);
      }else{
		  $("#res").text("没有发现BOM签名。");
        }
    })
  }
</script>
<div class="main_l">
  <div class="mx_right_top">
    <div class="operatearea">
      <ul class="operateul">
        <li><a class="release">BOM检查</a></li>
        <li class="searcharea">
      </ul>
    </div>
  </div>
  <div class="mx_right_con">
    <div class="main_con">
      <table width="90%" border="0" cellspacing="0" cellpadding="0" style="margin-left:30px">
        <tr class="trh">
          <td colspan="2" class="tdh"><p style="line-height:25px; font-size:16px">BOM只有在WINDOWS下采用“记事本”存储为UTF-8时才会有。在UTF-8编码文件中BOM在文件头部，占用三个字节，以暗码的形式存在，用来标示该文件属于UTF-8编码，现在已经有很多软件识别BOM头，但是还有些不能识别BOM头，例如PHP就不能识别BOM头，这也是用记事本编辑UTF-8编码后执行就会出错的原因了。</p>
            <p style="color:#F00; line-height:25px; font-size:16px">具体表现为：Cannot modify header information – headers already sent by …</p></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh" width="80">检查目录：</td>
          <td class="tdh"><input name="check_dir" type="text" id="check_dir" value="/"></td>
        </tr>
        <tr class="trh">
          <td align="right" class="tdh">处理方式：</td>
          <td><input type="checkbox" id="auto_cl" value="1" align="absmiddle">&nbsp;自动清除</td>
        </tr>
        <tr class="trh">
          <td colspan="2" class="tdh">&nbsp;
            <input type="button" onclick="check_bom()" value="开始检查" class="checkall_sub"></td>
        </tr>
      </table>
      <div id="res"></div>
    </div>
  </div>
</div>