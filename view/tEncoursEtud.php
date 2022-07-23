<?php 
	include('../access/security_etud.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['etudiant']['idEtudiant'];
	$idCours = $_GET['id'];

	if (isset($_POST['save'])) {
		$a = $_POST['id'];
		$idCours = $_POST['idC'];
		$g=$_FILES['fichiers']['name'];
		$etat = 'encours';
		$dateReponse = date('Y-m-d');
		$g_tmp=$_FILES['fichiers']['tmp_name'];
		$req = $bd->prepare('SELECT COUNT(*) AS totalN FROM reponse');
		$req->execute();
		$don = $req->fetch();
		$numMax = $don['totalN'];

		$req = $bd->prepare('SELECT * FROM reponse WHERE idEtud = ? AND idEval = ?');
		$req->execute(array($id,$a));
		$don = $req->fetch();
		if ($don) {
			
			header("Location:tEncoursEtud.php?id=$idCours&sms=1");
		}else{

	        $numAdd = $numMax + 1;
			$extValide = array('docx','doc','pdf','pptx','odt','xls' );
			$extentionUpload = strtolower(substr(strrchr($g, '.'), 1));
			in_array($extentionUpload, $extValide);
			$chemin = "../public/bootstrap4/docs/travaux/reponses/".$numAdd.".".$extentionUpload;
			$resultat = move_uploaded_file($g_tmp, $chemin);
			$support = $numAdd.".".$extentionUpload;

			$req2=$bd->prepare('INSERT INTO `cours`.`reponse` (`idReponse` ,`dateReponse` ,`reponse` ,`statut` ,`idEtud`,`idEval`)VALUES (NULL , ?, ?, ?, ?,?)');
			$req2->execute(array($dateReponse,$support,$etat,$id,$a));				  
			if ($req2) {
				header("Location:tEncoursEtud.php?id=$idCours&sms=2");
										            
			}else{
				header("Location:tEncoursEtud.php?id=$idCours&sms=3");
						
			}

		}
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
    .th{
    	color: white;
    }
</style>
<body>
	<!--================================MODAL DE CONNEXION ========================================== -->
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title text-white" id="exampleModalLabel">REPONDRE AU TRAVAIL</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="" method="POST" enctype="multipart/form-data" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<input type="hidden" name="idC"  value="<?php echo $_GET['id'];?>" required="" autocomplete="off"><br>

						<div class="input-group mb-4">	           			
		           			<input type="file" name="fichiers" class="form-control btn btn-lg" placeholder="fichier du travail" required="" autocomplete="off"><br>
		           			
		           		</div>	
		           		           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" name="save" class="btn btn-primary btn-block">Repondre</button>
					</div>
				</form>				
			</div>
		</div>			
	</div>
	

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
					<a class="nav-link" href="coursTest.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		<?php 
		if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
						<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4>Vous avez déja répondu à ce travail</h4>
						</div>
					<?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 2) { ?>
						<div class="alert alert-success alert-dismissible" id="msg" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4>Réponse envoyée</h4>
						</div>
					<?php } else if (isset($_GET['sms']) AND $_GET['sms'] == 3) { ?>
						<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4>Erreur d'envoi! Vueillez vérifier le format de votre fichier (docx,doc,pdf,pptx,odt,xls)</h4>
						</div>
					<?php } 

		?>
		<div class="row">
		<div class="col-md-12 spacer">
	          <h3 class="title">TRAVAUX ENCOURS</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold; color: white" class="btn-primary ">
		          			<th class="th">N°</th>  
                            <th class="th">Date Debut</th> 
                            <th class="th">Date Fin</th> 
                            <th class="th">Durée</th> 
                            <th class="th">Maximum</th> 
                            <th class="th">Type</th> 
                            <th class="th">Cours</th> 
                            <th class="th">Promotion</th> 
                            
                            <th class="th">Action</th>  
                            
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT a.idEvaluation, date_format(a.dateDebut, '%d-%m-%Y') as debut, date_format(a.dateFin, '%d-%m-%Y') as fin, a.duree, a.ext, a.maximum, a.typeT,a.fichier,a.statut, b.designation as designCours, c.designation as designPromo FROM evaluation as a, cours as b, promotion as c, enseignant as d where a.idCoursConcern = b.idCours AND a.idEns = d.idEnseignant AND b.idPromo = c.idPromotion AND a.idCoursConcern = $idCours AND a.statut = 'encours' ORDER BY debut LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM evaluation as a, cours as b, promotion as c, enseignant as d where a.idCoursConcern = b.idCours AND a.idEns = d.idEnseignant AND b.idPromo = c.idPromotion AND a.idCoursConcern = $idCours AND a.statut = 'encours'");

							$don1 = $res->fetch();
							$total = $don1['total'];
							$nbrePage=ceil($total/$limit);
							if ($page==1) {
								$prec = $page;
							}else {
								$prec = $page-1;
							}
							if ($page==$nbrePage) {
								$suiv =$nbrePage;	
							}
							else{
								$suiv = $page+1;
							}
		          			while($don=$req->fetch()):
		          				?>
		          		<tr>
                                <td><?php echo $don['idEvaluation'] ?></td>
                                <td><?php echo $don['debut'] ?></td>
                                <td><?php echo $don['fin']?></td>
                                <td><?php echo $don['duree'].' '.$don['ext']  ?></td>
                                <td><?php echo $don['maximum'].' pts' ?></td>
                                <td><?php echo $don['typeT'] ?></td>
                                <td><a download="" target="_blank" class="text-white" href="../public/bootstrap4/docs/travaux/<?php echo $don['fichier'] ?>"><span class="btn btn-info ">Télécharger le questionnaire</span></a></td>
                                <td><?php echo $don['designPromo'] ?></td>
								<td>
									<button type="button" data-toggle="tooltip" title="Envoyer la réponse" class="btn btn-primary editBtn"><span class="fa fa-check"> Répondre</span>
										
									</button>
								</td>
						</tr>
		          		<?php endwhile;?>
		          	</tbody>
		          </table>
	          	 </div>
	          </div>
	          <div class="row">
	          	 <div class="col-3 offset-9">
	          	 	<nav aria-label="Page navigation example">
	          			<ul class="pagination pg-blue">
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Previous" href="tEncoursEtud.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="tEncoursEtud.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="tEncoursEtud.php?page=<?php echo $suiv;?>">
			    				<span aria-hidden="true">&raquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    	</ul>
	          		</nav>
	          	 </div>
	          </div>
	    </div>		</div>
		<div class="row">
			
		</div>
	</div>
	
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap-extension.js"></script>
	<script src="bootstrap/js/bootstrap-extension.min.js"></script>

	


	<script type="text/javascript">
		$(document).ready(function() {
			$('.editBtn').on('click', function(){
		  		$('#editBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#id').val(data[0]);
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>