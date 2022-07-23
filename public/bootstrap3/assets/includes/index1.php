<?php
    session_start();
	if($_SESSION['CodeEleve']==""){
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
            <span class="sr-only">Index eleve</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index1.php">II-<span class="black">B</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index1.php" class="page-scroll">Accueil</a></li>
            <li><a href="profil.php" class="page-scroll">Mon profil</a></li>
            <li><a href="#contact" class="page-scroll">Contactez-nous</a></li>
            <li><a href="deconnexion.php" class="page-scroll">Deconnexion</a></li>
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
                 <h1 class="text-capitalize bigFont" data-scroll-reveal="wait 0.45s, then enter top and move 80px over 1s">Institut d'Ibanda</h1>

                <p class="intro" data-scroll-reveal="wait 0.45s, then enter left and move 80px over 1s">IIB BUKAVU</p>
              </div>
              
              <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                        <div class="text-center top40">
                            <a href="profil.php" class="btn btns white-background themecolor fadeInDown">Mon profil</a>
							<?php
								$connect=mysql_connect("localhost","root","");
                                    $db=mysql_select_db("ifb") ;
                                     
                                    $elevec = $_SESSION['CodeEleve'];
                                     
                                    $requete = "SELECT Etat FROM inscrire WHERE inscrire.CodeEleve = '$elevec' ";
                                    $resultat=mysql_query($requete) ;
                                     
                                     if (mysql_num_rows($resultat) > 0){
                            }else{
								echo'<a href="inscrire2.php" class=" btn btns theme_background_color white fadeInLeft">Inscription</a>'; 
							}
							 
							?>
                            <a href="deconnexion.php" class="btn btns black-background white fadeInRight">Deconnexion</a>
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
                    <h2 class="sectionTitle">Bienvenue dans votre compte <?php echo $_SESSION['nomE'] ?></h2>
					
					<?php
                                    $connect=mysql_connect("localhost","root","");
                                    $db=mysql_select_db("ifb") ;
                                     
                                    $elevec = $_SESSION['CodeEleve'];
                                     
                                    $requete = "SELECT Etat FROM inscrire WHERE inscrire.CodeEleve = '$elevec' ";
                                    $resultat=mysql_query($requete) ;
                                     
                                     if (mysql_num_rows($resultat) > 0){

                                    while($result=mysql_fetch_array($resultat)){
                               
                                     
                                    
												
												$test1 = 'Valide';
												$test2 = 'Invalide';
												$test3 = 'Rejete';
												
												if($result ['Etat'] == $test1){
													
												$message =  '<span style="lmargin-bottom:30px;background-color:blue;color:white;padding:15px;margin-right:5px;border-radius:6px;">Vous êtes admis en tant qu élève de l IIB. Félicitation !</span>';	
												}
												
												if($result ['Etat'] == $test2){
												$message =  '<span style="color:yellow;padding:5px;margin-right:5px;border-radius:6px;"> Votre demande est en cours de traitement, vueillez patienter s il vous plait !</span>';		
												}
												
												if($result ['Etat'] == $test3){
												$message =  '<span style="color:red;padding:5px;margin-right:5px;border-radius:6px;">Votre demande a été rejetée; vueillez revoir votre dossier ! </span>';		
												
												}

                                 
                                    }
                                }
                                ?>
					
					
					
								
                </div>
				<?php if(isset($message)) { echo $message; }?>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12 featured-content">
                    <div class="app-icon-box">

                        <div class="app-content-phone text-right">
                            <h4>Support</h4>

                            <p>
                              La richesse est notre vision
                            </p>
                        </div>
                        <div class="app-icon">
                            <span class="themecolor text-center"><i class="fa fa-diamond"></i></span>
                        </div>
                    </div>
                    <div class="app-icon-box">

                        <div class="app-content-phone text-right">
                            <h4>Formation</h4>

                            <p>
                             La nouvelle technologie est notre outil de travail
                            </p>
                        </div>
                        <div class="app-icon">
                           <span class="themecolor text-center"><i class="fa fa-video-camera"></i></span>
                        </div>
                    </div>
                    <div class="app-icon-box">

                        <div class="app-content-phone text-right">
                            <h4>Créativité </h4>

                            <p>
                             L'art fait tout avec art
                            </p>
                        </div>
                        <div class="app-icon">
                            <span class="themecolor text-center"><i class="fa fa-delicious"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <img src="images/ifb.png" class="iphone-image" alt="iPhpone" data-scroll-reveal="wait 0.45s, then enter top and move 80px over 1s">
                </div>
                <div class="col-md-4 col-sm-12 featured-content">
                    <div class="app-icon-box">
                        <div class="app-icon">
                            <span class="themecolor text-center"><i class="fa fa-anchor"></i></span>
                        </div>
                        <div class="app-content">
                            <h4>Evalution</h4>

                            <p>
                               Nous mettons sur balance les forces et les faiblesses de nos élèves
                            </p>
                        </div>
                    </div>
                    <div class="app-icon-box">
                        <div class="app-icon">
                            <span class="themecolor text-center"><i class="fa fa-gears"></i></span>
                        </div>
                        <div class="app-content">
                            <h4>Paramètre</h4>

                            <p>
                              L'expérience de notre personnel donne du plaisir au travail des élèves
                            </p>
                        </div>
                    </div>
                    <div class="app-icon-box">
                        <div class="app-icon">
                            <span class="themecolor text-center"><i class="fa fa-desktop"></i></span>
                        </div>
                        <div class="app-content">
                            <h4>Machinage</h4>

                            <p>
                              Nous sommes ouverts au monde pour le partage des expériences
                            </p>
                        </div>
                    </div>
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
                                <a href="#experience" aria-controls="experience" role="tab" data-toggle="tab" title="Experience">
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

                            <h3 class="head text-center">Experience</h3>

                            <p class="narrow text-center">
                                Travail issue d'une grande expérience en technique de l'information
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut<span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="profile">
                            <h3 class="head text-center">Procédure</h3>

                            <p class="narrow text-center">
                               Lentement mais sûrement

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut <span
                                        class="fa fa-send-o"></span></a>
                            </p>

                        </div>
                        <div class="tab-pane fade" id="prototyping">
                            <h3 class="head text-center">Prototype</h3>

                            <p class="narrow text-center">
                                La Sciences dans sa globalité
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut <span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="uidesign">
                            <h3 class="head text-center">intention</h3>

                            <p class="narrow text-center">
                                Le travail pour l'exellence toujour et en tout temps

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut<span
                                        class="fa fa-send-o"></span></a>
                            </p>
                        </div>
                        <div class="tab-pane fade" id="doner">
                            <div class="text-center">
                                <i class="img-intro icon-checkmark-circle"></i>
                            </div>
                            <h3 class="head text-center">Developpement</h3>

                            <p class="narrow text-center">
                               Developpé par Ir.Gloire ZIHALIRWA
                            </p>

                            <p class="text-center">
                                <a href="#" class="btn btn-success btn-outline-rounded theme_background_color"> Grimpe en haut<span
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
 <!-- [/WHY YOU WILL LOVE]
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
                            <span class="stats" data-from="4763904" data-to="4764504" data-speed="5000"
                                  data-refresh-interval="50"></span>

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

                            <h5>Visiteurs héreux</h5>
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
                    <div class="screenshot-carousel">
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
                                                <img class="carousel-img" src="images/iib-23.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-18.JPG" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-13.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-16.jpg" alt="Image"/>
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
                                                <img class="carousel-img" src="images/iib-15.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-25.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-20.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-24.jpg" alt="Image"/>
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
                                                <img class="carousel-img" src="images/iib-14.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-21.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-22.jpg" alt="Image"/>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="#x">
                                                <img class="carousel-img" src="images/iib-19.jpg" alt="Image"/>
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
											class="img-responsive " src="images/client-1.JPG" alt="client">                            </li>
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

                                            <p>Moi j'apprécie cette plate-forme,elle est sans faille .</p>
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
                        <h2 class="grey">CONTACTEZ NOUS</h2>
                    </div>
                </div>
         </div>
         <div class="gap"></div>
                <div class="row">
                    <!-- /contact info -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <!-- contact form -->
                      <form id="contact-form" method="POST" action="php/mail.php">
                        <div class="row form-group">
                          <div class="col-xs-6">
                            <input type="text" name="name" placeholder="Nom" id="contact-name" class="form-control">
                          </div>
                          <div class="col-xs-6">
                            <input type="email" name="email" placeholder="e-mail" id="contact-email" class="form-control ">
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" rows="4" placeholder="Message" id="contact-message" class="form-control "></textarea>
                          </div>
                        </div>
                        <button type="submit" name="email" class="btn btn-style blue">Envoyer</button>
                       <span class="form-message" style="display: none;"></span>
                      </form>
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