<?php

	session_start();

	if(!isset($_SESSION['profile']['etudiant'])){
		header('location:../view/login.php');
     }
 ?>