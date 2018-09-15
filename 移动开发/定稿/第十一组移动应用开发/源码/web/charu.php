<?php
	//获取表单提交的数据
	$dingdan_id = rand(000,999);
	$dingdan_time = time();
	$qujian_time = $_POST['qujian_time'];
	$songda_time = $_POST['songda_time'];
	$weight = $_POST['weight'];
	$washingprice = 20*$weight;
	$price = $washingprice+20;
	$user_id = "007";
	$user_name = $_POST['user_name'];
	$user_tel = $_POST['user_tel'];
	$user_add = $_POST['user_add'];

	$qujian_time = strtotime($qujian_time);
	$songda_time = strtotime($songda_time);
// 	echo $dingdan_id."<br />";
// 	echo $dingdan_time."<br />";
// echo $qujian_time."<br />";
// echo $songda_time."<br />";
// echo $weight."<br />";
// echo $washingprice."<br />";
// echo $price."<br />";
// echo $user_id."<br />";
// echo $user_name."<br />";
// echo $user_tel."<br />";
// echo $user_add."<br />";
// exit();


	//设置数据库参数
	$db_host = "localhost";
	$db_user = "root";
	$db_pwd = "root";
	$db_name = "shop";
	//PHP链接MySQL服务器
	$link = @mysql_connect($db_host,$db_user,$db_pwd);
	if(!$link) {
		echo "链接数据库失败".mysql_error();
		exit();
	}
	if(mysql_select_db($db_name)) {
		mysql_query("set charset utf8");
		$sql = "insert into sw_dingdan(dingdan_id,dingdan_time,qujian_time,songda_time,
			weight,washing_price,price,user_id,user_name,user_tel,user_add) values ($dingdan_id,
			$dingdan_time,$qujian_time,$songda_time,$weight,$washingprice,$price,$user_id,'$user_name',
			$user_tel,'$user_add')";


		$result = mysql_query($sql,$link);
		if($result) {
			echo "下单成功";
		}
	}else {
		echo "选择数据库失败！";
	}

?>