<?php

    class inventaire{

        /* PRIVATE */
        private $_id;
        private $_nom;
        private $_quantite;
        private $_quantiteMin;
        private $_bdd;
        private $_req;

        /* METHOD */
        public function __construct($bdd){
            $this->_bdd = $bdd;
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

        public function select($table){
            $this->_req = "SELECT * FROM `$table` WHERE 1";
            $this->searchBar();
            $Result = $this->_bdd->query($this->_req);
            ?>
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
                        <?php 
                            while($tab = $Result->fetch()){
                                if($tab['quantite'] < $tab['quantiteMin']){
                                    ?>
                                        <tr style="color: #CC0000; font-weight: bold">
                                    <?php
                                }else{
                                    ?>
                                        <tr>
                                    <?php
                                }
                                    ?>
                                            <td class="id"><?= $tab['id']; ?></td>
                                            <td><?= $tab['nom']; ?></td>
                                            <td>
                                                <div class="number-input" id="<?= $tab['id']; ?>" data-min="<?= $tab['quantiteMin'] ?>">
                                                    <button onclick="reduce(this)" class="decrement">-</button>
                                                    <?php if($tab['quantite'] < $tab['quantiteMin']) { ?>
                                                        <input type="number" class="quantity" min="0" style="color: #CC0000" value="<?= $tab['quantite']; ?>" disabled>
                                                    <?php }else{ ?>
                                                        <input type="number" class="quantity" min="0" value="<?= $tab['quantite']; ?>" disabled>
                                                    <?php } ?>
                                                    <button onclick="add(this)" class="increment">+</button>
                                                </div>
                                            </td>
                                            <td><?= $tab['quantiteMin']; ?></td>
                                        </tr>
                                    <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }

        public function commande($table){
            $this->_req = "SELECT COUNT(*) FROM `$table` WHERE $table.quantite < $table.quantiteMin";
            $Result = $this->_bdd->query($this->_req);
            if($tab = $Result->fetch()){
                $count = $tab[0];
            }
            if($count > 0){
                $this->_req = "SELECT * FROM `$table` WHERE $table.quantite < $table.quantiteMin";
                $Result = $this->_bdd->query($this->_req);
                ?>
                    <table>
                        <thead>
                            <tr>
                                <td>ID</td>
                                <td>Nom</td>
                                <td>Quantité</td>
                                <td>Quantité Minimum</td>
                                <td>Quantité Manquante</td>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    while($tab = $Result->fetch()){
                        $quantiteManquante = $tab['quantiteMin'] - $tab['quantite'];
                        if($table == 'pharmacie' || $table == 'base_log' || $table == 'vestiaire'){
                            ?>
                                <tr>
                                    <td><a href="<?= $table; ?>.php"><?= $tab['id']; ?></a></td>
                                    <td><a href="<?= $table; ?>.php"><?= $tab['nom']; ?></a></td>
                                    <td><a href="<?= $table; ?>.php"><?= $tab['quantite']; ?></a></td>
                                    <td><a href="<?= $table; ?>.php"><?= $tab['quantiteMin']; ?></a></td>
                                    <td><a href="<?= $table; ?>.php"><?= $quantiteManquante ?></a></td>
                                </tr>
                            <?php
                        }else{
                            ?>
                            <tr>
                                <td><a href="src/<?= $table; ?>.php"><?= $tab['id']; ?></a></td>
                                <td><a href="src/<?= $table; ?>.php"><?= $tab['nom']; ?></a></td>
                                <td><a href="src/<?= $table; ?>.php"><?= $tab['quantite']; ?></a></td>
                                <td><a href="src/<?= $table; ?>.php"><?= $tab['quantiteMin']; ?></a></td>
                                <td><a href="src/<?= $table; ?>.php"><?= $quantiteManquante ?></a></td>
                            </tr>
                        <?php
                        }
                    }
                ?>
                        </tbody>
                    </table>
                <?php
            }else{
                ?>
                    <div class="conforme">Inventaire Conforme</div>
                <?php
            }
        }

        public function editSelect($table){
            $this->_req = "SELECT * FROM `$table` WHERE 1";
            $this->searchBar();
            $Result = $this->_bdd->query($this->_req);
            ?>
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
                        <?php 
                            while($tab = $Result->fetch()){
                                ?>
                                    <tr>
                                        <td class="id">
                                            <div><a href="./src/edit/inventaire.php?id=<?= $tab['id']; ?>&table=<?= $table; ?>"><?= $tab['id']; ?></a></div>
                                        </td>
                                        <td>
                                            <div><a href="./src/edit/inventaire.php?id=<?= $tab['id']; ?>&table=<?= $table; ?>"><?= $tab['nom']; ?></a></div>
                                        </td>
                                        <td>
                                            <div><a href="./src/edit/inventaire.php?id=<?= $tab['id']; ?>&table=<?= $table; ?>"><?= $tab['quantite']; ?></a></div>
                                        </td>
                                        <td>
                                            <div><a href="./src/edit/inventaire.php?id=<?= $tab['id']; ?>&table=<?= $table; ?>"><?= $tab['quantiteMin']; ?></a></div>
                                        </td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            <?php
        }

        public function insertInventory($table){
            if(isset($_POST["nameInventory"]) && isset($_POST["quantityInventory"]) && isset($_POST["quantityMinInventory"]) && isset($_POST["submitInventory"])){
                if($_POST["nameInventory"] != ""){
                    $_nom = $_POST["nameInventory"];
                    $_quantite = $_POST["quantityInventory"];
                    $_quantiteMin = $_POST["quantityMinInventory"];
                    $this->_req = "INSERT INTO $table(`nom`, `quantite`, `quantiteMin`) VALUES ('$_nom', '$_quantite', '$_quantiteMin')";
                    $Result = $this->_bdd->query($this->_req);
                    unset($_POST);
                    header("Refresh:0");
                }
            }
            ?>
                <form method="post" class="form-inventory">
                    <div class="name-inventory">
                        <label>Nom du produit :</label>
                        <input type="text" name="nameInventory" class="nameInventory" placeholder="Saisissez un nom..." autocomplete="off" required>
                    </div>
                    <div class="quantity-inventory">
                        <label>Quantité actuelle :</label>
                        <input type="number" name="quantityInventory" class="quantityInventory" autocomplete="off" required>
                        <label>Quantité minimale :</label>
                        <input type="number" name="quantityMinInventory" class="quantityMinInventory" autocomplete="off" required>
                    </div>
                    <div class="submit-button">
                        <input type="submit" name="submitInventory" class="submit" value="Ajouter">
                    </div>
                </form>
            <?php
        }

        public function updateInventory($id, $table){
            $nameInventory = $_POST['nameInventory']; $quantityInventory = $_POST['quantityInventory']; $quantityMinInventory = $_POST['quantityMinInventory'];
            $this->_req = "UPDATE $table SET `nom`= '$nameInventory',`quantite`= '$quantityInventory',`quantiteMin`= '$quantityMinInventory' WHERE `id` = '".$id."'";
            $Result = $this->_bdd->query( $this->_req );
            unset($_POST);
        }

        public function deleteInventory($id, $table){
            $this->_req = "DELETE FROM $table WHERE `id` = '".$id."'";
            $Result = $this->_bdd->query( $this->_req );
            unset($_POST);
        }

        public function formInventory($id, $table){
            $this->_req = "SELECT `nom`, `quantite`, `quantiteMin` FROM $table WHERE `id`= $id";
            $Result = $this->_bdd->query($this->_req);
            while($tab = $Result->fetch()){
                ?>
                    <form method="post" class="form-inventory">
                        <div class="name-inventory">
                            <label>Nom du produit :</label>
                            <input type="text" name="nameInventory" class="nameInventory" placeholder="Saisissez un nom..." value="<?= $tab['nom']; ?>" autocomplete="off" required>
                        </div>
                        <div class="quantity-inventory">
                            <label>Quantité actuelle :</label>
                            <input type="number" name="quantityInventory" class="quantityInventory" value="<?= $tab['quantite']; ?>" autocomplete="off" required>
                            <label>Quantité minimale :</label>
                            <input type="number" name="quantityMinInventory" class="quantityMinInventory" value="<?= $tab['quantiteMin']; ?>" autocomplete="off" required>
                        </div>
                        <div class="button">
                            <input type="submit" id="save" name="save" value="Enregistrer">
                            <input type="submit" id="suppr_confirm" name="suppr_confirm" value="Supprimer définitivement">
                            <input type="button" id="suppr" name="suppr" value="Supprimer">
                            <input type="button" id="cancel" name="cancel" value="Annuler">
                        </div>
                    </form>
                <?php
            }
        }
    }

?>
