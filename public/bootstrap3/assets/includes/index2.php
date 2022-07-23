<?php
    session_start();
	if($_SESSION['CodeProv']==""){
		echo "Veillez vous <a href='admission.php'>Connectez SVP !!!</a>";
	}else{
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
            <span class="sr-only">Index administrateur</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index2.php">II-<span class="black">B</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index2.php" class="page-scroll">Accueil</a></li>
			    <li><a href="recherche-Eleve.php" class="page-scroll">Rechercher un élève</a></li>
            <li><a href="apropos.php" class="page-scroll">Nos services</a></li>
            <li><a href="classedispo.php" class="page-scroll">Classes dispo</a></li>
            <li><a href="classe.php" class="page-scroll">Ajouter classe</a></li>
            <li><a href="exclus_classes.php" class="page-scroll">Abandons/Exclus par Classe</a></li>
            <li><a href="exclus_annee_scol.php" class="page-scroll">Abandons/Exclus par Année</a></li>
            <li><a href="deconnexion.php" class="page-scroll">Déconnexion</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>


   <!-- [/NAV]
 ============================================================================================================================-->    


  <!-- [MAIN GALLERY ]
=============================================================================================================================-->
  <section class="main-gallery" id="home">
    <div class="overlay">
      <div class="container">
          <div class="row">
              <div class="col-md-12 text-center">
                 <h1 class="text-capitalize bigFont" data-scroll-reveal="wait 0.45s, then enter top and move 80px over 1s">Institut D'Ibanda</h1>

                <p class="intro" data-scroll-reveal="wait 0.45s, then enter left and move 80px over 1s">IIB BUKAVU</p>
              </div>
              
              <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="text-center top40">
                            <a href="demande.php" class="btn btns theme_background_color white fadeInLeft" style="padding:15px; margin-top:5px;background-color:white; color:green;">Demandes en attente</a>
							<a href="inscrits_classes.php" class=" btn btns theme_background_color white fadeInDown" style="padding:15px;  margin-top:5px; background-color:green;color:white">Elèves par classe</a>
							<a href="inscrits_annee_scol.php" class=" btn btns theme_background_color white fadeInDown" style="padding=15px;  margin-top:5px;background-color:black;color:white">Elèves par année</a>

                        </div>
                    </div>
              
          </div>
      </div>
    </div>
      
  </section>
  
  
  <!-- [/MAIN GALLERY]
=============================================================================================================================-->
  
<!-- [MOBILE APPLICATION]
=============================================================================================================================-->
  
  <section class="mobile-app theme_background_color" id="feature">
      <div class="container">
            <div class="row text-center">
                <div class="app-heading">
                    <h2 class="sectionTitle">Bienvenue dans votre compte <?php echo $_SESSION['nom']?></h2>
                </div>
            </div>
         
        </div>
  </section>
 <!-- [/MOBILE APPLICATION]
=============================================================================================================================-->
 
 <!-- [HOW WORKS]
=============================================================================================================================-->
 
 <section class="how-works" id="howwork">
     <div class="overlay">
  <div class="container">
            <div class="row text-center">
                <div class="how-it-works-heading">
                    <h2 class="sectionTitle">Comment ça marche</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 app-board">
                    <div class="app-board-inner">
                        <ul class="nav nav-tabs liner" id="myTab" role=tablist>
                            <li class="active">
                                <a href="#experience" aria-controls="experience" role="tab" data-toggle="tab" title="experience">
                                    <span class="round-tabs one">
                                        <i class="fa fa-male"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" title="Procédure">
                                    <span class="round-tabs two">
                                        <i class="fa fa-pencil-square"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#prototype" aria-controls="prototype" role="tab" data-toggle="tab" title="Prototype">
                                    <span class="round-tabs three">
                                        <i class="fa fa-language"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#intention" aria-controls="intention" role="tab" data-toggle="tab" title="intention">
                                    <span class="round-tabs four">
                                        <i class="fa fa-adjust"></i>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#doner" aria-controls="doner" role="tab" data-toggle="tab" title="Development">
                                    <span class="round-tabs five">
                                        <i class="fa fa-bar-chart"></i>
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="experience">

                            <h3 class="head text-center">Appréciations</h3>

                            <p class="narrow text-center">
                           Pas mal du tout
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut <span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <h3 class="head text-center">Expérience</h3>

                            <p class="narrow text-center">
                               Travail issue d'une grande expériences en technique de l'information
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color">Grimpe en haut <span
                                        class="fa fa-send-o"></span></a>
                            </p>

                        </div>
                        <div class="tab-pane fade" id="prototyping">
                            <h3 class="head text-center">Prototype</h3>

                            <p class="narrow text-center">
                                Programation WEB

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color">Grimpe en haut <span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="uidesign">
                            <h3 class="head text-center">intention</h3>

                            <p class="narrow text-center">
                                l'automatisme
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut<span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="doner">
                            <div class="text-center">
                                <i class="img-intro icon-checkmark-circle"></i>
                            </div>
                            <h3 class="head text-center">Development</h3>

                            <p class="narrow text-center">
                                Développé par Ir.Gloire Zihalirwa
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Get Quote <span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>   
     </div>
 </section>
 
 <!-- [/HOW WORKS]
=============================================================================================================================-->
 
 <!-- [/WHY YOU LOVE]
=============================================================================================================================-->
 
 <section class="why-love theme_background_color" id="whylove">
     <div class="overlay">
   <div class="container">
            <div class="row text-center">
                <div class="WhyLove-heading text-center">
                    
                    <h2 class="sectionTitle">Quelques raisons d'aimer cette plate-forme</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WhyLove-icon-box text-center">
                        <div class="WhyLove-icon">
                            <span class="themecolor"><i class="fa fa-lightbulb-o" ></i></span>
                        </div>
                        <div class="WhyLove-content">
                            <h4>INTUITIVE</h4>

                            <p>elle résulte de l'intuition,elle fait appel au sens.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WhyLove-icon-box text-center">
                        <div class="WhyLove-icon">
                              <span class="themecolor"><i class="fa fa-binoculars"></i></span>
                        </div>
                        <div class="WhyLove-content">
                            <h4>Très Prompte</h4>

                            <p>elle est vive,active et permet un gain de temps</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WhyLove-icon-box text-center">
                        <div class="WhyLove-icon">
                              <span class="themecolor"><i class="fa fa-adjust"></i></span>
                        </div>
                        <div class="WhyLove-content">
                            <h4>Attrayante</h4>

                            <p>elle attire la clientèle.Son look fait à lui même son marketing</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WhyLove-icon-box padding-top30 text-center">
                        <div class="WhyLove-icon">
                             <span class="themecolor"><i class="fa fa-laptop"></i></span>
                        </div>
                        <div class="WhyLove-content">
                            <h4>Nouvelle</h4>

                            <p>elle est le fruit de la nouvelle technologie</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WhyLove-icon-box padding-top30 text-center">
                        <div class="WhyLove-icon">
                              <span class="themecolor"><i class="fa fa-mobile-phone"></i></span>
                        </div>
                        <div class="WhyLove-content">
                            <h4>Sensible</h4>

                            <p>elle est très remarquable</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="WhyLove-icon-box padding-top30 text-center">
                        <div class="WhyLove-icon">
                             <span class="themecolor"><i class="fa fa-eye-slash"></i></span>
                        </div>
                        <div class="WhyLove-content">
                            <h4>Mise à jour</h4>

                            <p>elle est dynamique,elle poura être mise à jour de manière régulière</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
     
     </div>
     
 </section>
 <!-- [/Raison d'aimer]
=============================================================================================================================-->
 
 <!-- [CURRENT STATS]
=============================================================================================================================-->
 <section class="our-stats" id="stats">
 <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-ge"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="1000" data-to="1000" data-speed="1500"
                                  data-refresh-interval="30"></span>

                            <h5>Nombre total de visites sur la plate-forme</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-git-square"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="1" data-to="504" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Editeurs supportés</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="1" data-to="359" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Langues</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-stats-box text-center">
                        <div class="our-stat-icon">
                            <span class="fa fa-gears"></span>
                        </div>
                        <div class="our-stat-info">
                            <span class="stats" data-from="3500" data-to="5000" data-speed="5000"
                                  data-refresh-interval="50"></span>

                            <h5>Visiteurs heureux</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </section>
 
 <!-- [CURRENT STATS]
=============================================================================================================================-->
 <!-- [SCREEN SHOT]
=============================================================================================================================-->
 <section class="screeshots" id="screenshot">
     <div class="container">
            <div class="row text-center">
                <div class="screenshots-heading">
                    <h2 class="section-title">Quelques captures d'images de l'institut d'IBANDA</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="iib-1">
                        <div id="myCarousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-8.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-3.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-4.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-5.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-6.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-7.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-9.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-10.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-5.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-12.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-10.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <!--/item-->

                            </div>
                            <!--/carousel-inner-->

                        </div>
                        <!--/myCarousel-->

                    </div>
                    <!--/well-->
                </div>
            </div>
        </div>
 </section>
 
 
 <!-- [/SCREEH SHOT]
=============================================================================================================================-->
 
 
 <!-- [TESTIMONIAL]
=============================================================================================================================-->
 <section class="testimonial" id="testimonial-s">
     <div class="overlay">
     <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="testimonial-area-heading">
                        <h2>Que disent les gens à propos de nous</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" data-wow-delay="0.2s">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"><img
                                    class="img-responsive " src="images/client-1.JPG" alt="client">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive"
                                                                                     src="images/client-2.JPG"
                                                                                     alt="client">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive"
                                                                                     src="images/client-5.JPG"
                                                                                     alt="clinet">
                            </li>
                        </ol>

                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">

                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">

                                            <p>Ce site est intéressant,mais il faut encore y travailler d'avantage !</p>
                                            <small>Vital ZIHALIRWA</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">

                                            <p>Les informations sur ce site devraient êtres encore beaucoup plus claires </p>
                                            <small>Nicole ZIHALIRWA</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2 col-xs-12">

                                            <p> Moi j'apprécie cette plate-forme.Elle est sans faille </p>
                                            <small>Gaston ZIHALIRWA</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <!-- Carousel Buttons Next/Prev -->

                    </div>
                </div>
            </div>
        </div>
     </div>
 </section>
 
 <!-- [/TESTIMONIAL]
=============================================================================================================================-->
 
 <!-- [SUBSCRIBE]
=============================================================================================================================-->
 <section class="contactus" id="contact">
     <div class="container">
         <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="testimonial-area-heading">
                        <h2 class="grey">NOS CORRESPONDANCES</h2>
                    </div>
                </div>
            </div>
         <div class="gap"></div>
     <div class="row">
                    <!-- /contact info -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <!-- contact form -->
                      <center><a target="_blank" href="https://institutibanda.bukavu@gmail.com" style="background-color:green;">CONSULTER LA BOITE MAIL DE L'ECOLE</a></center>
                      <!-- /contact form -->
                    </div>
                  </div>
     </div>
				  
 </section>
 <!--  [CONTACT INFO ENDS ]-->
<?php
    include ('footer.php');
    }
?>