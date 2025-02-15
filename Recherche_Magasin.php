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
                                        <div class="col-6 col-sm-4 col-xs-4 col-md-3 col-lg-3  h-100 p-2 m-0">
                                        <div class="single_produit bg-white m-0" >
                                                                        <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id='.$row["id"].'">
                                                                        <!--image produit--><img src="Image/'. $row["image_produit"].'" class="card-img-top img-fluid image-produit m-0" alt="'.$row["nom_produit"].'"/> </a>
                                                <div class="card-body ">
                                                        
                                                        <!--Nom produit-->   <h6 class="produit-name m-0"><i><strong>'.$row["nom_produit"].'</strong></i></h6>
                                                        <!--prix produit-->  <h6 class="produit-prix m-0"><i><strong>'.$row["prix"]." "."FCFA".'</strong></i></h6>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                        <!--bouton ajout au panier-->
                                                        <div class="btn-group">
                                                                '.'<button class="btn bg-success text-white btn-sm bouton_ajout" value="'.$row["id"].'" onclick="info()"><i class="fas fa-shopping-basket"></i></button>
                                                                
                                                                </div>
                                                                <!--bouton ajout au panier-->
                                                                <div class="rating text-success m-2">
                                                                        <i class="bi bi-heart" style="font-size:25px;"></i>
                                                              </div>
                                                        </div>
                                        </div>
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