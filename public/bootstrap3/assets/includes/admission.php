<?php
	$con=new mysqli("localhost", "root", "", "ifb");
?>
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
	<title>Gestion d'inscription des élèves</title>
	
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
            <span class="sr-only">Connexion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php">II-<span class="black">B</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php" class="page-scroll" id="index">Retour</a></li>
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
    
                <center><h1 style="color:blue";>CONNECTEZ-VOUS ICI AVEC VOTRE COMPTE !</h1></center>
		


			
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">

								<form role="forme" method="post">
									<div class="input-group margin-bottom-20">
                                        <center><h4>Utiliser votre NOM ou votre NUMERO et votre MOT DE PASSE pour vous CONNECTEZ<span class="title-under"></span></h4></center>
									</div>
                                    
										<input placeholder="Nom ou Numéro de téléphone" name="login" class="form-control" type="text" title="login (Nom ou Numéro de téléphone)" required><br>
										<input placeholder="***************" name="password" class="form-control" type="password" required title="Entrer votre mot de passe"><br>
                                    
										<input type="submit" name="connexion" class="btn btn-success" value="Me connecter" > <mark style="color:red"><i>Si vous n'avez pas encore un compte <a href="inscription.php" title="Cliquez ici pour aller créer votre compte sur le site de l'école">cliquer-ici !</a></i></mark><br><br><br>
								</form>
							</div>
						</div>
					</div>
				</div>
    
				<center><img src="images/fb0.jpg" class="thumbnail" align="center" alt=""></center>
		</div>
	</div>
		

    <?php
			if(isset($_POST['connexion'])){
                
                if(!empty($_POST['login'])&&!empty($_POST['password'])){
                    
                    $login=$_POST['login'];
                    $pw=$_POST['password'];


				if($con){
					$rqt="SELECT * FROM proviseur WHERE Nom='".$login."' || Phone='".$login."' && Password='".$pw."'";
					$rslt=$con->query($rqt);
					
					$objet=$rslt->fetch_object();
					
					
					$rqt2="SELECT * FROM eleve WHERE nom='".$login."' || num='".$login."' && password='".$pw."' ";
					$rslt2=$con->query($rqt2);
					
					$objet2=$rslt2->fetch_object();
					
					if($objet){
						
						//creation de la session admin
						$_SESSION['CodeProv']=$objet->CodeProv;
						$_SESSION['nom']=$objet->Nom;
						$_SESSION['postnom']=$objet->PostNom;
						
						
						header('location:index2.php?id='.$objet->CodeProv);
				
                    }else if($objet2){
				
						//creation de la session Etudiant
						$_SESSION['CodeEleve']=$objet2->CodeEleve;
						$_SESSION['nomE']=$objet2->nom;
						$_SESSION['postnomE']=$objet2->postnom;
						
						$_SESSION['etat']=$objet2->etat_admission;
						
						$etat = $_SESSION['etat'];
						echo $etat;
						
						if( $etat != 'non'){
							header('location:index1.php?id='.$objet2->CodeEleve);	
						}else{
							echo "<script>alert('Impossible de se connecter. Vous êtes exclu ou soit vous avez abandonné')</script>";	
						}
						
                    }else{
						echo "<script>alert('Connexion echouée, Numéro ou Mot de Passe Incorrecte')</script>";
					}
					
				}
				
			}
			
        }
    ?>
<?php
    include('footer.php');
?>