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
        <title>Main courante - Inventaire - Croix-Rouge française</title>
        <link rel="icon" type="image/png" href="src/img/croix-rouge.png">
        <link rel='stylesheet' type='text/css' href='src/css/pharmacie.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <?php
            $admin = $user->getAdmin();
            if($admin == 1){
                include("menu.php");
                ?>
                    <div class="back">

                    </div>
                <?php
            }else{
                ?>
                    <div class="back">
                        <p>Vous n'avez pas les permissions requise sur acceder à cette page</p>
                        <button>
                            <a href="index.php">Retour à la page d'acceuil</a>
                        </button>
                    </div>
                <?php
            }
        ?>
    </body> 
<?php
    }
?>            
</html>
