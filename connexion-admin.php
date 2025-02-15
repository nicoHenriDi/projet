<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion admin</title>
    <link rel="stylesheet" href="../mon_site/connexion-admin.css">

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
</head>
<body>

        <div class="container-fluid w100 h-100 ">
                    <div class="row">
                        <div class="col-6 bg-success">
                            <img src="../mon_site/Image/fraise.png" class="img-fluid"alt="">
                        </div>
                        <div class="col-6">
                                <div class="row">

                                                 <!--registre de connexion-->
                                <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 px-5 ">
                                                    <!-- Material form login -->
                                                    <div class="card w-100 mx-auto" style="position:relative;margin-bottom:15px;">


                                                                <h5 class="card-header bg-success text-white text-center py-4 mx-lg-5">
                                                                <strong>Connectez-vous</strong>
                                                                </h5>

                                                                <!--Card content-->
                                                                <div class="card-body mx-lg-5 px-lg-5 pt-0">

                                                                <!-- Form -->
                                                                <form class="text-center" style="color: #757575;" method ="POST" action="connexion.php">

                                                                <p class="validation-01">
                                                                    <?php
                                                                        if(isset($_SESSION["msgErreur"])){
                                                                            echo($_SESSION["msgErreur"]);
                                                                            unset($_SESSION["msgErreur"]);
                                                                        }
                                                                    ?>
                                                                    </p>
                                                                    <!-- Email -->
                                                                    <div class="md-form">
                                                                    <input type="email" name="Email" class="form-control" required>
                                                                    <label for="Email">E-mail</label>
                                                                
                                                                    </div>

                                                                    <!-- Password -->
                                                                    <div class="md-form">
                                                                    <input type="password" name="password" class="form-control" required>
                                                                    <label for="password">Password</label>
                                                                    </div>

                                                                <div class="d-flex justify-content-around">
                                                                    <div>
                                                                        <!-- Remember me -->
                                                                        <div class="form-check">
                                                                        <input type="checkbox" class="form-check-input" id="materialLoginFormRemember">
                                                                        <label class="form-check-label" for="materialLoginFormRemember">Remember me</label>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <!-- Forgot password -->
                                                                        <a href="">Forgot password?</a>
                                                                    </div>
                                                                    </div>

                                                                    <!-- Sign in button -->
                                                                    <button class="btn btn-outline-success btn-rounded btn-block my-4 waves-effect z-depth-0" name="submit" type="submit">Se connecter</button>

                                                                    <!-- Register -->
                                                                    <p>Not a member?
                                                                    <a href="Inscription.php">Inscription</a>
                                                                    </p>

                                                                    <!-- Social login -->
                                                                    <p>or sign in with:</p>
                                                                    <a type="button" class="btn-floating btn-fb btn-sm">
                                                                    <i class="fab fa-facebook-f"></i>
                                                                    </a>
                                                                    <a type="button" class="btn-floating btn-tw btn-sm">
                                                                    <i class="fab fa-twitter"></i>
                                                                    </a>
                                                                    <a type="button" class="btn-floating btn-li btn-sm">
                                                                    <i class="fab fa-linkedin-in"></i>
                                                                    </a>
                                                                    <a type="button" class="btn-floating btn-git btn-sm">
                                                                    <i class="fab fa-github"></i>
                                                                    </a>

                                                                </form>
                                                                <!-- Form -->

                                                                </div>

                                                    </div>
                                                    <!-- Material form login -->
                                </div>
                                <!--registre de connexion-->
                                
                                </div>
                        </div>
                    </div>
        </div>

           
</body>
</html>