<?php
/*检测并清除BOM*/
$check_dir = isset($_POST['check_dir'])?$_POST['check_dir']:null;//检查目录
$check_auto = isset($_POST['auto_cl'])?$_POST['auto_cl']:null;//处理方式

if($check_dir){
	$basedir="../../".$check_dir;
}else{
	$basedir = '.';
}
if($check_auto){
	$auto = 1;//自动处理
}else{
	$auto = 0;//不处理
}
checkdir($basedir);
/*检查目录*/
function checkdir($basedir){
	if($dh = opendir($basedir)){
		while(($file = readdir($dh)) !== false){
			if($file != '.' && $file != '..'){
				if(!is_dir($basedir."/".$file)){
					echo checkBOM("$basedir/$file",$file);
				}else{
					$dirname = $basedir."/".$file;
					checkdir($dirname);
				}
			}
		}
		closedir($dh);
	}
}
/*检查UTF-8编码文件是否含有签名BOM*/
function checkBOM($filename,$file){
	global $auto;
	$contents = file_get_contents($filename);
	$charset[1] = substr($contents, 0, 1);
	$charset[2] = substr($contents, 1, 1);
	$charset[3] = substr($contents, 2, 1);
	if(ord($charset[1]) == 239 && ord($charset[2]) == 187 && ord($charset[3]) == 191){
		if($auto == 1){
			$rest = substr($contents, 3);
			rewrite ($filename, $rest);
			return "文件名: $file "."<span style='color:#F00'>BOM发现，自动移除成功。</span>";
		}else{
			return ("文件名: $file "."<span style='color:#F00'>BOM发现。</span>");
		}
	}
}
//写文件
function rewrite($filename, $data){
	$filenum = fopen($filename, "w");
	flock($filenum, LOCK_EX);
	fwrite($filenum, $data);
	fclose($filenum);
}
?>