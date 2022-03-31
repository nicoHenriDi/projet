<?php
// var_dump($_POST);
// die();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
//if (null!==$_POST["envoie"]) {
    if (!empty($_POST["name"]) AND !empty($_POST["email"]) AND !empty($_POST["adresse"]) AND !empty($_POST["livraison"]) AND !empty($_POST["gender"]) AND !empty($_POST["classe"]) AND !empty($_POST["telephone"]) AND !empty($_POST["res_code"]) AND !empty($_POST["produits"])) {
        # code...
        $name =htmlspecialchars($_POST["name"]); 
        $email = htmlspecialchars($_POST["email"]);  
        $res_code =sha1($_POST['res_code']);
        $adresse = htmlspecialchars($_POST["adresse"]);
        $livraison = htmlspecialchars($_POST["livraison"]);
        $gender = htmlspecialchars($_POST["gender"]);
        $classe = htmlspecialchars($_POST["classe"]);
        $telephone = htmlspecialchars($_POST["telephone"]);
        $telephone = htmlspecialchars($_POST["produits"]);
        $paiement =$_POST["paiement"];
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
            # On verifie si le mail existe deja ou pas 
            $reqemail =$bdd ->prepare("SELECT * FROM commande WHERE email= ?");
            $reqemail -> execute(array($email));
            $emailexiste = $reqemail -> rowCount();
            if ($emailexiste = 1) {
                # code...
                 //preparation de la requet d'insertion 
                $pdostatement = $bdd -> prepare ('INSERT INTO commande VALUES(NULL,:nom,:email,:adresse,:livraison,:gender,:classe,:telephone,:res_code,:produits,:paiement)');
                //Liaison des marqueurs a des valeurs
                $pdostatement -> bindValue(':nom',$_POST["name"] ,PDO::PARAM_STR);
                $pdostatement -> bindValue(':email',$_POST["email"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':adresse',$_POST["adresse"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':livraison',$_POST["livraison"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':gender',$_POST["gender"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':classe',$_POST["classe"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':telephone',$_POST["telephone"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':res_code',md5($_POST["res_code"]),PDO::PARAM_STR);
                $pdostatement -> bindValue(':produits',$_POST["produits"],PDO::PARAM_STR);
                $pdostatement -> bindValue(':paiement',($_POST["paiement"]),PDO::PARAM_STR);
  
                // execution de la requete
                $BienInserer = $pdostatement -> execute();
                    
                if($BienInserer){
                        header('location:accueil.php');
                        $message= "La commande a ete bien effectue";
                }else{ 
                    $message= "Echec de la transaction !!" ;
                
                }

            }else {
              # code...
              header('location:rect_contact.php?erreur=4');
            //   $erreur="Cette email existe deja";
       
            }
        }else {
            # code...
            header('location:rect_contact.php?erreur=2');
            // $erreur="Votre adresse email n'est pas valide ";
          }
    }else{
        header('location:rect_contact.php?erreur=1');
        // $erreur="Veiller remplir tous les champs";
    }   
// }

?>