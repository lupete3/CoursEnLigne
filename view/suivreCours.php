<?php 
	include('../access/security_etud.php');
	require_once ('include/connex.php'); 
	$idEtudiant= $_SESSION['profile']['etudiant']['idEtudiant'];
	if (isset($_GET['id'])) {
		$idCours = $_GET['id'];

		$query1 = $bd->prepare("SELECT A.idPromo FROM etudiant AS A,departement AS B,promotion AS C WHERE A.idDep = B.idDepartement AND A.idPromo = C.idPromotion AND A.idEtudiant = ? ");
		$query1->execute(array($idEtudiant));

		$done=$query1->fetch(PDO::FETCH_ASSOC);
		$idDepartement = $done['idPromo'];

			$query2 = $bd->prepare("SELECT A.idCours,A.designation AS designCours, A.resume,date_format(A.debut,'%d-%m-%Y') as debut,date_format(A.fin,'%d-%m-%Y') as fin,A.fichierCours,B.designation AS designPromo, C.designation AS designDep FROM cours AS A,promotion AS B, departement AS C WHERE A.idPromo = B.idPromotion AND B.idDep = C.idDepartement AND B.idPromotion = ? AND A.idCours = ?");
			$query2->execute(array($idDepartement,$idCours));
	}else{
		header('location:coursDispo.php');
	}
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Learning</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="stylesheet" type="text/css" href="bootstrap/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-extension.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-extension.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/style.css">
</head>
<style type="text/css">
	.spacer{
		margin-top:30px;
	}
	.bad{
		font-size:1.5em;
	}
	img:hover{
		cursor:pointer;
	}
	.modal-body img{
		height:400px;
	}
	.mCard{
		width: 170px;
		height: 170px;
	}
	.pagin{
		float:center;
	}
	.ceni{
		color:silver;
	}
	.bbh{
		width:100%;
		height:100%;
	}
	#h1_bbh_title{
		font-family: Buxton Sketch;
		font-size:4em; 
		font-weight: bold; margin-top: 2px; 
		margin-left: 10px; color: white; 
		padding-top: 3px;
    }
</style>
<body>
	<!--================================MODAL DE CONNEXION ========================================== -->
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<a class="navbar-brand" href="#"><h1><span class="text-danger">E</span>-<span class="text-warning">LEARNING</span></h1>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="coursDispo.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			
	      <div class="col-md-12">
	          <h1>Cours  
	          	<?php 
	          		$don = $query2->fetch();
	          	echo $don['designCours'] ?></h1>
				<hr class="soften"/>	
		  </div>
				
					
			<div class="col-md-8">
				
				<h3>Resumé</h3>
				<?php echo $don['resume'] ?>
				<br><br><br>
				<p>
					<a target="_blank" class="text-white" href="../public/bootstrap4/docs/support/<?php echo $don['fichierCours'] ?>"><button class="btn btn-warning ">Visualiser le support</button></a>
					<a download="" class="text-white" href="../public/bootstrap4/docs/support/<?php echo $don['fichierCours'] ?>"><button class="btn btn-info ">Télécharger le support</button></a>
				</p>
			</div>
			<div class="col-md-4">
				<?php 
				if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
					<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Vous êtes déjà inscrit à ce cous</h4>
					</div>
				<?php } else if (isset($_GET['sms']) AND $_GET['sms'] == 2) { ?>
					<div class="alert alert-success alert-dismissible" id="msg" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Vous êtes inscrit au cous</h4>
					</div>
				<?php } ?>
				<div style="border-radius: 8px 0px 0px 8px" class="border-strong-left border-success p-3 m-3 bg-cream">
					<center>
		                <h4><a href="#">Programme du cours </a></h4><hr class="soften"/>
		            </center>
		            <legend style="color:black; text-align:left;">Début : <?php  echo (($don['debut'] == '')?'<span class="text-danger">Non Programmé</span>':'<span class="text-info">Le '.$don['debut'].'</span>')  ?></legend>
		            <legend style="color:black; text-align:left;">Fin : <?php  echo (($don['fin'] == '')?'<span class="text-danger">Non Programmé</span>':'<span class="text-info">Le '.$don['debut'].'</span>')  ?></legend>
		            <?php echo(($don['debut']=='' || $don['fin']=='')?'':'<button type="button" data-toggle="tooltip" title="Programmer le cours" class="btn btn-primary supBtn"><span class="fa fa-book"> Suivre ce cours</span>
									</button>'); ?>
				</div>
			
				<?php 
					$query3 = $bd->prepare("SELECT * FROM suivrecours AS A, etudiant AS B, cours AS C WHERE A.idEtud = B.idEtudiant AND A.idCoursConcern = C.idCours AND B.idEtudiant = ? AND C.idCours = ?");
					$query3->execute(array($idEtudiant,$_GET['id']));
					$don2 = $query3->fetch(PDO::FETCH_ASSOC);
				?>
				<div style="border-radius: 8px 0px 0px 8px" class="border-strong-left border-info p-3 m-3 bg-cream">
					<center>
		                <h4><a href="#">Résultats Cours ( <?php  echo $don2['ponderation'].' pts )'; ?></a></h4><hr class="soften"/>
		            </center>
		            <legend style="color:black; text-align:left;">Travaux : <?php echo (($don2['resultatTp']=='')?'<span class=" text-info"> Aucun Travail</span>':$don2['resultatTp'].' / '.($don2['ponderation']/2).' pts'); ?></legend>
		            <legend style="color:black; text-align:left;">Examen : <?php echo (($don2['resultatExam']=='')?'<span class=" text-info"> Aucun Travail</span>':$don2['resultatExam'].' / '.($don2['ponderation']/2).' pts'); ?></legend>
		            <legend style="color:black; text-align:left;">Total : <?php echo (($don2['resultatExam']=='' || $don2['resultatTp']=='' )?'<span class=" text-info"> Travail Manquant </span>':'<strong>'.($don2['resultatExam']+$don2['resultatTp']).' / '.$don2['ponderation'].' pts </strong>'); ?></legend>
				</div>
			</div>
				
	    </div>
	    <div class="modal fade" id="supBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-md" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h4 class="modal-title text-white" id="exampleModalLabel">SUIVRE COURS</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
							
					</div>
					<form action="upSuivreCoursEtud.php" method="POST" class="was-validated">
						<div class="modal-body">
							<input type="hidden" name="id" id="idSup" value="<?php echo $don['idCours'] ?>" required="" autocomplete="off"><br>
							<h2 class="text-center">Voulez-vous vraiment suivre ce cours ?</h2>
							
					</form>	
					<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Non</button>
							<button type="submit" class="btn btn-primary btn-block">Oui</button>
						</div>			
				</div>
			</div>			
		</div>
		
	</div>
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap-extension.js"></script>
	<script src="bootstrap/js/bootstrap-extension.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.supBtn').on('click', function(){
		  		$('#supBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#id').val(data[0]);
		  		
		  	});
		});
	</script>
</body>
</html>