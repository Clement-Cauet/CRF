<?php

    session_start();
    include('../../session.php');
    $benevole->setUserByNivol($_GET["user"]);

    if( $_SESSION["Connected"] == true ) {
        ?>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bénévole - Inventaire - Croix-Rouge française</title>
                <link rel="icon" type="image/png" href="../img/croix-rouge.png">
                <link rel='stylesheet' type='text/css' href='../css/index.css'>
                <link rel='stylesheet' type='text/css' href='../css/benevole.css'>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
            </head>
            <body>
                <?php
                    include("menuedit.php");
                ?>
                <div class="back">
                    <h2><?php echo $benevole->getNom()." ".$benevole->getPrenom()." (".$benevole->getNivol().")"; ?></h2>
                    <div class="form-benevole">
                        <?php $benevole->formUser($_GET["user"]); ?>
                    </div>
                    <?php 
                        //$benevole->updateUser($_GET["user"]); 
                    ?>
                    <script type="text/javascript" src="../js/benevole.js"></script>
                </div>
            </body>
        <?php
    }

?>
