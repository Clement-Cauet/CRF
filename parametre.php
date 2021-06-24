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
            <link rel='stylesheet' type='text/css' href='src/css/index.css'>
            <link rel='stylesheet' type='text/css' href='src/css/accueil.css'>
            <link rel='stylesheet' type='text/css' href='src/css/inventaire.css'>
            <link rel='stylesheet' type='text/css' href='src/css/parametre.css'>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
        </head>
        <body>
            <?php
                $admin = $user->getAdmin();
                if($admin == 'Oui'){
                    include("menu.php");
                    ?>
                        <div class="back">
                            <div id="menu" class="menu">
                                <!-- Button Gestion Benenvole -->
                                <button id="benevole" class="menu-button">
                                    <div class="img-gestion">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <p>Gestion des Bénévoles</p>
                                </button>

                                <!-- Button Gestion Pharmacie -->
                                <button id="pharmacie" class="menu-button">
                                    <div class="img-gestion">
                                        <i class="fas fa-medkit"></i>
                                    </div>
                                    <p>Gestion de la Pharmacie</p>
                                </button>

                                <!-- Button Gestion Base log -->
                                <button id="baseLog" class="menu-button">
                                    <div class="img-gestion">
                                        <i class="fas fa-ambulance"></i>
                                    </div>
                                    <p>Gestion de la Base Log</p>
                                </button>

                                <!-- Button Gestion Vestiaire -->
                                <button id="vestiaire" class="menu-button">
                                    <div class="img-gestion">
                                        <i class="fas fa-tshirt"></i>
                                    </div>
                                    <p>Gestion du Vestiaire</p>
                                </button>

                                <!-- Button Gestion Main Courante -->
                                <button id="mainCourante" class="menu-button">
                                    <div class="img-gestion">
                                        <i class="far fa-clock"></i>
                                    </div>
                                    <p>Gestion de la Main Courante</p>
                                </button>

                                <!-- Button Gestion Actualité -->
                                <button id="actualite" class="menu-button">
                                    <div class="img-gestion">
                                        <i class="far fa-newspaper"></i>
                                    </div>
                                    <p>Gestion des Actualités</p>
                                </button>
                            </div>

                            <div id="return-gestion" class="return-gestion">
                                <!-- Button Return -->
                                <button id="retour" class="retour">
                                    <i class="fas fa-long-arrow-alt-left"></i>
                                    Retour
                                </button>
                            </div>

                            <!-- Gestion Benenvole -->
                            <div id="gestionBenevole" class="gestion">
                                <div id="menu-gestion" class="menu-gestion">
                                    <!-- Button Insert Benevole -->
                                    <button id="insertBenevole" class="insert">
                                        Ajouter
                                    </button>
                                    <button id="cancelBenevole" class="cancel">
                                        Annuler
                                    </button>
                                </div>
                                <div id="formBenevole" class="form-gestion">
                                    <?php $user->insertUser(); ?>
                                </div>
                                <?php $user->selectUser(); ?>
                            </div>

                            <!-- Gestion Pharmacie -->
                            <div id="gestionPharmacie" class="gestion">
                                <div id="menu-gestion" class="menu-gestion">
                                    <!-- Button Insert Pharmacie -->
                                    <button id="insertPharmacie" class="insert">
                                        Ajouter
                                    </button>
                                    <button id="cancelPharmacie" class="cancel">
                                        Annuler
                                    </button>
                                </div>
                                <?php $inventaire->select('pharmacie'); ?>
                            </div>

                            <!-- Gestion Base log -->
                            <div id="gestionBaseLog" class="gestion">
                                <div id="menu-gestion" class="menu-gestion">
                                    <!-- Button Insert Pharmacie -->
                                    <button id="insertBaseLog" class="insert">
                                        Ajouter
                                    </button>
                                    <button id="cancelBaseLog" class="cancel">
                                        Annuler
                                    </button>
                                </div>
                                <?php $inventaire->select('base_log'); ?>
                            </div>

                            <!-- Gestion Vestiaire -->
                            <div id="gestionVestiaire" class="gestion">
                                <div id="menu-gestion" class="menu-gestion">
                                    <!-- Button Insert Pharmacie -->
                                    <button id="insertVestiaire" class="insert">
                                        Ajouter
                                    </button>
                                    <button id="cancelVestiaire" class="cancel">
                                        Annuler
                                    </button>
                                </div>
                                <?php $inventaire->select('vestiaire'); ?>
                            </div>

                            <!-- Gestion Main Courante -->
                            <div id="gestionMainCourante" class="gestion">
                                <?php //$message->selectMessage(); ?>
                            </div>

                            <!-- Gestion Actualité -->
                            <div id="gestionActualite" class="gestion">
                                <div id="menu-gestion" class="menu-gestion">
                                    <!-- Button Insert Article -->
                                    <button id="insertArticle" class="insert">
                                        Ajouter
                                    </button>
                                    <button id="cancelArticle" class="cancel">
                                        Annuler
                                    </button>
                                </div>
                                <div id="formActualite" class="form-gestion">
                                    <?php $message->insertNews($user); ?>
                                </div>
                                <?php $message->editSelectNews(); ?>
                            </div>
                            <script type="text/javascript" src="src/js/parametre.js"></script>
                            <script type="text/javascript" src="src/js/accueil.js"></script>
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
