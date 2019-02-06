<?php
/* 检测垃圾文件 */
require (dirname ( dirname ( __FILE__ ) ) . '/common/common.php');
admin_check ( 'ajax' ); // 管理员验证

$action = isset ( $_POST ['action'] ) ? $_POST ['action'] : null;
$upload_dir = LC_MX . 'uploadfile'; // 需要检测的目录

if ($action == 'scan') {
	// 扫描垃圾文件
	$img_list = get_fileslist ( $upload_dir );
	$rubbish_list = array ();
	$k = 0;
	for($i = 0; $i < count ( $img_list ); $i ++) {
		$rubbish_list [$k] = findrubbish ( $img_list [$i] );
		$k ++;
	}
	$rubbish_list = array_filter ( $rubbish_list );
	$rubbish_list = sort ( $rubbish_list ) ? $rubbish_list : $rubbish_list;
	
	$res = array ();
	$res ['list'] = $rubbish_list;
	$res ['num'] = count ( $rubbish_list );
	echo json_encode ( $res );
} elseif ($action == 'clear') {
	// 清理垃圾文件
	$file_list = isset ( $_POST ['files'] ) ? $_POST ['files'] : null;
	$str_arr = explode ( ",", $file_list );
	$ck = 1;
	for($i = 0; $i < count ( $str_arr ); $i ++) {
		// 判断图片是否存在并删除
		if (file_exists ( $str_arr [$i] )) {
			unlink ( $str_arr [$i] );
			$ck ++;
		}
	}
	if ($ck == count ( $str_arr )) {
		echo 'yes';
	} else {
		echo 'no';
	}
}
/* 检查目录 */
function get_fileslist($dir, $file_list = array()) {
	$ext_arr = array (
			'gif',
			'jpg',
			'jpeg',
			'png',
			'bmp',
			'GIF',
			'JPG',
			'JPEG',
			'PNG',
			'BMP' 
	); // 垃圾文件扩展名
	if ($dh = opendir ( $dir )) {
		while ( ($file = readdir ( $dh )) !== false ) {
			if ($file != '.' && $file != '..') {
				if (! is_dir ( $dir . "/" . $file )) {
					$file_ext = strtolower ( pathinfo ( $file, PATHINFO_EXTENSION ) ); // 获取文件扩展名
					if (in_array ( $file_ext, $ext_arr )) {
						$file_list [] = array (
								'url' => $dir . '/' . $file,
								'name' => $file 
						);
					}
				} else {
					if (is_array ( $file_list )) {
						$file_list = array_merge ( $file_list, get_fileslist ( $dir . "/" . $file, array () ) );
					} else {
						$file_list = get_fileslist ( $dir . "/" . $file, array () );
					}
				}
			}
		}
		closedir ( $dh );
	}
	return $file_list;
}
/* 检查数据库 */
function findrubbish($file) {
	// 需要检查的数据库表
	$db_table = array (
			
			// banner
			array (
					'name' => 'banner',
					'field' => array (
							'lc_pic' 
					) 
			),
			
			// danye
			array (
					'name' => 'danye',
					'field' => array (
							'lc_content',
							'lc_phone_content' 
					) 
			),
			
			// dibu
			array (
					'name' => 'dibu',
					'field' => array (
							'lc_content' 
					) 
			),
			
			// down
			array (
					'name' => 'down',
					'field' => array (
							'lc_pic',
							'lc_content',
							'lc_phone_content' 
					) 
			),
			
			// down_type
			array (
					'name' => 'down_type',
					'field' => array (
							'c_content' 
					) 
			),
			
			// friendlink
			array (
					'name' => 'friendlink',
					'field' => array (
							'lc_pic' 
					) 
			),
			
			// lanmu
			array (
					'name' => 'lanmu',
					'field' => array (
							'c_content' 
					) 
			),
			
			// navigation
			array (
					'name' => 'navigation',
					'field' => array (
							'lc_pic' 
					) 
			),
			
			// news
			array (
					'name' => 'news',
					'field' => array (
							'lc_pic',
							'lc_content',
							'lc_phone_content' 
					) 
			),
			
			// news_type
			array (
					'name' => 'news_type',
					'field' => array (
							'c_content' 
					) 
			),
			
			// products
			array (
					'name' => 'products',
					'field' => array (
							'lc_content',
							'lc_phone_content' 
					) 
			),
			
			// products_pics
			array (
					'name' => 'products_pics',
					'field' => array (
							'lc_pic' 
					) 
			),
			
			// products_type
			array (
					'name' => 'products_type',
					'field' => array (
							'c_content' 
					) 
			),
			
			// touch
			array (
					'name' => 'touch',
					'field' => array (
							'logo_url' 
					) 
			),
			
			// touch_banner
			array (
					'name' => 'touch_banner',
					'field' => array (
							'lc_pic' 
					) 
			) 
	);
	/* 检测一个文件是否存在 */
	$z_num = array ();
	for($i = 0; $i < count ( $db_table ); $i ++) {
		if (count ( $db_table [$i] ['field'] ) > 1) {
			for($j = 0; $j < count ( $db_table [$i] ['field'] ); $j ++) {
				$z_num [] = db_query_num ( $db_table [$i] ['name'], $db_table [$i] ['field'] [$j], $file ['name'] );
			}
		} else {
			$z_num [] = db_query_num ( $db_table [$i] ['name'], $db_table [$i] ['field'] [0], $file ['name'] );
		}
	}
	$rubbish = array ();
	if (array_sum ( $z_num ) == 0) {
		$rubbish = $file;
	}
	return $rubbish;
	/* 检测一个文件是否存在End */
}
/* 执行数据库查询获取匹配个数 */
function db_query_num($db_t, $db_f, $img_f) {
	$num = 0;
	$sql = "select " . $db_f . " from " . lc () . "_" . $db_t . " where " . $db_f . " like '%/" . $img_f . "%'";
	$rs = mysql_query ( $sql );
	if ($rs) {
		if (mysql_num_rows ( $rs ) > 0) {
			$num = mysql_num_rows ( $rs );
		}
	}
	return $num;
}
?>