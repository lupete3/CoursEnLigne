<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];
	

    $req1 = $bd->prepare('DELETE FROM cours  WHERE idCours = ?');
	$req1->execute(array($id));
	header('location:gCours.php');
	

		
 ?>
							  