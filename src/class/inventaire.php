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
                        <?php while($tab = $Result->fetch()){
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
                                        <td class="id"><?php echo $tab['id']; ?></td>
                                        <td><?php echo $tab['nom']; ?></td>
                                        <td>
                                            <div class="number-input" id="<?php echo $tab['id']; ?>" data-min="<?= $tab['quantiteMin'] ?>">
                                                <button onclick="reduce(this)" class="decrement">-</button>
                                                <?php if($tab['quantite'] < $tab['quantiteMin']) { ?>
                                                    <input type="number" class="quantity" min="0" style="color: #CC0000" value="<?php echo $tab['quantite']; ?>">
                                                <?php }else{ ?>
                                                    <input type="number" class="quantity" min="0" value="<?php echo $tab['quantite']; ?>">
                                                <?php } ?>
                                                <button onclick="add(this)" class="increment">+</button>
                                            </div>
                                        </td>
                                        <td><?php echo $tab['quantiteMin']; ?></td>
                                    </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
        }

        public function commande($table){
            $this->_req = "SELECT * FROM `$table` WHERE $table.quantite < $table.quantiteMin";
            $Result = $this->_bdd->query($this->_req);
            ?>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Nom</td>
                            <td>Localisation</td>
                            <td>Quantité</td>
                            <td>Quantité Minimum</td>
                            <td>Quantité Manquante</td>
                        </tr>
                    </thead>
                    <tbody>
            <?php
                while($tab = $Result->fetch()){
                    $quantiteManquante = $tab['quantiteMin'] - $tab['quantite'];
                    $link = strtolower($tab['localisation']);
                    ?>
                        <tr>
                            <td><?php echo $tab['id']; ?></td>
                            <td><?php echo $tab['nom']; ?></td>
                            <td><a href="<?php echo $link; ?>.php"><?php echo $tab['localisation']; ?></a></td>
                            <td><?php echo $tab['quantite']; ?></td>
                            <td><?php echo $tab['quantiteMin']; ?></td>
                            <td><?php echo $quantiteManquante ?></td>
                        </tr>
                    <?php
                }
            ?>
                    </tbody>
                </table>
            <?php
        }
    }

?>
