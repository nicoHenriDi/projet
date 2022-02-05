<?php
session_start();
include "connexion_base_de_données.php";
include("panier_class.php");//inclusion page panie_class
$panier = new panier($connexion_produit); //new panier objet
if(isset($_GET["id"])){
    //Début récupération des informations du produit
        $rep=$connexion_produit->prepare("SELECT id ,Nom_produit ,Description_produit,Image_produit ,Date_Enregistrement ,Prix FROM produits WHERE id=?");
        $rep->execute([$_GET['id']]);
        $produit_ajouter=$rep->fetch();     
    //Fin  récupération des informations du produit
    if(empty($produit_ajouter)){
        die("this products doesn't existe");
    }else{
        //ajout panier
    $panier ->ajout_panier($produit_ajouter['id'][0]);
    header("location:Natu_fi_acceuil.php");
    //echo("le produit à bien était enregistré dans votre panier <a href='javascript:history.back()'>retour page accueil</a>");
    }
    
}
else{
    die("vous avez pas selectionnez de produit à ajouter au panier");
}