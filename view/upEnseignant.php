<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id =$_POST['id'];
	$a=$_POST['nom'];
    $b=$_POST['tel'];
    $c=$_POST['login'];
    $d=$_POST['password'];


    $req1 = $bd->prepare('UPDATE enseignant SET nomEnseignant=?,tel=?,login=?,password=?  WHERE idEnseignant=?');
	$req1->execute(array($a,$b,$c,$d,$id));
	header('location:enseignant.php');
	

		
 ?>
							  