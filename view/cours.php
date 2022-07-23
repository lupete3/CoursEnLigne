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


  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
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
					<h4 class="modal-title text-white" id="exampleModalLabel">MODIFICATION COURS</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
						
				</div>
				<form action="upPromotion.php" method="POST" class="was-validated">
					<div class="modal-body">
						<input type="hidden" name="id" id="id" required="" autocomplete="off"><br>
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Nom Promotion </span>
		           			</div>
		           			<input type="text" name="nom" class="form-control btn-lg" id="nom" required="" autocomplete="off"><br>
		           		</div><br>	           		
						<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           			<span class="input-group-text" id="basic-addon2">Département </span>
		           			</div>
		           			<select name="departement" class="form-control" id="" required="">
		           			<option value="" selected="" disabled="">Choisir un département</option>
		           			<?php 
		           				$req = $bd->prepare('SELECT * FROM departement ');
								$req->execute();
							while ($don = $req->fetch()) { ?>
		           			 
		           			<option value="<?php echo $don['idDepartement']?>"><?php echo $don['idDepartement'].' '.$don['designation']?></option>

		           		<?php } ?>
		           		</select><br>
		           		</div><br>	           		
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
		<form action="" method="POST" enctype="multipart/form-data" class="was-validated" >
		<div class="row">
			<div class="col-md-12">
		          <h3 class="title">AJOUTER UN COURS</span></h3>
		          	<?php 
		          		if (isset($_POST['save'])) {
							  $a=$_POST['designation'];
							  $b=$_POST['editor1'];
							  $c=$_POST['ponderation'];
							  $d=$_POST['heureTheo'];
							  $e=$_POST['heurePrat'];
							  $f=$_POST['duree'];
							  $g=$_FILES['support']['name'];;
							  $h=$_POST['promotion'];
							  $dt = date('Y-m-d');
							  $etat = 'disponible';
							  $g_tmp=$_FILES['support']['tmp_name'];

        					  $req = $bd->prepare('SELECT COUNT(*) AS totalN FROM cours');
							  $req->execute();
							  $don = $req->fetch();
							  $numMax = $don['totalN'];

        					  $numAdd = 'ooo'.$numMax + 1;
							  $extValide = array('docx','doc','pdf','pptx','mp4','mp3','odt','xls' );
							  $extentionUpload = strtolower(substr(strrchr($g, '.'), 1));
							  in_array($extentionUpload, $extValide);
							  $chemin = "../public/bootstrap4/docs/support/".$numAdd.".".$extentionUpload;
							  $resultat = move_uploaded_file($g_tmp, $chemin);
							  $support = $numAdd.".".$extentionUpload;

							  
							$req = $bd->prepare('SELECT * FROM cours,promotion WHERE  cours.idPromo = promotion.idPromotion AND cours.designation = ? AND cours.idPromo = ? ');
							$req->execute(array($a,$h));
							if ($req->fetch()) { ?>
								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Ce cours existe dans cette protion et dans ce département</h4>
								</div>
							<?php } else{


							  $req=$bd->prepare('INSERT INTO cours(designation,resume,ponderation,heureTheorique,heurePratique,duree,fichierCours,idPromo,idEns,dateCreation,statut) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
							  
							  if ($req->execute(array($a,$b,$c,$d,$e,$f,$support,$h,$idEns,$dt,$etat))) {
							            ?>
								<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Cours ajouté</h4>
								</div>
								<?php
							      }else{
							        ?>
									<div class="alert alert-danger alert-dismissible" id="msg" role="alert" class="spacer">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="text-center">Cours non ajouté</h4>
									</div>
									<?php
							      }
							  }

						}
							
	          	 ?>
		           
		    </div>
		    
		    <div class="col-md-3">
		        <select name="promotion" class="form-control" id="" required="">
		           	<option value="" selected="" disabled="">Choisir une promotion</option>
		           	<?php 
		           		$req = $bd->prepare('SELECT a.idPromotion, a.designation as designationPromo, b.designation as designationDep FROM promotion as a,departement as b WHERE a.idDep = b.idDepartement ');
						$req->execute();
						while ($don = $req->fetch()) { ?>
		           		<option value="<?php echo $don['idPromotion']?>"><?php echo $don['designationPromo'].' '.$don['designationDep']?></option>

		           	<?php } ?>
		        </select><br>
		    </div>
		    <div class="col-md-3">
		    	<input type="text" name="designation" class="form-control" placeholder="Titre du cours" required="" autocomplete="off"><br>
		    </div>
		    <div class="col-md-2">
		    	<input type="text" name="ponderation" class="form-control" placeholder="Maximum" required="" autocomplete="off"><br>
		    </div>
		    <div class="col-md-2">
		    	<input type="text" name="heureTheo" class="form-control" placeholder="Heure Théorie" required="" autocomplete="off"><br>
		    </div>
		    <div class="col-md-2">
		    	<input type="text" name="heurePrat" class="form-control" placeholder="Heure Pratique" required="" autocomplete="off"><br>
		    </div>
		    <div class="col-md-3">
		    	<input type="text" name="duree" class="form-control" placeholder="Total heure" required="" autocomplete="off"><br>
		    </div>
		    <div class="col-md-3">
		    	<input type="file" name="support" class="form-control" placeholder="Nom Promotion" required="" autocomplete="off"><br>
		    </div>
		    <div class="col-md-12">
		    	<div class="">
		    		<h3>Resumé du cours</h3>
		    		<textarea class="form-control ckeditor" name="editor1" rows="6">
		    			
		    		</textarea><br>
                
		    	</div>
              </div>
		    
              <div class="col-md-9"></div>
	      <div class="col-md-3">
		         <input type="submit" value="Enregistrer" class="btn btn-primary btn-block" name="save">  
		    </div>
		</div></form>
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
                            <th class="th">Pondération</th> 
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
                                <td><?php echo $don['ponderation'] ?></td>
                                <td><?php echo $don['heureTheorique'] ?></td>
                                <td><?php echo $don['heurePratique'] ?></td>
                                <td><?php echo $don['duree'] ?></td>
                                <td><a target="_blank" class="text-white" href="../public/bootstrap4/docs/support/<?php echo $don['fichierCours'] ?>"><button class="btn btn-info ">Afficher</button></a></td>
                                <td><?php echo $don['designationPromo'] ?></td>
								<td>
									<button type="button" class="btn btn-primary editBtn"><span class="fa fa-pencil"></span>
										
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
	    </div>		</div>
		<div class="row">
			
		</div>
	</div>
	
	

	<script src="bootstrap/js/popper.min.js"></script>
	<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="bootstrap/js/bootstrap-extension.js"></script>
	<script src="bootstrap/js/bootstrap-extension.min.js"></script>

	<script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

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
		  		$('#nom').val(data[1]);
		  	});
		});
	</script>
</body>
</html>