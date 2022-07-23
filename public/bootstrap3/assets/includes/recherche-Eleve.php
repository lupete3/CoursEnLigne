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
	<title>Inscription en entente</title>
	
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
            <li><a href="index2.php" class="page-scroll" id="index1">Retour</a></li>
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
    
                <center><h4 style="color:blue";>TOUS LES ELEVES INSCRITS DEFINITIVEMENT POUR CHAQUE CLASSE</h4></center>
				
				
		
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<form role="forme" method="post" action="">
                            <center><input type="text" name="eleve" class="form-control" style="width:300px" placeholder="Entrez le nom de l'élève" required>
							<br><input type="submit" name="afficher" class="btn btn-success" value="Afficher" ></center><br>
						</form>
                           <center>Résultat de Recherches</center>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
							<form method = "POST" action="">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                    <tr class="center">
                                        <th>N°</th>
                                        <th>NOM,  POST-NOM &amp; PRENOM</th>
                                        <th>SEXE</th>
                                        <th>CLASSE</th>
                                        <th>DATE INSCRIPTION</th>
                                        <th>ACTION</th>
                                    </tr>
                                  </thead>
                                    
                                 <tbody>
                                
                                <?php
									if(isset($_POST['afficher'])){
										$connect=mysql_connect("localhost","root","");
										$db=mysql_select_db("ifb") ;
										
										$eleve = $_POST['eleve'];
										 
										$requete = "SELECT * FROM inscrire, eleve, classe WHERE inscrire.CodeEleve = eleve.CodeEleve AND
										inscrire.Classe = classe.CodeClasse AND inscrire.Etat = 'Valide' AND eleve.nom = '$eleve'";
										$resultat=mysql_query($requete) ;
										 
														
										$i = 1;
										 if (mysql_num_rows($resultat) > 0){
										 
										
										while($result=mysql_fetch_array($resultat)){
									
                                 ?>
                                    
                                    <tr class="odd gradeX">
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $result ['nom'];?> <?php echo $result ['postnom'];?> <?php echo $result ['prenom'];?></td>
                                        <td><?php echo $result ['sexe'];?></td>
                                        <td><?php echo $result ['Designation'];?> <?php echo $result ['Section'];?></td>
                                        <td><?php echo $result ['DateInscription'];?></td>
                                        <td><?php echo $result ['CodeEleve'];?></td>
                                        <td><a href="exclusion_Eleve.php?idEleve=<?php echo $result ['CodeEleve'];?>" ><span class="btn btn-danger">Exclure!</span></a></td>
                                    </tr>
                                     
                                <?php
                                    $i++;
									}
                                    }
                                }else{
								}
                                ?>
                                    
							
                                 </tbody>
                                    
                                </table>
								</form>
                                 <?php
									if(isset($_POST['reiller'])){
										$connect=mysql_connect("localhost","root","");
										$db=mysql_select_db("ifb") ;
										
										$eleve = $result['sexe'];
										 
										echo $eleve;
										}
									
                                 ?>		
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
<?php
    include ('footer.php');
?>