<?php
session_start();
include "connexion_base_de_données.php";
include "compte_rebours_misàjour.php";
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet

//Début récupération produit panier 
$ids = array_keys($_SESSION["panier"]);// array_key me permet de récupérer les clés de la variable $_SESSION["panier"]
$ids_implode = implode("','",$ids);
    $rep=$connexion_produit->prepare("SELECT * FROM produits WHERE id IN ('$ids_implode')");
    $rep->execute();
//Fin  récupération produit panier 

//suppression produit du panier
    if(isset($_GET["del"])){
        $panier->del($_GET["del"]);
        header("location:panier.php");
    }

?>
<!Doctype html>
<html lang="eng">


<head>

 <title>Natu'fi</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">



 <!--MBD design-->

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
      rel="stylesheet"
    />
 <!--MBD design-->

 <!--Bootstrap Design-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Bootstrap Design-->
  
  <!-- My design-->
 <link rel="stylesheet" href="Natu_fi.css">
 <!--My design -->


 
<script type="text/javascript" src="body_site\mon_site\js\Natu_fi.js"></script>

</head>

<body>
    <?php include "header.php"?>

</br>
</br>

    

    <!-- Début Tableau produit dans panier -->

        <div class="tableau mx-lg-5" style="padding-top:80px;">

                <!--Header panier-->
                            <div class="text-success">
                                    <h1><i>Natu'fi</i></h1>
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


                <tbody class="">
                    <?php
                           while($produit_ajouter=$rep->fetch()){
                    ?>
                    <tr>

                        <th scope="row ">
                            <div class="form-check ">
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
                                            src="<?php 
                                            if(!empty($ids)){
                                                echo("Image/".$produit_ajouter["image_produit"]);
                                            }
                                            else{
                                                $produit_ajouter["image_produit"]=" ";
                                                echo($produit_ajouter["image_produit"]);
                                                } ?>"
                                            alt="..."
                                            class="img-fluid"
                                            style="width : 60px ; height : 60px ;"
                                        />
                                </div>
                            </td>
                         <!--image produit ajouter-->

                        <!--Nom produit-->
                        <td class="text-center align-middle"><b><h6>
                            <?php 
                            
                            if(!empty($ids)){
                                echo($produit_ajouter["nom_produit"]);
                            }
                            else{
                                $produit_ajouter["nom_produit"]=" ";
                                echo($produit_ajouter["nom_produit"]);
                                }
                            
                            ?></h6>
                        </b></td>
                        <!--Nom produit-->

                        <!--Prix-->
                        <td class="text-center align-middle"><b>
                            <h6>
                                <?php
                                if(!empty($ids)){
                                    echo($produit_ajouter["prix"]);
                                }
                                else{
                                    $produit_ajouter["prix"]=" ";
                                    echo($produit_ajouter["prix"]);
                                    }
                                
                            ?>
                        </h6></b></td>
                        <!--Prix-->
                        
                        <!--Quantité-->
                        <td class="text-center align-middle">
                            <h6>
                                <?php 
                                    if(!empty($ids)){
                                        echo($_SESSION["panier"][$produit_ajouter["id"]]);
                                    }else{
                                        $_SESSION["panier"][$produit_ajouter["id"]]=" " ;
                                        echo($_SESSION["panier"][$produit_ajouter["id"]]);
                                    }
                                    // ajoueter un colone prix en détail ou avec tva 
                                ?>
                                </h6>
                        </td>
                        <!--Quantité-->

                        <!--Bouton suppression-->
                        <td class="text-center align-middle">
                           <a href="panier.php?del=<?php //envoi de id du produit à supprimer
                           if(!empty($ids)){
                               echo($produit_ajouter["id"]);
                               }else{
                                   $produit_ajouter["id"]=" ";echo($produit_ajouter["id"]);
                                   }?>" class="del">
                                <button type="button" class="btn btn-danger btn-sm px-3">
                                <i class="fas fa-times"></i>
                                </button>
                           </a>
                        </td>
                        <!--Bouton suppression-->
                    </tr>
                </tbody>
                                   
                    <?php
                           }
                    ?>
                <tfoot class="">
                    <tr>
                        <th ></th>
                            <td class="text-center bg-danger text-white"colspan="2"><b><h6>Total</h6><b></td>
                            <td class=" text-center"colspan="2"><b>
                                <h6>
                                    <?php
                                        echo(number_format($panier->total(),2,',',' ')." "."Fcfa");
                                    ?>
                                </h6>
                                <b></td>
                    </tr>
                </tfoot>
                    </table>
                </div>
        <!-- Fin Tableau produit dans panier -->
        

</br>


<!--Bootstrap jquery-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--Bootstrap jquery-->

<!-- MDB jquery -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
<!-- MDB jquery -->

    <?php include "footer.php"?>
</body>

</html>