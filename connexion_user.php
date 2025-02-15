
<?php 
session_start();

//connexion à la base de donnée
include "connexion_base_de_données.php"; 

    //insertion base de donnée
  if (!empty($_POST["PrénomClient"] )&& !empty($_POST["NomClient"]) && !empty($_POST["EmailClient"]) && !empty($_POST["PasswordClient"])) {
        # code...
        $prenom =htmlspecialchars($_POST["PrénomClient"]); 
        $nom=htmlspecialchars($_POST["NomClient"]);
        $email =htmlspecialchars($_POST["EmailClient"]);  
        $password=password_hash($_POST['PasswordClient'], PASSWORD_DEFAULT);//pour le hashage du mot de passe
        $newPassword = htmlspecialchars($_POST["NewPasswordClient"]);

        if(filter_var($email,FILTER_VALIDATE_EMAIL)) {
            # On verifie si le mail existe deja ou pas 
            $reqemail =$connexion_produit->prepare("SELECT * FROM user_market WHERE Email=?");
            $reqemail -> execute(array($email));
            $emailexiste = $reqemail -> rowCount();
            if ($emailexiste == 0) {
              # code...
        
              //on vérifie que les mot de passe concorde
              if($_POST['PasswordClient'] != $newPassword ){
                    header('location:Inscription.php?erreur=3');
                    $_SESSION["Inscription-Error"]="Les mot de passe ne sont pas les même";
              }else{
                $pdostatement = $connexion_produit->prepare ('INSERT INTO user_market VALUES(NULL,:nomClient,:prenomClient,:Email,:passwordClient,now())');
                //Liaison des marqueurs a des valeurs
                $pdostatement->bindValue(':nomClient',$nom,PDO::PARAM_STR);
                $pdostatement->bindValue(':prenomClient',$prenom,PDO::PARAM_STR);
                $pdostatement->bindValue(':Email',$email,PDO::PARAM_STR);
                $pdostatement->bindValue(':passwordClient',$password,PDO::PARAM_STR);
                $bien_inserer=$pdostatement->execute();
                
                if($bien_inserer){
                        header('location:Login.php');
                        $_SESSION["Inscription-Success"]= "Vous avez ete bien été enregistrer";
                }else{ 
                  header('location:Inscription.php?erreur=impossibleinsert');
                  $_SESSION["Insertion-Error"]= "Impossible de vous inscrire réessayer plutard";
                }
              }
        }else {
            # code...
            header('location:Inscription.php?erreur=2');
            $_SESSION["Inscription-Error"]="Cette Email existe déja rentrer un non existant";
          }
    }else{
        header('location:Inscription.php?erreur=1');
        $_SESSION["Inscription-Error"]="Votre adresse email n'est pas valide ";
    }
  }   
?>