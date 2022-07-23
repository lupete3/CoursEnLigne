<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];
	
	$id =$_POST['id'];
	$a= NULL;
    $b= NULL;
    $c='disponible';


    $req1 = $bd->prepare('UPDATE cours SET debut=?,fin=?,statut=? WHERE idCours=?');
	$req1->execute(array($a,$b,$c,$id));
	header('location:pCours.php');
	

		
 ?>
							  