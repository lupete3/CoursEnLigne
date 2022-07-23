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
		           			<span class="input-group-text" id="basic-addon2">Noms </span>
		           			</div>
		           			<input type="text" name="nom" class="form-control btn-lg" id="nom" required="" autocomplete="off"><br>
		           		</div><br>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Téléphone</span>
		           			</div>
		           			<input type="text" name="tel" class="form-control btn-lg" id="tel" required="" autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Pseudo</span>
		           			</div>
		           			<input type="text" name="login" class="form-control btn-lg" id="login"  autocomplete="off"><br>
		           		</div>
		           		<div class="input-group mb-4">	           			
							<div class="input-group-append">
		           				<span class="input-group-text" id="basic-addon2">Mot de passe</span>
		           			</div>
		           			<input type="text" name="password" class="form-control btn-lg" id="password"  autocomplete="off"><br>
		           		</div>		           		
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
		<a class="navbar-brand" href="#"><h1><span class="text-danger">E</span>-<span class="text-warning">E-LEARNING</span></h1>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="admin.php"><button type="button" class="btn btn-outline-light connexion"><h3>Retour</h3></button><span class="sr-only">(current)</span></a>
				</li>
			</ul>
			
		</div>
	</nav>

		<!--================================CONTENU ========================================== -->

	<div class="container-fluid spacer">
		<div class="row">
			<div class="col-md-3">
		          <h3 class="title">AJOUTER UN AGENT</span></h3>
		          	<?php 
		          		if (isset($_POST['save'])) {
							  $a=$_POST['nom'];
							  $b=$_POST['tel'];
							  $c=$_POST['login'];
							  $d=$_POST['password'];
							  
							$req = $bd->prepare('SELECT * FROM enseignant WHERE nomEnseignant = ? AND tel = ? AND login = ? AND password = ?');
							$req->execute(array($a,$b,$c,$d));
							if ($req->fetch()) { ?>
								<div class="alert alert-danger alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Ce enseignant existe</h4>
								</div>
							<?php } else{


							  $req=$bd->prepare('INSERT INTO enseignant(nomEnseignant,tel,login,password) VALUES(?,?,?,?)');
							  
							  if ($req->execute(array($a,$b,$c,$d))) {
							            ?>
								<div class="alert alert-success alert-dismissible" id="msg" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4>Enseignant ajouté</h4>
								</div>
								<?php
							      }else{
							        ?>
									<div class="alert alert-danger alert-dismissible" id="msg" role="alert" class="spacer">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="text-center">Enseignant non ajouté</h4>
									</div>
									<?php
							      }
							  }

						}
							
	          	 ?>
		          
		           <form action="" method="POST" enctype="multipart/form-data" class="spacer was-validated" >

		           		<input type="text" name="nom" class="form-control" placeholder="Noms Enseignant" required="" autocomplete="off"><br>
		           		<input type="text" name="tel" class="form-control" placeholder="Num Téléphone" required="" autocomplete="off"><br>
		           		<input type="text" name="login" class="form-control" placeholder="Login" required="" autocomplete="off"><br>
		           		<input type="text" name="password" class="form-control" placeholder="Mot de passe" required="" autocomplete="off"><br>

						<button type="submit" class="btn btn-primary btn-block" name="save">Enregistrer</button>
		           </form>
		    </div>
	      <div class="col-md-9">
	          <h3 class="title">LISTE DES AGENTS</span></h3>
	          <div class="row spacer">
	          	 <div class="col-12">
	 				<table id="tab" class="display table table-bordered table-striped table">
		          	<thead>
		          		<tr style="font-weight:bold" class="btn-primary">
		          			<th>N°</th>  
                            <th>Noms Enseignant</th>  
                            <th>Numéro Téléphone</th>  
                            <th>Pseudonyme</th>
                            <th>Mode de passe</th>
                            
                            <th>Action</th>  
                            
		          		</tr>
		          	</thead>
		          	<tbody>
		          		<?php
		          			$limit=10;
							$page = isset($_GET['page'])?$_GET['page']:1;
							$start = ($page-1)*$limit;

							$req = $bd->query("SELECT * FROM enseignant ORDER BY nomEnseignant LIMIT $start,$limit");
							
							$res = $bd->query("SELECT COUNT(*) as total FROM enseignant");

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
                                <td><?php echo $don['idEnseignant'] ?></td>
                                <td><?php echo $don['nomEnseignant'] ?></td>
                                <td><?php echo $don['tel'] ?></td>
                                <td><?php echo $don['login'] ?></td>
                                <td><?php echo $don['password'] ?></td>
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
			    			<a  class="page-link" aria-label="Previous" href="enseignant.php?page=<?php echo $prec;?>">
			    				<span aria-hidden="true">&laquo;</span>
			    				<span class="sr-only" ="true">Previous</span>
			    			</a>
			    		</li>
			    		<?php 
			    			for($i=1;$i<=$nbrePage;$i++) {
			    		?> 
			    		<li class="page-item <?php echo(($page==$i)?'active':'')?>"><a  class="page-link" href="enseignant.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
			    		<?php
			    		}?>
			    		<li class="page-item">
			    			<a  class="page-link" aria-label="Next" href="enseignant.php?page=<?php echo $suiv;?>">
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