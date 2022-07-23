<?php 
	include('../access/security_enseign.php');
	require_once ('include/connex.php'); 
	$idEns= $_SESSION['profile']['enseignant']['idEnseignant'];

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
		<div class="modal-dialog modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title text-white" id="exampleModalLabel">MODIFICATION IDENTITE CLIENT</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upEnseignant.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>

						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Titre du cours</span>
		           		</div>
		           			
		           		<input type="text" id="designation" name="designation" class="form-control" placeholder="Titre du cours" required="" autocomplete="off"><br>
		           		</div><br>
						
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Maximum </span>
		           			</div>
		           			<input type="text" id="ponderation" name="ponderation" class="form-control" placeholder="Pondération" required="" autocomplete="off"><br>
		           		</div><br>
						
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Heure Théorie </span>
		           			</div>
		           			<input type="text" id="heureTheo" name="heureTheo" class="form-control" placeholder="Heure Théorie" required="" autocomplete="off"><br>
		           		</div><br>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Heure Pratique</span>
		           			</div>
		           			<input type="text" id="heurePrat" name="heurePrat" class="form-control" placeholder="Heure Pratique" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Total Heure</span>
		           			</div>
		           			<input type="text" id="duree" name="duree" class="form-control" placeholder="Total heure" required="" autocomplete="off"><br>
		           		</div>

		           		<textarea class=" ed form-control ckeditor " id="ed" name="editor1" rows="6">
		    				
		    			</textarea><br>	           		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary btn-block" data-dismiss="modal">Annuler</button>
						<button type="submit" class="btn btn-primary btn-block">Modifier</button>
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
					<a class="nav-link" href="espace_enseignant.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			
	      <div class="col-md-12 spacer">
	          <h3 class="title">LISTE DES COURS DISPONIBLES</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold; color: white" class="btn-primary ">
		          			<th class="th">N°</th>  
                            <th class="th">Libellé</th> 
                            <th class="th">Résumé</th> 
                            <th class="th">Maximum</th> 
                            <th class="th">Théorie</th> 
                            <th class="th">Pratique</th> 
                            <th class="th">Durée</th> 
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

							$req = $bd->query("SELECT a.idCours, a.designation as designationCours, a.resume, a.ponderation, a.heureTheorique, a.heurePratique, a.duree, a.fichierCours, b.designation as designationPromo FROM cours as a, promotion as b, enseignant as c where a.idPromo = b.idPromotion AND a.idEns = c.idEnseignant AND a.idEns = $idEns  ORDER BY designationCours LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM cours as a, promotion as b, enseignant as c where a.idPromo = b.idPromotion AND a.idEns = c.idEnseignant AND a.idEns = $idEns");

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
                                <td><?php echo $don['idCours'] ?></td>
                                <td><?php echo $don['designationCours'] ?></td>
                                <td>
                                	<?php 
                                		 
                                		$nbChar = 100;
								  		$resume = $don['resume'];
								  		$new_resume = substr($resume, 0,$nbChar).'...';
								  		$resume_finale = wordwrap($new_resume,100,'<br>',false);
								  		echo $resume_finale;
				                    ?>
                                		
                                </td>
                                <td><?php echo $don['ponderation'].' Pts' ?></td>
                                <td><?php echo $don['heureTheorique'] ?></td>
                                <td><?php echo $don['heurePratique'] ?></td>
                                <td><?php echo $don['duree'] ?></td>
                                <td><a target="_blank" class="text-white" href="../public/bootstrap4/docs/support/<?php echo $don['fichierCours'] ?>"><button class="btn btn-info ">Afficher</button></a></td>
                                <td><?php echo $don['designationPromo'] ?></td>
								<td>
									

									<button type="button" data-toggle="tooltip" title="Supprimer le cours" class="btn btn-primary supBtn"><span class="fa fa-trash"></span>
										
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
			    			<a  class="page-link" aria-label="Previous" href="cours.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="cours.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="cours.php?page=<?php echo $suiv;?>">
			    				<span aria-hidden="true">&raquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    	</ul>
	          		</nav>
	          	 </div>
	          </div>
	    </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7 offset-1">
				
			</div>
		</div>

		<div class="modal fade" id="supBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h4 class="modal-title text-white" id="exampleModalLabel">SUPPRESSION COURS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="supCours.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="idSup" required="" autocomplete="off"><br>
						<h2 class="text-center">Voulez-vous vraiment supprimer ce cours ?</h2>
						
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


	<!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


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
		  		$('#designation').val(data[1]);
		  		$('#ponderation').val(data[3]);
		  		$('#heureTheo').val(data[4]);
		  		$('#heurePrat').val(data[5]);
		  		$('#duree').val(data[6]);
		  		$('.ed').val(data[2]);
		  	});
			$('.supBtn').on('click', function(){
		  		$('#supBtn').modal('show');

		  		$tr =$(this).closest('tr');
		  		var data = $tr.children('td').map(function(){
		  			return $(this).text();
		  		}).get();
		  		console.log(data);

		  		$('#idSup').val(data[0]);
		  		
		  	});
		  	$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</body>
</html>