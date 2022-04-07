
<?php
session_start();
include "../connexion_base_de_données.php";
include("../panier_class.php");//inclusion page panier_class
$panier = new panier($connexion_produit); //new panier objet



if(isset($_POST["Action"])){
    ?>
<?php

            //Suppression produit 
            if(isset($_POST["Supp"]) && !empty($_POST["Supp"])){
                $id_produit_supprimer = intval($_POST["Supp"]);
                $panier->del($id_produit_supprimer);
            }

            //Début récupération produit panier 
            $ids = array_keys($_SESSION["panier"]);// array_key me permet de récupérer les clés de la variable $_SESSION["panier"]
            $ids_implode = implode("','",$ids);
                $req=$connexion_produit->prepare("SELECT * FROM produits WHERE id IN ('$ids_implode')");
                $req->execute();
                $result = $req->fetchAll();
                $total_row = $req->rowCount();
            //Fin  récupération produit panier 
                        $Output = "";

                        if($total_row > 0){
                        
  
$Output = '
    
<!-- Début Tableau produit dans panier -->

        <!--Header panier-->
                    <div class="text-success">
                            <h1><i>Natu_fi</i></h1>
                    </div>
        <!--Header panier-->
                <table class="table table-bordered ">
            <thead >
                <tr>
                <th class="text-center" scope="col">
                    <b>selection</b>
                </th>
                <th class="text-center" scope="col"><strong>Produit</strong></th>
                <th  class="text-center" scope="col"><strong>Nom Produit</strong></th>
                <th class="text-center" scope="col"><strong>Prix</strong></th>
                <th class="text-center" scope="col"><strong>Quantité</strong></th>
                <th class="text-center" scope="col"><strong>Supprimer</strong></th>
                </tr>
            </thead>


        <tbody class=""> ' ;?>

                    <?php 
                        foreach($result as $produit_ajouter){ 
                            ?>
                    
                   <?php

                   $Output .=
                       '
            <tr>

                <th scope="row ">
                    <div class="form-check text-center align-middle ">
                        <!--Début check box-->
                            <input
                                style="position : relative ; top : 16px ; left:90px; width:22px;height: 22px;"
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="flexCheckDefault"
                            />
                        <!--Début check box-->
                    </div>
                </th>

                <!--image produit ajouter-->
                    <td>
                        <div class=" text-center align-middle" >
                                <img
                                    src="';
                                    if(!empty($ids)){
                                        $Output .= "Image/".$produit_ajouter["image_produit"];
                                    }
                                    else{
                                        $produit_ajouter["image_produit"]=" ";
                                       $Output .=$produit_ajouter["image_produit"];
                                        }
                                    ?>
                                    <?php
                                    ?>

                                    <?php
                                        $Output .= '
                                         ".
                                    alt="..."
                                    class="img-fluid"
                                    style="width : 60px ; height : 60px ;"
                                />
                        </div>
                    </td>
                 <!--image produit ajouter-->

                <!--Nom produit-->
                <td class="text-center align-middle"><b><h6>';
                ?>
                    <?php 
                    
                    if(!empty($ids)){
                        $Output .= $produit_ajouter["nom_produit"];
                    }
                    else{
                        $produit_ajouter["nom_produit"]=" ";
                            $Output .=$produit_ajouter["nom_produit"];
                        }
                    
                    ?>
                    <?php 
                        $Output .= '
                    </h6>
                </b></td>
                <!--Nom produit-->

                <!--Prix-->
                <td class="text-center align-middle"><b>
                    <h6>';
                    ?>
                        <?php
                        if(!empty($ids)){
                            $Output .= $produit_ajouter["prix"];
                        }
                        else{
                            $produit_ajouter["prix"]=" ";
                                $Output .= $produit_ajouter["prix"];
                            }
                        
                    ?>
                    <?php
                     $Output .= '
                </h6></b></td>
                <!--Prix-->
                
                <!--Quantité-->
                <td class="text-center align-middle">
                    <h6>';
                    ?>
                        <?php 
                            if(!empty($ids)){
                                $Output .= $_SESSION["panier"][$produit_ajouter["id"]];
                            }else{
                                $_SESSION["panier"][$produit_ajouter["id"]]=" " ;
                                $Output .= $_SESSION["panier"][$produit_ajouter["id"]];
                            }
                            // ajouter un colone prix en détail ou avec tva 
                        ?>
                        <?php
                           $Output .= '
                        </h6>
                </td>
                <!--Quantité-->

                <!--Bouton suppression-->
                <td class="text-center align-middle">
                        <button type="button" class="btn btn-danger btn-sm px-3 delete" value="
                        ';
                        ?>
                        <?php //envoi de id du produit à supprimer
                        if(!empty($ids)){
                            $Output .= $produit_ajouter["id"];
                         }else{
                                $produit_ajouter["id"]=" ";
                                $Output .=$produit_ajouter["id"];
                         }?> 
                         <?php $Output .= '
                         " Onclick="clique_bouton()">
                            <i class="fas fa-times"></i>
                        </button>
                </td>
                <!--Bouton suppression-->
            </tr>
        </tbody>
                   ';
                   ?>        
            <?php
                   }
            ?>

            <?php 
                $Output .='
        <tfoot class="">
            <tr>
                <th ></th>
                    <td class="text-center bg-danger text-white"colspan="2"><b><h6>Total</h6><b></td>
                    <td class=" text-center"colspan="2"><b>
                        <h6> ';?>
                        <?php
                                $Output .=number_format($panier->total(),2,","," ")." "."Fcfa";//récupére le total des produits et l\'affiche
                        ?>
                        <?php 
                         $Output .='
                        </h6>
                        <b></td>
                        <td class="text-center align-middle">
                            <a href="Formulaire/index.html">
                                <button type="button" class="btn btn-danger btn-sm px-3" value="">
                                    Commander
                                </button>
                            </a>
                        </td>
            </tr>
        </tfoot>
            </table>
<!-- Fin Tableau produit dans panier -->

';
?>

<?php
                        }else{
                            $Output = "<h1>Pas de produit dans le panier</h1>";
                        }
   
            echo($Output);
    }
   
?>


