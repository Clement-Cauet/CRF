<?php

    class message {

        /* PRIVATE */
        private $_id;
        private $_text;
        private $_date;
        private $_bdd;
        private $_req;

        /* METHOD */
        //Constructeur
        public function __construct($bdd){
            $this->_bdd = $bdd;
        }

        //Initialisation des variables de la classe message
        public function setMessage($id, $text, $date){
            $this->_id = $id;
            $this->_text = $text;
            $this->_date = $date;
        }

        //Vérifie les caractères spéciaux et les isolent de la requète
        public function checkMessage($text){
            for($i=0; $i<strlen($text); $i++){
                if($text[$i] == "'" || $text[$i] == '"' || $text[$i] == "`"){
                    $text = substr_replace($text, "\\", $i, 0);
                    $i++;
                }
            }
            $this->_text = $text;
        }

        //Affiche le menu des options du message
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

        //Affiche les messages
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
                                            <p id="paragraph[<?= $tab['id']; ?>]" ondblclick="update(<?= $tab['id']; ?>)" class="messageContent"><?= $tab["message"]; ?></p>
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

        //Envoie d'un automatique quand un utilisateur se connecte
        public function loginMessage($user){
            $nivol = $user->getNivol();
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $this->_text = "Se connecte sur l'opération";
            $this->checkMessage($this->_text);
            $this->_req = "INSERT INTO `main_courante`(`message`, `date`, `nivolUser`, `nomUser`, `prenomUser`) VALUES ('$this->_text', NOW(), '$nivol', '$nom', '$prenom')";
            $Result = $this->_bdd->query($this->_req);
        }

        //Ajoute un message en BDD
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

        //Modifie un messages en BDD
        public function updateMessage($id){
            if(isset($_POST["updateSubmit"])){
                $this->_text = $_POST["updateMessage"];
                $this->checkMessage($this->_text);
                $this->_req = "UPDATE `main_courante` SET `message`= '$this->_text' WHERE `id` = $id";
                $Result = $this->_bdd->query($this->_req);
                unset($_POST);
            }
        }

        //Supprime un message en BDD
        public function deleteMessage($id){
            if(isset($_POST["delete"])){
                $this->_req = "DELETE FROM `main_courante` WHERE `id`= $id";
                $Result = $this->_bdd->query($this->_req);
                unset($_POST);
                header("Refresh:0");
            }
        }

        //Affiche les messages sur la page de paramètre 
        public function editSelectMessage($message){
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
                                        $this->editOptionMessage($tab["id"]);
                                    } 
                                ?>
                            </h3>
                            <?php
                                if($tab["message"] != "Se connecte sur l'opération"){
                                    ?>
                                        <form method="post">
                                            <p id="paragraph[<?= $tab['id']; ?>]" ondblclick="update(<?= $tab['id']; ?>)" class="messageContent"><?= $tab["message"]; ?></p>
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

        //Affiche le menu des options du message sur la page de paramètre 
        public function editOptionMessage($id){
            if(isset($_POST["report$id"])){
                $this->_req = "UPDATE `main_courante` SET `report`= 1 WHERE `id` = $id";
                $Result = $this->_bdd->query($this->_req);
            }
            if(isset($_POST["unreport$id"])){
                $this->_req = "UPDATE `main_courante` SET `report`= 0 WHERE `id` = $id";
                $Result = $this->_bdd->query($this->_req);
            }
            $this->deleteMessage($id);
            $this->_req = "SELECT `report` FROM `main_courante` WHERE `id` = $id";
            $Result = $this->_bdd->query($this->_req);
            while($tab = $Result->fetch()){
                ?>
                    <div id="option-message[<?= $id; ?>]" class="option-message">
                        <form method="post">
                            <?php
                                if($tab['report'] == 0){
                                   ?><input type="submit" class="option" name="report<?= $id; ?>" value="Signaler"><?php 
                                }else{
                                    ?><input type="submit" class="option" name="unreport<?= $id; ?>" value="Désignaliser"><?php
                                }
                            ?>
                            <input type="submit" class="option" name="delete" value="Supprimer">
                        </form>
                    </div>
                <?php
            }
        }

        //Affiche les annonces
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

        //Affiche les annonces sur la page de paramètre
        public function editSelectNews(){
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
                                <a href="./src/edit/actualite.php?news=<?= $tab['id']; ?>">
                                    <?php 
                                        if($tab["type"] == "urgence"){ 
                                            ?><h3 class="urgence"><?= $tab["titre"]; ?></h3><?php 
                                        }elseif($tab["type"] == "annonce"){ 
                                            ?><h3 class="annonce"><?= $tab["titre"]; ?></h3><?php 
                                        }elseif($tab["type"] == "maj"){ 
                                            ?><h3 class="maj"><?= $tab["titre"]; ?></h3><?php 
                                        }
                                    ?>
                                    </a>
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

        //Ajout d'une annonce en BDD
        public function insertNews($user){
            if(isset($_POST["titleNews"]) && isset($_POST["typeNews"]) && isset($_POST["textNews"]) && isset($_POST["submitNews"])){
                if($_POST["textNews"] != "" && $_POST["titleNews"] != ""){
                    $nivol = $user->getNivol();
                    $nom = $user->getNom();
                    $prenom = $user->getPrenom();
                    $this->_text = $_POST["titleNews"];
                    $this->checkMessage($this->_text);
                    $titleNews = $this->_text;
                    $this->_text = $_POST["textNews"];
                    $this->checkMessage($this->_text);
                    $textNews = $this->_text;
                    $typeNews = $_POST["typeNews"];
                    $this->_req = "INSERT INTO `actualite`(`titre`, `message`, `date`, `type`, `nivolUser`, `nomUser`, `prenomUser`) VALUES ('$titleNews', '$textNews', NOW(), '$typeNews', '$nivol', '$nom', '$prenom')";
                    $Result = $this->_bdd->query($this->_req);
                    unset($_POST);
                    header("Refresh:0");
                }
            }
            ?>
                <form method="post" class="form-news">
                    <div class="title">
                        <label>Titre de l'article :</label>
                        <input type="text" name="titleNews" class="titleNews" placeholder="Saisissez un titre..." autocomplete="off" required>
                    </div>
                    <div class="type">
                        <label>Type de l'article :</label>
                        <select name="typeNews" class="typeNews" required>
                            <option value=""></option>
                            <option value="urgence">Urgence</option>
                            <option value="annonce">Annonce</option>
                            <option value="maj">Mise à jour</option>
                        </select>
                    </div>
                    <div class="text">
                        <label>Contenu de l'article :</label>
                        <textarea name="textNews" class="textNews" placeholder="Saisissez votre contenu..." autocomplete="off" required></textarea>
                    </div>
                    <div class="submit-button">
                        <input type="submit" name="submitNews" class="submit" value="Ajouter">
                    </div>
                </form>
            <?php
        }

        //Modifie l'annonce en BDD
        public function updateNews($id){
            $titleNews = $_POST['titleNews']; $typeNews = $_POST['typeNews']; $textNews = $_POST['textNews'];
            $this->_req = "UPDATE `actualite` SET `titre`= '$titleNews',`type`= '$typeNews',`message`= '$textNews' WHERE `id` = '".$id."'";
            $Result = $this->_bdd->query( $this->_req );
            unset($_POST);
        }

        //Supprime l'annonce en BDD
        public function deleteNews($id){
            $this->_req = "DELETE FROM `actualite` WHERE `id` = '".$id."'";
            $Result = $this->_bdd->query( $this->_req );
            unset($_POST);
        }

        //Formulaire de gestion des annonces
        public function formNews($id){
            $this->_req = "SELECT `titre`, `message`, `date`, `type`, `nivolUser`, `nomUser`, `prenomUser` FROM `actualite` WHERE `id`=$id";
            $Result = $this->_bdd->query($this->_req);
            while($tab = $Result->fetch()){
                ?>
                    <form method="post" class="form-news">
                        <div class="title">
                            <label>Titre de l'article :</label>
                            <input type="text" name="titleNews" class="titleNews" placeholder="Saisissez un titre..." value="<?= $tab['titre']; ?>" autocomplete="off" required>
                        </div>
                        <div class="type">
                            <label>Type de l'article :</label>
                            <select name="typeNews" class="typeNews" required>
                                <?php
                                    if($tab['type'] == 'urgence'){
                                        ?>
                                            <option value="urgence">Urgence</option>
                                            <option value="annonce">Annonce</option>
                                            <option value="maj">Mise à jour</option>
                                        <?php
                                    }elseif($tab['type'] == 'annonce'){
                                        ?>
                                            <option value="annonce">Annonce</option>
                                            <option value="urgence">Urgence</option>
                                            <option value="maj">Mise à jour</option>
                                        <?php
                                    }else{
                                        ?>
                                            <option value="maj">Mise à jour</option>
                                            <option value="urgence">Urgence</option>
                                            <option value="annonce">Annonce</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="text">
                            <label>Contenu de l'article :</label>
                            <textarea name="textNews" class="textNews" placeholder="Saisissez votre contenu ..." autocomplete="off" required><?= $tab['message']; ?></textarea>
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