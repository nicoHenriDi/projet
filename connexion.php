
 <?php 
  include "connexion_base_de_données.php";
?>




<?php 
session_start();
$_SESSION["msgSuccés"]="Vous êtes bien connecter au compte de";
$_SESSION["msgErreur"]="Une erreur c'est produite le mot de passe ou l'email est incorrect"; 

 $reponse=$connexion_compte_client->query("SELECT Email,Password_client FROM client");
 while($user_db=$reponse->fetch()){
        $Email=$user_db["Email"];
        $password=$user_db["Password_client"];
            if( $_POST["Email"]==$Email && $_POST["password"]==$password){
                header("location:Natu_fi_acceuil.php");
                $_SESSION["Email"]= $Email;
                $_SESSION["password"]= $password;
                die;
            }
            else{
            header("location:Administration.php");
            exit;
            }
}
?>