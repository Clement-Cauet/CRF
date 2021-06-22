<?php

    class message {

        /* PRIVATE */
        private $_id;
        private $_text;
        private $_date;
        private $_bdd;
        private $_req;

        /* METHOD */
        public function __construct($bdd){
            $this->_bdd = $bdd;
        }

        public function setMessage($id, $text, $date){
            $this->_id = $id;
            $this->_text = $text;
            $this->_date = $date;
        }

        public function checkMessage($text){
            for($i=0; $i<strlen($text); $i++){
                if($text[$i] == "'" || $text[$i] == '"' || $text[$i] == "`"){
                    $text = substr_replace($text, "\\", $i, 0);
                    $i++;
                }
            }
            $this->_text = $text;
        }

        public function optionMessage($id, $nivol, $user){
            if(isset($_POST["report$id"])){
                $this->_req = "UPDATE `main_courante` SET `report`= 1 WHERE id = $id";
                $Result = $this->_bdd->query($this->_req);
            }
            $this->deleteMessage($id);
            ?>
                <div id="option-message[<?= $id; ?>]" class="option-message">
                    <form method="post">
                        <input type="submit" class="option" name="report<?= $id; ?>" value="Signaler">
                        <?php
                            if($nivol == $user->getNivol()){
                                ?>
                                    <input type="submit" class="option" name="delete" value="Supprimer">
                                <?php
                            }
                        ?>
                    </form>
                </div>
            <?php
        }

        public function selectMessage($message, $user){
            $this->_req = "SELECT `id`, `message`, DATE_FORMAT(`date`, '%d/%m/%Y %H:%i:%s'), `report`, `nivolUser`, `nomUser`, `prenomUser` 
                            FROM `main_courante`
                            ORDER BY `date` DESC";
            $Result = $this->_bdd->query($this->_req);
            ?>
                <div class="bloc-message">
            <?php
                while($tab = $Result->fetch()){
                    ?>
                        <div class="message">
                            <h3>
                                <?php 
                                    if($tab["report"] == 1){
                                        ?><i class="fas fa-exclamation-triangle"></i> <?php
                                    }
                                    echo $tab["prenomUser"]." ".$tab["nomUser"]." (". $tab["nivolUser"]."), le ".$tab[2]; 
                                    if($tab["message"] != "Se connecte sur l'opération"){
                                        ?>
                                            <button class="button-message" onclick="option(<?= $tab['id']; ?>)">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                        <?php
                                        $this->optionMessage($tab["id"], $tab["nivolUser"], $user);
                                    } 
                                ?>
                            </h3>
                            <?php
                                if($tab["nivolUser"] == $user->getNivol() && $tab["message"] != "Se connecte sur l'opération"){
                                    ?>
                                        <form method="post">
                                            <p id="paragraph[<?= $tab['id']; ?>]" ondblclick="update(<?= $tab['id']; ?>)" class="paragraph"><?= $tab["message"]; ?></p>
                                            <input type="text" id="updateMessage[<?= $tab['id']; ?>]" name="updateMessage" class="updateMessage" value="<?= $tab["message"]; ?>" autocomplete="off">
                                            <input type="submit" id="updateSubmit[<?= $tab['id']; ?>]" name="updateSubmit" class="updateSubmit" value="Modifier">
                                        </form>
                                    <?php
                                    $this->updateMessage($tab['id']);
                                }else{
                                    ?>
                                        <p><?= $tab["message"]; ?></p>
                                    <?php
                                }
                            ?>
                        </div>
                    <?php
                }
            ?>
                </div>
            <?php
        }

        public function loginMessage($user){
            $nivol = $user->getNivol();
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $this->_text = "Se connecte sur l'opération";
            $this->checkMessage($this->_text);
            $this->_req = "INSERT INTO `main_courante`(`message`, `date`, `nivolUser`, `nomUser`, `prenomUser`) VALUES ('$this->_text', NOW(), '$nivol', '$nom', '$prenom')";
            $Result = $this->_bdd->query($this->_req);
        }

        public function insertMessage($user){
            if(isset($_POST["messageBar"]) && isset($_POST["submitMessage"])){
                if($_POST["messageBar"] != ""){
                    $nivol = $user->getNivol();
                    $nom = $user->getNom();
                    $prenom = $user->getPrenom();
                    $this->_text = $_POST["messageBar"];
                    $this->checkMessage($this->_text);
                    $this->_req = "INSERT INTO `main_courante`(`message`, `date`, `nivolUser`, `nomUser`, `prenomUser`) VALUES ('$this->_text', NOW(), '$nivol', '$nom', '$prenom')";
                    $Result = $this->_bdd->query($this->_req);
                    unset($_POST);
                    header("Refresh:0");
                }
            }
            ?>
                <form method="post" class="form-message">
                    <label>Envoyer un nouveau message :</label>
                    <input type="text" name="messageBar" class="messageBar" placeholder="Saisissez votre message..." autocomplete="off">
                    <input type="submit" name="submitMessage" class="submitMessage" value="Envoyer">
                </form>
            <?php
        }

        public function updateMessage($id){
            if(isset($_POST["updateSubmit"])){
                $this->_text = $_POST["updateSubmit"];
                $this->checkMessage($this->_text);
                $this->_req = "UPDATE `main_courante` SET `message`= '$this->_text' WHERE `id` = $id";
                $Result = $this->_bdd->query($this->_req);
                unset($_POST);
            }
        }

        public function deleteMessage($id){
            if(isset($_POST["delete"])){
                $this->_req = "DELETE FROM `main_courante` WHERE `id`= $id";
                $Result = $this->_bdd->query($this->_req);
                unset($_POST);
                header("Refresh:0");
            }
        }

        public function selectNews(){
            $this->_req = "SELECT `id`, `titre`, `message`, DATE_FORMAT(`date`, '%d/%m/%Y %H:%i:%s'), `type`, `nivolUser`, `nomUser`, `prenomUser` 
                            FROM `actualite`
                            ORDER BY `date` DESC";
            $Result = $this->_bdd->query($this->_req);
            ?>
                <div class="bloc-news">
            <?php
                while($tab = $Result->fetch()){
                    ?>
                        <div class="news">
                            <div class="title">
                                <?php 
                                    if($tab["type"] == "urgence"){ 
                                        ?><h3 class="urgence"><?= $tab["titre"]; ?></h3><?php 
                                    }elseif($tab["type"] == "annonce"){ 
                                        ?><h3 class="annonce"><?= $tab["titre"]; ?></h3><?php 
                                    }elseif($tab["type"] == "maj"){ 
                                        ?><h3 class="maj"><?= $tab["titre"]; ?></h3><?php 
                                    }
                                ?>
                                <div class="show-more">
                                    <button onclick="show(<?= $tab['id']; ?>)"><i id="fa-chevron-down[<?= $tab['id']; ?>]" class="fas fa-chevron-down"></i></button>
                                </div>
                            </div>
                            <p id="paragraph[<?= $tab['id']; ?>]" class="paragraph">
                                <?= $tab["message"]; ?>
                            </p>
                            <div id="editor[<?= $tab['id']; ?>]" class="editor">
                                <?= $tab["prenomUser"]." ".$tab["nomUser"]." (". $tab["nivolUser"]."), le ".$tab[3]; ?>
                            </div>
                        </div>
                    <?php
                }
            ?>
                </div>
            <?php
        }

    }

?>