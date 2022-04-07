


$(function(){

//Initialisation scrolling effect
AOS.init();




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

$(window).scroll(function(event){

        if($(document).scrollTop() <1){
            $(".header-class").removeClass("fixed");
            $(".header-class").removeClass("active");
            $(".header-class").removeClass("bg-success");
        }
        else if($(document).scrollTop() > 100){
                $(".header-class").removeClass("fixed");
                $(".header-class").addClass("bg-success");
                $(".header-class").addClass("active");
        }
        else{
            $(".header-class").addClass("fixed");
        }
});







