<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 

	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];

	$id = $_POST['id'];
	$statut = 'arrete';

	$req2=$bd->prepare('UPDATE evaluation SET statut = ? WHERE idEvaluation = ?');
	$req2->execute(array($statut,$id));

	header('Location:tEncours.php');
?>