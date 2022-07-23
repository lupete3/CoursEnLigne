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
	<title>Mon identité</title>
	
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
            <li><a href="index1.php" class="page-scroll" id="index1">Retour</a></li>
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
    
          <center><h1 style="color:blue";>MON IDENTITE</h1></center>

				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">
                                <center>Mon profil sur le site</center>
                           <div class="panel-body">
                            <div class="table-responsive">
                                
                                <?php

                                    $con=new mysqli("localhost", "root", "", "ifb");
                                    $requete="SELECT * FROM eleve WHERE CodeEleve='".$_SESSION['CodeEleve']."'";
                                    $resultat=$con->query($requete);

                                    while($ligne=$resultat->fetch_object()){

                                        echo "  Nom :	              $ligne->nom     <br /><br />
                                                Post nom :	          $ligne->postnom <br /><br />
                                                Pre nom :	          $ligne->prenom  <br /><br />
                                                Sexe :	              $ligne->sexe    <br /><br />
                                                Lieu de naissance :   $ligne->lieu    <br /><br />
                                                Date de naissance :	  $ligne->date    <br /><br />
                                                Adresse :	          $ligne->adresse <br /><br />
                                                Province d'origine :  $ligne->origine <br /><br />
                                                Nom du père :	      $ligne->nom_p   <br /><br />
                                                Nom de la mère :	  $ligne->nom_m   <br /><br />
                                                Ecole de provenance : $ligne->prov    <br /><br />
                                                Numéro de téléphone : $ligne->num     <br /><br />
                                                <p><a style='background-color:orange'; href='modifier.php?CodeEleve=$ligne->CodeEleve'><center><em>Modifier mon identité</em></center></a></p><br />
                                            ";			

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