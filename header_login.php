<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<!--Navbar -->
<nav class="mb-1 navbar fixed-top navbar-expand-lg navbar-dark shadow-5-strong px-4 header-class" style="position: fixed ;padding-top:0px;">
  <a class="navbar-brand" href="../Natu_fi_acceuil.php"><i>Natu'fi</i></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="../Natu_fi_acceuil.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="../Magasin.php"> <i class="fas fa-store-alt"></i> Magasin</a>
      </li>
      <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle text-white"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
            
          >
            Dropdown
          </a>
         <!-- Dropdown menu -->
         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
              <a class="dropdown-item" href="#">Action</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Another action</a>
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li>
          </ul>
          
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Contactez nous</a>
      </li>
    </ul>
    <ul class="navbar-nav ms-auto nav-flex-icons d-flex me-2">
      <!--twitter-->
      <li class="nav-item text-white ">
        <a class="nav-link waves-effect waves-light text-white">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <!--twitter-->

      <!--google-->
      <li class="nav-item">
        <a class="nav-link waves-effect waves-light text-white">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <!--google-->

      <!--panier-->
            <a class="nav-link waves-effect waves-light text-white " href="panier.php" >
            <i class="bi bi-cart3 " style="font-size: 16px;">
                <span class='badge rounded-pill badge-notification bg-danger compteur'>
                    <?php 
                            $compteur_panier = $panier->compteur();
                            if($compteur_panier != 0){
                              echo($compteur_panier);
                            }else{
                              echo("");
                            }
                    ?>
                </span>
                </i>
            </a>
      <!--panier-->
      <!--Régler le probléme du bouton ajout panier qui ajout plusieurs fois le produit aprés un click-->

      <!--user dropdown-->
      <li class="nav-item dropdown">
        <a
            class="nav-link dropdown-toggle text-white"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          <span class="m-1">
                <?php 
                  
                    if(isset($_SESSION["prenom"],$_SESSION["name"])){
                      echo(ucwords($_SESSION["prenom"])." ".ucwords($_SESSION["name"]));
                    }
                    else{
                      echo("");
                    }
                ?>
          </span>
          <i class="fas fa-user"></i>
          </a>
        <div class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="../Login/Login.php">Mon compte</a>
          <a class="dropdown-item" href="../Deconnexion.php">Déconnexion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->

<!--Jerry CDN-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Jerry CDN-->

<script type="text/javascript" src="../js/panier.js"></script>

