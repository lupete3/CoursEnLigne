<?php 
	include('../access/security_adm.php');
	require_once ('include/connex.php'); 
	$id= $_SESSION['profile']['admin']['idAdmin'];

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
	<div class="modal fade" id="editBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title" id="exampleModalLabel">MODIFICATION IDENTITE CLIENT</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upClient.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Nom </span>
		           			</div>
		           			<input type="text" name="nom" class="form-control btn-lg" id="lib" required="" autocomplete="off"><br>
		           		</div><br>
		           		
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Sexe</span>
		           			</div><select name="sexe" class="form-control btn-lg" id='pu' required="">
		           			<option value="" disabled="" selected="">Sexe</option>
		           			<option value="Masculin" >Masculin</option>
		           			<option value="Feminin" >Feminin</option>
		           		</select>
		           			<br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Adresse</span>
		           			</div>
		           			<input type="text" name="adresse" class="form-control btn-lg" id="pu2" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Numero de telephone</span>
		           			</div>
		           			<input type="text" name="contact" class="form-control btn-lg" id="pu1"  autocomplete="off"><br>
		           		</div>		           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-danger btn-block">Modifier</button>
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
					<a class="nav-link" href="include/logout.php"><button type="button" class="btn btn-outline-light connexion"><h3>Deconnexion</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="col-lg-12 text-uppercase">
                <center>  
                    <h3 style="text-align:center; font-family:century gothic; border:2px solid #0759d4; width:40%;box-shadow: 0px 10px 20px; border-radius: 30px;">Espace Administrateur</h3>
                    </center> 
                </div>

                
				
		<div class="row spacer">
				<div class="col-md-4">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="enseignant.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-user-secret"></i> </h1></a>
                                        <h4 class="font-medium">Gestion des Enseignants</h4>
                                        
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
                                        <a href="departement.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-dashboard"></i> </h1></a>
                                        <h4 class="font-medium"> Gestion Départements</h4>
                                        
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
                                        <a href="promotion.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-cog"></i> </h1></a>
                                        <h4 class="font-medium"> Gestion Promotions</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-6">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="etudiantEncours.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-user-plus"></i> </h1></a>
                                        <h4 class="font-medium"> Etudiants encours</h4>
                                        
                                </div>
                            </div> 
                        </div>
                    </div><br>
				</div>
				<div class="col-md-6">
					<div class="card">
                        <div class="comment-widgets scrollable">
                            <div class="d-flex flex-row comment-row " style="text-align: center; ">
                                    
                                <div class="comment-text w-100">
                                        <a href="etudiantvalide.php"><h1 style="font-size: 100px" class="font-medium"><i class="fa fa-tasks"></i> </h1></a>
                                        <h4 class="font-medium"> Etudiants Inscris</h4>
                                        
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