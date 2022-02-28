<?php 
session_start();
include "connexion_base_de_données.php"; // pour la connexion à la base de données
 include "compte_rebours_misàjour.php";   // pour spécifier le nombre de jour depuis la dernière mises à jour
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
?>
<!Doctype html>
<html lang="eng">
<head>

 <title>Natu'fi</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">


 <!-- My design-->
 <link rel="stylesheet"  type="text/css" href="../mon_site/CSS/Natu.css">
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

<body>
<?php include "header.php"?>
</br>
</br>

<section>
        <!--banner-->

          <div class="banner">
                  <div class="container-fluid w-100 h-75">
                        <div class="row w-100 h-100 ">
                          <div id="title-site" class="col-4 col-md-4 col-sm-4 col-lg-4 col-xl-4 h-100  align-self-center" data-aos="fade-right" data-aos-duration="3000">
                              <div class="circle"></div>
                              <div class="text-banner">
                                  <h1  class="card-title my-4 py-2   display-1" ><i><b>Natu'fi</b></i></h1>
                                  <h1 class=""><i><b>Des Fruits frais</b></i> </br> <i><b>sans sortir de chez vous</b></i></h1>
                              </div>
                              <a class="btn bg-success text-white" href="Administration.php">
                                <i class="fas fa-user px-md-2"></i>Connexion</a>
                                <a class="btn bg-primary text-white" href="Magasin.php">
                                <i class="fas fa-store-alt"></i> voir le Magasin</a>
                          </div>
                          <div class="col-8 col-md-8 col-sm-8 col-lg-8 col-xl-8 align-middle">
                              <div class="row w-100 h-100 ">
                                    <div class="col col-md col-sm col-lg col-xl align-self-end" data-aos="fade-left"data-aos-duration="1000">
                                      <img class="Ananas img-fluid " src="../mon_site/Image/ananas.png" />
                                    </div>
                                    <div class="col col-md col-sm col-lg col-xl align-self-center" data-aos="fade-left" data-aos-duration="2000">
                                      <img  class="Fraise img-fluid " src="../mon_site/Image/fraise.png" />
                                    </div>
                                    <div class="col col-md col-sm col-lg col-xl align-self-start" data-aos="fade-left" data-aos-duration="3000">
                                      <img  class="Avocat img-fluid " src="../mon_site/Image/avocat.png" />
                                    </div>
                              </div>        
                          </div>
                    </div>
                    </br>
                    <h2 class="h5 font-italic text-white text-center" data-aos="fade-up"
                            data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
                            <i class="fas fa-store-alt"></i>Le Marché autrement</h2>
                  </div>
          </div>

    <!--end banner-->
</section>

<section>
      <!--header grille-->
        <div class="container" data-aos="fade-up"
            data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
        <div class="conteneur_entete">
          <h1 class="font-italic font-weight-bold text-top text-sm-center text-xs-center text-md-center text-lg-center">
            <i>Nos produits disponibles</i></h1>
        </div>
        </div>
      <!--end header grille-->
</section>

<section>

          <!-- Grille des produits-->
        <div class="grille_image"  data-aos="fade-up"
          data-aos-easing="linear"
          data-aos-duration="1500"> 
            <div class="container">
              <div class="row">
              <?php
                $reponse=$connexion_produit->query("SELECT * FROM produits");
                while($données=$reponse->fetch()){
              ?>
                <div class="col-sm-6 col-xs-6 col-md-4 col-lg-3 py-2">
                      <div class="single_produit py-8 " >
                <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id=<?php echo($données["id"])?>">
                  <!--image produit--><img src="Image/<?php echo($données["image_produit"]) ;?>" class="card-img-top img-fluid" alt="<?php echo($données["nom_produit"]);?>"> </a>
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

</section>

<!--Slider Systéme-->

<div class="container" >
    <div class="row justify-content-md-center">
          <div class="col-md-8">
                  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                              <div class="carousel-item active">
                                    <div class="row">
                                        <?php
                                          $reponse=$connexion_produit->query("SELECT * FROM produits");
                                          while($données=$reponse->fetch()){
                                        ?>
                                          <div class="col-sm-6 col-xs-6 col-md-4 col-lg-3 py-2">
                                                <div class="single_produit py-8 " >
                                          <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id=<?php echo($données["id"])?>">
                                            <!--image produit--><img src="Image/<?php echo($données["image_produit"]) ;?>" class="card-img-top img-fluid" alt="<?php echo($données["nom_produit"]);?>"> </a>
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
                          

                                <div class="carousel-item">
                                            <div class="row">
                                                        <?php
                                                      $reponse=$connexion_produit->query("SELECT * FROM produits");
                                                      while($données=$reponse->fetch()){
                                                    ?>
                                                      <div class="col-sm-6 col-xs-6 col-md-4 col-lg-3 py-2">
                                                            <div class="single_produit py-8 " >
                                                      <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id=<?php echo($données["id"])?>">
                                                        <!--image produit--><img src="Image/<?php echo($données["image_produit"]) ;?>" class="card-img-top img-fluid" alt="<?php echo($données["nom_produit"]);?>"> </a>
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
          </div>
    </div>
</div>


<!--Slider Systéme-->

<section  class="sticky">
        <div class="container-fluid h-100 px-4">
          <div class="row h-100 gx-5">
            <!--animé tout ça et aprés commencé le mode de payement-->
              <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 p-3 " data-aos="fade-right">
                <img class=" img-Présentation img-fluid " src="../mon_site/Image/champs-mirtille.jpg"/>
              </div>
              <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 p-3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500" data-aos-offset="300">
                </br>
                </br>
                </br>
                  <h4 class="Présentation">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, laudantium. Facere harum tenetur ratione perferendis ab eos, doloremque totam? Iusto placeat fugiat nemo pariatur cum ducimus distinctio ipsa ratione culpa.</h4>
                  <a class="En-savoir-plus" href="#"><button class="btn bg-success text-white btn-sm">En savoir plus</button></a>
                                            </div>
              </div>
          </div>
        </div>
</section>

    








<section>
                <!-- Icone-->

          <div class="container" >
          <hr class="separateur" data-aos="fade-right" data-aos-duration="3000"/>
              <div class="row text-center">
                <div id="ajouter" class="col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="750">
                  <div class="icone_single text-center">
                  <i class="fas  fa-cart-plus fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>ajouter vos produits en toute simplicité </small>
                  </div>
              </div>
              <div id="Livraison" class="col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                  <div class="icone_single text-center">
                  <i class="fas fa-truck fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>Un service de livraison rapide et fiable</small>
                  </div>
              </div>
              <div id="Payement" class="col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="2250">
                  <div class="icone_single text-center">
                  <i class="fas fa-lock fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>Des modes de payant divers et sécurisés  </small>
                  </div>
              </div>
              <div id="Service" class="col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
                  <div class="icone_single text-center ">
                  <i class="fas fa-headset fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>Un service client disponible 24/24 et 7/7</small>
                  </div>
              </div>
            </div>
          </div>
        <!--end Icone-->
</section>

</br>


<?php include "footer.php"?>

<!--Jerry CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Jerry CDN-->

          <!--my javascript-->
    <script type="text/javascript" src="../mon_site/Natu_fi.js"></script>
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

<!--greenSock-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<!--greenSock-->

<!--ScrollMagic-->
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js"></script>
<!--ScrollMagic-->

<!--AOS js-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--AOS js-->

</body>
</html>
