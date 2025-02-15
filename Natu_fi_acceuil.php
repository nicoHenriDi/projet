<?php 
include "connexion_base_de_données.php"; // pour la connexion à la base de données
 include "compte_rebours_misàjour.php";   // pour spécifier le nombre de jour depuis la dernière mises à jour
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
?>
<!Doctype html>
<html lang="en">
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


 <!--AOS cdn css-->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!--AOS cdn css-->

 <!--Bootstrap Design-->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!--Bootstrap Design-->


  <!--Toastr cdn css -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

 <!-- My design-->
 <link rel="stylesheet"  type="text/css" href="../mon_site/CSS/Natu.css">
 <!--My design -->



</head>

<body style="background: rgb(246, 244, 244);">

<?php include "header.php"?>

<section class="h-100 banner_section">
        <!--banner-->

          <div class="banner">
                  <div class="container-fluid w-100 h-100 p-0 m-0">
                        <div class="row w-100 h-100 m-0">
                          <div id="title-site" class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 h-75
                            align-self-center" data-aos="fade-right" data-aos-duration="3000">
                              <div class="row h-100">
                                
                                    <div class="col-12 col-md-12 col-sm-12 col-lg-12 col-xl-12 h-100">
                                          <div class="text-banner">
                                                    <h1  class="card-title my-4 py-2 display-1" data-aos="fade-right" data-aos-duration="3000"><i><b>Natu'fi</b></i></h1>
                                                    <h2 class="card-title-2 text-white" data-aos="fade-right" data-aos-duration="2000"><i><b>Des Fruits frais</b></i> <i><b>sans sortir de chez vous</b></i></h1>
                                                    <h5 class="card-title-3 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, quaerat quas iusto inventore omnis in nostrum vitae velit dolore. Libero ipsum dicta nihil provident nobis commodi dolorum possimus, sunt quasi.</h5>
                                                    <div class="bouton_class" data-aos="fade-right" data-aos-duration="1000">
                                                      <a class="bouton-item-1 btn bg-success text-white" href="Login/Login.php">
                                                      <i class="fas fa-user "></i>Connexion</a>
                                                      <a class="bouton-item-2 btn bg-primary text-white" href="Magasin.php">
                                                      <i class="fas fa-store-alt"></i> voir le Magasin</a>
                                                    </div>
                                          </div>
                                      </div>
                                
                              </div>
                          </div>
                          <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 d-flex  justify-content-center  m-0
                          " data-aos="fade-down" data-aos-easing="linear" data-aos="fade-left"data-aos-duration="1000">
                             <div class="row w-100 m-0 p-0">
                                    <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 align-self-end w-50 m-0" >
                                      <img class="Ananas img-fluid " src="../mon_site/Image/ananas.png" />
                                    </div>
                                   <div class="col-6 col-md-6 col-sm-6 col-lg-6 col-xl-6 align-self-center w-50 m-0" >
                                      <img  class="Fraise img-fluid " src="../mon_site/Image/fraise.png" />
                                    </div>
                                    <h1 class="sologant h5 font-italic text-white text-center" data-aos="fade-up"
                                  data-aos-anchor-placement="center-bottom" data-aos-duration="3000">
                                  <i class="fas fa-store-alt"></i>Le Marché autrement</h1>
                            </div>      
                        </div>
                    </div>
                  </div>
          </div>

    <!--end banner-->
</section>


