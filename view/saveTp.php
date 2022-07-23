<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];

	if (isset($_GET['save'])) {
		$a=$_GET['debut'];
		$b=$_GET['fin'];
		$c=$_GET['duree'];
		$d=$_GET['expression'];
		$e=$_GET['maximum'];
		$f=$_GET['cours'];
		//$g=$_FILES['fichiers']['name'];;
		//$h=$_GET['type'];
		$idEnseign=$_GET['idEns'];
		$etat = 'encours';
		//$g_tmp=$_FILES['fichiers']['tmp_name'];

       	

			$req2=$bd->prepare('INSERT INTO evaluation(INSERT INTO evaluation(dateDebut,dateFin,duree,ext,maximum,idCoursConcern,statut,idEns) VALUES(?,?,?,?,?,?,?,?)');
							  
		if ($req2->execute(array($a,$b,$c,$d,$e,$f,$etat,$idEnseign))) {
			header('Location:pTravail.php?sms=1');
							            
		}else{
			//header('Location:pTravail.php?sms=2');
			
		}
	}						
?>