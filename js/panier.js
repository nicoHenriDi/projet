
$(document).ready(function(){              

  
    $(".header-class").addClass("bg-success"); 

     
});

affichage_panier();

   function affichage_panier(){
        var Action ="Fetch-data";
        $.ajax({
            type:"POST",
            url: "Panier/Affichage_panier.php",
            data: {Action:Action},
            success:function(data){
                $(".Tableau").html(data);
            }
        });
   }


   function recup_id(){
    var Supprime=" ";
    var Supprime =$(".delete").val();
    return Supprime;
}
     
   

    //Pour la Suppression du produit dans le panier

function clique_bouton(){
    var Action ="Fetch-data";
    var Supp = recup_id();
    $.ajax({
        type: "POST",
        url: "Panier/Affichage_panier.php",
        data:{Action:Action,Supp:Supp},
        success: function (data) {
            $(".Tableau").html(data);
            //Régler le probléme du bouton supprimer qui ne marche toujours pas avec ajax
        }
    });
}




