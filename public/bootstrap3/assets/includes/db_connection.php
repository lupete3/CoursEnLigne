<?php
	$con=mysql_connect("localhost","root","");
	$db=mysql_select_db("ifb") or die (mysql_error());		
		mysql_query("set names UTF8");
?>