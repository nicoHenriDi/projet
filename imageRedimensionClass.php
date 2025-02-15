<?php

class Redimmensionner{

        public function __construct()
        {
            
        }

            /* faire la classe du redimmensionnement faire une fonction pour
                récupération de l'image 
                puis une pour le redimmensionnement et l'enregistrement en base de donnée
            */
        public function récup_image(){
                                    
                if(isset($_POST["submit"])){
                    //redimensionnement image pour affichage sur site 
                    $répertoire_orginale=".vs/Originale/".$_FILES["image_originale"]["name"];//chemin image originale
                    $taille_image= getimagesize($répertoire_orginale);//retour sous forme de tableau avec indice [0]=largeur(width) et [1]=hauteur(height)  
                    $largeur_max_finale=305;
                    $hauteur_max_finale=305;
                    $répertoire_finale=".vs/Finale/new".$_FILES["image_originale"]["name"];
                    $nom_image_Finale="image_redimensionner.jpg";

                    if(isset($_FILES["image_originale"])){
                        $nom_image_originale=$_FILES["image_originale"];
                            $imageRessource=imagecreatefromjpeg($répertoire_orginale);
                            //ceci $nouvelle_dimension_image nous permet de définir notre plan de travaille ou plutot la largeur et la hauteur de notre nouvelle image
                            $nouvelle_dimension_image= imagecreatetruecolor($largeur_max_finale,$hauteur_max_finale);
                            $copie=imagecopyresampled($nouvelle_dimension_image,$imageRessource,0,0,0,0,$largeur_max_finale,$hauteur_max_finale,$taille_image[0],$taille_image[1]);
                                    $retour_new=imagejpeg($nouvelle_dimension_image,$répertoire_finale,100);
                                    if($retour_new==true){
                                        echo("l'image a été bien redimensionner");
                                    }else{
                                        echo("quelque chose c'est mal passé");
                                    }
                        }
                    }
        }

}



?>