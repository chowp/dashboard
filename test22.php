

<?php
    error_reporting(0);
 	$db_name = "wifiunion";
	$db_host = "localhost";
	$db_user = "wifi";
	$db_pass = "guest";
		
	//
	$monitor_ap = $_POST[name];
	//echo $monitor_ap;
	//echo  json_encode($monitor_ap);
	//exit;
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	
	
	
	$select = "select count(*) as num ,smac from ing a where  3 > (SELECT count( * ) FROM ing  WHERE btime = a.btime AND  inf> a.inf ) and monitor_ap = '$monitor_ap' group by smac order by num desc ";
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
	//$select = "select btime,inf from ing where smac = '$str1' and monitor_ap = '$monitor_ap' AND EXISTS (SELECT * FROM ing a WHERE 3 > (SELECT count( * ) FROM ing WHERE btime = a.btime AND  inf> a.inf )) order by btime";
	$select = "SELECT btime,inf,smac FROM ing a WHERE 3 > (SELECT count( * ) FROM ing WHERE btime = a.btime AND  inf> a.inf ) and smac = '$str1' and monitor_ap = '$monitor_ap' order by btime" ;
	$result = mysql_query($select);
	$row = array();
	$arr3 = array();
	while($row = mysql_fetch_row($result)) {
		$row[0]=intval($row[0]);
		$row[0]*=1000;
		$row[1]=floatval($row[1]);
		$arr3[] = $row;  //转为数组
	}
	$j=0;
	for ($j;$j<count($arr3,0);$j++){
		
		$arr[]=$arr3[$j];
		$time=$arr3[$j][0];
		$smac=$arr3[$j][2];
		if($j<count($arr3,0)-1)
		{
		while(($time+=10000)< $arr3[$j+1][0])
		{
			$arr[]=array($time,0.0,$smac);
		}
		}
		
		
		
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



