<?php include "connexion_base_de_données.php" ?>
<?php

    function Nbre_jour($debut, $fin) { //nombre de jour aprés Enregistrement

        
         $diff=abs(strtotime($fin)-strtotime($debut)); //calcule du nombre de jours aprés enregistrement
         $tmp = $diff;
         $retour= $tmp / 86400;
      
         return ($retour);//retourne nombre de jour aprés enregistre
    
    }
    
?>
