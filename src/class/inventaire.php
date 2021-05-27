<?php

    class inventaire{

        /* PRIVATE */
        private $_id;
        private $_nom;
        private $_quantite;
        private $_quantiteMin;

        /* METHOD */
        public function __construct($bdd){
            $this->_bdd = $bdd;
        }
    }

?>