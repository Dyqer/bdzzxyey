<?php
require (dirname(__FILE__).'/common/common.php');
// 注意：使用组件上传，不可以使用 $_FILES["Filedata"]["type"] 来判断文件类型
mb_http_input("utf-8");
mb_http_output("utf-8");

//---------------------------------------------------------------------------------------------
//组件设置a.MD5File为2，3时 的实例代码

if(getGet('access2008_cmd')=='2'){ // 提交MD5验证后的文件信息进行验证
	//getGet("access2008_File_name") 	'文件名
	//getGet("access2008_File_size")	'文件大小，单位字节
	//getGet("access2008_File_type")	'文件类型 例如.gif .png
	//getGet("access2008_File_md5")		'文件的MD5签名

	die('0'); //返回命令  0 = 开始上传文件， 2 = 不上传文件，前台直接显示上传完成
}
if(getGet('access2008_cmd')=='3'){ //提交文件信息进行验证
	//getGet("access2008_File_name") 	'文件名
	//getGet("access2008_File_size")	'文件大小，单位字节
	//getGet("access2008_File_type")	'文件类型 例如.gif .png

	die('1'); //返回命令 0 = 开始上传文件,1 = 提交MD5验证后的文件信息进行验证, 2 = 不上传文件，前台直接显示上传完成
}
//---------------------------------------------------------------------------------------------
//文件保存目录路径
$save_path = '../uploadfile/image';//默认为uploadfile目录
//文件保存目录URL
$save_url = '../uploadfile/image';//默认为 uploadfile目录
//定义允许上传的文件扩展名
$ext_arr = array('gif', 'jpg', 'jpeg', 'png', 'bmp','GIF', 'JPG', 'JPEG', 'PNG', 'BMP');
//最大文件大小
$max_size = 1024*500;//(默认500K)
$save_path = realpath($save_path) . '/';

//有上传文件时
if (empty($_FILES) === false) {
	//原文件名
	$file_name = $_FILES['Filedata']['name'];
	//服务器上临时文件名
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	//文件大小
	$file_size = $_FILES['Filedata']['size'];
	//检查文件名
	if (!$file_name) {
		exit("返回错误: 请选择文件。");
	}
	//检查目录
	if (@is_dir($save_path) === false) {
		exit("返回错误: 上传目录不存在。($save_path)");
	}
	//检查目录写权限
	if (@is_writable($save_path) === false) {
		exit("返回错误: 上传目录没有写权限。($save_url)");
	}
	//检查是否已上传
	if (@is_uploaded_file($tmp_name) === false) {
		exit("返回错误: 临时文件可能不是上传文件。($file_name)");
	}
	//检查文件大小
	if ($file_size > $max_size) {
		exit("返回错误: 上传文件($file_name)大小超过限制。最大".($max_size/1024)."KB");
	}
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	if (in_array($file_ext, $ext_arr) === false) {
		exit("返回错误: 上传文件扩展名是不允许的扩展名。");
	}

	/*echo "上传的文件: " . $file_name . "<br />";
	echo "文件类型: " . $file_ext . "<br />";
	echo "文件大小: " . ($file_size / 1024) . " Kb<br />";
	echo "临时文件: " . $tmp_name . "<br />";*/
	
	//创建文件夹
	$ymd = date("Ymd");
	$save_path .= $ymd . "/";
	$save_url .= "/".$ymd . "/";
	if (!file_exists($save_path)) {
		mkdir($save_path);
	}
	//新文件名
	$new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
	//移动文件
	$file_path = $save_path . $new_file_name;
	@chmod($file_path, 0644);//修改目录权限(Linux)
	if (move_uploaded_file($tmp_name, $file_path) === false) {//开始移动
		exit("返回错误: 上传文件失败。($file_name)");
	}
	$file_url = $save_url . $new_file_name;
	$fileName = uniqid('image',true).$type;

	$lc_title = $file_name;
	$lc_title = str_replace(".jpg","",$lc_title);
	$lc_title = str_replace(".gif","",$lc_title);
	$lc_title = str_replace(".png","",$lc_title);
	$lc_title = str_replace(".jpeg","",$lc_title);
	$lc_title = str_replace(".bmp","",$lc_title);
	
	$lc_title = str_replace(".JPG","",$lc_title);
	$lc_title = str_replace(".GIF","",$lc_title);
	$lc_title = str_replace(".PNG","",$lc_title);
	$lc_title = str_replace(".JPEG","",$lc_title);
	$lc_title = str_replace(".BMP","",$lc_title);

	$c_id = getPost("select");//获取分类id
	$content = iconv("UTF-8","GB2312",getPost("content"));
	$lc_pic = $file_url;
	$sql = "insert into ".lc()."_products(lc_title,lc_datetime,lc_content,c_id) values ('{$lc_title}',NOW(),'{$content}','{$c_id}')";
	$rs = mysql_query($sql);
	if($rs){
		$lc_id=mysql_insert_id();//获取刚刚插入图文的id
		//多图保存
		if($lc_pic){
			$lc_pic_url=$lc_pic;
			$pic_sql="insert into ".lc()."_products_pics(lc_pic,product_id) values ('{$lc_pic_url}','{$lc_id}')";
			mysql_query($pic_sql);
			//更新一张图为封面图
			$up_sql="update ".$lc."_products_pics set lc_fengmian=1 where product_id='{$lc_id}' LIMIT 1";
			mysql_query($up_sql);
		}
		echo 'yse';
		/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
		$sql_max = "select lc_sort_id from ".lc()."_products order by lc_sort_id desc LIMIT 0,1";
		$rs_max = mysql_query($sql_max);
		if($rs_max){
			$rows=mysql_fetch_assoc($rs_max);
			$sql2 = "update ".lc()."_products set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
			mysql_query($sql2);
		}else{
			$sql2 = "update ".lc()."_products set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
			mysql_query($sql2);
		}
		/****************** 排序结束 *****************/
	}
}
function filekzm($a){
	$c=strrchr($a,'.');
	if($c){
		return $c;
	}else{
		return '';
	}
}

function getGet($v){
	// 获取GET
	if(isset($_GET[$v])){
		return $_GET[$v];
	}else{
		return '';
	}
}

function getPost($v){
	// 获取POST
	if(isset($_POST[$v])){
		return $_POST[$v];
	}else{
		return '';
	}
}
?>

