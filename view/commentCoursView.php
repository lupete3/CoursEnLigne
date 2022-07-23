<?php 
	include('../access/security_etud.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['etudiant']['idEtudiant'];
	$idCours = $_GET['id'];

	$req = $bd->prepare("SELECT idEnseignant FROM cours,enseignant WHERE idEns = idEnseignant AND idCours = ?");
	$req->execute(array($idCours));
	$res = $req->fetch();

	$idEns = $res['idEnseignant'];

	if (isset($_POST['save'])) {
		$idCours = $_POST['idCours'];
		$idEtudiant = $_POST['idEtud'];
		$commentaire = $_POST['commentaire'];



			$req2=$bd->prepare('INSERT INTO `cours`.`commentaires` (`message` ,`idEtud` ,`idCoursConcern`,`idEns`)VALUES (?, ?, ?, ?)');
			$req2->execute(array($commentaire,$idEtudiant,$idCours,$idEns));				  
			if ($req2) {
				header("Location:commentCoursView.php?id=$idCours");
										            
			}else{
				header("Location:commentCoursView.php?id=$idCours");
						
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
					<a class="nav-link" href="coursComment.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid ">
		<?php 
		
			$req1 = $bd->prepare("SELECT A.idComent,A.message,date_format(A.dateEnvoi, '%d-%m-%Y à %T') as dateEnvoi, A.idEtud, A.idEns, A.reponse, A.idCoursConcern,B.nomEtudiant, B.postnomEtudiant, C.nomEnseignant FROM commentaires AS A,etudiant AS B, enseignant AS C, cours AS D WHERE A.idEtud = B.idEtudiant AND A.idCoursConcern = D.idCours AND A.idEns = C.idEnseignant AND A.idCoursConcern =? AND D.statut = 'programme'");
			$req1->execute(array($idCours));
		
			$req2 = $bd->prepare("SELECT * FROM  cours  WHERE idCours = ?");
			$req2->execute(array($idCours));
			$don2 = $req2->fetch();
					 

		?>
		<div class="row">
			<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
			<div style="border-radius: 8px 0px 0px 8px" class="border-strong-left border-strong-right border-default p-3 m-3 bg-cream">
				<center>
		            
		        
		        <h3 style="color:black; "><?php echo $don2['designation'] ?></h3></center>
			</div>
		</div>
		</div>

		<div class="row">
                    <!-- column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Commetaires Récents</h4>
                            </div>
                            <div class="comment-widgets scrollable">
                                <!-- Comment Row -->

                                <?php 
                                	while ($don = $req1->fetch()) { ?>
                                		
                                	

                                <div class="d-flex flex-row comment-row " style="padding: 10px; ">
                                    
                                    <div class="comment-text w-100">
                                        <h4 class="font-medium"><i class="fa fa-user"></i> <?php echo $don['nomEtudiant'].' '.$don['postnomEtudiant']?></h4>
                                        <span class="m-b-15 d-block"><?php echo $don['message']?> </span>
                                        <span class="m-b-15 d-block "> <?php echo (($don['reponse'] == NULL)?'<span class="text-warning"><i class="fa fa fa-envelope"> </i> Non répondu</span>':'<i class="fa fa fa-envelope-o"> </i> '.$don['reponse']);?> </span>
                                        <div class="comment-footer">
                                            <span class="text-muted float-right"><?php echo $don['dateEnvoi']?></span> 
                                        </div>
                                    </div>
                                </div> <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" method="POST" action="">
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <input type="hidden" name="idCours" value="<?php echo $_GET['id']?>" class="form-control form-control-line">
                                            <input type="hidden" name="idEtud" value="<?php echo $id?>" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-12">Votre commentaire</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" name="commentaire" class="form-control form-control-line"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" name="save" class="btn btn-info">Commenter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
	</div>
	<div class="row spacer">
			<div class="col-md-1">
			
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