<?php 
session_start();
include "connexion_base_de_données.php"; // pour la connexion à la base de données
 include "compte_rebours_misàjour.php";   // pour spécifier le nombre de jour depuis la dernière mises à jour
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info_produit</title>

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
<link rel="stylesheet" href="Info_produit.css">
<!--My design -->


 <!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>

</head>
<body style="padding-top:60px;">

    <!-- Begin Header site -->
<?php include "header.php"?>
    <!-- End Header site-->

</br>
</br>
    <div class="container">
    <div class="row g-0">
    <?php
      $rep=$connexion_produit->prepare("SELECT id ,Nom_produit ,Description_produit,Image_produit ,Date_Enregistrement ,Prix FROM produits WHERE id=?");
      $rep->execute([$_GET['id']]);
      $post=$rep->fetch();
    ?>
    <div class="col-md-4">
      <img
        src="Image/<?php echo($post["Image_produit"]);?>"
        alt="..."
        class="img-fluid"
      />
    </div>
    <div class="col-md-8">
      <div class="card-body py-5">
        <h5 class="card-title"><strong><?php echo($post["Nom_produit"]);?></strong></h5>
        <p class="card-text">
            <?php echo($post["Description_produit"]);?>
        </p>
        <h4 style="position:relative; left:500px; width :200px;"><strong><?php echo($post["Prix"])?> FCFA</strong></h4>
        <p class="card-text">
          <small class="text-muted">
                      <?php
                                $date =Datetime::createFromFormat("Y-m-d H:i:s",$post["Date_Enregistrement"])->format("Y-m-d");// defini la date strval permet de convertir n'importe quelle type de variable en chaine
                                $aujourdhui = Date("Y-m-d");
                                $nbr_jours = Nbre_Jour($date,$aujourdhui);
                            
                                if($nbr_jours>0){
                                  echo" depuis"." ".$nbr_jours." "."jours"; //$nbr_jours vient de la fonction Nbre_jour dans compte_rebours_misàjour.php
                                }
                                else{
                                  echo"Maintenant"; //$nbr_jours vient de la fonction Nbre_jour dans compte_rebours_misàjour.php
                                }
                    ?>
          </small>
        </p>
      </div>
    </div>
  </div>
    </div>

      </br>


    <!--Begin Footer site-->
    <?php include "footer.php"?>
    <!--End Footer site-->

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

</body>
</html>