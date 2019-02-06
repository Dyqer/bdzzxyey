<?php
/*图文添加修改处理*/
require (dirname(dirname(__FILE__)).'/common/common.php');
admin_check('action');//管理员验证

require(LC_MX."Lib/upload.php");//加载图片上传类

$action = isset($_POST['action'])?$_POST['action']:'add';//默认添加

$lanmu = isset($_POST['lanmu'])?(int)$_POST['lanmu']:0;//图文所属栏目
$c_id = isset($_POST['c_id'])?(int)$_POST['c_id']:0;//图文所属分类
$title = isset($_POST['lc_title'])?escape_str($_POST['lc_title']):null;
$from = isset($_POST['lc_from'])?escape_str($_POST['lc_from']):null;//来源
$content = isset($_POST['lc_content'])?escape_str($_POST['lc_content'],false):null;
$jianjie = isset($_POST['lc_jianjie'])?escape_str($_POST['lc_jianjie']):null;
$price = isset($_POST['lc_price'])?escape_str($_POST['lc_price']):null;//价格
$tj = isset($_POST['lc_tj'])?(int)$_POST['lc_tj']:0;//是否推荐
$zt = isset($_POST['lc_zt'])?(int)$_POST['lc_zt']:0;//是否发布
$cant_del = isset($_POST['lc_cant_del'])?(int)$_POST['lc_cant_del']:0;//是否可删除
$phone = isset($_POST['lc_phone'])?(int)$_POST['lc_phone']:0;//是否手机同步
$phone_content = isset($_POST['lc_phone_content'])?escape_str($_POST['lc_phone_content']):null;//手机内容
$url = isset($_POST['lc_url'])?escape_str($_POST['lc_url']):null;//外部链接
$yc = isset($_POST['lc_yc'])?(int)$_POST['lc_yc']:0;//是否保存远程图片
$keywords = isset($_POST['lc_keywords'])?escape_str($_POST['lc_keywords']):null;//关键词
$description = isset($_POST['lc_description'])?escape_str($_POST['lc_description']):null;//描述
$duotu_pic = isset($_POST['duotu_url'])?$_POST['duotu_url']:null;//接收多图路径数组

$field_res = customfields_action('products',$action);//自定义字段处理结果集

$id = isset($_POST['id'])?(int)$_POST['id']:0;//图文编号

if($title){
	/*保存远程图片*/
	if($yc){
		$content = yuancheng($content);
	}
	/*保存远程图片End*/
	if($action == 'add'){
		if(!$phone_content){
			if($lc_phone==1){
				$phone_content=glhtml($content);//如果手机版内容为空，把手机版同步
			}else{
				$phone_content="";
			}
		}

		$sql = "insert into ".lc()."_products(lc_title,lc_content,lc_phone_content,lc_jianjie,lc_price,lc_from,lc_url,lc_phone,lc_datetime,lc_tj,lc_zt,lc_cant_del,c_id,lc_keywords,lc_description {$field_res['f_str']})
	values ('{$title}','{$content}','{$phone_content}','{$jianjie}','{$price}','{$from}','{$url}','{$phone}',NOW(),'{$tj}','{$zt}','{$cant_del}','{$c_id}','{$keywords}','{$description}' {$field_res['fv_str']})";
		$rs = mysql_query($sql);
		if($rs){
			$id = mysql_insert_id();//获取刚刚插入图文的id
			//多图保存
			if($duotu_pic){
				foreach ($duotu_pic as $value){
					$pic_sql="insert into ".lc()."_products_pics(lc_pic,product_id) values ('{$value}','{$id}')";
					mysql_query($pic_sql);
				}
				//更新一张图为封面图
				$up_sql="update ".$lc."_products_pics set lc_fengmian=1 where product_id='{$id}' LIMIT 1";
				mysql_query($up_sql);
			}
			/************* 给新添加的赋排序号，寻找数据库里最大的号+1，让新添加的类别在最前面。*****/
			$sql_max = "select lc_sort_id from ".lc()."_products order by lc_sort_id desc LIMIT 0,1";
			$rs_max = mysql_query($sql_max);
			if($rs_max){
				$rows=mysql_fetch_assoc($rs_max);
				$sql2 = "update ".lc()."_products set lc_sort_id=".($rows['lc_sort_id']+1)." order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}else{
				$sql2 = "update ".lc()."_products set lc_sort_id=lc_id order by lc_id desc LIMIT 1";
				$rs2 = mysql_query($sql2);
			}
			/****************** 排序结束 *****************/

			mx_msg("添加成功！","../products_add.php?lanmu={$lanmu}&c_id={$c_id}");
		}else{
			mx_msg("添加失败！",1);
			/*删除没有保存成功的图片*/
			if($duotu_pic){
				foreach ($duotu_pic as $value){
					$pic_url = LC_MX_M.$value;//图片地址绝对路径
					if(file_exists($pic_url)){
						unlink($pic_url);
					}
				}
			}
			/*删除没有保存成功的图片End*/
		}
	}elseif ($action == 'edit'){

		$sql = "update ".$lc."_products set ";
		$sql.= " lc_title = '{$title}',";
		$sql.= "lc_content = '{$content}',";
		$sql.= "lc_phone_content = '{$phone_content}',";
		$sql.= "lc_keywords = '{$keywords}',";
		$sql.= "lc_description = '{$description}',";
		$sql.= "lc_jianjie = '{$jianjie}',";
		$sql.= "lc_price = '{$price}',";
		$sql.= "lc_from = '{$from}',";
		$sql.= "lc_url = '{$url}',";
		$sql.= "lc_phone = '{$phone}',";
		$sql.= "lc_tj = '{$tj}',";
		$sql.= "lc_zt = '{$zt}',";
		$sql.= "lc_cant_del = '{$cant_del}',";
		$sql.= "c_id = '{$c_id}'";
		$sql.= $field_res['up_str']." where lc_id={$id}";
		$rs = mysql_query($sql);
		if($rs){
			/*多图保存*/
			if($duotu_pic){
				foreach ($duotu_pic as $value){
					$pic_sql="insert into ".lc()."_products_pics(lc_pic,product_id) values ('{$value}','{$id}')";
					mysql_query($pic_sql);
				}
				//更新一张图为封面图
				$up_sql="update ".$lc."_products_pics set lc_fengmian=1 where product_id='{$id}' LIMIT 1";
				mysql_query($up_sql);
			}
			/*多图保存*/
			mx_msg("修改成功！","../products_edit.php?lanmu={$lanmu}&id={$id}");
		}else{
			/*删除没有保存成功的图片*/
			if($duotu_pic){
				foreach ($duotu_pic as $value){
					$pic_url = LC_MX_M.$value;//图片地址绝对路径
					if(file_exists($pic_url)){
						unlink($pic_url);
					}
				}
			}
			/*删除没有保存成功的图片End*/
			mx_msg("修改失败！",1);
		}
	}else{
		mx_msg("请求参数有误！",1);
	}
}else{
	mx_msg("标题不能为空！",1);
}
?>