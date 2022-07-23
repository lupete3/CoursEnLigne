<?php
	session_start();
?>



<?php
    
    
        if (isset($_POST['Envoyer'])){

            if (isset($_FILES['file']) AND !empty($_FILES['file']['name'])) {
                $fileSize = 2097153;
                $allowed = array('zip', 'rar');
                if ($_FILES['file']['size'] <= $fileSize) {
                    $extension = strtolower(substr(strrchr($_FILES['file']['name'], '.'), 1));
                    if (in_array($extension, $allowed)) {
                       $chemain = "bulletin/".$_SESSION['CodeEleve'].".".$extension;
                       $resultat = move_uploaded_file($_FILES['file']['tmp_name'], $chemain);

                       if ($resultat) {
                           $nomfichier = $_SESSION['CodeEleve'].".".$extension;

                            $connect=mysql_connect("localhost","root","");
                            $db=mysql_select_db("ifb") or die (mysql_error());
                            foreach($_POST as $type=>$val){
                                $b="_".$type;
                                $$b=$val;
                            }

                            $dt=date('d-m-Y');
                            $Etat="Invalide";
                            $elv=$_SESSION['CodeEleve'];
                            $annee=$_POST['AnneeScol'];
                            $cls=$_POST['Classe'];

                            mysql_query("set names UTF8");
                            $query=mysql_query("INSERT INTO `ifb`.`inscrire` ( `CodeEleve`, `DateInscription`, `Classe`, `Dossier`, `AnneeScol`, `Etat`) 
                                                          VALUES ('$elv', '$dt', '$cls', '$nomfichier', '$annee', '$Etat')");
                            $resultat = mysql_query($query);
                            if($resultat>0){
                                    echo "<script type='text/javascript'>alert('La demande d'inscription a été envoyée avec succès!')</script>";
                                }else{
                                    echo "<script type='text/javascript'>alert('Echec d'envoie du fichier...')</script>";
                            }   
                        }

                       }else{
                        $message = '<span style="color:red;padding:5px;margin-right:5px;border-radius:6px;">Votre dossier doit être compressé </span>';
                       }
                    }else{
                        echo "Le format de votre fichier est incorect";
                    }

                }else{
                    echo "Votre fichier est trop grand";
                }

            }


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
	<title>Demander votre inscription sur l'institution</title>
	
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
            <span class="sr-only">sollicitation d'inscription</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="index1.php">II-<span class="black">B</span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index1.php" class="page-scroll" id="index1">Retour<i class="fa fa-send"></i></a></li>
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

    <center><h1 style="color:blue";>SOLLICITER VOTRE INSCRIPTION ICI</h1></center>
	
	 <div class="row">
		<div class="col-md-offset-3 col-md-6">
            <div class="panel panel-info">
				<div class="panel-heading">
					<center><h4>VEUILLEZ REMPLIR CE FORMULAIRE SVP!<span class="title-under"></span></h4></center>
				</div>
                <div class="panel-body">
				
					<form role="form" method="post" action="" enctype="multipart/form-data">
						<input name="date" class="form-control" type="text" value="<?php echo date("d/m/Y");?>" disabled />
						
                         <label>Classe</label>
                            <select name="Classe" class="form-control" required>
							<option value="">selectionner une classe</option>
                                
                                <?php
                                    mysql_query("set names UTF8");
								    require_once("assets/includes/connexionMysql.inc.php"); 
                                    $search=mysql_query("SELECT * FROM classe");
                                    if (mysql_num_rows($search)>0){
                                        while($ligne=mysql_fetch_row($search)){
                                        $Id=$ligne[0];
                                        $cl=$ligne[1];
                                        $sec=$ligne[2];

                                        echo"<option value='$Id'>$cl $sec</option>";
                                        }
                                    }
                                ?>
                            </select><br>
						<input name="file" class="form-control" type="file" required /><br />
						<input name="AnneeScol" class="form-control" type="text" placeholder="Enter l'annee scolaire" /><br />
                        <input name="Etat" class="form-control" type="text" value="Invalide" disabled /><br>
						
						<?php 
							if(isset($message)){
								echo $message;
						}

						?>

                        <input type="submit" class="btn btn-info" name="Envoyer" value="Envoyer demande" />
						<input type="reset" class="btn btn-danger" value="Annuler" /><br>
					</form><br>
                </div>
            </div>
         </div>
	   </div>
	 </div>
<?php
	include ('footer.php');
?>