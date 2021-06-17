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

        public function selectMessage(){
            $this->_req = "SELECT `id`, `message`, DATE_FORMAT(`date`, '%d/%m/%Y %H:%i:%s'), `nivolUser`, `nomUser`, `prenomUser` 
                            FROM `main_courante`
                            ORDER BY `date` DESC";
            $Result = $this->_bdd->query($this->_req);
            ?>
                <div class="bloc-message">
            <?php
                while($tab = $Result->fetch()){
                    ?>
                        <div class="message">
                            <h3><?php echo $tab["prenomUser"]." ".$tab["nomUser"]." (".$tab["nivolUser"]."), le ".$tab[2]; ?></h3>
                            <p><?php echo $tab["message"]; ?></p>
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

        public function insertNews(){
            ?>
            <?php
        }

    }

?>