<?php

    class user{
        
        /* PRIVATE */
        private $_nivol;
        private $_login;
        private $_mdp;
        private $_nom;
        private $_prenom;
        private $_bdd;

        /* METHOD */
        public function __construct($bdd){
            $this->_bdd = $bdd;
        }

        public function setUser($nivol ,$login, $mdp, $nom, $prenom){
            $this->_nivol = $nivol;
            $this->_login = $login;
            $this->_mdp = $mdp;
            $this->_nom = $nom;
            $this->_prenom = $prenom;
        }

        public function setUserByNivol($nivol){
            $req = "SELECT * FROM `User` WHERE `nivol`='".$nivol."'";
            $Result = $this->_bdd->query($req);
            if($tab = $Result->fetch()){ 
                $this->setUser($tab["nivol"], $tab["login"], $tab["mdp"], $tab["nom"], $tab["prenom"]);
            }
        }

        public function getNom(){
            return $this->_nom;
        }

        public function getPrenom(){
            return $this->_prenom;
        }

        public function connexion(){
            $afficheForm = true;
            $error = false;
            $_SESSION["Connected"] = false;
            if(isset($_POST["login"]) && isset($_POST["mdp"])){
                $req = "SELECT * FROM `user` WHERE `login`='".$_POST['login']."' AND `mdp` = '".$_POST['mdp']."'";
                $Result = $this->_bdd->query($req);
                if($tab = $Result->fetch()){
                    $this->setUserByNivol($tab["nivol"]);
                    $_SESSION["nivol"] = $tab["nivol"];
                    $_SESSION["Connected"] = true;
                    $afficheForm = false;
                }else{
                    $afficheForm = true;
                    $error = true;
                }
            }else{
                $afficheForm = true;
            }

            if($afficheForm == true){
                ?>
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Authentification - Inventaire - Croix-Rouge française</title>
                        <link rel="icon" type="image/png" href="src/img/croix-rouge.png">
                        <link rel='stylesheet' type='text/css' href='src/css/formulaire.css'>
                    </head>
                    <body>
                        <section class="container">
                            <div class="login">
                                <h1>Accès sécurisé Croix-Rouge française</h1>
                                <form method="post">    
                                    <img src="src/img/logo.png" class="logo" alt="Croix-Rouge française">
                                    <?php
                                        if($error == true){
                                            ?><div class="erreur">Login ou mot de passe invalide</div><?php
                                        }
                                    ?>
                                    <input type="text" id="login" name="login" placeholder="Votre login" autocomplete="off" autocapitalize="off" value="cauetcl" required></input>
                                    <input type="password" id="mdp" name="mdp" placeholder="Votre mot de passe" autocomplete="off" autocapitalize="off" value="vgdX6Hbz" required></input>
                                    <p class="submit">
                                        <input type="submit" class="credentials_input_submit" value="Ouverture de session"></input>
                                    </p>
                                </form>
                            </div>
                        </section>
                    </body>
                <?php
            }
        }

        public function deconnexion(){
            session_unset();
            session_destroy();
            unset($_POST);
            header("Refresh:0");
        }
    }

?>