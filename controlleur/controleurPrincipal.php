<?php
function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "accueil.php";
    $lesActions["Hotellerie"] = "Hotellerie.php";
    $lesActions["Congressiste"] = "Congressiste.php";
    $lesActions["Facturation"] = "Facturation.php";
    $lesActions["Reglements"] = "Reglements.php";
    $lesActions["Activites"] = "Activites.php";
    $lesActions["Sessions"] = "Sessions.php";


    



   
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }
}

?>