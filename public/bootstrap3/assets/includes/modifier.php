<?php
    session_start();
?>
<!DOCTYPE html>
<!--
++++++++++++++++++++++++++++++++++++++++++++++++++++++
AUTHOR : GLOIRE ZIHALIRWA
PROJECT : IIB
VERSION : 1.1
++++++++++++++++++++++++++++++++++++++++++++++++++++++
-->
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>modification de mon identité</title>
	
	<!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/font-awesome-4.3.0/css/font-awesome.min.css">

	<!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
        <link rel ="stylesheet" type="text/css" href="library/vegas/vegas.min.css">
	<!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="library/bootstrap/css/bootstrap.css">
        
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/color/green.css">
        
</head>
<body >
<!-- [ LOADERs ]
================================================================================================================================-->	
    <div class="preloader">
    <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">
    
 <!-- [NAV]
 ============================================================================================================================-->    
   <!-- Navigation
    ==========================================-->
    <nav  class="amd-menu navbar navbar-default navbar-fixed-top theme_background_color fadeInDown">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Gestion inscription</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index1.php">II-<span class="black">B</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="profil.php" class="page-scroll" id="profil">Retour</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- /. main-header --><br><br><br><br><br>
                                    
			<!-- Les formulaires de connexion dans son compte -->		
			
                <div class="page-heading text-center">

                    <div class="container zoomIn animated">

                        <h1 class="page-title">INSTITUT D'IBANDA<br />"IIB-BUKAVU" <span class="title-under"></span></h1>
                    </div>									
                </div>
    
                <center><h1 style="color:blue";>MODIFIER MON IDENTITE</h1></center>
		


			
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">

                           <div class="panel-body">
                            <div class="table-responsive">
		<?php

			$identite=$_GET['CodeEleve'];
			
			$con=new mysqli("localhost", "root", "", "ifb");
			
			$requete="SELECT * FROM eleve WHERE CodeEleve='$identite'";
			//Exécution de la requete
			$resultat=$con->query($requete);
			
			//Récupération de données
			$ligne=$resultat->fetch_object();
		?>
		
			<form method="post" class="well col-md-6">
				<fieldset>
			
					<div class="form-group">
						<label class="control-label" for="nom">Nom: </label>
						<input class="form-control" type="text" name="nom" value="<?php echo $ligne->nom ?>" />
					</div>

					<div class="form-group">						
						<label class="control-label" for="Post nom">Post nom: </label>
						<input class="form-control" type="text" name="postnom" value="<?php echo $ligne->postnom ?>" />
					</div>

					<div class="form-group">
						<label class="control-label" for="Pré nom">Pré nom: </label>
						<input class="form-control" type="text" name="prenom" value="<?php echo $ligne->prenom ?>" />
					</div>

					<div class="form-group">
						<br /><li>Sexe
						<br />
						<input class="form-control" type="radio" name="sexe" value="Masculin" id="Masculin" /> <label for="Masculin">Masculin</label>
						<input class="form-control" type="radio" name="sexe" value="Feminin" id="Feminin" /> <label for="Feminin">Feminin</label>
					</li></div>

					<div class="form-group">
						<label class="control-label">Lieu de naissance: </label>
						<input class="form-control" type="text" name="lieu" value="<?php echo $ligne->lieu ?>" />
					</div>
					
					<div class="form-group">
						<label class="control-label">Date de naissance: </label>
						<input class="form-control" type="text" name="date" value="<?php echo $ligne->date ?>" />
					</div>

					<div class="form-group">
						<label class="control-label">Adresse: </label>
						<input class="form-control" type="text" name="adresse" value="<?php echo $ligne->adresse ?>" />
					</div>
                    
					<div class="form-group">						
						<label class="control-label" for="nom du pere">Nom du pere: </label>
						<input class="form-control" type="text" name="nom_p" value="<?php echo $ligne->nom_p ?>" />
					</div>

					<div class="form-group">
						<label class="control-label" for="nom de la mere">Nom de la mere: </label>
						<input class="form-control" type="text" name="nom_m" value="<?php echo $ligne->nom_m ?>" />
					</div>

					<div class="form-group">
						<label class="control-label">Province d'origine: </label>
						<input class="form-control" type="text" name="origine" value="<?php echo $ligne->origine ?>" />
					</div>

					
					<div class="form-group">
						<label class="control-label">Ecole de provenence: </label>
						<input class="form-control" type="text" name="prov" value="<?php echo $ligne->prov ?>" />
					</div>
					
					<div class="form-group">
						<label class="control-label">Numéro du téléphone: </label>
						<input class="form-control" type="text" name="num" value="<?php echo $ligne->num ?>" />
					</div>
					
					<div class="form-group">
						<label class="control-label">Mot de passe: </label>
						<input class="form-control" type="password" name="password" value="" required />
					</div>
					
				</fieldset>
		
				<fieldset>
					<button class="btn btn-primary" type="submit" name="Sauvegarder">Sauvegarder</button><br /><br>
					<button class="btn btn-danger" name="btn" type="reset">Annuler</button>
				</fieldset>
       </form></div>
		
			<?php
				if (isset($_POST["Sauvegarder"])){
					
					foreach ($_POST as $type=>$value) {
						$valeur ="_" .$type;
						$$valeur = $value;
					}

					$con=new mysqli("localhost", "root", "", "ifb");
						
					$requete="UPDATE eleve SET nom='$_nom',postnom='$_postnom',prenom='$_prenom',sexe='$_sexe',lieu='$_lieu',date='$_date',adresse='$_adresse',
								nom_p='$_nom_p',nom_m='$_nom_m',origine='$_origine',prov='$_prov',num='$_num',password='$_password' WHERE CodeEleve='$identite'";
						
					$resultat=$con->query($requete);
			
						if($resultat>0){
							echo"<script type='text/javascript'>alert('MODIFICATION REUSSIE')</script>";							
                            echo "<meta http-equiv='refresh' content='0;URL=profil.php'>";
						}
						else{
							echo"<script type='text/javascript'>alert('MODIFICATION ECHOUEE')</script>";
						}
				}
			
			?>
		
							</div>
                        </div>
					</div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>

<?php
    include ('footer.php');
?>