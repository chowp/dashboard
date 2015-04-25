

<?php
    error_reporting(0);
 	$db_name = "wifi";
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
		
	//
	$hostmac = $_POST[name];
	//echo $hostmac;
	//echo  json_encode($hostmac);
	//exit;
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	
	
	
	$select = "select count(*) as num ,nighbormac from wifiunion a where  3 > (SELECT count( * ) FROM wifiunion  WHERE starttime = a.starttime AND  disturb> a.disturb ) and hostmac = '4494FC82B4BF' group by nighbormac  ";
	$result = mysql_query($select);
	//echo  json_encode($select );
	//exit;
	
	
	$datas = array();
	$a=0;
	for($a;$a< 10;$a++) {
		$row = mysql_fetch_row($result);
		$datas[] = $row;
		
	}
	$arr2 =array();
	//$arr2[]=$datas;
	$i=0;
	for($i;$i< count($datas,0);$i++)//这里
	{
		$str1 = $datas[$i][1];
	$arr1 = array();
	$arr=array();
	//$select = "select starttime,disturb from ing where nighbormac = '$str1' and hostmac = '$hostmac' AND EXISTS (SELECT * FROM ing a WHERE 3 > (SELECT count( * ) FROM ing WHERE starttime = a.starttime AND  disturb> a.disturb )) order by starttime";
	$select = "SELECT starttime,disturb FROM wifiunion a WHERE 3 > (SELECT count( * ) FROM wifiunion WHERE starttime = a.starttime AND  disturb> a.disturb ) and nighbormac = '$str1' and hostmac = '$hostmac' order by starttime" ;
	$result = mysql_query($select);
	$row = array();
	while($row = mysql_fetch_row($result)) {
		$row[0]=intval($row[0]);
		$row[0]*=1000;
		$row[1]=floatval($row[1]);//这个是啥  转换数据格式
		$arr[] = $row;
		
	}

	$arr2[$i] = $arr;
	}
	
   //$arr3=array_pop($arr2);
  //print_r(array_pop($arr)) ;
   //exit;
	//var_dump($arr2);
	echo $arr4=json_encode($arr2);
	//echo $newntoe = str_replace('"','',$aa);
	?>



