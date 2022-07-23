<?php
	$connect=new mysqli('localhost', 'root', '', 'ifb');
	$idInsc=$_GET['id'];
	
	$sql2 =$connect->query("UPDATE inscrire set Etat='Rejeter' where idInscription='".$idInsc."'");
	echo"<meta http-equiv='refresh' content='0;URL=demande.php'>";
		
?>