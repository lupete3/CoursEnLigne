<?php 
	include ('../view/include/connex.php');

	if(isset($_POST['register'])){

	$a = htmlentities(trim(strtolower($_POST['nom'])));
	$b = htmlentities(trim($_POST['postnom']));
	$c = htmlentities(trim($_POST['sexe']));
	$d = htmlentities(trim($_POST['tel']));
	$e = htmlentities(trim($_POST['login']));
	$f = htmlentities(trim($_POST['password']));
	$g = htmlentities(trim($_POST['departement']));
	$h = htmlentities(trim($_POST['promotion']));
	$i = 'invalide';

	if(!empty($a) AND !empty($b) AND !empty($c) AND !empty($d) AND !empty($e) AND !empty($f)){

		$query1 = $bd->prepare("SELECT * FROM etudiant AS A,departement AS B,promotion AS C WHERE A.idDep = B.idDepartement AND A.idPromo = C.idPromotion AND  A.nomEtudiant=? AND A.postnomEtudiant=? AND A.sexeEtudiant = ? AND A.telEtudiant = ? AND A.idDep = ? AND A.idPromo = ?");
		$query1->execute(array($a, $b, $c, $d, $g, $h ));

		if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

			header('location:../view/register.php?sms=1');

		} else {

			$req=$bd->prepare('INSERT INTO etudiant(nomEtudiant,postnomEtudiant,sexeEtudiant,telEtudiant,login,password,idDep,idPromo,etat) VALUES (?,?,?,?,?,?,?,?,?)');

			if ($req->execute(array($a,$b,$c,$d,$e,$f,$g,$h,$i))){

				header('location:../view/register.php?sms=2');
			}else{

				header('location:../view/register.php?sms=3');
			}
        }
	}

	}else{
		header('location:../view/register.php?sms=4');
	}

?>