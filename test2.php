

<?php
    error_reporting(0);
 	$db_name = "wifi";
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
		
	//
	$hostmac = $_POST[name];
	$starttime = $_POST[starttime];
	$endtime = $_POST[endtime];
	//echo $hostmac;
	//echo  json_encode($hostmac);
	//exit;
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	
	
	
	$select = "select count(*) as num ,nighbormac from wifiunion where hostmac = '$hostmac'  group by nighbormac ";
	//$select = "select * from wifiunion where hostmac = '4494FC82B4BF'   ";
	$result = mysql_query($select);
	
	
	
	$datas = array();
	
	while($row = mysql_fetch_row($result)) {
		if($row[0]>100){
					$datas[] = $row;
		}
	}
//var_dump ($datas) ;
	//exit;
	$arr2 =array();
	//$arr2[]=$datas;
	$i=0;
	for($i;$i< count($datas,0);$i++)//这里
	{
		$str1 = $datas[$i][1];
	$arr1 = array();
	$arr=array();
	
	$select = "SELECT starttime,disturb FROM wifiunion where nighbormac = '$str1' and hostmac = '$hostmac'  order by starttime";
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



