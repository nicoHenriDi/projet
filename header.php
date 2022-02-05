   <!-- entête du site -->

   


<!--Navbar -->
<nav class="mb-1 navbar fixed-top navbar-expand-lg navbar-dark bg-success " style="position: fixed ;padding-top:0px;">
  <a class="navbar-brand" href="Natu_fi_acceuil.php"><i>Natu'fi</i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-white" href="Natu_fi_acceuil.php">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Pricing</a>
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
        <li class='nav-item'>
        <a class='nav-link text-white' href='enregistrement_produit.php'>Enregistrement</a>
        </li>
    </ul>

    <!--Barre de recherche-->
        <form class="d-flex input-group w-50">
          <input
            type="search"
            class="form-control rounded"
            placeholder="Search"
            aria-label="Search"
            aria-describedby="search-addon"
          />
          <Button class="input-group-text border-0 bg-success" id="search-addon">
            <i class="fas fa-search"></i>
          </Button>
        </form>
    <!--Barre de recherche-->
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item text-white">
        <a class="nav-link waves-effect waves-light text-white">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link waves-effect waves-light text-white">
          <i class="fab fa-google-plus-g"></i>
        </a>
      </li>
      <li class="nav-item dropdown ">
        <a
            class="nav-link dropdown-toggle text-white"
            href="#"
            id="navbarDropdown"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
          <i class="fas fa-user"></i>
          </a>
        <div class="dropdown-menu dropdown-menu-end"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="Administration.php">Mon compte</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Déconnexion</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->