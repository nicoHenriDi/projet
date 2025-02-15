<?php 
session_start();
include "connexion_base_de_données.php";
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
?>
<!Doctype html>
<html lang="eng">


<head>

 <title>Natu'fi</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
 <link rel="stylesheet" href="Inscription.css">
 <!--My design -->


</head>

<body>
    <?php include "header.php" ?>
    

<section class="p-5 h-100">
  <div class="container-fluid w-100 h-100 p-3">
    <div class="row justify-content-center h-100 p-3">
    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-6 d-flex ">

<!-- Card conteneur -->
<div class="card w-100">


        <!-- Card_header -->
        <div class="card-header bg-white m-0">
            <h5 class="text-center ">
                <strong>Inscription</strong>
            </h5>
            <?php
                  if(isset($_SESSION["Inscription-Error"]) AND !empty($_SESSION["Inscription-Error"])){
            ?>
                    <p class="text-muted text-center m-1"><?=$_SESSION["Inscription-Error"]?></p>
              <?php
                  }
                  else{
                    echo("<p class='text-muted text-center m-1'>Entrez vos informations</p>");
                  }
            ?>
        </div>
        <!-- Card_header -->



            <!--Card content-->
            <div class="card-body m-0">

                    <!--Début Formulaire d'inscription -->
                                <form method="POST" action="connexion_user.php">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col">
                                    <div class="md-form p-1 m-0">
                                        <label class="form-label m-0 " for="PrénomClient">Prénom</label>
                                        <input type="text"  class="form-control" name="PrénomClient" />
                                    </div>
                                    </div>
                                    <div class="col">
                                    <div class="md-form p-1 m-0">
                                        <label class="form-label m-0" for="NomClient">Nom</label>
                                        <input type="text"  class="form-control" name="NomClient"/>
                                    </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="md-form p-1 m-0">
                                    <label class="form-label m-0" for="EmailClient">Email</label>
                                    <input type="email"  class="form-control" name="EmailClient" required/>
                                </div>

                                <!-- Password input -->
                                <div class="md-form p-1 m-0">
                                    <label class="form-label m-0" for="PasswordClient">Mot de passe</label>
                                    <input type="password"  class="form-control PasswordClient"  name="PasswordClient"  required/>
                                </div>

                                 <!-- New Password input -->
                                 <div class="md-form p-1 m-0">
                                    <label class="form-label m-0" for="NewPasswordClient">Nouveau Mot de passe</label>
                                    <input type="password"  class="form-control NewPasswordClient"  name="NewPasswordClient" required/>
                                </div>

                                <!--Affichage message confirmation-->
                                <div class="Confirm"><span class='error text-danger m-0'></span></div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-ultra-voilet btn-block m-1 waves-effect z-depth-0" name="submit_inscript">Inscription</button>

                                <!-- Register buttons -->
                                    
                                    <p class="text-center m-1">J'ai déja un compte
                                                      <a href="Login/Login.php">Connexion</a>
                                                    </p>

                                      <p class="text-center m-1">Ou Connectez Vous avec :</p>
                                    
                                    <div class="col-12 col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center m-0">
                                                        <a type="button" class="btn-floating btn-fb btn-lg m-0">
                                                          <i class="fab fa-facebook-f m-0"></i>
                                                        </a>
                                                        <a type="button" class="btn-floating btn-tw btn-lg m-0">
                                                          <i class="fab fa-twitter m-0"></i>
                                                        </a>
                                                        <a type="button" class="btn-floating btn-li btn-lg m-0">
                                                          <i class="fab fa-linkedin-in m-0"></i>
                                                        </a>
                                                        <a type="button" class="btn-floating btn-git btn-lg m-0">
                                                          <i class="fab fa-github m-0"></i>
                                                        </a>
                                        </div>
            
                                </form>
                    <!--Fin Formulaire d'inscription -->
                </div>
</div>
        
<!-- card conteneur -->

</div>
    </div>
  </div>
</section>


      <!--Jerry CDN-->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <!--Jerry CDN-->

      <!--My Js-->
                <script src="../mon_site/js/Inscription.js"></script>
      <!--My Js-->

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