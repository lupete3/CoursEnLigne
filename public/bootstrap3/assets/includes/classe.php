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
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index2.php">II-<span class="black">B</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index2.php" class="page-scroll" id="index2">Retour</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- /. main-header --><br><br><br><br><br>
			<!-- Les formulaires de creation d'un compte -->		
				
    <div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">INSTITUT D'IBANDA<br />"IIB-BUKAVU" <span class="title-under"></span></h1>
		</div>									
	</div>

    <center><h4 style="color:blue";>AJOUTER UNE CLASSE !</h4></center>
	
	 <div class="row">
		<div class="col-md-offset-3 col-md-6">
            <div class="panel panel-info">
				<div class="panel-heading">
					<center><h4>Renseignement sur la classe à ajouter<span class="title-under"></span></h4></center>
				</div>
                <div class="panel-body">
				
					<form role="form" method="post" action="">
                        <label style="color:black";>Désignation de la classe</label>
                        <select name="classe" style="color:black"; required />
                            <option disabled>Selectionner la classe à ajouter !</option>
                            <option value="1ere">1ere</option>
                            <option value="2eme">2eme</option>
                            <option value="3eme">3eme</option>
                            <option value="4eme">4eme</option>
                            <option value="5eme">5eme</option>
                            <option value="6eme">6eme</option>
                        </select><br>
						
						<input name="section" class="form-control" type="text" placeholder="Enter le nom de la section" required /><br />		<input type="submit" class="btn btn-info" name="Ajouter" value="Ajouter la classe" />
						<input type="reset" class="btn btn-danger" value="Annuler" /><br>
                    
					</form><br>
					
				</div>
			</div>
	   </div>
	 </div>

<?php
	if(isset($_POST['Ajouter'])){
		
		$cl=$_POST['classe'];
		$sec=$_POST['section'];
        $CodeProv=$_SESSION['CodeProv'];
		include ('assets/includes/db_connection.php');
		
		$query=mysql_query ("INSERT INTO classe (`CodeClasse`, `Designation`, `section`, `CodeProv`)
							VALUES (NULL, '$cl', '$sec', '$CodeProv')");

		$result=mysql_query($query);	
		echo'<script language="javascript">alert("La classe a été ajoutée avec succès")</script>';
		  
	}

?>
                <center><a href="index2.php">Retour à la page d'acceuil</a></center>
                <center><a href="classedispo.php">Voir les classes disponibles</a></center>
<?php
    include ('footer.php');
?>