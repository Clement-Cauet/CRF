<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('../../session.php');

    // —— Loads all the parameters of my post method.
    $content = trim(file_get_contents("php://input"));

    // —— Transforms the character string into a JSON object
    $data = json_decode($content, true);

    $req = "SELECT COUNT(1) FROM $data[table]";
    $Result = $bdd->query($req)->fetch();

    echo json_encode($Result);

?>
