$(document).ready(function(){
    $('#search-user').keyup(function(){
            var tape =$(this).val();

            if(tape != ""){
                $.ajax({
                    type:"GET",
                    url:"Recherche_page.php",
                    data:"user"+encodeURIComponent(tape),
                    success:function(data){
                        if(data != ""){
                            $("#result-research").append(data);
                        }else{

                        }
                    }
                });
            }
            
    });
});