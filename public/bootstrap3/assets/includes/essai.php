<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                 <thead>
                                    <tr class="center">
                                        <th>NOM &amp; POST-NOM</th>
                                        <th>DATE INSCRIPTION</th>
                                        <th>CLASSE</th>
                                          <!--  <th>BULLETIN</th>	-->				
                                        <th></th>
                                        <th></th>
                                    </tr>
                                  </thead>
                                    
                                 <tbody>
                                
                                <?php
                                    $connect=mysql_connect("localhost","root","");
                                    $db=mysql_select_db("ifb") ;
                                     
                                    $requete = "SELECT * FROM inscrire, eleve, classe WHERE inscrire.CodeEleve = eleve.CodeEleve AND
                                    inscrire.Classe = classe.CodeClasse AND inscrire.Etat = 'Invalide' ";
                                    $resultat=mysql_query($requete) or die(mysql_error());
                                     
                                    if (mysql_num_rows($resultat) > 0){

                                    while($ligne=mysql_fetch_array($resultat)){
                                 ?>
                                     
                                    <tr class="odd gradeX">
                                        <td><?php echo $result ['nom'];?> <?php echo $result ['postnom'];?></td>
                                        <td><?php echo $result ['DateInscription'];?></td>
                                        <td><?php echo $result ['Designation'];?> <?php echo $result ['Section'];?></td>
                                        <td><a href="valider.php?id=<?php echo $result ['idInscription'];?>" class="badge">Valider</a></td>
                                        <td><a href="supprimer.php?id=<?php echo $result ['idInscription'];?>" class="badge">Supprimer</a></td>
                                    </tr>
                                     
                                <?php
                                    }
                                }
                                ?>
                                     
                                 </tbody>
                                    
                                </table>