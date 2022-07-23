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
    
                <center><h4 style="color:blue";>LISTES DE TOUS LES ELEVES INSCRITS DEFINITIVEMENT POUR CHAQUE CLASSE</h4></center>
				
				
		
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<form role="forme" method="post" action="">
                            <center><select name="Classe" style="width:400px;" class="form-control" required>
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
                            </select><br><input type="submit" name="afficher" class="btn btn-success" value="Afficher" ></center><br>
							</form>
                           <center>Liste complète des évèles inscrits (Par classes)</center>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                    <tr class="center">
                                        <th>N°</th>
                                        <th>NOM,  POST-NOM &amp; PRENOM</th>
                                        <th>SEXE</th>
                                        <th>CLASSE</th>
                                        <th>DATE INSCRIPTION</th>
                                    </tr>
                                  </thead>
                                    
                                 <tbody>
                                
                                <?php
								if(isset($_POST['afficher'])){
                                    $connect=mysql_connect("localhost","root","");
                                    $db=mysql_select_db("ifb") ;
									
									$cls = $_POST['Classe'];
                                     
                                    $requete = "SELECT * FROM inscrire, eleve, classe WHERE inscrire.CodeEleve = eleve.CodeEleve AND
                                    inscrire.Classe = classe.CodeClasse AND inscrire.Etat = 'Valide' AND eleve.etat_admission = 'non' AND inscrire.Classe = $cls";
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
                                    <center><a target="_blank" href="liste/liste_exclus_classe.php?classe=<?php if(isset($_POST['afficher'])) {echo $cls; } ?>" style="background-color:green;">Imprimer la liste</a></center>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
<?php
    include ('footer.php');
?>