<?php
session_start();
if(isset($_SESSION["Email"],$_SESSION["password"],$_SESSION["name"],$_SESSION["prenom"],$_SESSION["msgSuccés"])
AND !empty($_SESSION["Email"]) AND !empty($_SESSION["password"]) AND !empty($_SESSION["name"])
AND !empty($_SESSION["prenom"]) AND !empty($_SESSION["msgSuccés"])){


    unset($_SESSION["Email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["name"]);
    unset($_SESSION["prenom"]);
    unset($_SESSION["msgSuccés"]);

    //Request la page existant
    // if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    // {
    //     $url = "https";
    // }
    // else
    // {
    //     $url = "http"; 
    // }  
    // $url .= "://"; 
    // $url .= $_SERVER['HTTP_HOST']; 
    // $url .= $_SERVER['REQUEST_URI']; 
    // $page_courante = $url; 
    $page_courante= $_SERVER['HTTP_REFERER'];
    header("location:"."$page_courante");
}
else{
    $page_courante= $_SERVER['HTTP_REFERER'];
    header("location:"."$page_courante");
}

?>