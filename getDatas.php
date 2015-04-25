<?php
	$db_name = "wifi";
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
		
	$index = 0;
	if(isset($_GET['index'])) {
		$index = (int)$_GET['index'];
	} 
	
	$link = mysql_connect($db_host,$db_user,$db_pass) or die("Can't connect DB");
	$db = mysql_select_db($db_name,$link);
	mysql_query("set names utf8");
	
	/*$pages = (int)((mysql_fetch_row(mysql_query("select count(*) from wifi"))[0])/10);
	if($index > ($pages-1)) {
		$index = ($pages-1);
	}*/
	
	$select = "select * from wifiunion where nighbormac='01005e7ffffb'";
	$result = mysql_query($select);
	
	$datas = array();
	
	while($row = mysql_fetch_row($result)) {
		$datas[] = $row;
	}
	
	echo json_encode($datas);
?>