<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 

	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];

	$id = $_POST['id'];


	$req2=$bd->prepare('DELETE FROM evaluation WHERE idEvaluation = ?');
	$req2->execute(array($id));

	header('Location:pTravail.php');
?>