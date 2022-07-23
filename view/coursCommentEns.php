<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEnseignant= $_SESSION['profile']['enseignant']['idEnseignant'];

		$query2 = $bd->prepare("SELECT A.designation AS designCours, A.resume FROM cours AS A,enseignant AS B WHERE A.idEns = B.idEnseignant AND A.idEns = ? ");
		$query2->execute(array($idEnseignant));
	

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
					<a class="nav-link" href="espace_enseignant.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		<div class="row">
			
	      <div class="col-md-12">
	          <h1>Cours disponibles pour vous</h1>
				<hr class="soften"/>	
		  </div>
				<?php 
					$query2 = $bd->prepare("SELECT A.idCours,A.designation AS designCours, A.resume FROM cours AS A,enseignant AS B WHERE A.idEns = B.idEnseignant AND B.idEnseignant = ? ");
					$query2->execute(array($idEnseignant));
					while ($don2 = $query2->fetch()) { 
						$query3 = $bd->prepare("SELECT COUNT(*) AS nbComment FROM commentaires AS A,etudiant AS B, enseignant AS C, cours AS D WHERE A.idEtud = B.idEtudiant AND A.idCoursConcern = D.idCours AND A.idEns = C.idEnseignant AND A.idEns =? AND A.repondu = ?  AND A.idCoursConcern = ?");
						$query3->execute(array($idEnseignant,0,$don2['idCours']));
						$don3 = $query3->fetch();
						?>
						<div class="col-md-6">
							<div style="border-radius: 8px 0px 0px 8px" class="border-strong-left border-info p-3 m-3 bg-cream">
								<center>
		                                 <h4><a href="commentCoursViewEns.php?id=<?php echo $don2['idCours'] ?>">Commentaires à ce cours <button class="btn btn-info"><?php echo $don3['nbComment'].' Nouveaux'?> </button></a></h4>
		                            </center>
		                            <legend style="color:black; text-align:center;"><?php echo $don2['designCours'] ?></legend>
							</div>
						</div>
						

					<?php }
				?>
	
	          
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
		  		$('#nom').val(data[1]);
		  		$('#tel').val(data[2]);
		  		$('#login').val(data[3]);
		  		$('#password').val(data[4]);
		  	});
		});
	</script>
</body>
</html>