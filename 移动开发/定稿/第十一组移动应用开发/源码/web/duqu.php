<?php
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
		$sql = "select dingdan_id,qujian_time,songda_time,price,state,user_name,user_tel,user_add from sw_dingdan";

		$result = mysql_query($sql,$link);
		$i =mysql_num_rows($result);
		//$i =1 ;
		$str = "[";
		while($i) {
			$arr = mysql_fetch_assoc($result);
			$s = json_encode($arr);
			if($i == 1) {
				$str .= $s;
				$str .= "]";
			}else {
				$str .= $s;
				$str .= ",";
			}
			$i--;
		}
		echo $str;
	}else {
		echo "选择数据库失败！";
	}

?>