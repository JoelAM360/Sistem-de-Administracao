<?php
    class Admin{
        private $id;
        private $nome;
        private $genero;
        private $email;
        private $data_nascimento;
        private $pais;
        private $cargo;
        private $senha;
         
        public function __set($attr, $valor)
        {
            $this->$attr=$valor;
        }
        public function __get($attr){
            return $this->$attr;
        }
    }

?>