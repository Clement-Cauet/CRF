<?php

    class user{

        /* PRIVATE */
        private $_nivol;
        private $_login;
        private $_mdp;
        private $_nom;
        private $_prenom;
        private $_admin;
        private $_bdd;
        private $_req;

        /* METHOD */
        public function __construct($bdd){
            $this->_bdd = $bdd;
        }

        public function setUser($nivol ,$login, $mdp, $nom, $prenom, $admin){
            $this->_nivol = $nivol;
            $this->_login = $login;
            $this->_mdp = $mdp;
            $this->_nom = $nom;
            $this->_prenom = $prenom;
            $this->_admin = $admin;
        }

        public function setUserByNivol($nivol){
            $req = "SELECT * FROM `User` WHERE `nivol`='".$nivol."'";
            $Result = $this->_bdd->query($req);
            if($tab = $Result->fetch()){
                $this->setUser($tab["nivol"], $tab["login"], $tab["mdp"], $tab["nom"], $tab["prenom"], $tab["admin"]);
            }
        }

        public function getNivol(){
            return $this->_nivol;
        }

        public function getNom(){
            return $this->_nom;
        }

        public function getPrenom(){
            return $this->_prenom;
        }

        public function getAdmin(){
            return $this->_admin;
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

        public function searchBar(){
            if(isset($_GET['search'])){
                $search = $_GET['search'];
                $this->_req .= " AND nom LIKE '$search%'";
            }
            ?>
                <form method="get">
                    <div class="forms-group">
                        <input type="text" class="forms-control" name="search" placeholder="Rechercher par nom">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            <?php
        }

        public function selectUser(){
            $this->_req = "SELECT `nivol`, `nom`, `prenom`, `admin` FROM `user` WHERE 1";
            $this->searchBar();
            $Result = $this->_bdd->query($this->_req);
            ?>
                <table>
                    <thead>
                        <tr>
                            <td>Nivol</td>
                            <td>Nom</td>
                            <td>Prénom</td>
                            <td>Admin</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($tab = $Result->fetch()){ ?>

                            <tr id="<?php echo $tab['nivol']; ?>">
                                <td>
                                    <div><a href="./src/edit/benevole.php?user=<?= $tab['nivol']; ?>"><?php echo $tab['nivol']; ?></a></div>
                                </td>
                                <td >
                                    <div><a href="./src/edit/benevole.php?user=<?= $tab['nivol']; ?>"><?php echo $tab['nom']; ?></a></div>
                                </td>
                                <td >
                                    <div><a href="./src/edit/benevole.php?user=<?= $tab['nivol']; ?>"><?php echo $tab['prenom']; ?></a></div>
                                </td>
                                <td >
                                    <div><a href="./src/edit/benevole.php?user=<?= $tab['nivol']; ?>"><?php echo $tab['admin']; ?></a></div>
                                </td>
                            </tr>


                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
        }

        public function insertUser(){
            ?>
                <form method="post">
                    <div class="nivol">
                        <input type="text" id="nivol" name="nivol" class="form-input" placeholder="Nivol" require>
                    </div>
                    <div class="account">
                        <input type="text" id="login" name="login" class="form-input" placeholder="Login" require>
                        <input type="text" id="mdp" name="mdp" class="form-input" placeholder="Mot de passe" require>
                    </div>
                    <div class="name">
                        <input type="text" id="nom" name="nom" class="form-input" placeholder="Nom" require>
                        <input type="text" id="prenom" name="prenom" class="form-input" placeholder="Prénom" require>
                    </div>
                    <div class="admin">
                        <select name="admin" class="form-input" require>
                            <option value=""></option>
                            <option value="Oui">Oui</option>
                            <option value="Non">Non</option>
                        </select>
                    </div>
                    <div class="insert-button">
                        <input type="submit" name="submit" class="insert" value="Ajouter">
                    </div>
                </form>
            <?php
            if(isset($_POST['submit'])){
                $nivol = $_POST['nivol']; $login = $_POST['login']; $mdp = $_POST['mdp']; $nom = $_POST['nom']; $prenom = $_POST['prenom']; $admin = $_POST['admin'];
                $nom = strtoupper($nom);
                $this->_req = "INSERT INTO `user`(`nivol`, `login`, `mdp`, `nom`, `prenom`, `admin`) VALUES('$nivol', '$login', '$mdp', '$nom', '$prenom', '$admin')";
                $Result = $this->_bdd->query($this->_req);
            }
        }

        public function updateUser($id){
            if(isset($_POST['save'])){
                $nivol = $_POST['nivol']; $login = $_POST['login']; $mdp = $_POST['mdp']; $nom = $_POST['nom']; $prenom = $_POST['prenom']; $admin = $_POST['admin'];
                $nom = strtoupper($nom);
                $this->_req = "UPDATE `user` SET `nivol`= '$nivol',`login`= '$login',`mdp`= '$mdp',`nom`= '$nom',`prenom`= '$prenom',`admin`= '$admin' WHERE `nivol` = '".$id."'";
                $Result = $this->_bdd->query( $this->_req );
            }
        }

        public function formUser($id){
            $this->_req = "SELECT `nivol`, `login`, `mdp`, `nom`, `prenom`, `admin` FROM `user` WHERE `nivol` = '".$id."'";
            $Result = $this->_bdd->query( $this->_req );

            if ( $tab = $Result->fetch() ) {
                ?>
                    <form method="post">
                        <div class="nivol">
                            <label>Nivol</label>
                            <input type="text" id="id" value="<?php echo $tab['nivol']; ?>" hidden>
                            <input type="text" class="form-input" id="nivol" name="nivol" value="<?php echo $tab['nivol']; ?>" require>
                        </div>
                        <div class="account">
                            <label>Login</label>
                            <input type="text" class="form-input" id="login" name="login" value="<?php echo $tab['login']; ?>" require>
                            <label>Mot de passe</label>
                            <input type="text" class="form-input" id="mdp" name="mdp" value="<?php echo $tab['mdp']; ?>" require>
                        </div>
                        <div class="name">
                            <label>Nom</label>
                            <input type="text" class="form-input" id="nom" name="nom" value="<?php echo $tab['nom']; ?>" require>
                            <label>Prénom</label>
                            <input type="text" class="form-input" id="prenom" name="prenom" value="<?php echo $tab['prenom']; ?>" require>
                        </div>
                        <div class="admin">
                            <label>Administrateur</label>
                            <select class="form-input" id="admin" name="admin" require>
                                <option value="<?php echo $tab['admin']; ?>"><?php echo $tab['admin']; ?></option>
                                <?php
                                    if($tab['admin'] == 'Oui'){
                                        ?><option value="Non">Non</option><?php
                                    }else{
                                        ?><option value="Oui">Oui</option><?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="button">
                            <button id="save" name="save">Enregistrer</button>
                            <button id="suppr" name="suppr">Supprimer</button>
                        </div>
                    </form>
                <?php
            } else {
                echo "No user found";
            }

        }
    }

?>
