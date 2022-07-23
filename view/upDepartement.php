<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$a=$_POST['nom'];


    $req1 = $bd->prepare('UPDATE departement SET designation=? WHERE idDepartement=?');
	$req1->execute(array($a,$id));
	header('location:departement.php');
	

		
 ?>
							  