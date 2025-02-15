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


 <!--Bootstrap Design-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Bootstrap Design-->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

 <!--Toastr cdn css -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">



</head>
<body style="background: rgb(246, 244, 244);">

<?php include "header.php"?>

<section>
<br/>
<br/>
<div class="conteneur-magasin m-0">
    <div id="conteneur-principale" class="container-fluid w-100 h-100" >
        <div class="row w-100 m-0">
            <div class="conteneur-secondaire col-4 col-sm-3 col-xs-3 col-md-3 col-lg-3 m-0">
                <br/>
                <!--Price filtre-->
                  <div class="list-group m-1 bg-white ">
                    <div class="prix w-100 text-white ">
                        <h5 class="form-check-label text-center prix-filter" > Prix</h5>
                    </div>
                            <div class="selecteur p-2 m-2">
                                <input type="hidden" id="hidden_minimum_prix" value="1000"/>
                                <input type="hidden" id="hidden_maximum_prix" value="10000"/>
                                <div id="prix_range"></div>
                                <p id="interval_prix">1000 - 10000</p>
                            </div>
                                      
                  </div>
                <!--Price filtre-->

                <!-- Filtre par Famille-->
                    <div class="list-group bg-white">
                      <div class="Famille w-100 text-white">
                        <h5 id="Famille" class="famille-filter text-center">Filtre par Familles de fruit</h5>
                      </div>
                      <div class="p-2 m-2">
                          <?php
                                    $sql ="SELECT DISTINCT Famille FROM produits ORDER BY Famille DESC ";
                                    $req = $connexion_produit->prepare($sql);
                                    $req->execute();
                                    while($data = $req->fetch()){
                                      ?>
                                          <div class="form-check filtre">
                                          <input class="form-check-input filtre_checkbox" type="checkbox" value="<?= $data["Famille"]?>" id="checkbox_filtre">
                                          <label class="form-check-label famille-items-filter" for="checkbox_filtre">
                                                  <?= $data["Famille"]?>
                                          </label>
                                          </div>

                                    <?php
                                    }
                                ?>
                      </div>
                            
                    </div>
                <!-- Filtre par Famille-->
            </div>

            <div class="conteneur-tertiaire col-8  col-sm-9 col-xs-9 col-md-9 col-lg-9 h-100 bg-white m-0">

              <div class="row m-0 container-">
                  <div class="col-6 col-md-6 h-25">
                  </div>
                  <div class="col-12 col-sm-12 col-xs-9 col-md-9 col-lg-9 text-end recherche p-3">
                                    <!--Barre de recherche-->
                                      <form class="d-flex input-group  w-75">
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

                                        <div class="row filtre_data w-100">
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

<?php include "footer.php" ?> <!--Footer-->



<script>
  $(function(){
    $(".header-class").css("background","linear-gradient(to bottom, rgba(250, 114, 114, 0.8), rgba(67, 67, 251, 0.6))");
    $(".Famille").css("background","linear-gradient(to bottom, rgba(250, 114, 114, 0.8), rgba(67, 67, 251, 0.6))");
    $(".prix").css("background","linear-gradient(to bottom, rgba(250, 114, 114, 0.8), rgba(67, 67, 251, 0.6))");


    //Bouton search
    $("#search-user").keyup(function (e) { 
                    var entrée_recherche_magasin = $(this).val();
                        $.ajax({
                            type:"POST",
                            url: "Research_Magasin.php",
                            data:{entrée_recherche_magasin:entrée_recherche_magasin},
                            success: function (response) {
                                    $(".filtre_data").html(response);
                            }
                        });
                        //For the next step we will must implement the formulary 
                        //for edit button
                });
    //Bouton search
  });
</script>


<!--Jquerry CDN-->
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
      <!--Jquerry UI--><script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<!--Jquerry CDN-->

<!--Toastr cdn js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


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



</body>
</html>