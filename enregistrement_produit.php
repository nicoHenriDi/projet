<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrement produit</title>
    <?php include "connexion_base_de_données.php" ?>

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
 <link rel="stylesheet" href="Enregistrement_produit.css">
 <!--My design -->


</head>
<body>

<?php include "header.php"?>

    <!-- Card -->
<div class="container col-md-8">
<div class="card  mx-xl-5 py-5 ">

<!-- begin Card body -->
<div class="card-body">

  <!-- Default form subscription -->
  <form method="POST" action="enregistrement_produit.php" enctype="multipart/form-data">
    <p class="h3 text-center py-4">Enregistrement</p>

    <!-- Default input name produit -->
    <label for="Nom_produit" class="grey-text font-weight-light">Nom du produit</label>
    <input type="text" name="Nom_produit" class="form-control border border-success">

    <br>


    <!-- Default input description produit -->
    <div class="form-group green-border-focus">
    <label for="description">description</label>
    <textarea class="form-control border border-success" name="description" rows="3"></textarea>
    </div>

    <label for="code_produit" class="grey-text font-weight-light">code produit</label>
    <input type="text" name="code_produit" class="form-control border border-success">

    <label for="prix" class="grey-text font-weight-light">prix</label>
    <input type="text" name="prix" class="form-control border  border-success">

    <label for="produit_image" class="grey-text font-weight-light">Choix Image</label>
    <input type="file" name="produit_image" class="form-control-file border border-success">

    <div class="text-center py-4 mt-3">
      <button class="btn btn-outline-green" type="submit" name="submit_ajout">Envoyer</button>
    </div>
  </form>
  <!-- Default form subscription -->

  </div>
<!-- end  Card body -->
  </div>
</div>
<!-- Card -->
  <?php
    //insertion base de donnée
    if(isset($_POST["submit_ajout"])){
      $file="";
      $file=$_FILES["produit_image"]["name"];
      $upload="Image/".$file;
      move_uploaded_file($_FILES["produit_image"]["tmp_name"],$upload);
      
      $insertion=$connexion_produit->prepare("INSERT INTO produits(nom_produit,description_produit,prix,code_produit,image_produit) VALUES(?,?,?,?,?)") OR die(print_r($connexion->errorInfo()));
      $insertion->execute(array($_POST["Nom_produit"],$_POST["description"],$_POST["prix"],$_POST["code_produit"],$file));
    }
    //Fin insertion base de donnée
  ?>
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
  </body>

</html>

