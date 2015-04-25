

<?php
    error_reporting(0);
 	$db_name = "wifiunion";
	$db_host = "localhost";
	$db_user = "wifi";
	$db_pass = "guest";
	
	
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	$select = "select distinct monitor_ap from ing";
	$result = mysql_query($select);
	
	$datas = array();
	
	while($row = mysql_fetch_row($result)) 
	{	
					$datas[] = $row;	
	}
	
	
	
	echo $data=json_encode($datas);
	//echo $newntoe = str_replace('"','',$aa);我给你的文件那
	?>



