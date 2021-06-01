<?php

    include "src/class/user.php";
    include "src/class/inventaire.php";

    //Appel de la Base De Donnée (BDD)
    $login = "root";
    $mdp = "";
    $bdd = new PDO('mysql:host=localhost; dbname=crf; charset=utf8', $login, $mdp);

    $inventaire = new inventaire($bdd);

    $user = new user($bdd);

    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"] == true){
        if(isset($_SESSION["nivol"])){
            $user->setUserByNivol($_SESSION["nivol"]);
        }
    }else{
        $user->connexion();
    }

?>