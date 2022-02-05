<?php
include "connexion_base_de_données.php";
include "compte_rebours_misàjour.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info_produit</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/css/mdb.min.css" rel="stylesheet">
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
</body>
</html>