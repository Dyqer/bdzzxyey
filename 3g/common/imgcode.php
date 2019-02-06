<?php
/**************************************************
 * Touch 后台验证码
 功能：生成验证码，纯字母
 **************************************************/
require("common.php");

class ValidationCode{
	private $width,$height,$codenum;
	public $checkcode;     //产生的验证码
	private $checkimage;    //验证码图片
	private $disturbColor = ''; //干扰像素

	function __construct($width='80',$height='20',$codenum='4'){
		$this->width=$width;
		$this->height=$height;
		$this->codenum=$codenum;
	}
	function outImg(){
		//输出头
		$this->outFileHeader();
		//产生验证码
		$this->createCode();
		//产生图片
		$this->createImage();
		//设置干扰像素
		$this->setDisturbColor();
		//往图片上写验证码
		$this->writeCheckCodeToImage();
		imagepng($this->checkimage);
		imagedestroy($this->checkimage);
	}

	private function outFileHeader(){
		header ("Content-type: image/png");
		ob_clean();//清除缓存
		flush();//清除缓存
	}

	private function createCode(){
		$check_code=implode("",array_rand(array_flip(range(a,z)),6));//从26个字母中随机生成
		$this->checkcode = strtoupper(substr($check_code,0,$this->codenum));//生成随机大写验证码
	}

	private function createImage(){
		$this->checkimage = @imagecreate($this->width,$this->height);
		$back = imagecolorallocate($this->checkimage,255,255,255);
		imagefilledrectangle($this->checkimage,0,0,$this->width - 1,$this->height - 1,$back); // 白色底
	}

	private function setDisturbColor(){
		for ($i=0;$i<=200;$i++)
		{
			$this->disturbColor = imagecolorallocate($this->checkimage, rand(0,255), rand(0,255), rand(0,255));
			imagesetpixel($this->checkimage,rand(2,128),rand(2,38),$this->disturbColor);
		}
	}

	private function writeCheckCodeToImage(){
		for ($i=0;$i<=$this->codenum;$i++)
		{
			$bg_color = imagecolorallocate ($this->checkimage, rand(0,255), rand(0,128), rand(0,255));
			$x = floor($this->width/$this->codenum)*$i;
			$y = rand(0,$this->height-15);
			imagechar ($this->checkimage, rand(5,8), $x, $y, $this->checkcode[$i], $bg_color);
		}
	}
	function __destruct(){
		unset($this->width,$this->height,$this->codenum);
	}
}

$image = new ValidationCode('60','24','4');//图片长度、宽度、字符个数
$image->outImg();//输出生成验证码的图片
$_SESSION['validationcode'] = $image->checkcode;//存贮验证码到 $_SESSION 中
?>