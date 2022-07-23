<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];

    $req1 = $bd->prepare('DELETE FROM etudiant WHERE idEtudiant = ?');
	$req1->execute(array($id));
	header('location:etudiantEncours.php');
	

		
 ?>
							  