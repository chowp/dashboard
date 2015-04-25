

<?php
    error_reporting(0);
 	$db_name = "wifiunion";
	$db_host = "localhost";
	$db_user = "wifi";
	$db_pass = "guest";
		
	
	$monitor_ap=$_REQUEST['data'];
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	
	
	
	//$select = "select count(*) as inf ,smac from wifiunion group by smac";
	//查询所有干扰源smac的记录大于100的数据  这个SQL 直接查询好的 下面 你判断100行的给你注释掉了恩恩
	$select = "SELECT inf, smac FROM (select count(*) as inf ,smac from ing  where monitor_ap = '$monitor_ap' group by smac ORDER BY inf DESC)  WHERE  inf>=100;";
	$result = mysql_query($select);
	
	//$datas = array();
	
	/*while($row = mysql_fetch_row($result)) {
		if($row[0]>100){
					$datas[] = $row;
		}
	}*/
	$arr2 =array();
	//$arr2[]=$datas;
	$i=0;
	for($i;$i<= count($result,0);$i++)
	{
		$str1 = $result[$i][1];
	$arr1 = array();
	$arr=array();
	
	$select = "select btime,inf from ing where smac = '$str1' order by btime asc";
	$result = mysql_query($select);
	$row = array();
	while($row = mysql_fetch_row($result)) {
		$row[0]=intval($row[0]);
		$row[0]*=1000;
		$row[1]=floatval($row[1]);
		$arr[] = $row;
	}
	$arr2[$i] = $arr;
	}
	
	
	echo $arr2=json_encode($arr2);
	//echo $newntoe = str_replace('"','',$aa);
	?>



