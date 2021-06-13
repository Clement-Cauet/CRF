<link rel='stylesheet' type='text/css' href='src/css/menu.css'>

<header class="header">
    <nav class="navbar">
        <ul class="navbar-gauche">
            <li>
                <a href="index.php">
                    <img class="logo" src="src/img/croix-rouge.png" width="25" height="25">
                    <span class="titre">Inventaire</span>
                </a>
            </li>
            <li>
                <a href="pharmacie.php">
                    <i class="fas fa-medkit"></i>
                </a>
            </li>
            <li>
                <a href="base_log.php">
                    <i class="fas fa-ambulance"></i>
                </a>
            </li>
            <li>
                <a href="vestiaire.php">
                    <i class="fas fa-tshirt"></i>
                </a>
            </li>
            <li>
                <a href="main_courante.php">
                    <i class="far fa-clock"></i>
                </a>
            </li>
            <li>
                <a href="commande.php">
                    <i class="far fa-clipboard"></i>
                </a>
            </li>
            <?php
                $admin = $user->getAdmin();
                if($admin == 'Oui'){
                    ?>
                        <li>
                            <a href="parametre.php">
                                <i class="fas fa-user-cog"></i>
                            </a>
                        </li>
                    <?php
                }
            ?>
        </ul>
        <ul class="navbar-droite">
            <div class="dropdown">
                <button onclick="profilFunction()" class="dropdown-profil-menu">
                    <i class="fas fa-user"></i>
                    <?php
                        $prenom = $user->getPrenom();
                        $nom = $user->getNom();
                        echo $prenom.' '.$nom;
                    ?>
                    <i class="fas fa-caret-down"></i>
                </button>
                <div id="dropdown-profil" class="dropdown-profil">
                    <form method="post">
                        <button type="submit" name="logout" class="dropdown-deconnexion">
                            <i class="fas fa-sign-out-alt"></i>
                            Se déconnecter
                            <?php
                                if(isset($_POST["logout"])){
                                    $user->deconnexion();
                                }
                            ?>
                        </button>
                    </form>
                </div>
            </div>
        </ul>
    </nav>
    <nav class="navbar-collapse">
        <ul class="navbar-gauche">
            <li>
                <a href="index.php">
                    <img class="logo" src="src/img/croix-rouge.png" width="25" height="25">
                    <span class="titre">Inventaire</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-droite">
            <div class="dropdown">
                <button id="menu-collapse" class="menu-collapse">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </ul>
    </nav>
    <nav id="sidebar-menu" class="sidebar-menu">
        <li><a href="pharmacie.php">Pharmacie</a></li>
        <li><a href="base_log.php">Base Log</i></a></li>
        <li><a href="vestiaire.php">Vestiaire</i></a></li>
        <li><a href="main_courante.php">Main Courante</i></a></li>
        <li><a href="commande.php">Commande</i></a></li>
        <?php
            $admin = $user->getAdmin();
            if($admin == 'Oui'){
                ?>
                    <li><a href="parametre.php">Paramètre</i></a></li>
                <?php
            }
        ?>
    </div>
</header>

<script type="text/javascript" src="src/js/menu.js"></script>