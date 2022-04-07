<?php 
class panier{

    private $connexion_produit;
    public function __construct($connexion_produit)
    {
        
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION["panier"])){
            $_SESSION["panier"]=array();
        }
        $this->connexion_produit =$connexion_produit;
    }

    //function d'ajout au panier et vérification quantité produit
    public function ajout_panier($produit_id){

        if(isset($_SESSION["panier"][$produit_id])){
            $_SESSION["panier"][$produit_id] ++; //incrémentation de la quantité de produit sélectionner
        }else{
            $_SESSION["panier"][$produit_id] = 1 ;
        }
            
    }

    //suppression produit 
    public function del($produit_id){
        unset($_SESSION["panier"][$produit_id]);
    }

    //calcul total
        public function total(){
            $total = 0;
            $ids = array_keys($_SESSION["panier"]);// array_key me permet de récupérer les clés de la variable $_SESSION["panier"]
            $ids_implode = implode("','",$ids);
                $rep=$this->connexion_produit->prepare("SELECT id,prix FROM produits WHERE id IN ('$ids_implode')");
                $rep->execute();
                while($produit_ajouter=$rep->fetch()){
                    $total += $produit_ajouter["prix"] * $_SESSION["panier"][$produit_ajouter["id"]]; //calcul du prix prix du produit  multiplier par la quantité
                }
                return $total;
        }

        // compteur nombre de produit dans panier
        public function compteur(){
            return array_sum($_SESSION["panier"]);
        }
}


?>

