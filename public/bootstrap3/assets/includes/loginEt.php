<?php
	include ('header.php');
?>		
             <div id="navbar" class="navbar-collapse collapse pull-right">

                  <ul class="nav navbar-nav">
						<li><a href="index.php">RETOUR</a></li>
                  </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->


	<div class="page-heading text-center">

		<div class="container zoomIn animated">
			
			<h1 class="page-title">INSTITUT D'IBANDA "<br />"IIB-BUKAVU" <span class="title-under"></span></h1><br><br>
			
				<div class="row">
					<div class="col-md-offset-3 col-md-6">
						<div class="panel panel-info">
							<div class="panel-heading">

								<form role="forme" method="post">
									<div class="input-group margin-bottom-20">
										<center><h4>CONNECTEZ VOUS ICI EN TANT QU'UN ELEVE ! <span class="title-under"></span></h4></center>
									</div>
										<input placeholder="Numero de telephone" name="numtel" class="form-control" type="text" required><br>
										<input placeholder="password" name="password" class="form-control" type="password" required><br>
										<input type="submit" name="connexion" class="btn btn-success" value="Me connecter" ><br><br>
								
								</form>
							</div>
						</div>
					</div>
				</div>
				<center><img src="assets/images/team/liv.jpg" class="thumbnail" align="center" alt=""></center>
		</div>
	</div>
<?php
	session_start();
	include ('assets/includes/db_connection.php');
?>
	
	<?php 
		if(isset($_POST['connexion'])){
			if(!empty($_POST['numtel'])&&!empty($_POST['password'])){
				$login=$_POST['numtel'];
				$password=$_POST['password'];
				
				include ('assets/includes/db_connection.php');
				
				$sqlUser=mysql_query("SELECT * FROM agent WHERE num_tel='".$login."' AND password='".$password."' ");
		
				if(mysql_num_rows($sqlUser)>0){
					while($ligne=mysql_fetch_array($sqlUser)){
						session_start();
						$_SESSION['login']=$ligne['numtel'];
						$_SESSION['password']=$ligne['password'];
						$_SESSION['nom']=$ligne['nom'];
						$_SESSION['prenom']=$ligne['prenom'];
						$_SESSION['service']=$ligne['id_service'];
						header('Location:service.php');
					}
				}else{
					echo"<script type='text/javascript'> alert('Le numéro entrer ou le mot de passe est incoreccte, veuillez réesayez')</script>";
					
				}
			}else{
				echo"<script type='text/javascript'> alert('Remplir les champs svp')</script>";
			}
		}
	?>
		</div>

	</div>
<?php
	include ('assets/includes/footer.php');
?>