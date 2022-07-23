<?php
	$connect=new mysqli('localhost','root','','ifb');
	$idIns=$_GET['id'];

	$req = $connect->query("UPDATE inscrire set Etat='Valide' where idInscription = '".$idIns."'");
			echo"<meta http-equiv='refresh' content='0;URL=demande.php'>";
		
?>