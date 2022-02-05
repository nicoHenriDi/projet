
<!--connexion à la base de donnée -->
<?php

use PhpParser\Node\Stmt\TryCatch;

include "connexion_base_de_données.php";

?>
<!--connexion à la base de donnée -->


<?php
    //insertion base de donnée
    if(isset($_POST["submit_inscript"])){
        $insertion_db=$connexion_compte_client->prepare("INSERT INTO client(Nom_client,Prénom_client,Email,Password_client) VALUES(?,?,?,?)") OR die(print_r($connexion_compte_client->errorInfo()));
        $insertion_db->execute(array($_POST["Nom_client"],$_POST["Prénom_client"],$_POST["Email_client"],$_POST["Password_client"]));

            $rep=$connexion_compte_client->query("SELECT * FROM client");
                    while($user_client_db=$rep->fetch()){
                    $Email_vérification=$user_client_db["Email"];
                    $password_vérification=$user_client_db["Password_client"];
                        if( $_POST["Email_client"]==$Email && $_POST["Password_client"]==$password){
                            header("location:Administration.php");
                        }
                        else{
                        header("location:Inscription.php");
                        exit;
                        }
            }
    }
  //Fin insertion base de donnée 
?>