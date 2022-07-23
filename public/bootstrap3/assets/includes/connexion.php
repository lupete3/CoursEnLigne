<title>Page de creation du compte</title>
<?php include('header.php'); ?><br><br><br><br><br>

			<!-- Les formulaires de creation d'un compte -->		
				
    <div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">INSTITUT D'IBANDA<br />"IIB-BUKAVU" <span class="title-under"></span></h1>
		</div>									
	</div>

    <center><h1 style="color:blue";>CREER VOTRE COMPTE !</h1></center>
	
	 <div class="row">
		<div class="col-md-offset-3 col-md-6">
            <div class="panel panel-info">
				<div class="panel-heading">
					<center><h4>IDENTITE<span class="title-under"></span></h4></center>
				</div>
                <div class="panel-body">
				
					<form role="form" method="post" action="">
						<input name="nom" class="form-control" type="text" placeholder="Enter votre Nom" required /><br />
						<input name="postnom" class="form-control" type="text" placeholder="Enter votre Post nom" required /><br />
						<input name="prenom" class="form-control" type="text" placeholder="Enter votre Post pré-nom" /><br />
                        <label style="color:black";>Sexe</label>
                        <select name="sexe" style="color:black"; required>
                            <option value="">Selectionner votre sexe</option>
                            <option value="Masculin">Masculin</option>
                            <option value="Feminin">Feminin</option>
                        </select><br>
						<input placeholder="Lieu de naissance" name="lieu" class="form-control" type="text" required /><br>
						<input placeholder="Date de naissance" name="date" class="form-control" type="text" required /><br>
						<input placeholder="Adresse actuelle" name="adresse" class="form-control" type="text" required /><br>
						<input placeholder="Territoire/ Village d'origine" name="origine" class="form-control" type="text" required /><br>
						<input placeholder="Nom du père" name="nom_p" class="form-control" type="text" required /><br>
						<input placeholder="Nom de la mère" name="nom_m" class="form-control" type="text" required /><br>
						<input placeholder="Ecole de provenance" name="prov" class="form-control" type="text" required /><br>
						<input placeholder="Numéro de téléphone" name="num" class="form-control" type="text" /><br>
						<input placeholder="Nouveau Mot de passe" name="mp" class="form-control" type="text" required /><br>
						<input placeholder="Confirmer votre mot de passe" name="cmp" class="form-control" type="text" required /><br>
						<input type="submit" class="btn btn-info" name="Enregistrer" value="Enregistrer données" />
						<input type="reset" class="btn btn-danger" value="Annuler" /><br>
					</form><br>
					
				</div>
			</div>
	   </div>
	 </div>

<?php
	if(isset($_POST['Enregistrer'])){
		
		$n=$_POST['nom'];
		$pn=$_POST['postnom'];
		$prn=$_POST['prenom'];
		$sexe=$_POST['sexe'];
		$lieu=$_POST['lieu'];
		$date=$_POST['date'];
		$ad=$_POST['adresse'];
		$orig=$_POST['origine'];
		$np=$_POST['nom_p'];
		$nm=$_POST['nom_m'];
		$prov=$_POST['prov'];
		$num=$_POST['num'];
		$pw=$_POST['mp'];

		include ('assets/includes/db_connection.php');
		
		$query=mysql_query ("INSERT INTO eleve (`CodeEleve`, `nom`, `postnom`, `prenom`, `sexe`, `lieu`, `date`, `adresse`, `origine`, `nom_p`, `nom_m`, `prov`, `num`, `password`)
							VALUES (NULL, '$n', '$pn', '$prn', '$sexe', '$lieu', '$date', '$ad', '$orig', '$np', '$nm', '$prov', '$num', '$pw')");

		$result=mysql_query($query);	
		echo'<script language="javascript">alert("Enregistrement effectué avec succès")</script>';
		  
	}

	header('Location:connexion.php');
    include ('footer.php');
?>