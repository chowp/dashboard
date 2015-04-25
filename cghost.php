

<?php
    error_reporting(0);
 	$db_name = "wifi";
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	
	
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	$select = "select distinct hostmac from wifiunion";
	$result = mysql_query($select);
	
	$datas = array();
	
	while($row = mysql_fetch_row($result)) 
	{	
					$datas[] = $row;	
	}
	
	
	
	echo $data=json_encode($datas);
	//echo $newntoe = str_replace('"','',$aa);我给你的文件那
	?>



