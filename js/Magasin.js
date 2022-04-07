
//pour le changement de couleur du background header

$(".header-class").addClass("bg-success");

$(function(){


    filtre_data();

    function filtre_data ()
    {
        $(".filtre_data").html("<div id='loading' style=''></div>");
        var action ="fetch_data";
        var minimum_prix = $("#hidden_minimum_prix").val();
        var maximum_prix = $("#hidden_maximum_prix").val();
        var filtre_checkbox = get_filtre("filtre_checkbox");

        $.ajax({
            type: "POST",
            url: "Recherche_Magasin.php",
            data:{action:action,minimum_prix:minimum_prix,maximum_prix:maximum_prix,
                filtre_checkbox:filtre_checkbox},
            success: function (data) {
                $(".filtre_data").html(data);
            }
        });

    };

    // pour récupérer les checkbox checked
    function get_filtre(class_name){
        var filtre = [];
        $('.'+class_name+':checked').each(function(){
            filtre.push($(this).val());
        });
        return filtre ;
    }

    
    $(".filtre_checkbox").click(function(){
        filtre_data();
    });

    //slide pour prix
    $("#prix_range").slider({
                range:true,
                min:1000,
                max:10000,
                values:[0,10000],
                step:500,
                stop:function(event, ui)
                {
                    $("#interval_prix").html(ui.values[0] + " - " + ui.values[1]);
                    $("#hidden_minimum_prix").val(ui.values[0]);
                    $("#hidden_maximum_prix").val(ui.values[1]);
                    filtre_data();
                }
    });


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




