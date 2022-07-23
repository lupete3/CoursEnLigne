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
    
                <center><h4 style="color:blue";>LISTES DE TOUS LES ELEVES INSCRITS PAR ANNEE SCOLAIRE</h4></center>
				
				
		
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
						<form role="forme" method="post" action="inscrits_annee_scol.php">
                            <center><select name="annee" style="width:400px;" class="form-control" required>
							<option value="">selectionner l'annee scolaire</option>
                                
                                <option value='2015-2016'>2015-2016</option>
                                <option value='2016-2017'>2016-2017</option>
                                <option value='2017-2018'>2017-2018</option>
                                <option value='2018-2019'>2018-2019</option>
                                <option value='2020-2021'>2020-2021</option>
                                <option value='2022-2023'>2022-2023</option>
                                <option value='2023-2024'>2023-2024</option>
                                <option value='2024-2025'>2024-2025</option>
                                <option value='2025-2026'>2025-2026</option>
                                <option value='2026-2027'>2026-2027</option>
                                <option value='2027-2028'>2027-2028</option>
                                <option value='2028-2029'>2028-2029</option>
                                <option value='2029-2030'>2029-2030</option>
                                                                 
                            </select><br><input type="submit" name="afficher" class="btn btn-success" value="Afficher" ></center><br>
							</form>
                           <center>Liste complète des évèles inscrits (Par année Scolaire)</center>
                        
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
									
									$ann = $_POST['annee'];
                                     
                                    $requete = "SELECT * FROM inscrire, eleve, classe WHERE inscrire.CodeEleve = eleve.CodeEleve AND
                                    inscrire.Classe = classe.CodeClasse AND inscrire.Etat = 'Valide' AND eleve.etat_admission = 'oui' AND inscrire.AnneeScol = '$ann'";
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
                                    <center><a target="_blank" href="liste/liste_annee.php?annee=<?php if(isset($_POST['afficher'])) {echo $ann; } ?>" style="background-color: green";>Imprimer la liste</a></center>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
<?php
    include ('footer.php');
?>