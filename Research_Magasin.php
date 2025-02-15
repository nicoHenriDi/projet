<?php
include "connexion_base_de_données.php";

if(isset($_POST["entrée_recherche_magasin"]))
{
    $produit_research= (string) trim($_POST["entrée_recherche_magasin"]);
    if(!empty($produit_research)){
        //if in the search area we have a value we execute this request
        $sql ="SELECT * FROM produits WHERE nom_produit LIKE ? LIMIT 10";
        $req=$connexion_produit->prepare($sql);
        $req->execute(array("$produit_research%"));
    }else{
        //else if in the search area we have nothing we execute this request
        $sql ="SELECT * FROM produits";
        $req=$connexion_produit->prepare($sql);
        $req->execute();
    }
   


    while($response=$req->fetch())
    {
    ?>

<div class="col-6 col-sm-4 col-xs-4 col-md-3 col-lg-3  h-100 p-2 m-0">
    <div class="single_produit bg-white m-0" >
                                    <!--lien vers detail produit--> <a class="ripple" href="<?php echo("Info_produit.php?id=".$response["id"]);?>">
                                    <!--image produit--> <img src="<?php echo('Image/'. $response["image_produit"]);?>" class="card-img-top img-fluid image-produit m-0" alt="<?php echo($response["nom_produit"]) ;?>"/> </a>
            <div class="card-body ">
                    
                    <!--Nom produit-->   <h6 class="produit-name m-0"><i><strong><?php echo($response["nom_produit"]) ;?></strong></i></h6>
                    <!--prix produit-->  <h6 class="produit-prix m-0"><i><strong><?php echo(number_format($response["prix"],2)." "."FCFA") ;?> </strong></i></h6>
                    <div class="d-flex justify-content-between align-items-center">
                    <!--bouton ajout au panier-->
                    <div class="btn-group">
                            <button class="btn bg-success text-white btn-sm bouton_ajout" value="<?php echo($response["id"]);?>" onclick="info()"><i class="fas fa-shopping-basket"></i></button>
                            
                            </div>
                            <!--bouton ajout au panier-->
                            <div class="rating text-success m-2">
                                    <i class="bi bi-heart" style="font-size:25px;"></i>
                            </div>
                    </div>
    </div>
    <!-- Begin Footer card-->
    <div class="card-footer text-muted text-center">
    </div>
<!--End Footer card-->
</div>
</div> 

<?php
    }
}
?>