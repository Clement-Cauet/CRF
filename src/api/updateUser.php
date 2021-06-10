<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('../../session.php');

    // —— Loads all the parameters of my post method.
    $content = trim(file_get_contents("php://input"));

    // —— Transforms the character string into a JSON object
    $data = json_decode($content, true);

    $data[nom] = strtoupper($data[nom]);
    $req = "UPDATE `user` SET `nivol`= '$data[nivol]',`login`= '$data[login]',`mdp`= '$data[mdp]',`nom`= '$data[nom]',`prenom`= '$data[prenom]',`admin`= '$data[admin]' WHERE `nivol` = '$data[id]'";
    $Result = $bdd->query($req);

?>