<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$a=$_POST['nom'];
	$b=$_POST['departement'];


    $req1 = $bd->prepare('UPDATE promotion SET designation = ?,idDep = ? WHERE idPromotion = ?');
	$req1->execute(array($a,$b,$id));
	header('location:promotion.php');
	

		
 ?>
							  