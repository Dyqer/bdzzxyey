<?php
/**************************************************
 * 微信接口文件
 **************************************************/
require(dirname(dirname(__FILE__))."/common/common.php");
require(dirname(__FILE__)."wx_tpl.php");

$sql1 = "select * from ".lc()."_weixin where lc_id=1";
$rs1 = mysql_query($sql1);
if($rs1){
	$rows1=mysql_fetch_assoc($rs1);
	$lc_token = "".$rows1['lc_token']."";
}

//获取微信发送数据
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
if (!empty($postStr)){
	//解析数据
	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
	//发送消息方ID
	$fromUsername = $postObj->FromUserName;
	//接收消息方ID
	$toUsername = $postObj->ToUserName;
	//消息类型
	$form_MsgType = $postObj->MsgType;

	//事件消息

	//订阅事件
	if($form_MsgType=="event"){
		//获取事件类型
		$form_Event = $postObj->Event;
		//订阅事件
		if($form_Event=="subscribe"){
			//回复欢迎文字消息
			if(get_reply_gz_default()==1){
				$msgType="text";
				$contentStr=get_reply_gz_text();
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, time(), $msgType, $contentStr);
			}else{
				$resultStr="<xml>
				 <ToUserName><![CDATA[".$fromUsername."]]></ToUserName>
				 <FromUserName><![CDATA[".$toUsername."]]></FromUserName>
				 <CreateTime>".time()."</CreateTime>
				 <MsgType><![CDATA[news]]></MsgType>
				 <ArticleCount>1</ArticleCount>
				 <Articles>"; 
					
				//添加封面图文消息
				$resultStr.="<item>
				 <Title><![CDATA[".get_reply_gz_s_title()."]]></Title>
				 <Description><![CDATA[".get_reply_gz_s_con()."]]></Description>
				 <PicUrl><![CDATA[".$web_url."/".get_reply_gz_s_pic()."]]></PicUrl>
				 <Url><![CDATA[".get_reply_gz_s_url()."]]></Url>
				 </item>";        

				$resultStr.="</Articles>
				 <FuncFlag>0</FuncFlag>
				 </xml>"; 
			}
			echo $resultStr;

		}
		if($form_Event=="CLICK"){
			//点击事件
			$EventKey = $postObj->EventKey;//菜单的自定义的key值，可以根据此值判断用户点击了什么内容，从而推送不同信息
			$str = EventKey($EventKey);
			eval($str);
			echo $resultStr;
		}
	}
}
//根据关键词回复消息事件
if($form_MsgType=="text"){
	//---------- 返 回 数 据 ----------
	$keyword = trim($postObj->Content); //获取消息内容
	$str = reply_key();
	eval($str);
	if($keyword==2){
		$resultStr = makeNews($arrayCon,$fromUsername, $toUsername);
		echo $resultStr;
	}
}

define("TOKEN", $lc_token);
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

class wechatCallbackapiTest
{
	public function valid()
	{
		$echoStr = $_GET["echostr"];

		//valid signature , option
		if($this->checkSignature()){
			echo $echoStr;
			exit;
		}
	}


	private function checkSignature()
	{
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>