<?php 
	include('../access/security_etud.php');
	require_once ('include/connex.php'); 
	$idEtudiant= $_SESSION['profile']['etudiant']['idEtudiant'];

	$idCours =$_POST['id'];

	$query2 = $bd->prepare("SELECT * FROM cours AS A WHERE A.idCours = ?");
	$query2->execute(array($idCours));
	$don = $query2->fetch(PDO::FETCH_ASSOC);

	$debut = $don['debut'];
	$fin = $don['fin'];

	$query3 = $bd->prepare("SELECT * FROM suivrecours AS A, etudiant AS B, cours AS C WHERE A.idEtud = B.idEtudiant AND A.idCoursConcern = C.idCours AND C.debut = ? AND C.fin = ? AND B.idEtudiant = ? AND C.idCours = ?");
	$query3->execute(array($debut,$fin,$idEtudiant,$idCours));
	$don2 = $query3->fetch(PDO::FETCH_ASSOC);
	if ($don2) {
		header("location:suivreCours.php?id=$idCours&sms=1");
	}else{

    $req1 = $bd->prepare('INSERT INTO suivrecours (dateDebut,dateFin,idEtud,idCoursConcern) VALUES (?,?,?,?)');
	$req1->execute(array($debut,$fin,$idEtudiant,$idCours));

	header("location:suivreCours.php?id=$idCours&sms=2");
	
	}
		
 ?>
							  