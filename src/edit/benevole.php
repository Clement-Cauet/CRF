<?php

    session_start();
    include('../../session.php');

    if( $_SESSION["Connected"] == true ) {

        $user->formUser( $_GET["user"] );

    }

?>
