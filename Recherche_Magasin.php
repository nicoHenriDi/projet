<?php
        include "connexion_base_de_données.php"; // pour la connexion à la base de données
        include "compte_rebours_misàjour.php";   // pour spécifier le nombre de jour depuis la dernière mises à jour

        if(isset($_POST["action"])){

                $sql = "SELECT * FROM produits WHERE produit_status= '1'";
                

                if(isset($_POST["minimum_prix"],$_POST["maximum_prix"]) && !empty($_POST["minimum_prix"])
                 && !empty($_POST["maximum_prix"]))
                {
                  $sql .= " AND  prix BETWEEN '".$_POST["minimum_prix"]."'AND'".$_POST["maximum_prix"]."' ";
                }
                

                if(isset($_POST["filtre_checkbox"]))
                {
                        $filtre_checkbox = implode("','",$_POST["filtre_checkbox"]);
                        $sql .=" AND Famille IN('".$filtre_checkbox."')";
                }
                $req = $connexion_produit->prepare($sql) OR die(print_r($connexion->errorInfo())); 
                $req->execute();
                $result = $req->fetchAll();
                $total_row = $req->rowCount();

                if($total_row > 0)
                {

                        $output="";

                        foreach($result as $row){

                                $output .='
                                        <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3 py-2 h-100 p-3 ">
                                        <div class="single_produit py-8 bg-white " >
                                                                        <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id='.$row["id"].'">
                                                                        <!--image produit--><img src="Image/'. $row["image_produit"].'" class="card-img-top img-fluid" alt="'.$row["nom_produit"].'"/> </a>
                                                <div class="card-body">
                                                        
                                                        <!--Nom produit-->   <h4><i><strong>'.$row["nom_produit"].'</strong></i></h4>
                                                        <!--prix produit-->  <h4><i><strong>'.number_format($row["prix"],2)." "."FCFA".'</strong></i></h4>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                        <!--bouton ajout au panier-->
                                                        <div class="btn-group">
                                                                '.'<button class="btn bg-success text-white btn-sm bouton_ajout" value="'.$row["id"].'">Ajouter au panier</button>
                                                                </div>
                                                                <!--bouton ajout au panier-->
                                                        </div>
                                        </div>
                                        <!-- Begin Footer card-->
                                        <div class="card-footer text-muted text-center">
                                        </div>
                                <!--End Footer card-->
                                </div>
                            </div> 
                            ';
                        }
                }
                else
                {
                        $output ="<h1>Pas de fruit trouver pour cette recherche</h1>";
                }
                echo $output;
        
        }

?>



<!--my javascript-->
<script type="text/javascript" src="../mon_site/js/Recherche_Magasin.js"></script>
<!--my javascript-->