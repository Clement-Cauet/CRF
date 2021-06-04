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
        <title>Parametre - Inventaire - Croix-Rouge française</title>
        <link rel="icon" type="image/png" href="src/img/croix-rouge.png">
        <link rel='stylesheet' type='text/css' href='src/css/parametre.css'>
        <link rel='stylesheet' type='text/css' href='src/css/pharmacie.css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <?php
            $admin = $user->getAdmin();
            if($admin == 'Oui'){
                include("menu.php");
                ?>
                    <div class="back">
                        <div class="menu">
                            <!-- Button Return -->
                            <button id="retour" class="retour">
                                <i class="fas fa-long-arrow-alt-left"></i>
                                Retour
                            </button>

                            <!-- Button Gestion Benenvole -->
                            <button id="benevole" class="menu-gestion">
                                <div class="img-gestion">
                                    <i class="fas fa-user"></i>
                                </div>
                                <p>Gestion des Bénévoles</p>
                            </button>

                            <!-- Button Gestion Pharmacie -->
                            <button id="pharmacie" class="menu-gestion">
                                <div class="img-gestion">
                                    <i class="fas fa-medkit"></i>
                                </div>
                                <p>Gestion de la Pharmacie</p>
                            </button>

                            <!-- Button Gestion Base log -->
                            <button id="baseLog" class="menu-gestion">
                                <div class="img-gestion">
                                    <i class="fas fa-ambulance"></i>
                                </div>
                                <p>Gestion de la Base Log</p>
                            </button>

                            <!-- Button Gestion Vestiaire -->
                            <button id="vestiaire" class="menu-gestion">
                                <div class="img-gestion">
                                    <i class="fas fa-tshirt"></i>
                                </div>
                                <p>Gestion du Vestiaire</p>
                            </button>
                        </div>

                        <!-- Gestion Benenvole -->
                        <div id="gestionBenevole" class="gestion">
                            <div class="btn-gestion">
                                <button id="insert" class="insert">Ajouter</button>
                                <button id="update" class="update">Modifier</button>
                                <button id="suppr" class="delete">Supprimer</button>
                                <button id="cancel" class="cancel">Annuler</button>
                            </div>
                            <?php $user->selectUser(); ?>
                            <div class="btn-gestion-confirm">
                                <button id="confirm" class="confirm">Confirmer</button>
                            </div>
                        </div>

                        <!-- Gestion Pharmacie -->
                        <div id="gestionPharmacie" class="gestion">
                            <?php $inventaire->select('pharmacie'); ?>
                        </div>

                        <!-- Gestion Base log -->
                        <div id="gestionBaseLog" class="gestion">
                            <?php $inventaire->select('pharmacie'); ?>
                        </div>

                        <!-- Gestion Vestiaire -->
                        <div id="gestionVestiaire" class="gestion">
                            <?php $inventaire->select('pharmacie'); ?>
                        </div>
                        <script type="text/javascript" src="src/js/parametre.js"></script>                     
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
