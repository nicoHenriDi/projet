<?php 
session_start();
include "connexion_base_de_données.php"; // pour la connexion à la base de données
 include "compte_rebours_misàjour.php";   // pour spécifier le nombre de jour depuis la dernière mises à jour
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magasin</title>

<!-- My design-->
 <link rel="stylesheet"  type="text/css" href="../mon_site/CSS/Magasin.css">
 <!--My design -->

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


 <!--AOS cdn css-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--AOS cdn css-->

 <!--Bootstrap Design-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Bootstrap Design-->

</head>
<body style="background: rgb(246, 244, 244);">

<?php include "header.php"?>

<br/>
<br/>
<div class="conteneur">
    <div id="conteneur-principale" class="container-fluid w-100 h-100" >
        <div class="row">
            <div class="conteneur-secondaire col-3 col-md-3">
                <h5 id="Famille" class="">Quelques Familles de fruit</h5>
                <!--Faire de nouveaux enregistrement dans la base de données avec un champs en plus famille de fruit -->
                    <ul>

                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Fruits à Noyau
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Fruits à Pépin
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Baies et Fruits
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Agrumes
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Fruits à Coque
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            Fruits Exotiques
                            </label>
                          </div>
                          
                    </ul>
            </div>

            <div class="conteneur-tertiaire col-9 col-md-9  h-100">

              <div class="row">
                  <div class="col-6 col-md-6 h-25">
                  </div>
                  <div class="col-6 col-md-6 text-end">
                                    <!--Barre de recherche-->
                                      <form class="d-flex input-group m-5 w-75">
                                        <input
                                          type="search"
                                          class="form-control rounded"
                                          placeholder="Search"
                                          aria-label="Search"
                                          aria-describedby="search-addon"
                                          id="search-user"
                                          value=""
                                        />
                                        <Button class="input-group-text border-0 btn-outline-success" id="search-addon">
                                          <i class="fas fa-search"></i>
                                        </Button>
                                        <div style="margin-top:20px">
                                              <div id="result-research"></div>
                                        </div>
                                      </form>
                                  <!--Barre de recherche-->
                  </div>
              </div>
                                 <!-- Grille des produits-->
                          <div class="grille_image"> 
                              <div class="container-fluid ">
                                <div class="row row-cols-3 g-2">
                                <?php
                                  $reponse=$connexion_produit->query("SELECT * FROM produits");
                                  while($données=$reponse->fetch()){
                                ?>
                                  <div class="col-sm-2 col-xs-2 col-md-2 col-lg-3 py-2 h-100 p-3 ">
                                        <div class="single_produit py-8 bg-white " >
                                                                        <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id=<?php echo($données["id"])?>">
                                                                          <!--image produit--><img src="Image/<?php echo($données["image_produit"]) ;?>" class="card-img-top img-fluid" alt="<?php echo($données["nom_produit"]);?>" > </a>
                                                    <div class="card-body">
                                                            
                                                        <!--Nom produit-->   <h4><i><strong><?php echo($données["nom_produit"]);?></strong></i></h4>
                                                          <!--prix produit-->  <h4><i><strong><?php echo(number_format($données["prix"],2)." "."FCFA");?></strong></i></h4>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                              <!--bouton ajout au panier-->
                                                              <div class="btn-group">
                                                              <a class="addPanier" href="ajout_panier.php?id=<?php echo($données["id"])?>"><button class="btn bg-success text-white btn-sm">Ajouter au panier</button></a>
                                                              </div>
                                                              <!--bouton ajout au panier-->
                                                            </div>
                                        </div>
                                        <!-- Begin Footer card-->
                                            <div class="card-footer text-muted text-center">
                                              <?php
                                                          $date =Datetime::createFromFormat("Y-m-d H:i:s",$données["Date_Enregistrement"])->format("Y-m-d");// defini la date strval permet de convertir n'importe quelle type de variable en chaine
                                                          $aujourdhui = Date("Y-m-d");
                                                          $nbr_jours = Nbre_Jour($date,$aujourdhui);
                                                if($nbr_jours>0){
                                                  echo" depuis"." ".$nbr_jours." "."jours"; //$nbr_jours vient de la fonction Nbre_jour dans compte_rebours_misàjour.php
                                                }
                                                else{
                                                  echo"Maintenant"; //$nbr_jours vient de la fonction Nbre_jour dans compte_rebours_misàjour.php
                                                }
                                                
                                              ?>
                                            </div>
                                        <!--End Footer card-->
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                              </div>
                          </div>

                          <!-- Grille des produits-->
            </div>
        </div>
    </div>
</div>

<?php include "footer.php" ?> <!--Footer-->

<!--Jerry CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Jerry CDN-->

          <!--my javascript-->
    <script type="text/javascript" src="../mon_site/js/Magasin.js"></script>
          <!--my javascript-->

<!--Bootstrap jquery-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--Bootstrap jquery-->

<!-- MDB jquery -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
<!-- MDB jquery -->


<!--AOS js-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--AOS js-->

<!--Ajax-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!--Ajax-->

</body>
</html>