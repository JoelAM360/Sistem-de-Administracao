<?php
    class AdminContato{
        private $id_user;
        private $id_mgs;
        private $nome_user;
        private $email;
        private $data_envio;
        private $n_telefone;
        private $qtd_msg;
        private $msg;

        public function __set($attr, $valor)
        {
            $this->$attr=$valor;
        }
        public function __get($attr){
            return $this->$attr;
        }
    }

?>