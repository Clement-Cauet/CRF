<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include('../../session.php');

    $content = trim(file_get_contents("php://input"));

    $data = json_decode($content, true);

    $_SESSION['nivol'] = $data[id];

    echo 1;

?>