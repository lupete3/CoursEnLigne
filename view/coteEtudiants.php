<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];

	$idCours = $_GET['id'];

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
					<h4 class="modal-title text-white" id="exampleModalLabel">COTER L'ETUDIANT</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="coteFinale.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<input type="hidden" name="idCours" value="<?php echo $idCours; ?>" required="" autocomplete="off"><br>

						<input type="text" name="coteTd" class="form-control" id="" required="" placeholder="Points des travaux" autocomplete="off"><br>
						<input type="text" name="coteExam" class="form-control" id="" required="" placeholder="Points des examens" autocomplete="off"><br>
						
		           		           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Non</button>
						<button type="submit" class="btn btn-primary btn-block">Coter</button>
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
					<a class="nav-link" href="coursACote.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container spacer">
		
		<div class="row">
		<div class="col-md-12 spacer">
	          <h3 class="title">ETUDIANTS INSCRITS</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold; color: white" class="btn-primary ">
		          			<th class="th">N°</th>  
		          			<th class="th">Nom</th>  
		          			<th class="th">Postnom</th>  
                            <th class="th">Date Debut</th> 
                            <th class="th">Date Fin</th>  
                            <th class="th">Pondération</th>  
                            
                            <th class="th">Action</th>  
                            
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT a.idSuivre, date_format(a.dateDebut, '%d-%m-%Y') as debut, date_format(a.dateFin, '%d-%m-%Y') as fin, b.nomEtudiant,b.postnomEtudiant,c.ponderation FROM suivrecours as a, etudiant as b, cours as c where a.idCoursConcern = c.idCours AND a.idEtud = b.idEtudiant AND a.idCoursConcern = $idCours AND a.suivi = 0 ORDER BY nomEtudiant LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM suivrecours as a, etudiant as b, cours as c where a.idCoursConcern = c.idCours AND a.idEtud = b.idEtudiant AND a.idCoursConcern = $idCours AND a.suivi = 0");

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
                                <td><?php echo $don['idSuivre'] ?></td>
                                <td><?php echo $don['nomEtudiant'] ?></td>
                                <td><?php echo $don['postnomEtudiant'] ?></td>
                                <td><?php echo $don['debut'] ?></td>
                                <td><?php echo $don['fin'] ?></td>
                                <td><?php echo $don['ponderation'].' pts' ?></td>
								<td>
									<button type="button" data-toggle="tooltip" title="Côter l'étudiant" class="btn btn-primary editBtn"><span class="fa fa-bookmark"></span>
										
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
			    			<a  class="page-link" aria-label="Previous" href="coteEtudiants.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="coteEtudiants.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="coteEtudiants.php?page=<?php echo $suiv;?>">
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
		  		$('#nom').val(data[1]);
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>