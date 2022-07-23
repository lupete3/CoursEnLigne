<?php

	session_start();

	if(!isset($_SESSION['profile']['enseignant'])){
		header('location:../view/login.php');
     }
 ?>