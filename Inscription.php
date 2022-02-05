
<!Doctype html>
<html lang="eng">


<head>

 <title>Natu'fi</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
<!-- My design-->
 <link rel="stylesheet" href="Inscription.css">
 <!--My design -->


 <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>

<script type="text/javascript" src="body_site\mon_site\js\Natu_fi.js"></script>

</head>

<body>
    <?php include "header.php"?>
    


<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 px-5 ">

                <!-- Card conteneur -->
                <div class="card w-50 mx-auto" style="position:relative; margin-top:60px;">


                        <!-- Card_header -->
                        <h5 class="card-header success-color white-text text-center py-4 mx-lg-5">
                            <strong>Inscription</strong>
                        </h5>
                        <!-- Card_header -->



                            <!--Card content-->
                            <div class="card-body ">

                                    <!--Début Formulaire d'inscription -->
                                        <div class="formulaire">
                                                <form method="POST" action="Vérification_enr.php" enctype="multipart/form-data">
                                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                                <div class="row mb-4">
                                                    <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text"  class="form-control" name="Prénom_client" />
                                                        <label class="form-label" for="Prénom_client">Prénom</label>
                                                    </div>
                                                    </div>
                                                    <div class="col">
                                                    <div class="form-outline">
                                                        <input type="text"  class="form-control" name="Nom_client"/>
                                                        <label class="form-label" for="Nom_client">Nom</label>
                                                    </div>
                                                    </div>
                                                </div>

                                                <!-- Email input -->
                                                <div class="form-outline mb-4">
                                                    <input type="email"  class="form-control" name="Email_client"/>
                                                    <label class="form-label" for="Email_client">Email</label>
                                                </div>

                                                <!-- Password input -->
                                                <div class="form-outline mb-4">
                                                    <input type="password"  class="form-control"  name="Password_client"/>
                                                    <label class="form-label" for="Password_client">Mot de passe</label>
                                                </div>

                                                <!-- Submit button -->
                                                <button type="submit" class="btn btn-success btn-block mb-4" name="submit_inscript">Inscription</button>

                                                <!-- Register buttons -->
                                                <div class="text-center">
                                                    <p>Ou Connectez Vous avec :</p>
                                                    <button type="button" class="btn btn-success btn-floating mx-1">
                                                    <i class="fab fa-facebook-f"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-success btn-floating mx-1">
                                                    <i class="fab fa-google"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-success btn-floating mx-1">
                                                    <i class="fab fa-twitter"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-success btn-floating mx-1">
                                                    <i class="fab fa-github"></i>
                                                    </button>
                                                </div>
                            
                                                </form>
                                            </div>
                                    <!--Fin Formulaire d'inscription -->
                                </div>
                </div>
                        
                <!-- card conteneur -->

</div>
          <!-- Icone-->

  <div class="container">
  <hr class="separateur"/>
    <div class="row">
      <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
        <div class="icone_single text-center">
        <i class="fas  fa-cart-plus fa-3x"></i>
        </div>
        <div class="texte text-center">
        <small>ajouter vos produits en toute simplicité </small>
        </div>
      </div>
      <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
        <div class="icone_single text-center">
        <i class="fas fa-truck fa-3x"></i>
        </div>
        <div class="texte text-center">
        <small>Un service de livraison rapide et fiable</small>
        </div>
      </div>
      <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
        <div class="icone_single text-center">
        <i class="fas fa-lock fa-3x"></i>
        </div>
        <div class="texte text-center">
        <small>Des modes de payant divers et sécurisés  </small>
        </div>
      </div>
      <div class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
        <div class="icone_single text-center">
        <i class="fas fa-headset fa-3x"></i>
        </div>
        <div class="texte text-center">
        <small>Un service client disponible 24/24 et 7/7</small>
        </div>
      </div>
    </div>
  </div>
<!--end Icone-->



    <?php include "footer.php"?>
</body>

</html>