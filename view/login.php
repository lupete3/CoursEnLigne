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
  <title>Apprentissage en ligne</title>
  
  <!-- [ FONT-AWESOME ICON ] 
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/library/font-awesome-4.3.0/css/font-awesome.min.css">

  <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
  <link rel="shortcut icon" type="image/x-icon" href="../public/bootstrap3/images/icon.png">
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/animate.css">
  <link rel="stylesheet" type="text/css" href="../public/css/magnific-popup.css">
        <link rel ="stylesheet" type="text/css" href="../public/library/vegas/vegas.min.css">
  <!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/library/bootstrap/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/library/bootstrap/css/bootstrap.css">
        
        <!-- [ DEFAULT STYLESHEET ] 
        =========================================================================================================================-->
  <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/style.css">
        <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/color/green.css">
    <link rel="stylesheet" type="text/css" href="../public/bootstrap3/css/color/blue.css">
</head>
<style type="text/css">
    body{
        background-color:#ffffff;
    }
    .bg-whit{
        background-color: #fffdf8;
    }
</style>
</style>
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
    <nav  class="amd-menu navbar navbar-default navbar-fixed-top bg-primary  fadeInDown" >
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">E-LEARNING</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index.php"><span class="red">E</span>-<span class="warning">LEARNING</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="../index.php" class="page-scroll"><i class="fa fa-home"></i> Accueil</a></li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
       
  <!-- [MAIN GALLERY ]
=============================================================================================================================-->

  <section   id="home" class="main-gall">
    <div class="overl">
      <div class="container">
          <div class="row">
		<div class="col-md-offset-3 col-md-6">
      <?php 
        if (isset($_GET['sms']) AND $_GET['sms'] == 1) { ?>
          <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4>Login ou Mot de passe incorrects</h4>
                </div>
        <?php }else if (isset($_GET['sms']) AND $_GET['sms'] == 2){ ?>
          <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="text-center">Votre demande étudiant est encours de traitement; Vueillez patienter</h4>
                </div>
        <?php } ?>
        
            <div class="panel panel-info">
				<div class="panel-heading">
					<center><h4>CONNEXION<span class="text-capitalize"></span></h4></center>
				</div>
                <div class="panel-body text-center">
				
					<form role="form" method="post" action="../access/connect_users.php" class="was-validated">
                        
						<input name="username" class="form-control" type="text" placeholder="Login" required /><br />		
						<input name="pass" class="form-control" type="password" placeholder="Password" required /><br />	
						<select class="form-control" name="funct" required="">
							<option value="" selected="" >Role</option>
							<option value="admin">Admin</option>
							<option value="enseignant">Enseignant</option>
							<option value="etudiant">Etudiant</option>
						</select>	<br>
						<input type="submit" class="btn btn-info" name="log_in" value="Se Connecter" />
						<a href="register.php"><span class="btn btn-success">S'inscrire</span></a><br>
                    
					</form><br>
					
				</div>
			</div>
	   </div>
	 </div>
      </div>
    </div>
      
  </section>
  

 <!-- [FOOTER]
=============================================================================================================================-->
 <!-- [FOOTER]
=============================================================================================================================-->
 <footer class="footer sub-footer" >
  
          <div class="container">
            <div class="footer-info col-md-12 text-center">
              <ul>
                <li><a href="#">Adresse: Av. ATHENEE, No. 10, Q. Ndendere</a></li>
                <li><a href="#">Tél: +243 97 7408425</a></li>
                <li><a href="mailto:institutIbanda.bukavu@gmail.com">iscbukavu@gmail.com"</a></li>
              </ul>
            </div>
            
                        <div class="footer-social-icons col-md-12 text-center">
              <ul>
                <li><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="http://www.google.com"><i class="fa fa-google-plus"></i></a></li>
                <li><a target="_blank" href="http://www.rss.com"><i class="fa fa-rss"></i></a></li>
              </ul>
            </div>
          </div>
    
            </footer>
 <!-- [/FOOTER]
=============================================================================================================================-->
 

</div>
 

<!-- [ /WRAPPER ]
=============================================================================================================================-->

  <!-- [ DEFAULT SCRIPT ] -->
  <script src="../public/bootstrap3/library/modernizr.custom.97074.js"></script>
  <script src="../public/bootstrap3/library/jquery-1.11.3.min.js"></script>
        <script src="../public/bootstrap3/library/bootstrap/js/bootstrap.js"></script>
  <script type="../public/bootstrap3/text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script src="../public/bootstrap3/library/vegas/vegas.min.js"></script>
  <!-- [ PLUGIN SCRIPT ] -->
        
  <script src="../public/bootstrap3/js/plugins.js"></script>
        <script src="../public/bootstrap3/js/fappear.js"></script>
       <script src="../public/bootstrap3/js/jquery.countTo.js"></script>
  <script src="../public/bootstrap3/js/scrollreveal.js"></script>
         <!-- [ COMMON SCRIPT ] -->
  <script src="../public/bootstrap3/js/common.js"></script>



  
</body>


</html>