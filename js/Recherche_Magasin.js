$(function(){

        
         //fonction ajout panier pour le bouton ajout panier
$(".bouton_ajout").click(function(){ 
    var identifiant = $(this).val();
    $.ajax({
         type: "GET",
         url: "ajout_panier.php",
         data: {identifiant:identifiant},
         success: function (data) {
             $(".compteur").html(data);
         }
     });

});
});