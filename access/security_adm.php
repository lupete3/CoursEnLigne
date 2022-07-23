<?php

	session_start();

	if(!isset($_SESSION['profile']['admin'])){
		header('location:../view/login.php');
     }
 ?>