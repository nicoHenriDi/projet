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
 <link rel="stylesheet" href="../mon_site/Natu_fi.css">
 <!--My design -->




</head>

<body>
<?php include "header.php"?>

<!--banner-->
<!-- Jumbotron -->
<div class="container-fluid">
      <div class="card  card-fluid ">
        <div class="text-white text-center rgba-stylish-strong py-5 px-4">
          <div class="py-5">

            <!-- Content -->
            <h5 class="h5 green-text font-italic text-success"><i class="fas fa-store-alt"></i>Le Marché autrement</h5>
            <h1 class="card-title my-4 py-2 font-italic">Natu'fi</h1>
            <p class="mb-4 pb-2 px-md-5 mx-md-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur obcaecati vero aliquid libero doloribus ad, unde tempora maiores, ullam, modi qui quidem minima debitis perferendis vitae cumque et quo impedit.</p>
            <a class="btn bg-success text-white" href="Administration.php"><i class="fas fa-user px-md-2"></i>Connexion</a>

          </div>
        </div>
      </div>
</div>
<!-- Jumbotron -->
<!--end banner-->

    <div class="container-fluid">
      <div class="row">
        <!--animé tout ça et aprés commencé le mode de payement-->
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 text-center align-middle">
            <img src="../mon_site/Image/arbre_without_backgound.png" style="width : 300px ; height : 300px;"/>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6 text-center align-middle">
              <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, laudantium. Facere harum tenetur ratione perferendis ab eos, doloremque totam? Iusto placeat fugiat nemo pariatur cum ducimus distinctio ipsa ratione culpa.</h4>
          </div>
      </div>
    </div>

<!--header grille-->
  <div class="container">
  <div class="conteneur_entete">
    <h1 class="font-italic font-weight-bold text-top text-sm-center text-xs-center text-md-center text-lg-center">
      <i>Nos produits disponibles</i></h1>
  </div>
  </div>
<!--end header grille-->

   

<!-- Grille des produits-->
<div class="grille_image"> 
    <div class="container">
      <div class="row">
      <?php
        $reponse=$connexion_produit->query("SELECT * FROM produits");
        while($données=$reponse->fetch()){
      ?>
        <div class="col-sm-6 col-xs-6 col-md-4 col-lg-3 py-2">
              <div class="single_produit py-8 " >
         <!--lien vers detail produit--> <a class="ripple" href="Info_produit.php?id=<?php echo($données["id"])?>">
          <!--image produit--><img src="Image/<?php echo($données["image_produit"]) ;?>" class="card-img-top" alt="cerise"> </a>
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


<!--porte folio du site -->
          
<!--porte folio du site -->


<!-- Icone-->

  <div class="container">
  <hr class="separateur"/>
      <div class="row">
        <div id="ajouter" class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
          <div class="icone_single text-center">
          <i class="fas  fa-cart-plus fa-3x"></i>
          </div>
          <div class="texte text-center">
          <small>ajouter vos produits en toute simplicité </small>
          </div>
      </div>
      <div id="Livraison" class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
          <div class="icone_single text-center">
          <i class="fas fa-truck fa-3x"></i>
          </div>
          <div class="texte text-center">
          <small>Un service de livraison rapide et fiable</small>
          </div>
      </div>
      <div id="Payement" class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
          <div class="icone_single text-center">
          <i class="fas fa-lock fa-3x"></i>
          </div>
          <div class="texte text-center">
          <small>Des modes de payant divers et sécurisés  </small>
          </div>
      </div>
      <div id="Service" class="col-sm-3 col-xs-3 col-md-3 col-lg-3">
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

<!--Bootstrap jquery-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--Bootstrap jquery-->

<!-- MDB jquery -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
<!-- MDB jquery -->

<!--Jerry CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Jerry CDN-->

          <!--my javascript-->
    <script src="../mon_site/Natu_fi.js"></script>
          <!--my javascript-->
</body>
</html>
