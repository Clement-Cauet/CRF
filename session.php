<?php

    include "src/class/user.php";
    include "src/class/inventaire.php";
    include "src/class/message.php";

    /* Appel de la Base De Donnée (BDD) */
    // BDD locale
    $host = "localhost";
    $dbname = "crf";
    $login = "root";
    $mdp = "";
    
    // BDD alwaysdata
    /*$host = "mysql-cauet-clement.alwaysdata.net";
    $dbname = "cauet-clement_crf";
    $login = "237972";
    $mdp = "dofusclem";*/
    
    $bdd = new PDO('mysql:host='.$host.'; dbname='.$dbname.'; charset=utf8', $login, $mdp);

    $user = new user($bdd);
    $benevole = new user($bdd);

    $inventaire = new inventaire($bdd);

    $message = new message($bdd);

    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"] == true){
        if(isset($_SESSION["nivol"])){
            $user->setUserByNivol($_SESSION["nivol"]);
        }
    }else{
        $user->connexion($message);
    }

?>