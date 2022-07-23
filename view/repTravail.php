<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 

	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];

	$id = $_POST['id'];
	$cote = $_POST['cote'];
	$statut = 'cotee';


	$req2=$bd->prepare('UPDATE reponse SET cote = ?, statut = ? WHERE idReponse = ?');
	$req2->execute(array($cote,$statut,$id));

	header('Location:tReponseEncours.php');
?>