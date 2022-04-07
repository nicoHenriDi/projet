<?php
if(isset($_POST["valeur_compteur_panier"])){
    echo('
        <!--panier-->
            <a class="nav-link waves-effect waves-light text-white" href="panier.php" >
                <i class="fas fa-shopping-basket"><span class="badge rounded-pill badge-notification bg-danger compteur" >'.$_POST["valeur_compteur_panier"].'</span></i>
            </a>
      <!--panier-->"
      ');
}
?>