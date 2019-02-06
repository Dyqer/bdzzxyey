<script type="text/javascript">
$(function(){
	var $mx_right = $("#mx_right");
	//左侧效果
	$('#mx_left>ul>li>a').click(function(){
		var $li = $(this).parent(),
			data_s = $(this).attr("data-s"),
			$oth_li = $li.siblings();
		if(data_s=='show'){
			$(this).attr("data-s",'').find('span').html('&#xea50;');
			$li.find('ul').stop(true,true).slideUp();
		}else{
			$(this).attr("data-s",'show').find('span').html('&#xe42d;');
			$li.find('ul').stop(true,true).slideDown();
			$oth_li.find('ul').stop(true,true).slideUp();
			$oth_li.children('a').attr("data-s",'').children('span').html('&#xea50;');
			}
		});
	$('.Aline>li:odd').css("background","#f2f2f2");
	/*系统设置*/
	$(".sysconfig_list>li:eq(0) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("systemconfig.php?nav=1",function(){mx_loadremove()});
		})
	/*TOUCH管理*/
	$(".touch").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("touchconfig.php",function(){mx_loadremove()});
		})	
	/*账号管理*/
	$(".sysconfig_list>li:eq(1) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("account_list.php?nav=2",function(){mx_loadremove()});
		})
	/*修改密码*/
	$(".sysconfig_list>li:eq(2) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("accountpwd_edit.php?nav=3",function(){mx_loadremove()});
		})
	/*邮件管理*/
	$(".sysconfig_list>li:eq(3) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("systemconfig_email.php?nav=4",function(){mx_loadremove()});
		})
	/*短信管理*/
	$(".sysconfig_list>li:eq(4) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("systemconfig_sms.php?nav=5",function(){mx_loadremove()});
		})
	/*图片设置*/
	$(".sysconfig_list>li:eq(5) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("systemconfig_pic.php?nav=6",function(){mx_loadremove()});
		})
	/*自检功能*/
	$(".sysconfig_list>li:eq(6) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("systemconfig_zj.php?nav=7",function(){mx_loadremove()});
		})	
	/*检测增加*/
	$(".sysconfig_list>li:eq(7) a:first").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("add_ziduan.php?nav=8",function(){mx_loadremove()});
		})		
	/*全部栏目*/
	$(".webcolumn").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("lanmu_list.php",function(){mx_loadremove()});
		})
	/*会员管理*/
	$(".member").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("user_list.php",function(){mx_loadremove()});
		})
	
	/*微信管理*/
	$(".wechat").click(function(){
		mx_loadwait('正在加载中…');
		$mx_right.load("weixin.php",function(){mx_loadremove()});
		})
	/*回收站*/
  $(".recyclebin").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("recycle.php?zt=0",function(){mx_loadremove()});
    })
  /*日志功能*/
  $(".rizhi").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("rizhi.php",function(){mx_loadremove()});
    })
  /*职位管理*/
  $(".zhiweigl").click(function(){
      mx_loadwait('正在加载中…');
      $mx_right.load("job_list.php",function(){mx_loadremove()});
      })
  /*简历列表*/
  $(".jianlilist").click(function(){
      mx_loadwait('正在加载中…');
      $mx_right.load("jianli_list.php",function(){mx_loadremove()});
      })
  /*导航管理*/
  $(".advanced_list>li:eq(0) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("nav_list.php",function(){mx_loadremove()});
    })
  /*Banner管理*/
  $(".advanced_list>li:eq(1) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("banner_list.php?type=1",function(){mx_loadremove()});
    })
  /*LOGO管理*/
  $(".advanced_list>li:eq(2) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("logo_edit.php",function(){mx_loadremove()});
    })
  /*友情链接*/
  $(".advanced_list>li:eq(3) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("friendlink_list.php",function(){mx_loadremove()});
    })
  /*底部信息*/
  $(".advanced_list>li:eq(4) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("bot_edit.php?id=1",function(){mx_loadremove()});
    })
  /*数据库管理*/
  $(".advanced_list>li:eq(5) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("fields_list.php",function(){mx_loadremove()});
    })
  /*数据库管理*/
  /*图文批量上传*/
  $(".advanced_list>li:eq(6) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("products_list.php",function(){mx_loadremove()});
    })
  /*广告图管理*/
  $(".advanced_list>li:eq(7) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("banner_list.php?type=2",function(){mx_loadremove()});
    })
  /*企业QQ*/
  $(".advanced_list>li:eq(8) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("bot_edit.php?id=3",function(){mx_loadremove()});
    })
  /*BOM检查*/
  $(".advanced_list>li:eq(9) a:first").click(function(){
    mx_loadwait('正在加载中…');
    $mx_right.load("check_bom.php",function(){mx_loadremove()});
    })
  /*垃圾清理*/
  $(".advanced_list>li:eq(10) a:first").click(function(){
    mx_loadwait('此页,正在加载中…');
    $mx_right.load("scan_rubbish.php",function(){mx_loadremove()});
    })
  /*客户关怀*/
  $(".kehuguanghuai1").click(function(){
      mx_loadwait('正在加载中…');
      $mx_right.load("frequently_asked_questions.php",function(){mx_loadremove()});
      })
  $(".kehuguanghuai2").click(function(){
      mx_loadwait('正在加载中…');
      $mx_right.load("operating_video.php",function(){mx_loadremove()});
      })
  $(".kehuguanghuai3").click(function(){
      mx_loadwait('正在加载中…');
      $mx_right.load("online_modification.php",function(){mx_loadremove()});
      })
  /*客户关怀End*/

  /*订单管理*/
      $(".order_list1").click(function(){
        mx_loadwait('正在加载中…');
        $mx_right.load("orderform_list.php?zt=0",function(){mx_loadremove()});
        })
      $(".order_list2").click(function(){
        mx_loadwait('正在加载中…');
        $mx_right.load("orderform_list.php?zt=1",function(){mx_loadremove()});
        })
      $(".order_list3").click(function(){
        mx_loadwait('正在加载中…');
        $mx_right.load("orderform_list.php?zt=2",function(){mx_loadremove()});
        })
      $(".order_list4").click(function(){
        mx_loadwait('正在加载中…');
        $mx_right.load("orderform_list.php?zt=3",function(){mx_loadremove()});
        })
      $(".order_list5").click(function(){
        mx_loadwait('正在加载中…');
        $mx_right.load("payment.php",function(){mx_loadremove()});
        })
  /*订单管理End*/
});
</script>
<div class="mx_left" id="mx_left">
  <ul>
    <li><a class="webcolumn"><samp class="mxicon">&#xe9bd;</samp>&nbsp;&nbsp;网站栏目
      <div class="clear"></div>
      </a></li>
    <li><a class="sysconfig"><samp class="mxicon">&#xe994;</samp>&nbsp;&nbsp;系统设置<span class="mxicon">&#xea50;</span></a>
      <ul class="sysconfig_list">
        <li><a>系统设置<span class="mxicon">&#xe385;</span></a></li>
        <li><a>账号管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>修改密码<span class="mxicon">&#xe385;</span></a></li>
        <li><a>邮件管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>短信管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>图片设置<span class="mxicon">&#xe385;</span></a></li>
        <li><a>自检功能<span class="mxicon">&#xe385;</span></a></li>
        <li><a>检测字段<span class="mxicon">&#xe385;</span></a></li>
      </ul>
    </li>
    <li><a class="touch"><samp class="mxicon">&#xeac1;</samp>&nbsp;&nbsp;TOUCH管理</a></li>
    <li><a class="singlepage"><samp class="mxicon">&#xe9f1;</samp>&nbsp;&nbsp;单页管理<span class="mxicon">&#xea50;</span></a>
      <ul id="ul_singlepage">
        <?php echo get_lanmu_list(0,"danye")?>
      </ul>
    </li>
    <li><a class="article"><samp class="mxicon">&#xe925;</samp>&nbsp;&nbsp;文章管理<span class="mxicon">&#xea50;</span></a>
      <ul id="ul_news">
        <?php echo get_lanmu_list(1,"news")?>
      </ul>
    </li>
    <li><a class="product"><samp class="mxicon">&#xe927;</samp>&nbsp;&nbsp;图文管理<span class="mxicon">&#xea50;</span></a>
      <ul id="ul_products">
        <?php echo get_lanmu_list(2,"products")?>
      </ul>
    </li>
    <li><a class="download"><samp class="mxicon">&#xe9c5;</samp>&nbsp;&nbsp;下载管理<span class="mxicon">&#xea50;</span></a>
      <ul id="ul_down">
        <?php echo get_lanmu_list(3,"down")?>
      </ul>
    </li>
    <li><a class="gbook"><samp class="mxicon">&#xe944;</samp>&nbsp;&nbsp;留言管理<span class="mxicon">&#xea50;</span></a>
      <ul id="ul_gbook">
        <?php echo get_lanmu_list(5,"gbook")?>
      </ul>
    </li>
    <li><a class="employ"><samp class="mxicon">&#xe942;</samp>&nbsp;&nbsp;诚聘管理<span class="mxicon">&#xea50;</span></a>
      <ul>
        <li><a class="zhiweigl">职位管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="jianlilist">简历查看<span class="mxicon">&#xe385;</span></a></li>
      </ul>
    </li>
    <li><a class="orderform"><samp class="mxicon">&#xe9ae;</samp>&nbsp;&nbsp;订单管理<span class="mxicon">&#xea50;</span></a>
      <ul class="order_list">
        <li><a class="order_list1">未付款<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="order_list2">已付款<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="order_list3">已发货<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="order_list4">已到货<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="order_list5">配送方式<span class="mxicon">&#xe385;</span></a></li>
      </ul>
    </li>
    <li><a class="member"><samp class="mxicon">&#xe971;</samp>&nbsp;&nbsp;会员管理</a></li>
    
    <!-- <li><a class="wechat"><samp class="mxicon">&#xe958;</samp>&nbsp;&nbsp;微信管理</a></li> -->
    <li><a class="advancedfeatures"><samp class="mxicon">&#xeac2;</samp>&nbsp;&nbsp;高级功能<span class="mxicon">&#xea50;</span></a>
      <ul class="advanced_list">
        <li><a>导航管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>Banner管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>LOGO管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>友情链接<span class="mxicon">&#xe385;</span></a></li>
        <li><a>底部信息<span class="mxicon">&#xe385;</span></a></li>
        <li><a>数据库管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>图文批量上传<span class="mxicon">&#xe385;</span></a></li>
        <li><a>广告图管理<span class="mxicon">&#xe385;</span></a></li>
        <li><a>企业QQ<span class="mxicon">&#xe385;</span></a></li>
        <li><a>BOM检查<span class="mxicon">&#xe385;</span></a></li>
        <li><a>垃圾清理<span class="mxicon">&#xe385;</span></a></li>
        <!--<li><a onClick="Advancedfeatures(7)">嵌入代码<span class="mxicon">&#xe385;</span></a></li>-->
      </ul>
    </li>
    <li><a class="recyclebin"><samp class="mxicon">&#xe9ac;</samp>&nbsp;&nbsp;回&nbsp;收&nbsp;站<span class="mxicon">&#xea50;</span></a></li>
    <li><a class="customercare"><samp class="mxicon">&#xe9da;</samp>&nbsp;&nbsp;客户关怀<span class="mxicon">&#xea50;</span></a>
      <ul class="customercare_list">
        <li><a class="kehuguanghuai1">常见问题<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="kehuguanghuai2">操作视频<span class="mxicon">&#xe385;</span></a></li>
        <li><a class="kehuguanghuai3">在线修改<span class="mxicon">&#xe385;</span></a></li>
      </ul>
    </li>
    <li><a class="rizhi"><samp class="mxicon">&#xe905;</samp>&nbsp;&nbsp;日&nbsp;&nbsp;&nbsp;志</a></li>
    <div class="clear" style="height:20px"></div>
  </ul>
</div>
