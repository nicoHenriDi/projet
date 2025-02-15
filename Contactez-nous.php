<?php 
include "connexion_base_de_données.php"; // pour la connexion à la base de données
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
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
    <link rel="stylesheet" href="CSS/Contactez-nous.css">
    <!--My design -->
</head>
<body class="h-100">

<?php include "header.php" ?>
    <section class="h-100 m-5">
        <div class="container d-flex justify-content-center align-items-center h-100 m-5">
            <div class="row  w-100 h-100">
                    <div class="col-12 col-xs-6 col-xl-4 col-md-4 col-lg-4 mb-3 d-flex align-items-stretch h-100">
                        <div class="card ">
                            <div class=" conteneur-image m-1 w-auto d-flex justify-content-center">
                                    <div class="card-header m-0">    
                                        <div class="circle">
                                        <img src="../mon_site/Image/Moussa-2.jpeg" class="card-img-top" alt="Moussa Badiane" >
                                        </div>                           
                                    </div>
                            </div>
                            <div class="card-body d-flex justify-content-center flex-column m-0">
                                <br/>
                                <h4  class="card-text mb-2">Moussa Badiane</h4>
                                <p  class="card-text mb-2">Développeur Full-Stack</p>
                                <p  class="card-text mb-2">Ui Designer</p>
                                <h5  class="card-text mb-2">775631577</h5>
                                <h6 class="card-text mb-2">pipa.badiane@gmail.com</h6>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xs-6 col-xl-4 col-md-4 col-lg-4 mb-3 d-flex judtify-content-center ">
                        <div class="card">
                        <div class="conteneur-image m-1 w-auto d-flex justify-content-center">
                            <div class="card-header m-0">
                                <div class="circle">
                                <img src="../mon_site/Image/Mamadou_Ndao.jpeg" class="card-img-top" alt="Mamadou Ndao" >
                                </div>
                            </div>
                        </div>
                            <div class="card-body d-flex justify-content-center flex-column m-0">
                                <h4 class="card-text mb-2">Mamadou Ndao</h4>
                                <p class="card-text mb-2">Développeur Full-stack</p>
                                <h5 class="card-text mb-2">775938778</h5>
                                <h6 class="card-text mb-2">nmomojr@gmail.com</h6>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xs-4 col-xl-4 col-md-4 col-lg-4 mb-3 d-flex align-items-stretch">
                        <div class="card">
                                <div class="conteneur-image m-1 w-auto d-flex justify-content-center">
                                        <div class="card-header m-0">
                                                    <div class="circle">
                                                        <img src="../mon_site/Image/Nicolas_Dieng.jpg"  alt="Nicolas Henri Dieng" >
                                                    </div>
                                        </div>
                                </div>
                                    <div class="card-body d-flex justify-content-center flex-column m-0">
                                        <h4  class="card-text mb-2">Nicolas.H.Dieng</h4>
                                        <p  class="card-text mb-2">Développeur Full-Stack</p>
                                        <h5  class="card-text mb-2">772708050</h5>
                                        <h6  class="card-text mb-2">nh_di@hotmail.fr</h6>
                                        
                                    </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <section>
        
    </section>
    
<!--Jerry CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <!--Jerry CDN-->


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