<?php

    session_start();
    include('../../session.php');

    if(isset($_POST['save'])){
        $inventaire->updateInventory($_GET["id"], $_GET["table"]);
        header("Refresh:0");
    }
    if(isset($_POST['suppr_confirm'])){
        $inventaire->deleteInventory($_GET["id"], $_GET["table"]);
        header('location: ../../parametre.php');
    }

    if( $_SESSION["Connected"] == true ) {
        ?>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Inventaire - Inventaire - Croix-Rouge française</title>
                <link rel="icon" type="image/png" href="../img/croix-rouge.png">
                <link rel='stylesheet' type='text/css' href='../css/index.css'>
                <link rel='stylesheet' type='text/css' href='../css/edit.css'>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
            </head>
            <body>
                <?php
                    include("menuedit.php");
                ?>
                <div class="back">
                    <div class="form-inventaire">
                        <?php $inventaire->formInventory($_GET["id"], $_GET["table"]); ?>
                    </div>
                    <script type="text/javascript" src="../js/edit.js"></script>
                </div>
            </body>
        <?php
    }

?>
