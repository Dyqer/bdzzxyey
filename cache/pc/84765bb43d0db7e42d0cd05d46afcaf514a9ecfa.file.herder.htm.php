<?php /* Smarty version Smarty-3.1.13, created on 2016-04-16 20:02:22
         compiled from "/home/bdzzxyey/public_html/templates/default/herder.htm" */ ?>
<?php /*%%SmartyHeaderCode:56169885571229ce5ecd14-82011769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84765bb43d0db7e42d0cd05d46afcaf514a9ecfa' => 
    array (
      0 => '/home/bdzzxyey/public_html/templates/default/herder.htm',
      1 => 1457329046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56169885571229ce5ecd14-82011769',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL' => 0,
    'nav' => 0,
    'menu' => 0,
    'submenu' => 0,
    'banner' => 0,
    'list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_571229ce65da01_27167609',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571229ce65da01_27167609')) {function content_571229ce65da01_27167609($_smarty_tpl) {?><?php if (!is_callable('smarty_function_lcmx_nav_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_nav_list.php';
if (!is_callable('smarty_function_lcmx_banner_list')) include '/home/bdzzxyey/public_html/Lib/Smarty/plugins/function.lcmx_banner_list.php';
?><script type="text/javascript">
$(document).ready(function(){
  $('.banner').each(function() {
  var $showPic =$(this).find('.bannerxList li');
  var $btonBox=$(this).find('.bannerxBton');
  var _n=0;
  var _vt=3000;
  var _vf=2000;
  var timer;
  //生成角标
  for(i=1;i<=$showPic.length;i++){
    $btonBox.append('<li>'+'</li>');
  }
  var $btonList=$btonBox.children('li');
  //鼠标事件
  $btonList.each(function(e){
      $(this).hover(function(){
        clearInterval(timer);
        showImg(e);
        _n=e;
      },function(){
        timer = setInterval(auto,_vt);
      });
    });
  //图片轮换
  var showImg= function(n){
    $showPic.eq(n).fadeIn(_vf).siblings().fadeOut();
    $btonList.eq(n).addClass('up').siblings().removeClass('up');
    
  }
  //自动播放
  var auto=function(){
    showImg(_n);
    _n++
    if(_n == $showPic.length){_n=0;}
  }
  timer = setInterval(auto,_vt);
  showImg(_n);
  _n++;

  });

});
        
      </script>
<div class="nav" name="aaaaa">
  <div class="nav_a_a_a" style=";" class="con_a_a"><img src="<?php echo $_smarty_tpl->tpl_vars['URL']->value;?>
images/login.png" alt=""></div>
	<ul>
    
		 <?php echo smarty_function_lcmx_nav_list(array('set'=>"列表名:nav,类别:0,标题长度:80"),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['nav']->value){?>
        <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['menu']->value['target'];?>
" name="aa"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a> <?php echo smarty_function_lcmx_nav_list(array('set'=>"列表名:nav,类别:".((string)$_smarty_tpl->tpl_vars['menu']->value['lc_id']).",标题长度:80"),$_smarty_tpl);?>

          <!-- <?php if ($_smarty_tpl->tpl_vars['nav']->value){?> 
          <ul>
              <?php  $_smarty_tpl->tpl_vars['submenu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['submenu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['submenu']->key => $_smarty_tpl->tpl_vars['submenu']->value){
$_smarty_tpl->tpl_vars['submenu']->_loop = true;
?>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['submenu']->value['link'];?>
" target="<?php echo $_smarty_tpl->tpl_vars['submenu']->value['target'];?>
"><?php echo $_smarty_tpl->tpl_vars['submenu']->value['title'];?>
</a></li>
              <?php } ?>
          </ul> 
          <?php }?>  --></li>
        <?php } ?>
        <?php }else{ ?>暂无导航<?php }?>
	</ul>
</div>

<div class="banner">
         <div class="bannerx">
            <ul class="bannerxList">
                  <?php echo smarty_function_lcmx_banner_list(array('set'=>"列表名:banner,分类:1"),$_smarty_tpl);?>

                        <?php if ($_smarty_tpl->tpl_vars['banner']->value){?>
                        <?php  $_smarty_tpl->tpl_vars['list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['list']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banner']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['list']->key => $_smarty_tpl->tpl_vars['list']->value){
$_smarty_tpl->tpl_vars['list']->_loop = true;
?>
                         <li><a href="javascript:void(0)"><img src="<?php echo $_smarty_tpl->tpl_vars['list']->value['pic'];?>
" /></a></li>
                        <?php } ?>
                        <?php }?>
                         <!-- <li style="background:red;"><a href="javascript:void(0)"><img src="images/002.png" /></a></li>
                         <li style="background:#000;"><a href="javascript:void(0)"><img src="images/003.png" /></a></li> -->
            </ul>
            <div class="bannerxBtonbox">
                <ul class="bannerxBton">
                </ul>
            </div>
        </div>

</div>
    </div>
     <script>
          $(document).ready(function(){

               



              // $(".banner_QQ").toggle(
              //   $(".banner_QQ_div").show();
              //   function()
              //   {
              //        $(".banner_QQ_div").show();
              //   },
              //   function()
              //   {
                   
              //       $(".banner_QQ_div").hide();
              //   }
              // );

              // $(".banner_DH").toggle(
              //    $(".banner_DH_div").show();
              //   function()
              //   {
              //      $(".banner_DH_div").show();
                    
              //   }.
              //   function()
              //   {
              //      $(".banner_DH_div").hide();
              //   }
              // );

          });
        </script> 
        
        
    <script type="text/javascript">

 $(function(){
          var wid=$(window).width();
          var he=wid/1900*566;
          $(".bannerx").css("height",he);
          $(".bannerxBox").css("height",he);
          $(".bannerxBox").css("width",wid);
          $(".bannerxBox").css("margin","0 auto");
          $(".bannerxList li a img").css("width",wid);
          $(".bannerxList li a img").css("height",he);
          //alert(wid);
        })
</script><?php }} ?>