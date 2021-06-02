<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('../../session.php');

    // —— Loads all the parameters of my post method.
    $content = trim(file_get_contents("php://input"));

    // —— Transforms the character string into a JSON object
    $data = json_decode($content, true);

    $req = "UPDATE pharmacie SET quantite = $data[quantity] WHERE pharmacie.id = $data[id]";
    $Result = $bdd->query($req);

?>
