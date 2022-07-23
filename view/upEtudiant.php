<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$a=$_POST['matricule'];
	$b = 'valide';

    $req1 = $bd->prepare('UPDATE etudiant SET matriculeEtudiant = ?, etat = ? WHERE idEtudiant = ?');
	$req1->execute(array($a,$b,$id));
	header('location:etudiantEncours.php');
	

		
 ?>
							  