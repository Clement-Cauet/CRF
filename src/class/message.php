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

        public function selectMessage(){
            $this->_req = "SELECT main_courante.id, main_courante.message, DATE_FORMAT(main_courante.date, '%d/%m/%Y %H:%i:%s'), user.nivol, user.nom, user.prenom 
                            FROM `main_courante`, `user` 
                            WHERE user.nivol = main_courante.idUser
                            ORDER BY main_courante.date DESC";
            $Result = $this->_bdd->query($this->_req);
            ?>
                <div class="bloc-message">
            <?php
                while($tab = $Result->fetch()){
                    ?>
                        <div class="message">
                            <h3><?php echo $tab["prenom"]." ".$tab["nom"]." (".$tab["nivol"]."), le ".$tab[2]; ?></h3>
                            <p><?php echo $tab["message"]; ?></p>
                        </div>
                    <?php
                }
            ?>
                </div>
            <?php
        }

        public function loginMessage($nivol){
            $this->_text = "Se connecte sur l\'opération";
            $this->_req = "INSERT INTO `main_courante`(`idUser`, `message`, `date`) VALUES ('$nivol', '$this->_text', NOW())";
            $Result = $this->_bdd->query($this->_req);
        }

        public function insertMessage(){
            ?>
                <form method="post" class="form-message">
                    <label>Envoyer un nouveau message :</label>
                    <input type="text" name="messageBar" class="messageBar" placeholder="Saisissez votre message...">
                    <input type="submit" name="submitMessage" class="submitMessage" value="Envoyer">
                </form>
            <?php
        }

    }

?>