<section class="h-100">
      <!--header grille-->
        <div class="container" >
            <h1 class="font-italic font-weight-bold text-center text-top text-sm-center text-xs-center text-md-center text-lg-center"
            data-aos="fade-right" data-aos-duration="2000">
              <i>Nos produits disponibles</i></h1>
              <hr class="separateur bg-success" data-aos="fade-left" data-aos-duration="2000"/>
              <div class="row w-100 text-center justify-content-center">
                  <div class="col-md-4 text-center d-flex justify-content-center p-2"
                  data-aos="fade-up"
            data-aos-anchor-placement="center-bottom" data-aos-duration="500">
                      <div class="card one-card w-50">
                          <div class="card-body card_content text-white">
                                <h5 class="card_title">Fruits Exotiques</h5>
                                <p class="card_description">
                                  Lorem ipsum dolor sit amet consectetur 
                                </p>
                          </div>
                      </div>
                      <div class="card-footer text-white w-50">
                          <div class="footer-card">
                            <p class="">Fruits Exotiques</p>
                          </div>
                      </div>
                  </div>
                  <div class="col-12 col-md-4 text-center d-flex justify-content-center p-2"
                  data-aos="fade-up"
            data-aos-anchor-placement="center-bottom" data-aos-duration="500">
                      <div class="card two-card w-50">
                          <div class="card-body card_content text-white">
                                <h5 class="card_title">Fruits à Pépin</h5>
                                <p class="card_description">
                                  Lorem ipsum dolor sit amet consectetur 
                                </p>
                          </div>
                      </div>
                      <div class="card-footer text-white w-50">
                        <div class="footer-card">
                          <p class="">Fruits à Pépin</p>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4  text-center d-flex justify-content-center p-2"
                  data-aos="fade-up"
            data-aos-anchor-placement="center-bottom" data-aos-duration="500">
                      <div class="card three-card w-50">
                          <div class="card-body card_content text-white">
                                <h5 class="card_title">Fruits à Noyau</h5>
                                <p class="card_description">
                                  Lorem ipsum dolor sit amet consectetur 
                                </p>
                          </div>
                      </div>
                      <div class="card-footer text-white w-50">
                        <div class="footer-card">
                          <p class="">Fruits à Noyau</p>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4  text-center d-flex justify-content-center p-2"
                  data-aos="fade-up"
            data-aos-anchor-placement="center-bottom" data-aos-duration="500">
                      <div class="card four-card w-50">
                          <div class="card-body card_content text-white">
                                <h5 class="card_title">Baies et Fruits</h5>
                                <p class="card_description">
                                  Lorem ipsum dolor sit amet consectetur 
                                </p>
                          </div>
                      </div>
                      <div class="card-footer text-white w-50">
                        <div class="footer-card">
                          <p class="">Baies et Fruits</p>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-4  text-center d-flex justify-content-center p-2"
                  data-aos="fade-up"
            data-aos-anchor-placement="center-bottom" data-aos-duration="500">
                      <div class="card five-card w-50">
                          <div class="card-body card_content text-white">
                                <h5 class="card_title">Agrumes</h5>
                                <p class="card_description">
                                  Lorem ipsum dolor sit amet consectetur 
                                </p>
                          </div>
                      </div>
                      <div class="card-footer text-white w-50">
                        <div class="footer-card">
                          <p class="">Agrumes</p>
                        </div>
                      </div>
                  </div>
              </div>
        </div>
      <!--end header grille-->
</section>



<section  class=" h-100">
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
</section>

    








<section class="h-100">
                <!-- Icone-->

<div class="container h-100" >
          <hr class="separateur" data-aos="fade-right" data-aos-duration="3000"/>
              <div class="row text-center">
                <div id="ajouter" class="col-3 col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="750">
                  <div class="icone_single text-center">
                  <i class="fas  fa-cart-plus fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>ajouter vos produits en toute simplicité </small>
                  </div>
              </div>
              <div id="Livraison" class="col-3 col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="1500">
                  <div class="icone_single text-center">
                  <i class="fas fa-truck fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>Un service de livraison rapide et fiable</small>
                  </div>
              </div>
              <div id="Payement" class="col-3 col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
     data-aos-anchor-placement="center-bottom" data-aos-duration="2250">
                  <div class="icone_single text-center">
                  <i class="fas fa-lock fa-3x"></i>
                  </div>
                  <div class="texte text-center">
                  <small>Des modes de payement divers et sécurisés  </small>
                  </div>
              </div>
              <div id="Service" class="col-3 col-sm-3 col-xs-3 col-md-3 col-lg-3" data-aos="fade-up"
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


          <!--Toastr cdn js-->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

          <!--my javascript-->
    <script type="text/javascript" src="../mon_site/js/Natu_fi.js"></script>
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


<!--AOS js scrolling animation-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!--AOS js-->

 


</body>
</html>
