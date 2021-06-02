<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include('../../session.php');

    $req = "UPDATE pharmacie SET quantite = '$quantite' WHERE pharmacie.id = '$id'";
    $Result = $bdd->query($req);

    echo 1;
?>