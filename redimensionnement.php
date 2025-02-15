<?php
    if(isset($_POST["submit"])){
            //redimensionnement image pour affichage sur site 
            $répertoire_orginale="C:/wamp64/www/Natu_fi/body_site/mon_site/Image/".$_FILES["image_originale"]["name"];//chemin image originale
            $taille_image= getimagesize($répertoire_orginale);//retour sous forme de tableau avec indice [0]=largeur(width) et [1]=hauteur(height)  
            $largeur_max_finale=305;
            $hauteur_max_finale=305;
            $répertoire_finale="../mon_site/image-redim/".$_FILES["image_originale"]["name"];
            $nom_image_Finale="image_redimensionner.jpg";
            if(isset($_FILES["image_originale"])){
                $nom_image_originale=$_FILES["image_originale"];//régler le probléme du jpg
                $imageRessource=imagecreatefrompng($répertoire_orginale);
                if($imageRessource === false){
                    $imageRessource=imagecreatefromjpeg($répertoire_orginale);
                }
            //ceci $nouvelle_dimension_image nous permet de définir notre plan de travaille ou plutot la largeur et la hauteur de notre nouvelle image
            $nouvelle_dimension_image= imagecreatetruecolor($largeur_max_finale,$hauteur_max_finale);
            $copie=imagecopyresampled($nouvelle_dimension_image,$imageRessource,0,0,0,0,$largeur_max_finale,$hauteur_max_finale,$taille_image[0],$taille_image[1]);
                    $retour_new=imagepng($nouvelle_dimension_image,$répertoire_finale,9);
                    if($retour_new === false){
                        $retour_new=imagejpeg($nouvelle_dimension_image,$répertoire_finale,100);
                    }
                    if($retour_new==true){
                        echo("l'image a été bien redimensionner");
                    }else{
                        echo("quelque chose c'est mal passé");
                    }
                }
            }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>redimensionnement</title>
</head>
<body>
    <form action="redimensionnement.php" method="POST" enctype="multipart/form-data" style="position:relative;left:500px;">
        <label for="image_originale">redimensionnement</label>
        <br/>
        <input type="file" name="image_originale">
        <br/>
        <button type="submit" name="submit">soumettre </button>
    </form>
    <?php 
        if(isset($_FILES["image_originale"])){
            var_dump( $nom_image_originale) ;
        }
    ?>
    <img src="../mon_site/Image/<?php echo($_FILES["image_originale"]["name"]);?>" alt="exo">
    <img src='<?php echo($répertoire_finale)?>' alt='exo'>
</body>
</html>