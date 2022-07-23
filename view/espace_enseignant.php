<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['enseignant']['idEnseignant'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Apprentissage en ligne</title>
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
					<a class="nav-link" href="include/logout.php"><button type="button" class="btn btn-outline-light connexion"><h3>Deconnexion</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	
	<div class="container-fluid spacer">
		<div class="col-lg-12 text-uppercase">
                <center>  
                    <h3 style="text-align:center; font-family:century gothic; border:2px solid #0759d4; width:40%;box-shadow: 0px 10px 20px; border-radius: 30px;">Espace Enseignant</h3>
                    </center> 
                </div>

                
				
		<div class="row spacer">
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="cours.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-book"></i> </h1></a>
                                        <h4 class="font-medium">Ajouter Cours</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="gCours.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-edit"></i> </h1></a>
                                        <h4 class="font-medium"> Modifier Cours</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="pCours.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-cog"></i> </h1></a>
                                        <h4 class="font-medium"> Programmer un Cours</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="pTravail.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-calendar"></i> </h1></a>
                                        <h4 class="font-medium"> Programmer un travail</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="tEncours.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-tasks"></i> </h1></a>
                                        <h4 class="font-medium"> Travaux Encours</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="tReponseEncours.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-inbox"></i> </h1></a>
                                        <h4 class="font-medium"> Réponses au travaux encours</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="tReponseValide.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-tags"></i> </h1></a>
                                        <h4 class="font-medium"> Réponses au travaux côtés</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="coursCommentEns.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-send"></i> </h1></a>
                                        <h4 class="font-medium"> Commentaires des étudiants</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="coursACote.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-dashboard"></i> </h1></a>
                                        <h4 class="font-medium"> Côter les étudiants</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
			
		</div>
		<div class="row spacer">
			
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
		  		$('#lib').val(data[1]);
		  		$('#pu').val(data[2]);
		  		$('#pu1').val(data[5]);
		  		$('#pu2').val(data[3]);
		  	});
		});
	</script>
</body>
</html>