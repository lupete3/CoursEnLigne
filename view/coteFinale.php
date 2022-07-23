<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];
	
	$id =$_POST['id'];
	$a=$_POST['coteTd'];
    $b=$_POST['coteExam'];
    $c=1;
    $idCours = $_POST['idCours'];


    $req1 = $bd->prepare('UPDATE suivrecours SET resultatTp=?,resultatExam=?,suivi=? WHERE idSuivre=?');
	$req1->execute(array($a,$b,$c,$id));
	header("location:coteEtudiants.php?id=$idCours");
	

		
 ?>
							  