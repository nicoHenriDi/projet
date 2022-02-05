<?php

use PhpParser\Node\Stmt\TryCatch;

$user="root";
$mdpasse="";
try{
    $connexion_produit= new PDO ("mysql:host=localhost:3306;dbname=produit_market",$user,$mdpasse);
    $connexion_compte_client= new PDO ("mysql:host=localhost:3306;dbname=user_market",$user,$mdpasse);
    $connexion_produit->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion_compte_client->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $erreur){
        echo("connexion failed")." ".$erreur->getMessage();
} 

?>
<!--connexion à la base de donnée -->
