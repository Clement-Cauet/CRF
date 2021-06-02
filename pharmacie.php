<!DOCTYPE html>
<html lang="fr">
<?php
    session_start();
    include("session.php");

    if($_SESSION["Connected"] == true){
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacie - Inventaire - Croix-Rouge française</title>
        <link rel="icon" type="image/png" href="src/img/croix-rouge.png">
        <link rel='stylesheet' type='text/css' href='src/css/pharmacie.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <?php
            include("menu.php");
        ?>
        <div class="back">
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Quantité</td>
                        <td>Quantité Minimum</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $inventaire->selectPharmacie(); ?>
                </tbody>
            </table>
            <script type="text/javascript" src="src/js/pharmacie.js"></script>
        </div>
    </body> 
<?php
    }
?>            
</html>
