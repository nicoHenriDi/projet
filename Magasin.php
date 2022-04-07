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

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">


</head>
<body style="background: rgb(246, 244, 244);">

<section><?php include "header.php"?></section>

<section>
<br/>
<br/>
<div class="conteneur magasin">
    <div id="conteneur-principale" class="container-fluid w-100 h-100" >
        <div class="row">
            <div class="conteneur-secondaire col-3 col-md-3 ">

                <!-- Filtre par Famille-->
                    <div class="list-group">
                          <h5 id="Famille" class="text-center">Filtre par Familles de fruit</h5>
                              <?php
                                $sql ="SELECT DISTINCT Famille FROM produits ORDER BY Famille DESC ";
                                $req = $connexion_produit->prepare($sql);
                                $req->execute();

                                while($data = $req->fetch()){
                                  ?>
                                      <div class="form-check filtre">
                                      <input class="form-check-input filtre_checkbox" type="checkbox" value="<?= $data["Famille"]?>" id="checkbox_filtre">
                                      <label class="form-check-label" for="checkbox_filtre">
                                              <?= $data["Famille"]?>
                                      </label>
                                      </div>

                                <?php
                                }
                            ?>
                    </div>
                <!-- Filtre par Famille-->

                    <!--Price filtre-->
                          <div class="list-group">
                                      <h5 class="form-check-label text-center" > Prix</h5>
                                      <input type="hidden" id="hidden_minimum_prix" value="1000"/>
                                      <input type="hidden" id="hidden_maximum_prix" value="10000"/>
                                      <div id="prix_range"></div>
                                      <p id="interval_prix">1000 - 10000</p>
                                      
                          </div>
                    <!--Price filtre-->
                  
            </div>

            <div class="conteneur-tertiaire col-9 col-md-9  h-100">

              <div class="row">
                  <div class="col-6 col-md-6 h-25">
                  </div>
                  <div class="col-6 col-md-6 text-end recherche">
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
                                      </form>
                                  <!--Barre de recherche-->
                  </div>
              </div>

                                <!-- Affichage des produits Aprés filtrage -->

                                        <div class="row filtre_data">
                                                      <!--Affichage produit with ajax ne rien mettre ici-->
                                        </div>
                                        
                                </div>


                                <!--Affichage des produits Aprés filtrage-->


                                 <!-- Grille des produits-->
                    
                          
                          <!-- Grille des produits-->
            </div>
        </div>
    </div>
</div>

</section>

<section><?php include "footer.php" ?> <!--Footer--></section>



<!--Jquerry CDN-->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <!--Jquerry UI--><script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!--Jquerry CDN-->


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



</body>
</html>