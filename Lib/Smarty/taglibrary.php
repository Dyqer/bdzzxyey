<?php
/*
 * LCMX 4.0 Smarty页面标签设置
 * ============================================================================
 * 版权所有: 山西龙采科技，并保留所有权利。
 * 网站地址: http://www.longcai0351.com
 * ============================================================================
 */
$_CONFIG['bot']=bot();//底部版权
$_CONFIG['links']=links();//友情链接
$_CONFIG['qy_qq']=qy_qq();//企业qq
$_CONFIG['logo']=get_logo();//获取logo图片
$_CONFIG['newshd']=get_news_pic_hd(5,0,370,197,0);//新闻幻灯调用
$_CONFIG['hd']=get_banner(5,1,1000,300,30,1);//banner调用{参数1是banner数量,参数2是类别,参数3是宽度,参数4是高度,参数5是字体高度,参数6是显示效果}

$_CONFIG['express_way_list']=get_express_way_list();//配送列表
$_CONFIG['now_url']='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];//获取当前的URL
?>