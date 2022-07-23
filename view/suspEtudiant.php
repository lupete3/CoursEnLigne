<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$a = 'suspendre';

    $req1 = $bd->prepare('UPDATE etudiant SET etat = ? WHERE idEtudiant = ?');
	$req1->execute(array($a,$id));
	header('location:etudiantValide.php');
	

		
 ?>
							  