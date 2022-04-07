<?php
session_start();
include "connexion_base_de_données.php";
include "compte_rebours_misàjour.php";
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
 <link rel="stylesheet" href="Natu_fi.css">
 <!--My design -->


 


</head>

<body>
    <?php include "header.php"?>

</br>
</br>

    

    <!-- Début Tableau produit dans panier -->

        <div class="tableau mx-lg-5 Tableau" style="padding-top:80px;">
                
                
        </div>

        
    <!-- Fin Tableau produit dans panier -->
        

</br>

<!--Jerry CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Jerry CDN-->

<script type="text/javascript" src="../mon_site/js/panier.js"></script>
          

<!--Bootstrap jquery-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!--Bootstrap jquery-->

<!-- MDB jquery -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
></script>
<!-- MDB jquery -->

    <?php include "footer.php"?>
</body>

</html>