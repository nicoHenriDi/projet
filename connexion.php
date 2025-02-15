
 <?php 
  include "connexion_base_de_données.php";
?>




<?php 
session_start();

$email_input=htmlspecialchars($_POST["Email"]);
$password_input = htmlspecialchars($_POST["password"]);

$reqemail =$connexion_compte_client->prepare("SELECT * FROM client WHERE Email=?");
$reqemail -> execute(array($email_input));
$emailexiste = $reqemail -> rowCount();
if ($emailexiste == 0) {
    header('location:Login.php');
    $_SESSION["msgErreur"]="Cette Email n'existe pas rentrer un existant ou inscrivez vous";
}else{

    $reponse=$connexion_compte_client->query("SELECT * FROM client");
    while($user_db=$reponse->fetch()){
            $Email=$user_db["Email"];
            $password=$user_db["passwordClient"];
                if( $email_input==$Email && password_verify($password_input,$password)==true){
                    if(!isset($_SESSION["connexion-formulaire"])){
                        header("location:Natu_fi_acceuil.php");
                    }
                    else{
                        header("location:Formulaire/index.html");
                        unset($_SESSION["connexion-formulaire"]);
                    }
                    $_SESSION["msgSuccés"]="Vous êtes bien connecter au compte de";
                    $_SESSION["Email"]=$Email;
                    $_SESSION["password"]=$password;
                    $_SESSION["name"]=$user_db["nomClient"];
                    $_SESSION["prenom"]=$user_db["prenomClient"];
                    die;
                }else if( $_POST["emailClient"]!=$Email){
                    header('location:Login.php');
                    $_SESSION["msgErreur"]="l'email est incorrect";
                }
                else{
                    header("location:Login.php");
                    exit;
                    //$_SESSION["msgErreur"]="Une erreur c'est produite le mot de passe ou l'email est incorrect"; 
                }

                //Vérification Mot de passe
                if(password_verify($_POST["passwordClient"],$password)){
                    $_SESSION["msgErreur"]="Good";
                }else{
                    header('location:Login.php');
                    $_SESSION["msgErreur"]="Une erreur c'est produite le mot de passe est incorrect";
                }
    }
}
?>